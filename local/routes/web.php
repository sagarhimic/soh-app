<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/dashboard/items', [DashboardController::class,'items']);
    Route::get('/dashboard/items/{item}', [DashboardController::class,'itemDetail']);
    
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    
    Route::get('/items-upload', function () {
        return view('items_import');
    });
        
        Route::post('/items/import', [ItemImportController::class, 'importItems'])
        ->name('items.import');
