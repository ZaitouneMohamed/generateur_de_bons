<?php

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
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

Route::controller(ProductController::class)->name("product.")->group(function () {
    Route::get('productList', 'index')->name("list");
    Route::post('ImportProducts', 'ImportProducts')->name("ImportProducts");
    Route::get('ClearTable', 'ClearTable')->name("ClearTable");
});

Route::post('/orders_import', [HomeController::class, 'upload'])->name('orders.import');
Route::get('getBonCommand/{numero_command}', [PdfController::class, 'getBonCommand'])->name('getBonCommand');
Route::get('recap', [PdfController::class, 'recap'])->name('recap');
Route::get('tickets', [PdfController::class, 'tickets'])->name('tickets');
Route::get('bon_reception', [PdfController::class, 'bon_reception'])->name('bon_reception');
Route::get('clear', [HomeController::class, 'clear'])->name('clear');
Route::post('/SetNomeroCommand', [HomeController::class, 'SetNomeroCommand'])->name('SetNomeroCommand');

Route::resource("fournisseur", FournisseurController::class);
Route::get('updateFournisseurStatue/{id}', [FournisseurController::class, 'SwitchActiveMode'])->name('fournisseur.statue');
