<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Statistic;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EnsureUserIsSeller;
use App\Http\Middleware\EnsureUserIsLibrarian;


Route::prefix('dashboard')->name('dashboard.')->middleware(EnsureUserIsSeller::class)->group(function () {
    //Statistics
    Route::get('/', [Statistic::class, 'index'])->name('statistic.index');

    // products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    // category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{id}/status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');


    // guest orders
    Route::get('/guest-orders', [GuestOrderController::class, 'index'])->name('guest-orders.index');
    Route::get('/guest-orders/{id}/edit', [GuestOrderController::class, 'edit'])->name('guest-orders.edit');
    Route::delete('/guest-orders/{id}', [GuestOrderController::class, 'destroy'])->name('guest-orders.destroy');
    Route::put('/guest-orders/{id}', [GuestOrderController::class, 'update'])->name('guest-orders.update');

    //Contact Us
    Route::get('/contact-us', [ContactUsController::class, 'adminIndex'])->name('contact-us.index');

});


Route::get('/guest-order/create', [GuestOrderController::class, 'create'])->name('guest-order.create');
Route::post('/guest-order/store', [GuestOrderController::class, 'store'])->name('guest-order.store');

Route::post('/orders/store', [OrderController::class, 'store'])->middleware('auth')->name('orders.store')->middleware(EnsureUserIsLibrarian::class);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Route to display all contact form submissions
// Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');

Route::get('/contact-us', [ContactUsController::class, 'showContactForm'])->name('contact-us.index');

Route::post('/contact/store', [ContactUsController::class, 'store'])->name('contact-us.store');
