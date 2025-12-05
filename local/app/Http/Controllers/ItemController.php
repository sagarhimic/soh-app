<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\CategoryType;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $search   = isset($data['search_key']) ? trim($data['search_key']) : '';
        $category = isset($data['category']) ? $data['category'] : '';
        
        $items = Item::where(function($q) use($search) {
            if(!empty($search)) {
                $q->where('name', 'LIKE', "%".$search."%")
                ->orWhere('item_code', 'LIKE', "%".$search."%");
            }
        })->where(function($q) use($category) {
            if(!empty($category)) {
                $q->where('category_id', $category);
            }
        })->paginate(20);
        
        if(request()->ajax()) {
            return view('items.datatable', compact('items'));
        }
        
        // Load categories
        $categories = CategoryType::orderBy('name')->get();
        
        return view('items.index', compact('items','categories'));
    }
}
