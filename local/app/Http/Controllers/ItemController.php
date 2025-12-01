<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with([
            'categoryType',
            'itemType',
            'consumptionType'
        ])->paginate(20);
        
        return view('items.index', compact('items'));
    }
}
