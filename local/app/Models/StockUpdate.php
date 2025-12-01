<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StockUpdate extends Model {
    protected $fillable = ['item_id','district_id','date','soh','pending_supply','consumption'];
    protected $dates = ['date'];
    public function item(){ return $this->belongsTo(Item::class); }
    public function district(){ return $this->belongsTo(District::class); }
}
