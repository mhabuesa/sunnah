    <?php

    use App\Http\Controllers\AdminAuthController;
    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\BannerController;
    use App\Http\Controllers\BrandController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\CouponController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\DeliveryController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\PosController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\SettingController;
    use App\Http\Controllers\SmsCampaignController;
    use App\Http\Controllers\SmsController;
    use App\Http\Controllers\SubcategoryController;
    use App\Http\Controllers\TodayDealController;
    use App\Http\Controllers\TodaysDealController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\VariationController;
    use Illuminate\Support\Facades\Route;

    Route::controller(AdminAuthController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
        Route::post('/logout', 'destroy')->name('logout');
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/fraudCheck', 'fraudCheck')->name('froudCheck');
        Route::get('/awajDigital', 'CheckBalance');
    });

    Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });

        // Category Routes
        Route::controller(CategoryController::class)->name('category.')->prefix('category')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
            Route::post('/update', 'updateAjax')->name('update');
        });

        // Subcategory Routes
        Route::controller(SubcategoryController::class)->name('subcategory.')->prefix('subcategory')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
            Route::post('/update', 'updateAjax')->name('update');
        });

        // Brand Routes
        Route::controller(BrandController::class)->name('brand.')->prefix('brand')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
            Route::post('/update', 'updateAjax')->name('update');
        });

        // Variation Routes
        Route::controller(VariationController::class)->name('attribute.')->prefix('attribute')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/update', 'updateAjax')->name('update');
            Route::post('/value/store', 'value_store')->name('value.store');
            Route::delete('/value/destroy/{id}', 'value_destroy')->name('value.destroy');
            Route::post('/value/update', 'valueUpdateAjax')->name('value.update');
        });

        // User Routes
        Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
        });


        // Pos Routes
        Route::controller(PosController::class)->name('pos.')->prefix('pos')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/addToCart', 'addToCart')->name('addToCart');
            Route::post('/deleteCart', 'deleteCart')->name('deleteCart');
            Route::get('/products', 'getProducts')->name('products');
            Route::post('/updateCart', 'updateCart')->name('updateCart');
            Route::post('/clearCart', 'clearCart')->name('clearCart');
            Route::post('/scanBarcode', 'scanBarcode')->name('scanBarcode');
            Route::post('/order/store', 'orderStore')->name('order.store');
            Route::post('/applyCoupon', 'applyCoupon')->name('applyCoupon');
        });

        //Customer Routes
        Route::controller(CustomerController::class)->name('customer.')->prefix('customer')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/search', 'search')->name('search');
            Route::post('/updateInfo', 'updateInfo')->name('updateInfo');
        });

        //Order Routes
        Route::controller(OrderController::class)->name('orders.')->prefix('orders')->group(function () {
            Route::get('/list/{type}', 'list')->name('list');
            Route::get('/getOrders', 'getOrders')->name('getOrders');
            Route::get('/details/{id}', 'details')->name('details');
            Route::get('/invoice/{id}', 'invoice')->name('invoice');
            Route::post('/fraudCheck', 'fraudCheck')->name('fraudCheck');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/printReceipt/{id}', 'printReceipt')->name('printReceipt');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/bulkPrint', 'bulkPrint')->name('bulkPrint');
        });

        //Settings Routes
        Route::controller(SettingController::class)->name('settings.')->prefix('settings')->group(function () {
            Route::get('/business', 'business')->name('business');
            Route::post('/business/update', 'business_update')->name('business.update');

            Route::get('/app/core', 'core_setting')->name('app.core');
            Route::post('/app/core/update', 'core_update')->name('app.core.update');

            Route::get('/app/invoice', 'invoice_setting')->name('app.invoice');
            Route::post('/app/invoice/update', 'invoice_update')->name('app.invoice.update');

            Route::get('/app/delivery', 'delivery_setting')->name('app.delivery');
            Route::post('/app/delivery/steadfast', 'steadfast')->name('app.delivery.steadfast');
            Route::post('/app/delivery/steadfast/status', 'steadfast_status')->name('app.delivery.steadfast.status');
            Route::post('/app/delivery/pathao', 'pathao')->name('app.delivery.pathao');
            Route::post('/app/delivery/pathao/status', 'pathao_status')->name('app.delivery.pathao.status');
            Route::post('/app/delivery/redx', 'redx')->name('app.delivery.redx');
            Route::post('/app/delivery/redx/status', 'redx_status')->name('app.delivery.redx.status');
            Route::get('/app/sms', 'sms')->name('app.sms');
            Route::post('/app/sms/update', 'sms_update')->name('app.sms.update');
            Route::post('/app/sms-config/update', 'sms_config_update')->name('app.sms.config.update');
            Route::get('/app/fraudCheck', 'fraudCheck')->name('app.fraudCheck');
            Route::post('/app/fraudCheck/update', 'fraudCheck_update')->name('app.fraudCheck.update');
            Route::post('/app/fraudCheck/status', 'fraudCheck_status')->name('app.fraudCheck.status');
        });

        //Delivery Routes
        Route::controller(DeliveryController::class)->name('deliver.')->prefix('deliver')->group(function () {
            Route::get('/details/{method}/{id}', 'details')->name('details');
            Route::post('/steadfast/submit', 'steadfast_submit')->name('steadfast.submit');
            Route::get('/pathao/cities', 'getCities')->name('pathao.cities');
            Route::get('/pathao/zones/{city_id}', 'getZones')->name('pathao.zones');
            Route::get('/pathao/areas/{zone_id}', 'getAreas')->name('pathao.areas');
            Route::post('/pathao/submit/{id}', 'pathao_submit')->name('pathao.submit');
            Route::get('/redx/areas', 'redx_areas')->name('redx.areas');
            Route::post('/redx/submit/{id}', 'redx_submit')->name('redx.submit');
        });

        //Coupon Routes
        Route::controller(CouponController::class)->name('coupon.')->prefix('coupon')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'status_update')->name('status.update');
            Route::post('/update', 'update')->name('update');
        });

        //Coupon Routes
        Route::controller(TodaysDealController::class)->name('todaysDeal.')->prefix('todaysDeal')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/searchProduct', 'searchProduct')->name('searchProduct');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/status/{id}', 'status_update')->name('status.update');
            Route::post('/update', 'update')->name('update');
        });

        //Sms Routes
        Route::controller(SmsCampaignController::class)->name('sms.')->prefix('sms')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/customer-count', 'getCustomerCount')->name('customerCount');
            Route::post('/send', 'send')->name('send');
        });

        //Banner Routes
        Route::controller(BannerController::class)->name('banner.')->prefix('banner')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::post('/status/update/{id}', 'status_update')->name('status.update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });



        // Extra Routes of resource controllers can be defined here
        // Product Routes
        Route::controller(ProductController::class)->name('product.')->prefix('product')->group(function () {
            Route::get('/get-subcategories/{id}', 'getSubcategories')->name('get-subcategories');
            Route::get('/get-attributeValue/{id}', 'getAttributeValue');
            Route::get('/deleteGalleryImage/{id}', 'deleteGalleryImage')->name('deleteGalleryImage');
            Route::get('/barCode/{id}', 'barCode')->name('barCode');
            Route::post('/generate-barcode', 'generateBarcode')->name('generate.barcode');
            Route::post('/print-barcode', 'printBarcode')->name('printBarcode');
            Route::get('/getList/ajax', 'getList')->name('getList.ajax');
            Route::get('/trash', 'trash')->name('trash');
            Route::delete('/destroy/permanently/{id}', 'destroy_permanently')->name('destroy.permanently');
            Route::delete('/restore/{id}', 'restore')->name('restore');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
            Route::post('/featured/{id}', 'updateFeatured')->name('featured.update');
        });

        // Profile Routes
        Route::controller(ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
            Route::post('/profile_password/{profile}', 'profile_password')->name('password');
        });


        // Resource Controller
        Route::resources([
            'profile' => ProfileController::class,
            'product' => ProductController::class,
        ]);
    });

    require __DIR__ . '/frontend.php';