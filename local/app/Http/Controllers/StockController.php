<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\StockUpdate;
use App\Models\CategoryType;

class StockController extends Controller
{
    /**
     * Display stock list with search filters
     */
    
    public function index(Request $request)
    {
        $data = $request->all();
        
        $search   = isset($data['search_key']) ? trim($data['search_key']) : '';
        $category = isset($data['category']) ? $data['category'] : '';
        
        //dd_array($search);
        
        // Build query with relations
        $query = StockUpdate::with(['item.categoryType']); // because 1 row per item
        
        // Search by item name or code
        if (!empty($search)) {
            $query->whereHas('item', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                ->orWhere('item_code', 'LIKE', "%$search%");
            });
        }
        
        // Filter by category
        if (!empty($category)) {
            $query->whereHas('item', function ($q) use ($category) {
                $q->where('category_id', $category);
            });
        }
        
        // Get paginated data
        $items = $query->orderBy('item_id', 'ASC')->paginate(30);
        
        if(request()->ajax()) {
            return view('stock.datatable', compact('items'));
        }
        
        // Load categories
        $categories = CategoryType::orderBy('name')->get();
        
        return view('stock.index', compact('items', 'categories', 'search', 'category'));
    }
    
    public function stockDetails(Request $request, $stock_id)
    {
        
        $stocks = StockUpdate::where('id',$stock_id)->get();
        
        return view('reports.show',compact('stocks'));
        
    }
}
