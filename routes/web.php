<?php

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

Route::get('/{date?}', [\App\Http\Controllers\ShowPriceProduct::class, 'index'])->name('product.show');

Route::post('/', [\App\Http\Controllers\ShipmentController::class, 'store'])->name('product.store');
