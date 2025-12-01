<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemAggregate;
use App\Models\Item;

class DashboardController extends Controller
{
    public function items(Request $req)
    {
        $year = $req->query('year', date('Y'));
        $query = ItemAggregate::with('item')->where('year',$year);
        
        if ($req->has('item_id')) $query->where('item_id',$req->get('item_id'));
        if ($req->has('min_months')) $query->where('months_of_stock','>=',$req->get('min_months'));
        
        $rows = $query->paginate(50);
        
        return response()->json($rows);
    }
    
    public function itemDetail($itemId, Request $req)
    {
        $year = $req->query('year', date('Y'));
        $agg = ItemAggregate::with('item')->where('item_id',$itemId)->where('year',$year)->firstOrFail();
        
        // also return last 12 months consumption breakdown (from stock_updates)
        $from = now()->subMonths(12)->startOfMonth();
        $monthly = \DB::table('stock_updates')
        ->selectRaw("YEAR(date) as y, MONTH(date) as m, SUM(consumption) as total_consumption")
        ->where('item_id',$itemId)
        ->whereBetween('date', [$from, now()])
        ->groupBy('y','m')
        ->orderBy('y','m')
        ->get();
        
        return response()->json(['aggregate'=>$agg, 'monthly_consumption'=>$monthly]);
    }
}
