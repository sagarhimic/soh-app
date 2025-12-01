<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumptionType extends Model
{
    protected $fillable = ['name'];
    
    public function items()
    {
        return $this->hasMany(Item::class, 'consumption_type_id');
    }
}
