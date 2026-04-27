<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/manifest.json', function () {
    return response(view('manifest'))
        ->header('Content-Type', 'application/manifest+json');
});

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
    Route::get('/searchProduct', 'search_product')->name('search.product');
    Route::get('/searchProduct/ajax', 'search_product_ajax')->name('search.product.ajax');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/addToCart', 'add_to_cart')->name('addToCart');
    Route::post('/cart/update', 'updateCart')->name('cart.update');
    Route::post('/cart/remove', 'removeCart')->name('cart.remove');
    Route::post('/applyCoupon', 'applyCoupon')->name('cart.applyCoupon');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/placeOrder', 'placeOrder')->name('placeOrder');
});




// Customer Route
// Customer Guest Routes
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('customer.login.submit');
    Route::post('/register', 'register')->name('customer.register.submit');
});

Route::middleware('auth:customer')->controller(DashboardController::class)->group(function () {
    // Protected Routes
    Route::get('/dashboard', 'dashboard')->name('customer.dashboard');
    Route::get('/logout', 'logout')->name('customer.logout');
});