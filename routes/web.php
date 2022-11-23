<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;


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
    return view('welcome');
});

// data for datatable
Route::get('categorys/data', [CategoryController::class, 'data'])->name('categorys.data');
Route::get('charts/data', [ChartController::class, 'data'])->name('charts.data');
Route::get('transactions/data', [TransactionController::class, 'data'])->name('transactions.data');
Route::get('reports/data', [TransactionController::class, 'data'])->name('reports.data');

Route::resource('categorys', CategoryController::class, ['names' => renameResource('categorys')]);
Route::resource('charts', ChartController::class, ['names' => renameResource('charts')]);
Route::resource('transactions', TransactionController::class, ['names' => renameResource('transactions')]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('reports/export', [TransactionController::class, 'export_excel'])->name('reports.excel');