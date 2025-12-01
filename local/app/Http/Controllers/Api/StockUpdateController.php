<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockUpdate;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockUpdateController extends Controller
{
    public function bulkUpsert(Request $req)
    {
        $data = $req->validate([
            'rows' => 'required|array|min:1',
            'rows.*.item_id' => 'required|integer|exists:items,id',
            'rows.*.district_id' => 'nullable|integer|exists:districts,id',
            'rows.*.district_name' => 'nullable|string',
            'rows.*.date' => 'required|date',
            'rows.*.soh' => 'nullable|numeric',
            'rows.*.pending_supply' => 'nullable|numeric',
            'rows.*.consumption' => 'nullable|numeric',
        ]);
        
        DB::transaction(function() use($data){
            foreach ($data['rows'] as $r) {
                // create district if district_name provided
                if (empty($r['district_id']) && !empty($r['district_name'])) {
                    $district = District::firstOrCreate(['name' => $r['district_name']]);
                    $r['district_id'] = $district->id;
                }
                StockUpdate::updateOrCreate(
                    ['item_id'=>$r['item_id'],'district_id'=>$r['district_id'],'date'=>Carbon::parse($r['date'])->toDateString()],
                    ['soh'=>($r['soh'] ?? 0),'pending_supply'=>($r['pending_supply'] ?? 0),'consumption'=>($r['consumption'] ?? 0)]
                    );
            }
        });
            
            return response()->json(['success'=>true], 200);
    }
}
