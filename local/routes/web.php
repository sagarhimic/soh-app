<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockImportController;
use App\Http\Controllers\StockController;

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

        
    Route::get('/stock/import', function() {
        return view('stock.import');
    })->name('stock.import.form');
        
    Route::post('/stock/import', [StockImportController::class, 'import'])->name('stock.import');
    
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
    
    Route::get('/stock-detail-report/{stock_id}', [StockController::class, 'stockDetails']);
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/stock-report', [DashboardController::class, 'stockReport']);
    
        