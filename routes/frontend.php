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
});