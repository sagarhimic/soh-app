<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StockUpdate extends Model
{
    protected $fillable = [
        'item_id',
        'date',
        'Adilabad',
        'Komuram_Bheem_Asifabad',
        'Mancherial',
        'Nirmal',
        'Khammam',
        'Bhadradri_Kothagudem',
        'Hanumakonda',
        'Jangaon',
        'Jayashankar_Bhupalpally',
        'Mahabubabad',
        'Mulugu',
        'Warangal',
        'Hyderabad',
        'Medchal_Malkajgiri',
        'Nizamabad',
        'Kamareddy',
        'Karimnagar',
        'Peddapalli',
        'Rajanna_Sircilla',
        'Jagtial',
        'Mahabubnagar',
        'Narayanpet',
        'Jogulamba_Gadwal',
        'Nagarkurnool',
        'Wanaparthy',
        'Nalgonda',
        'Suryapet',
        'Yadadri_Bhongir',
        'Ranga_Reddy',
        'Vikarabad',
        'Sangareddy',
        'Medak',
        'Siddipet',
        'quarantine_stock',
        'pending_supply',
        'consumption'
    ];
    
    public function item() {
        return $this->belongsTo(Item::class);
    }
    
    public static function districtColumns()
    {
        return [
            'Adilabad',
            'Komuram_Bheem_Asifabad',
            'Mancherial',
            'Nirmal',
            'Khammam',
            'Bhadradri_Kothagudem',
            'Hanumakonda',
            'Jangaon',
            'Jayashankar_Bhupalpally',
            'Mahabubabad',
            'Mulugu',
            'Warangal',
            'Hyderabad',
            'Medchal_Malkajgiri',
            'Nizamabad',
            'Kamareddy',
            'Karimnagar',
            'Peddapalli',
            'Rajanna_Sircilla',
            'Jagtial',
            'Mahabubnagar',
            'Narayanpet',
            'Jogulamba_Gadwal',
            'Nagarkurnool',
            'Wanaparthy',
            'Nalgonda',
            'Suryapet',
            'Yadadri_Bhongir',
            'Ranga_Reddy',
            'Vikarabad',
            'Sangareddy',
            'Medak',
            'Siddipet',
        ];
    }
    
    /**
     * Return array of district names where this stock update has zero or <= 0 SOH.
     *
     * @return array
     */
    public function zeroStockDistricts(): array
    {
        $zeros = [];
        foreach (self::districtColumns() as $col) {
            // guard if column missing on model object
            if (!array_key_exists($col, $this->attributes)) {
                continue;
            }
            
            $val = floatval($this->$col ?? 0);
            if ($val <= 0) {
                $zeros[] = $col;
            }
        }
        return $zeros;
    }
    
    /**
     * Return comma-separated district list (string) for Blade.
     *
     * @return string
     */
    public function zero_stock_list_text(): string
    {
        $list = $this->zeroStockDistricts();
        return empty($list) ? 'None' : implode(', ', $list);
    }
    
    /**
     * Return total active SOH (sum of all district columns).
     *
     * @return float
     */
    public function totalActiveSOH(): float
    {
        $sum = 0.0;
        foreach (self::districtColumns() as $col) {
            $sum += floatval($this->$col ?? 0);
        }
        return round($sum, 2);
    }
    
    /**
     * Optionally provide an accessor so you can use $stock->total_active in Blade.
     */
    public function getTotalActiveAttribute()
    {
        return $this->totalActiveSOH();
    }
    
    // ... any other methods / relations ...
    
    
}

