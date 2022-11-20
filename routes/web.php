<?php

use App\Http\Controllers\MasterCategoryCOAController;
use App\Http\Controllers\MasterChartofAccountController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::resource('categories', MasterCategoryCOAController::class);
Route::get('categories/data', [MasterCategoryCOAController::class, 'data'])->name('categories.data');

Route::resource('coa', MasterChartofAccountController::class);

Route::resource('transaksi', TransaksiController::class);