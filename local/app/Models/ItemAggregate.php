<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ItemAggregate extends Model {
    protected $fillable = [
        'item_id','year','total_soh','total_pending','avg_monthly_consumption',
        'last365_consumption','annual_demand','max_val','months_of_stock','refreshed_at'
    ];
    protected $dates = ['refreshed_at'];
    public function item(){ return $this->belongsTo(Item::class); }
}
