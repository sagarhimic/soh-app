<?php

namespace App\Http\Controllers;

use App\Models\StockUpdate;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filterDate = $request->filter_date ?? date('Y-m-d');
        $selectedDistrict = $request->district ?? null;
        $category = $request->category ?? null;
        
        // All district columns
        $districts = StockUpdate::districtColumns();
        $categories = CategoryType::orderBy('name')->get();
        
        // 📌 Base query with optional date filter
        $baseQuery = StockUpdate::query();
        if (!empty($filterDate)) {
            $baseQuery->whereDate('date', $filterDate);
        }
        
        // Load items once for shortage report
        $allItems = Item::with(['stockUpdates' => function($q) use ($filterDate,$category) {
            if ($filterDate) {
                $q->whereDate('date', $filterDate);
            }
            $q->latest();
        }])
        ->when($category, function ($q) use ($category) {
            $q->where('category_id', $category);
        })->get();
        
        // 1️⃣ DISTRICT WITH MOST SHORTAGE + ITEM LIST
        $districtShortage = [];
        
        foreach ($districts as $dist) {
            
            // If a district is selected, skip all others
            if ($selectedDistrict && $selectedDistrict != $dist) {
                continue;
            }
            
            $count = 0;
            $zeroItems = [];
            
            foreach ($allItems as $item) {
                $lastStock = $item->stockUpdates->first();
                
                if (!$lastStock) {
                    continue;
                }
                
                if (($lastStock->$dist ?? 0) <= 0) {
                    $count++;
                    $zeroItems[] = [
                        'name'     => $item->item_name ?? $item->name,
                        'category' => $item->categoryType->name,
                    ];
                }
            }
            
            $districtShortage[$dist] = [
                'count' => $count,
                'items' => $zeroItems
            ];
       }
       
        // Sort by highest shortage
        uasort($districtShortage, fn($a, $b) => $b['count'] <=> $a['count']);
        
        if ($request->ajax()) {
            return view('dashboard.datatable', compact('districtShortage','filterDate','selectedDistrict','categories'));
        }
        
            return view('dashboard.index', compact(
                'districtShortage',
                'filterDate',
                'selectedDistrict',
                'categories'
                ));
    }
    
    public function stockReport(Request $request)
    {
        $search        = $request->search_key;
        $category      = $request->category;
        $minMonths     = $request->min_months ?? '';
        $totminMonths  = $request->tot_min_months ?? '';
        $filterDate    = $request->filter_date ?? null;
        $perPage       = $request->per_page ?? 100;
        
        // Build query
        $query = StockUpdate::with(['item.categoryType']);
        
        // Search filter
        if (!empty($search)) {
            $query->whereHas('item', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                ->orWhere('item_code', 'LIKE', "%$search%");
            });
        }
        
        // Category filter
        if (!empty($category)) {
            $query->whereHas('item', function ($q) use ($category) {
                $q->where('category_id', $category);
            });
        }
        
        // Date filter
        if (!empty($filterDate)) {
            $query->whereDate('date', $filterDate);
        }
        
        // Fetch all records
        $records = $query->orderBy('item_id', 'ASC')->get();
        
        
        // APPLY BOTH FILTERS TOGETHER
        $items = $records->filter(function($item) use ($minMonths, $totminMonths) {
            
            // ---- CALCULATE TOTAL ACTIVE ----
            $total_active =
            $item->Adilabad +
            $item->Komuram_Bheem_Asifabad +
            $item->Mancherial +
            $item->Nirmal +
            $item->Khammam +
            $item->Bhadradri_Kothagudem +
            $item->Hanumakonda +
            $item->Jangaon +
            $item->Jayashankar_Bhupalpally +
            $item->Mahabubabad +
            $item->Mulugu +
            $item->Warangal +
            $item->Hyderabad +
            $item->Medchal_Malkajgiri +
            $item->Nizamabad +
            $item->Kamareddy +
            $item->Karimnagar +
            $item->Peddapalli +
            $item->Rajanna_Sircilla +
            $item->Jagtial +
            $item->Mahabubnagar +
            $item->Narayanpet +
            $item->Jogulamba_Gadwal +
            $item->Nagarkurnool +
            $item->Wanaparthy +
            $item->Nalgonda +
            $item->Suryapet +
            $item->Yadadri_Bhongir +
            $item->Ranga_Reddy +
            $item->Vikarabad +
            $item->Sangareddy +
            $item->Medak +
            $item->Siddipet;
            
            
            // ---- FILTER 1️⃣ : min_months ----
            if ($minMonths !== null && $minMonths !== '' && $minMonths !== 'all') {
                
                $months_resumed = resumed_months(
                    $total_active,
                    $item->pending_supply,
                    $item->consumption
                    );
                
                $bucket = floor($months_resumed);
                
                if ($bucket != $minMonths) {
                    return false; // ❌ Does not match filter → remove item
                }
            }
            
            
            // ---- FILTER 2️⃣ : tot_min_months ----
            if ($totminMonths !== null && $totminMonths !== '' && $totminMonths !== 'all') {
                
                $total_active_quarantine = $total_active + $item->quarantine;
                
                $tot_months_resumed = resumed_months(
                    $total_active_quarantine,
                    $item->pending_supply,
                    $item->consumption
                    );
                
                $bucket_t = floor($tot_months_resumed);
                
                if ($bucket_t != $totminMonths) {
                    return false; // ❌ Does not match filter → remove item
                }
            }
            
            // If all applied filters passed → keep item
            return true;
        });
            
            
            // Manual pagination after filtering
            $items = new \Illuminate\Pagination\LengthAwarePaginator(
                $items->forPage(request()->get('page', 1), $perPage),
                $items->count(),
                $perPage,
                request()->get('page', 1),
                ['path' => request()->url(), 'query' => request()->query()]
                );
            
            $categories = CategoryType::orderBy('name')->get();
            
            if ($request->ajax()) {
                return view('reports.datatable', compact('items'));
            }
            
            return view('reports.index', compact(
                'items',
                'categories',
                'search',
                'category',
                'minMonths',
                'totminMonths',
                'filterDate'
                ));
    }
    
    
}
