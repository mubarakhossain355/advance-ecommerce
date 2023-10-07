<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\SubCategoryController;


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
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    // Category Routes
    Route::get('/category/add',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/manage',[CategoryController::class,'index'])->name('category.index');
    Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit'); 
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    // Sub Category Routes
    Route::get('/sub-category/add',[SubCategoryController::class,'create'])->name('sub.category.create');
    Route::get('/sub-category/manage',[SubCategoryController::class,'index'])->name('sub.category.index');
    Route::post('/sub-category/store',[SubCategoryController::class,'store'])->name('sub.category.store');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub.category.edit'); 
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub.category.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'destroy'])->name('sub.category.destroy');
});
