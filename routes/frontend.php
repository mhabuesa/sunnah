<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/quickView/{id}', 'quickView')->name('quickView');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{slug}', 'product')->name('product');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/ajax', 'ajaxProducts')->name('products.ajax');
    Route::get('/category/{slug}', 'category_products')->name('category');
    Route::get('/allBrands', 'all_brands')->name('all.brands');
    Route::get('/brand/{slug}', 'brand_product')->name('brand');
    Route::get('/todays/deal', 'todaysDeal')->name('todays.deal');
    Route::get('/searchProduct/ajax', 'search_product_ajax')->name('search.product.ajax');
});