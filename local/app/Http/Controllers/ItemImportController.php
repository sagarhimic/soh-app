<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;

class ItemImportController extends Controller
{
    public function importItems(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        
        Excel::import(new ItemsImport, $request->file('file'));
        
        return back()->with('success', 'Items Imported Successfully!');
    }
}
