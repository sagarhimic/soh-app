<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AnnualDemand extends Model {
    protected $fillable = ['item_id','year','annual_demand'];
    public function item(){ return $this->belongsTo(Item::class); }
}
