<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MyCommerceController;
use Illuminate\Support\Facades\Route;


// Frontend Routes
Route::get('/',[MyCommerceController::class,'index'])->name('home');
Route::get('/product-category',[MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-detail',[MyCommerceController::class,'detail'])->name('product-detail');
// Cart
Route::get('/add-to-cart',[CartController::class,'index'])->name('show-cart');
// Checkout
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');


// Backend Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
