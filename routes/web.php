<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
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

Route::get('/',  [ProductController::class,'listProducts'])->name('home');
Route::get('/checkout',  [CheckoutController::class,'index'])->name('checkout');
Route::resource('order', OrderController::class)->middleware('auth');
Route::get('restartPayment/{order}',[ OrderController::class,'reTryPayment'])->name('restartPayment')->middleware('auth');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
