    <?php

    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\BrandController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\SubcategoryController;
    use App\Http\Controllers\VariationController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

    Route::controller(HomeController::class)->group(function () {
            Route::get('/fraudCheck', 'fraudCheck')->name('froudCheck');
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

        // Product Routes
        Route::controller(ProductController::class)->name('product.')->prefix('product')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/get-subcategories/{id}', 'getSubcategories')->name('get-subcategories');
            Route::get('/get-attributeValue/{id}', 'getAttributeValue');
            // Route::post('/store', 'store')->name('store');
            Route::get('/deleteGalleryImage/{id}', 'deleteGalleryImage')->name('deleteGalleryImage');
            Route::get('/barCode/{id}', 'barCode')->name('barCode');
            Route::post('/generate-barcode','generateBarcode')->name('generate.barcode');
            Route::get('/getList/ajax', 'getList')->name('getList.ajax');
            Route::get('/trash', 'trash')->name('trash');
            Route::delete('/destroy/permanently/{id}', 'destroy_permanently')->name('destroy.permanently');
            Route::delete('/restore/{id}', 'restore')->name('restore');
            Route::post('/status/{id}', 'updateStatus')->name('status.update');
            Route::post('/featured/{id}', 'updateFeatured')->name('featured.update');
        });

        // Extra Routes of resource controllers can be defined here
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

    require __DIR__ . '/auth.php';