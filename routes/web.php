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

Route::get('mastercategorycoas/data', [MasterCategoryCOAController::class, 'data'])->name('mastercategorycoas.data');
Route::get('masterchartofaccounts/data', [MasterChartofAccountController::class, 'data'])->name('masterchartofaccounts.data');
Route::get('transaksis/data', [TransaksiController::class, 'data'])->name('transaksis.data');

Route::resource('mastercategorycoas', MasterCategoryCOAController::class);
Route::resource('masterchartofaccounts', MasterChartofAccountController::class);
Route::resource('transaksis', TransaksiController::class);