<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CharityController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InformationController;
use App\Http\Controllers\Frontend\LandingController;
use App\Http\Controllers\Frontend\OfferController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\SunnahShoppingController;
use Illuminate\Support\Facades\Route;

Route::get('/manifest.json', function () {
    return response(view('manifest'))
        ->header('Content-Type', 'application/manifest+json');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/newsletter/subscribe', 'newsletter_subscribe')->name('newsletter.subscribe');
});

Route::controller(OfferController::class)->group(function () {
    Route::get('/offers/{slug}', 'index')->name('offers');
});

Route::controller(SunnahShoppingController::class)->group(function () {
    Route::get('/sunnah/products', 'index')->name('sunnah.products');
    Route::get('/sunnah-shopping/filter-products', 'getProducts')->name('sunnah.filter.products');
});

Route::controller(CharityController::class)->group(function () {
    Route::get('/charity', 'index')->name('charity.index');
    Route::get('/charity/details/{slug}', 'charity_details')->name('charity.details');
    Route::post('/charity/store', 'charity_store')->name('charity.store');
    Route::get('/zakatCalculator', 'zakatCalculator')->name('zakatCalculator');
});



Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{slug}', 'product')->name('product');
    Route::get('/products', 'products')->name('products');
    Route::get('ajax-products', 'ajaxProducts')->name('ajax.products');
    Route::get('/category/{slug}', 'category_products')->name('category');
    Route::get('/subcategory/{slug}', 'subcategory_products')->name('subcategory');
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/brand/{slug}', 'brand_product')->name('brand');
    Route::get('/special/deal', 'specialDeal')->name('special.deal');
    Route::get('/supperDeals', 'supperDeals')->name('supper.deals');
    Route::get('/searchProduct', 'search_product')->name('search.product');
    Route::get('/searchProduct/ajax', 'search_product_ajax')->name('search.product.ajax');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/addToCart', 'add_to_cart')->name('addToCart');
    Route::post('/cart/add-ajax', 'addAjax')->name('cart.add.ajax');
    Route::post('/order/now-ajax', 'orderNowAjax')->name('order.now.ajax');
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

    Route::get('/about', 'footer_page')->defaults('slug', 'about-us')->name('about');
    Route::get('/contact', 'footer_page')->defaults('slug', 'contact-us')->name('contact');
    Route::get('/company-information', 'footer_page')->defaults('slug', 'company-information')->name('company.information');
    Route::get('/terms-and-conditions', 'footer_page')->defaults('slug', 'terms-&-conditions')->name('terms.and.conditions');
    Route::get('/privacy-policy', 'footer_page')->defaults('slug', 'privacy-policy')->name('privacy');

    Route::get('/support-center', 'footer_page')->defaults('slug', 'support-center')->name('support.center');
    Route::get('/how-to-order', 'footer_page')->defaults('slug', 'how-to-order')->name('how.to.order');
    Route::get('/payment', 'footer_page')->defaults('slug', 'payment')->name('payment');
    Route::get('/shipping', 'footer_page')->defaults('slug', 'shipping')->name('shipping');
    Route::get('/faq', 'footer_page')->defaults('slug', 'faq')->name('faq');
    Route::get('/happy-return', 'footer_page')->defaults('slug', 'happy-return')->name('happy.return');
    Route::get('/refund-policy', 'footer_page')->defaults('slug', 'refund-policy')->name('refund.policy');
    Route::get('/exchange', 'footer_page')->defaults('slug', 'exchange')->name('exchange');
    Route::get('/cancellation', 'footer_page')->defaults('slug', 'cancellation')->name('cancellation');
});

// Order Tracking Route
Route::controller(OrderTrackingController::class)->group(function () {
    Route::get('/order/tracking', 'tracking')->name('order.tracking');
});

//Blog Controller
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
    Route::get('/single/blog/{slug}', 'detail')->name('blog.detail');
    Route::get('/blog/category/{slug}', 'category_blogs')->name('blog.category');
    Route::get('/blog/search', 'search')->name('blog.search');
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