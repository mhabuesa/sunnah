<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InformationController;
use App\Http\Controllers\Frontend\LandingController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/manifest.json', function () {
    return response(view('manifest'))
        ->header('Content-Type', 'application/manifest+json');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/newsletter/subscribe', 'newsletter_subscribe')->name('newsletter.subscribe');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{slug}', 'product')->name('product');
    Route::get('/products', 'products')->name('products');
    Route::get('ajax-products', 'ajaxProducts')->name('ajax.products');
    Route::get('/category/{slug}', 'category_products')->name('category');
    Route::get('/subcategory/{slug}', 'subcategory_products')->name('subcategory');
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/brand/{slug}', 'brand_product')->name('brand');
    Route::get('/todays/deal', 'todaysDeal')->name('todays.deal');
    Route::get('/supperDeals', 'supperDeals')->name('supper.deals');
    Route::get('/searchProduct', 'search_product')->name('search.product');
    Route::get('/searchProduct/ajax', 'search_product_ajax')->name('search.product.ajax');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/addToCart', 'add_to_cart')->name('addToCart');
    Route::post('/cart/update', 'updateCart')->name('cart.update');
    Route::post('/cart/update-quantity', 'updateQuantity')->name('cart.updateQuantity');
    Route::post('/cart/remove', 'removeCart')->name('cart.remove');
    Route::post('/applyCoupon', 'applyCoupon')->name('cart.applyCoupon');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/placeOrder', 'placeOrder')->name('placeOrder');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/placeOrder', 'placeOrder')->name('placeOrder');
});


// Review Route
Route::controller(ReviewController::class)->group(function () {
    Route::post('/review/store', 'store')->name('review.store');
    Route::get('/product/{productId}/reviews', 'productReviews')
    ->name('product.reviews');
});


// Review Route
Route::controller(InformationController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/company-information', 'companyInformation')->name('company.information');
    Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms.and.conditions');
});

// Order Tracking Route
Route::controller(OrderTrackingController::class)->group(function () {
    Route::get('/order/tracking', 'tracking')->name('order.tracking');
});

Route::controller(LandingController::class)->group(function () {
    Route::get('/{slug}', 'landing')->name('landing');
    Route::post('/campaign/order', 'order')->name('campaign.order');
});




// Customer Route
// Customer Guest Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/customer/login', 'login')->name('customer.login');
    Route::post('/login/store', 'login_store')->name('customer.login.submit');
    Route::get('/customer/register', 'register')->name('customer.register');
    Route::post('/register/store', 'register_store')->name('customer.register.submit');
});


// Customer Auth Routes
Route::middleware('customer')->name('customer.')->prefix('customer')->group(function () {

    // Protected Routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/profile', 'profile')->name('profile');
    });
});