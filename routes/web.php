<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
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
    return view('welcome');
});
Route::post('/orders_import',[HomeController::class,'upload'])->name('orders.import');
Route::get('getsubcategories',[PdfController::class,'getsubcategories'])->name('getsubcategories');
Route::get('recap',[PdfController::class,'recap'])->name('recap');
Route::get('tickets',[PdfController::class,'tickets'])->name('tickets');
Route::get('bon_reception',[PdfController::class,'bon_reception'])->name('bon_reception');
Route::get('clear',[HomeController::class,'clear'])->name('clear');