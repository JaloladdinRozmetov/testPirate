<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartEmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\InventoryController::class, 'index'])->name('home');


Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy');

Route::get('/rents', [RentController::class, 'index'])->name('rents.index');
Route::get('/rents/create', [RentController::class, 'create'])->name('rents.create');
Route::post('/rents', [RentController::class, 'store'])->name('rents.store');
Route::delete('/rents/{rent}', [RentController::class, 'destroy'])->name('rents.destroy');
Route::get('/bar-chart', [ChartController::class, 'index'])->name('bar.chart');

Route::get('/chart-by-employee',[ChartEmployeeController::class,'index'])->name('chart.employee');

