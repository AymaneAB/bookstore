<?php

use App\Http\Controllers\GuestOrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/guest-order/create', [GuestOrderController::class, 'create'])->name('guest-order.create');
Route::post('/guest-order/store', [GuestOrderController::class, 'store'])->name('guest-order.store');
