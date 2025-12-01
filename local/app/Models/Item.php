<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = ['name','item_code','item_type_id','consumption_type_id','category_id','status','created_at','updated_at'];
    public function stockUpdates(){
        return $this->hasMany(StockUpdate::class);
    }
    public function annualDemands(){
        return $this->hasMany(AnnualDemand::class);
    }
    public function aggregate(){
        return $this->hasOne(ItemAggregate::class);
    }
    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_id');
    }
    
    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }
    
    public function consumptionType()
    {
        return $this->belongsTo(ConsumptionType::class, 'consumption_type_id');
    }
}
