<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\StockImportService;

class StockImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file'        => 'required|mimes:xlsx,xls',
            'import_date' => 'required|date',
        ]);
        
        $importDate = $request->import_date;
        
        // Read Excel to array
        $rows = Excel::toArray([], $request->file('file'))[0];
        
        if (empty($rows)) {
            return back()->with('error', 'Excel file is empty');
        }
        
        $service = new StockImportService();
        $service->processSheet($rows, $importDate);
        
        return back()->with('success', 'Stock successfully imported!');
    }
}
