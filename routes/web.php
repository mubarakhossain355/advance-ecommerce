<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;

// Frontend Routes
Route::get('/',[MyCommerceController::class,'index'])->name('home');
Route::get('/product-category/{id}',[MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-detail/{id}',[MyCommerceController::class,'detail'])->name('product-detail');
// Cart
Route::get('/show-cart',[CartController::class,'show'])->name('show-cart');
Route::post('/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/remove-cart-product/{id}',[CartController::class,'remove'])->name('remove-cart-product');
Route::post('/update-cart-product/{id}',[CartController::class,'update'])->name('update-cart-product');
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

    // Brand Routes
    Route::get('/brand/add',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/manage',[BrandController::class,'index'])->name('brand.index');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit'); 
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'destroy'])->name('brand.destroy');

    // Unit Routes
    Route::get('/unit/add',[UnitController::class,'create'])->name('unit.create');
    Route::get('/unit/manage',[UnitController::class,'index'])->name('unit.index');
    Route::post('/unit/store',[UnitController::class,'store'])->name('unit.store');
    Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit'); 
    Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class,'destroy'])->name('unit.destroy');

    // Product Routes
    Route::get('/product/add',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/get-subcategory-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::get('/product/manage',[ProductController::class,'index'])->name('product.index');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit'); 
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    
});
