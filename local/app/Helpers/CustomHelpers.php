<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;


if (!function_exists('price')) {

    function price($value) {
        return number_format($value, 2);
    }

}

if (!function_exists('encrypt_id')) {

    function encrypt_id($id) {
        return Crypt::encrypt($id);
    }

}

if (!function_exists('decrypt_id')) {

    function decrypt_id($id) {
        return Crypt::decrypt($id);
    }

}

if (!function_exists('per_page')) {
    
    function per_page()
    {
        return [100,200,300,400,500,600,700,800,900,1000];
    }
}

if (!function_exists('format_date')) {

    function format_date($date) {
        if (is_null($date) || empty($date)) {
            return '';
        }

        return date('j-M-Y', strtotime($date));
    }

}

if (!function_exists('format_mdate')) {
    
    function format_mdate($date) {
        if (is_null($date) || empty($date)) {
            return '';
        }
        
        return date('M-Y', strtotime($date));
    }
    
}

if (!function_exists('format_date1')) {

    function format_date1($date) {
        if (is_null($date) || empty($date)) {
            return NULL;
        }

        return date('Y-m-d', strtotime($date));
    }

}


if (!function_exists('get_day')) {

    function get_day($date) {
        if (is_null($date) || empty($date)) {
            return '';
        }

        return date('D', strtotime($date));
    }

}

if (!function_exists('dd_array')) {
    
    function dd_array($array) {
        echo "<pre>";
        print_r($array);
        exit;
    }
    
}

if (!function_exists('get_full_day')) {

    function get_full_day($date) {
        if (is_null($date) || empty($date)) {
            return '';
        }

        return date('l', strtotime($date));
    }

}

if (!function_exists('resumed_months')) {
    
    /**
     * Calculate how many months stock will last.
     *
     * Formula:
     *   Months = (Total SOH + Pending Supply) / (Consumption / 12)
     *
     * @param float $total_soh
     * @param float $pending_supply
     * @param float $consumption
     * @return float
     */
    function resumed_months($total_soh, $pending_supply, $consumption)
    {
        // Normalize input values
        $total_soh       = floatval($total_soh);
        $pending_supply  = floatval($pending_supply);
        $consumption     = floatval($consumption);
        
        // If consumption is 0 → cannot calculate months, return 0
        if ($consumption <= 0) {
            return 0;
        }
        
        // Monthly consumption
        $monthly_consumption = $consumption / 12;
        
        // Avoid division by zero
        if ($monthly_consumption <= 0) {
            return 0;
        }
        
        // Months stock + pending supply will last
        $months = ($total_soh + $pending_supply) / $monthly_consumption;
        
        // Return rounded to 2 decimals
        return round($months, 2);
    }
}

   