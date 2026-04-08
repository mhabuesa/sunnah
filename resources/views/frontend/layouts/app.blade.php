<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Kartify">
    <meta name="keywords" content="Kartify">
    <meta name="author" content="Kartify">
    <link rel="icon" href="{{asset('frontend')}}/assets/images/favicon/4.svg" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('frontend')}}/assets/images/favicon/4.svg">
    <meta name="title-color" content="#ff9900">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Kartify">
    <meta name="msapplication-TileImage" content="{{asset('frontend')}}/assets/images/favicon/4.svg">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>StyleTech Store</title>

    <!-- Google Font Link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/fonts/br-hendrix/stylesheet.css">

    <!-- Bootstrap Link -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/bootstrap.css">

    <!-- Iconsax Icon Link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/iconsax.css">

    <!-- Remix Icon Link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/remixicon.css">

    <!-- Swiper Link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/vendors/swiper.css">

    <!-- Style Link -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="demo-4">
    <!-- Page Loader Start -->
    {{-- <div class="preloader">
        <div class="progress-container">
            <div class="progress-bar preloader-progress-bar"></div>
        </div>
        <div class="text-container">
            <div class="loading-text initial">Loading</div>
            <div class="loading-text complete">
                <span>Welcome</span>
                <span>Kartify</span>
            </div>
        </div>
        <div class="percentage">0</div>
    </div> --}}
    <!-- Page Loader End -->

    <!-- Header Start -->
    @include('frontend.layouts.partials.header')
    <!-- Header End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu d-sm-none">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="ri-home-2-line"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas">
                    <i class="ri-menu-line"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#cartOffcanvas" class="search-box">
                    <i class="ri-shopping-cart-line"></i>
                    <span>Cart</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#wishlistOffcanvas" class="notifi-wishlist">
                    <i class="ri-heart-3-line"></i>
                    <span>Wishlist</span>
                </a>
            </li>

            <li>
                <a href="user-dashboard.html">
                    <i class="ri-user-3-line"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Mobile Menu End -->

    <!-- Home Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-xl-block d-none">
                    <a href="shop-left-sidebar.html" class="banner-box h-100">
                        <img src="{{asset('frontend')}}/assets/images/banner/43.jpg" class="img-fluid" loading="lazy" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-md-8">
                    <a href="shop-left-sidebar.html" class="banner-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/44.jpg" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xl-3 col-md-4 d-md-block d-none">
                    <div class="row h-100">
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box h-100">
                                <img src="{{asset('frontend')}}/assets/images/banner/45.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box h-100 mt-3">
                                <img src="{{asset('frontend')}}/assets/images/banner/46.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Customer Support Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-xl-block d-none">
                    <a href="shop-left-sidebar.html" class="banner-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/47.jpg" class="img-fluid" alt="">
                    </a>
                </div>

                <div class="col-xl-9">
                    <div class="service-section-3">
                        <div class="row g-sm-4 g-3">
                            <div class="col-lg-3 col-sm-6">
                                <div class="service-box">
                                    <div>
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/service-3.svg#support"></use>
                                        </svg>
                                        <div class="service-content">
                                            <h4>Customer Support</h4>
                                            <h5>Need Assistance?</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="service-box">
                                    <div>
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/service-3.svg#payment"></use>
                                        </svg>
                                        <div class="service-content">
                                            <h4>Secure Payment</h4>
                                            <h5>Safe 7 Fast</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="service-box">
                                    <div>
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/service-3.svg#return"></use>
                                        </svg>
                                        <div class="service-content">
                                            <h4>Free Returns</h4>
                                            <h5>Easy & free</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="service-box">
                                    <div>
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/service-3.svg#order"></use>
                                        </svg>
                                        <div class="service-content">
                                            <h4>Free delivery all order</h4>
                                            <h5>Easy & free</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Customer Support Section End -->

    <!-- Category Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title slider-button">
                <h3>Browse by categories</h3>
                <div class="title-slider-button">
                    <div class="category-three-prev swiper-btn-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                    <div class="category-three-next swiper-btn-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>

            <div class="swiper category-slider-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/55.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Wireless headphone</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/56.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Mobile & Accessories</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/57.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Drone remote control</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/58.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>TV & Monitor</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/59.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Smart Watch</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/60.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Woman & Accessories</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-box-4">
                            <img src="{{asset('frontend')}}/assets/images/category/55.png" class="img-fluid" alt="">
                            <div class="category-content">
                                <h4>Wireless headphone</h4>
                                <h5>10 Products</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Product Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title slider-button">
                <div class="title-flex">
                    <h3>Today Deal</h3>
                    <a href="shop-left-sidebar.html" class="light-blue">See all deals</a>
                </div>
                <div class="title-slider-button">
                    <button class="product-five-slider-prev swiper-btn-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <button class="product-five-slider-next swiper-btn-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 d-xl-block d-none">
                    <a href="shop-left-sidebar.html" class="banner-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/48.jpg" class="img-fluid" alt="">
                    </a>
                </div>

                <div class="col-xl-9">
                    <div class="swiper product-five-slider product-option-box">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/96.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Cleansers Beauty Product</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/97.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Fresh Apricot Scrub</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$210.00 <del>$289.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/98.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Apple Product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Apple iPhone 13 (128GB)</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1820.00 <del>$2399.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/99.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Cleansers Beauty Product</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$192.00 <del>$250.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/100.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Kundan Studded Necklace</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1998.00 <del>$2100.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/101.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Grocery</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Vedaka Raw Peanuts</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$170.00 <del>$210.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/102.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Office Wear Perfume</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$123.00 <del>$150.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/103.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Electronic</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Wireless Black Headphone</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/104.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Sisak Product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Pluto SW250 Smart Watch</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$400.00 <del>$450.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/105.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Handmade</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Handmade table</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1100.00 <del>$1308.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/96.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Cleansers Beauty Product</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-box-4-main">
                                    <div class="select-option-box">
                                        <div class="select-box">
                                            <div>
                                                <div class="color-box">
                                                    <h4 class="h5">Colors</h4>
                                                    <ul class="color-list">
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#!"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="size-box">
                                                    <h4 class="h5">Sizes</h4>
                                                    <ul class="size-list">
                                                        <li>
                                                            <a href="#!">xs</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <button class="btn add-cart-btn">add to cart</button>
                                                <button class="close-btn btn" onclick="closeSidebar()">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productMain product-box-4 rounded-0">
                                        <div class="product-image">
                                            <a href="product-color.html">
                                                <img src="{{asset('frontend')}}/assets/images/product/97.png" class="img-fluid productImage" alt="">
                                            </a>
                                            <div class="quick-view-button-box">
                                                <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">Marth product</h5>
                                            <a href="product-color.html" class="name">
                                                <h5>Fresh Apricot Scrub</h5>
                                            </a>
                                            <ul class="rating">
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                            </ul>
                                            <h5 class="price">$210.00 <del>$289.00</del></h5>
                                            <div class="option-box">
                                                <button class="btn select-btn">Select Options</button>
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="#!" class="wishlistProduct">
                                                            <i class="ri-heart-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">
                                                            <i class="ri-repeat-2-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Deal Of The Day Product & Banner Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-xl-block d-none ratio_120">
                    <div class="banner-box-25">
                        <img src="{{asset('frontend')}}/assets/images/banner/51.jpg" class="bg-img" alt="">
                        <div class="banner-content">
                            <div>
                                <h4>Best Seller's Products</h4>
                                <ul class="banner-product-list">
                                    <li>
                                        <a href="shop-left-sidebar.html">Men's Fashion</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Woman's Fashion</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Watches</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Tools & Equipment</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Home, Furniture & Office</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Fruit & Vegetables</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Mobile & Computer</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Beauty, health & Grocery</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Book</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">See All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="deal-day-box">
                        <div class="title slider-button">
                            <h3>Deal hot today</h3>
                        </div>

                        <div class="row g-sm-4 g-3">
                            <div class="col-xxl-5 position-relative">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="swiper deal-main-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-1.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-2.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-3.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="swiper deal-thumbnail-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-1.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-2.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="thumbnail-image-box">
                                                        <img src="{{asset('frontend')}}/assets/images/product/35-3.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7">
                                <div class="product-content-box mt-0">
                                    <div>
                                        <div class="product-content">
                                            <h4 class="h6">Clothing</h4>
                                            <h5>
                                                <a href="product-color.html">Herschel Leather duffle bag in
                                                    brown color</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li>
                                                        <i class="ri-star-fill fill"></i>
                                                    </li>
                                                    <li>
                                                        <i class="ri-star-fill fill"></i>
                                                    </li>
                                                    <li>
                                                        <i class="ri-star-fill fill"></i>
                                                    </li>
                                                    <li>
                                                        <i class="ri-star-fill fill"></i>
                                                    </li>
                                                    <li>
                                                        <i class="ri-star-fill"></i>
                                                    </li>
                                                </ul>
                                                <h6>Status : <span>In Stock</span></h6>
                                            </div>
                                            <h4 class="price">$670.00 <del>$900.00</del></h4>
                                        </div>

                                        <div class="product-timer">
                                            <ul class="clockdiv-2 product-timer">
                                                <li class="time-list">
                                                    <div>
                                                        <div class="counter">
                                                            <div class="days"></div>
                                                        </div>
                                                        <span class="smalltext">Day</span>
                                                    </div>
                                                </li>
                                                <li class="dots">:</li>
                                                <li class="time-list">
                                                    <div>
                                                        <div class="counter">
                                                            <div class="hours"></div>
                                                        </div>
                                                        <span class="smalltext">Hour</span>
                                                    </div>
                                                </li>
                                                <li class="dots">:</li>
                                                <li class="time-list">
                                                    <div>
                                                        <div class="counter">
                                                            <div class="minutes"></div>
                                                        </div>
                                                        <span class="smalltext">Minute</span>
                                                    </div>
                                                </li>
                                                <li class="dots">:</li>
                                                <li class="time-list">
                                                    <div>
                                                        <div class="counter">
                                                            <div class="seconds"></div>
                                                        </div>
                                                        <span class="smalltext">Second</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="progress-box">
                                            <div class="progress">
                                                <div class="progress-bar">
                                                </div>
                                            </div>
                                            <h5 class="h6"> 14/56 <span>Sold</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 d-xl-block d-none">
                    <div class="row h-100">
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box h-100">
                                <img src="{{asset('frontend')}}/assets/images/banner/49.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="shop-left-sidebar.html" class="banner-box h-100">
                                <img src="{{asset('frontend')}}/assets/images/banner/50.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Of The Day Product & Banner Section End -->

    <!-- Fashion Product Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title justify-content-between d-sm-flex d-block">
                <h3 class="d-flex align-center">Fashion Products<a href="shop-left-sidebar.html" class="ms-2 light-blue">See all Products</a>
                </h3>
                <ul class="nav nav-pills theme-nav-color title-nav-pills mt-sm-0 mt-3" id="pills-tab">
                    <li class="nav-item">
                        <button class="nav-link active" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button">New Arrival</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pills-selling-tab" data-bs-toggle="pill" data-bs-target="#pills-selling" type="button">Best Selling</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pills-top-tab" data-bs-toggle="pill" data-bs-target="#pills-top" type="button">Top Rated</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-new">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/106.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 13 (128GB)</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1920.00 <del>$2100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/107.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Rainbow Umbral</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Cyanic Pop Burst Long</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$120.00 <del>$135.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/108.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Smart HD TV</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple Smart HD TV</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1130.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/109.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men Lace Up Shoes</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/110.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 14 Plus</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1450.00 <del>$1500.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/111.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men brown casual belt</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/112.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Electronic Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>miniprojector</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1366.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/113.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">American Tourister</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>travel luggage bag</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/114.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>hand truck</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/105.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Handmade Table</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/115.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Metal Shell Connectors</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Retro movie film cinema</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1400.00 <del>$1786.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/116.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Beauty Essential</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>make-up Kit</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$125.00 <del>$354.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/117.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Woman Fashion</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Brown Casual Wallet</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$789.00 <del>$987.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/118.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Essentra Home</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>White Kitchen Utensil</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$456.00 <del>$789.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-selling">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/106.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 13 (128GB)</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1920.00 <del>$2100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/107.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Rainbow Umbral</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Cyanic Pop Burst Long</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$120.00 <del>$135.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/108.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Smart HD TV</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple Smart HD TV</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1130.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/109.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men Lace Up Shoes</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/110.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 14 Plus</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1450.00 <del>$1500.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/111.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men brown casual belt</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/112.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Electronic Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>miniprojector</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1366.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/113.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">American Tourister</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>travel luggage bag</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/114.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>hand truck</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/105.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Handmade Table</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/115.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Metal Shell Connectors</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Retro movie film cinema</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1400.00 <del>$1786.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/116.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Beauty Essential</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>make-up Kit</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$125.00 <del>$354.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/117.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Woman Fashion</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Brown Casual Wallet</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$789.00 <del>$987.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/118.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Essentra Home</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>White Kitchen Utensil</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$456.00 <del>$789.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-top">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/106.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 13 (128GB)</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1920.00 <del>$2100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/107.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Rainbow Umbral</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Cyanic Pop Burst Long</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$120.00 <del>$135.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/108.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Smart HD TV</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple Smart HD TV</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1130.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/109.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men Lace Up Shoes</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1020.00 <del>$1100.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/110.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Apple Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Apple iPhone 14 Plus</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1450.00 <del>$1500.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/111.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Man Accessories</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Men brown casual belt</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1300.00 <del>$1402.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/112.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Electronic Product</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>miniprojector</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1366.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/113.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">American Tourister</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>travel luggage bag</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1009.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/114.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>hand truck</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/105.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Home Furniture</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Handmade Table</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/115.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Metal Shell Connectors</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Retro movie film cinema</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$1400.00 <del>$1786.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/116.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Beauty Essential</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>make-up Kit</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$125.00 <del>$354.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/117.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Woman Fashion</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>Brown Casual Wallet</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$789.00 <del>$987.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                            <div class="product-box-4-main">
                                <div class="select-option-box">
                                    <div class="select-box">
                                        <div>
                                            <div class="color-box">
                                                <h4 class="h5">Colors</h4>
                                                <ul class="color-list">
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="size-box">
                                                <h4 class="h5">Sizes</h4>
                                                <ul class="size-list">
                                                    <li>
                                                        <a href="#!">xs</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">s</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">m</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">l</a>
                                                    </li>
                                                    <li>
                                                        <a href="#!">xl</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <button class="btn add-cart-btn">add to cart</button>
                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="productMain product-box-4 rounded-0">
                                    <div class="product-image">
                                        <a href="product-color.html">
                                            <img src="{{asset('frontend')}}/assets/images/product/118.png" class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick View</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="sub-name productName">Essentra Home</h5>
                                        <a href="product-color.html" class="name">
                                            <h5>White Kitchen Utensil</h5>
                                        </a>
                                        <ul class="rating">
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                        </ul>
                                        <h5 class="price">$456.00 <del>$789.00</del></h5>
                                        <div class="option-box">
                                            <button class="btn select-btn">Select Options</button>
                                            <ul class="option-list">
                                                <li>
                                                    <a href="#!" class="wishlistProduct">
                                                        <i class="ri-heart-3-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="ri-repeat-2-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fashion Product Section End -->

    <!-- Banner Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <a href="shop-banner.html" class="banner-box">
                <img src="{{asset('frontend')}}/assets/images/banner/52.jpg" class="img-fluid" alt="">
            </a>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Recommendations Product Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-8-1 col-xl-8">
                    <div class="title justify-content-between d-sm-flex d-block">
                        <h3>Recommendations</h3>
                        <ul class="nav nav-pills theme-nav-color title-nav-pills mt-sm-0 mt-3" id="pills-tab1">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-top-tabe" data-bs-toggle="pill" data-bs-target="#pills-top1" type="button">Top 20</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-rate-tabe" data-bs-toggle="pill" data-bs-target="#pills-rate" type="button">Best Rated</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-choice-tabe" data-bs-toggle="pill" data-bs-target="#pills-choice" type="button">Editor's
                                    Choices</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent1">
                        <div class="tab-pane fade show active" id="pills-top1">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 14 (128 GB) - Purple</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.04s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/23.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.08s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/24.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">refurb macbook air space gray m1 202009
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.12s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/25.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 14 - 128 GB Silver Model
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.16s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/26.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">EvoFox Game Box 32 GB with Asphalt 8
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.20s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/27.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Motorola Moto X4 32GB Unlocked
                                                                Smartphone</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.24s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 13 Mini (512GB) -
                                                                Starlight</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.28s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/29.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Fujifilm Instax Mini 9 Instant Camera
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.32s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/30.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Canon EOS 1500D DSLR Camera Body+ 18-55
                                                                mm</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-rate">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 14 (128 GB) - Purple</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.04s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/23.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.08s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/24.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">refurb macbook air space gray m1 202009
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.12s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/25.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Apple iPhone 14 - 128 GB Silver Model
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.16s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/26.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">EvoFox Game Box 32 GB with Asphalt 8
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.20s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/27.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Motorola Moto X4 32GB Unlocked
                                                                Smartphone</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.24s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Apple iPhone 13 Mini (512GB) -
                                                                Starlight</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.28s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/29.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Fujifilm Instax Mini 9 Instant Camera
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.32s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/30.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Canon EOS 1500D DSLR Camera Body+ 18-55
                                                                mm</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-choice">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 14 (128 GB) - Purple</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.04s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/23.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.08s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/24.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">refurb macbook air space gray m1 202009
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.12s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/25.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 14 - 128 GB Silver Model
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.16s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/26.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">EvoFox Game Box 32 GB with Asphalt 8
                                                            </h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.20s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/27.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h5 class="name">Motorola Moto X4 32GB Unlocked
                                                                Smartphone</h5>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li class="wow fadeInUp" data-wow-delay="0.24s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Apple iPhone 13 Mini (512GB) -
                                                                Starlight</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.28s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/29.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Fujifilm Instax Mini 9 Instant Camera
                                                            </h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="0.32s">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.html" class="product-image">
                                                        <img src="{{asset('frontend')}}/assets/images/product/30.png" class="img-fluid" alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.html">
                                                            <h4 class="name">Canon EOS 1500D DSLR Camera Body+ 18-55
                                                                mm</h4>
                                                        </a>
                                                        <ul class="rating">
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3-1 col-xl-4 d-xl-block d-none">
                    <div class="row g-4 h-100">
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box b-left">
                                <img src="{{asset('frontend')}}/assets/images/banner/53.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box">
                                <img src="{{asset('frontend')}}/assets/images/banner/54.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommendations Product Section End -->

    <!-- Hot Tag Section Start -->
    <section class="section-t-space d-md-block d-none">
        <div class="custom-container">
            <div class="title title-timer justify-content-between">
                <h3>Hot Tag:</h3>
            </div>
            <ul class="hot-tag-list">
                <li class="wow fadeIn">
                    <a href="shop-left-sidebar.html">Nokia</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.02s">
                    <a href="shop-left-sidebar.html">Acer</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.04s">
                    <a href="shop-left-sidebar.html">Samsung Tablet</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.06s">
                    <a href="shop-left-sidebar.html">Apple iPhone</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.08s">
                    <a href="shop-left-sidebar.html">HTC</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.1s">
                    <a href="shop-left-sidebar.html">Macbook</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.12s">
                    <a href="shop-left-sidebar.html">Sony TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.14s">
                    <a href="shop-left-sidebar.html">Lenovo</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.16s">
                    <a href="shop-left-sidebar.html">iPhone 12 Pro</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.18s">
                    <a href="shop-left-sidebar.html">Dell</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.20s">
                    <a href="shop-left-sidebar.html">Samsung LED TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.22s">
                    <a href="shop-left-sidebar.html">Accessories</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.24s">
                    <a href="shop-left-sidebar.html">Desktops</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.26s">
                    <a href="shop-left-sidebar.html">Acer</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.28s">
                    <a href="shop-left-sidebar.html">LG LCD TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.30s">
                    <a href="shop-left-sidebar.html">Sharp LCD TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.32s">
                    <a href="shop-left-sidebar.html">Panasonic TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.34s">
                    <a href="shop-left-sidebar.html">Electrolux</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.36s">
                    <a href="shop-left-sidebar.html">Toshiba</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.38s">
                    <a href="shop-left-sidebar.html">Toshiba TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.40s">
                    <a href="shop-left-sidebar.html">PC Gaming</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.42s">
                    <a href="shop-left-sidebar.html">LG LCD TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.44s">
                    <a href="shop-left-sidebar.html">LED TV</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.46s">
                    <a href="shop-left-sidebar.html">Windows Tablets</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.48s">
                    <a href="shop-left-sidebar.html">Mini Refrigerators</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.5s">
                    <a href="shop-left-sidebar.html">Macbook</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.52s">
                    <a href="shop-left-sidebar.html">Sony</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.54s">
                    <a href="shop-left-sidebar.html">Windows Tablets</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.56s">
                    <a href="shop-left-sidebar.html">Apple Accessories</a>
                </li>
                <li class="wow fadeIn" data-wow-delay="0.58s">
                    <a href="shop-left-sidebar.html">Blackberry</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- Hot Tag Section End -->

    <!-- Offer Section Start -->
    <section class="section-t-space offer-section">
        <div class="custom-container">
            <div class="title title title-timer justify-content-between">
                <h3>Don't Miss This Offers</h3>
                <a href="shop-left-sidebar.html">See all deals<i class="ri-arrow-right-s-line"></i></a>
            </div>
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/55.jpg" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/56.jpg" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/57.jpg" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{asset('frontend')}}/assets/images/banner/58.jpg" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section End -->

    <!-- Recent Viewed Products Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title slider-button">
                <h3>Recent Viewed Products</h3>
                <div class="title-slider-button">
                    <div class="recent-product-prev swiper-btn-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                    <div class="recent-product-next swiper-btn-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>

            <div class="recent-product-section">
                <div class="swiper recent-product-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/119.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/120.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/121.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/122.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/123.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/124.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/125.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/126.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/127.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/128.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{asset('frontend')}}/assets/images/product/119.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Viewed Products Section End -->

    <!-- News-letter Section Start -->
    <section class="section-block-space newsletter-section-3">
        <div class="custom-container">
            <div class="newsletter-box">
                <div class="row g-3">
                    <div class="col-xl-6">
                        <div class="newsletter-content">
                            <svg>
                                <use xlink:href="{{asset('frontend')}}/assets/images/newsletter/newsletter-icon.svg#newsletter"></use>
                            </svg>
                            <div>
                                <h3>Subscribe to our newsletter</h3>
                                <h4 class="h5">Get all the latest information on Events, sales and Offers</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Your E-mail Address">
                                <button class="input-group-text theme-bg-color3 btn newsletter-form-button">Subscribe
                                    Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News-letter Section End -->

    <!-- Footer Section Start -->
    <footer class="footer-section">
        <div class="custom-container">
            <div class="main-footer">
                <div class="row g-sm-4 g-3">
                    <div class="col-xl-3 col-md-4 col-sm-7">
                        <div class="footer-title-2">
                            <h4>Contact Info</h4>
                        </div>
                        <ul class="footer-content-list">
                            <li>
                                <a href="tel:(603)555-0123" class="content-box">
                                    <svg class="svg-theme-color">
                                        <use xlink:href="{{asset('frontend')}}/assets/svg/footer-icon.svg#contact"></use>
                                    </svg>
                                    <h4 class="theme-color3">(603) 555-0123</h4>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="content-box">
                                    <div class="footer-content-icon">
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/footer-icon.svg#location"></use>
                                        </svg>
                                    </div>
                                    <h5>3228 Bicetown Road Huntington, NY 11743</h5>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:pixelstrap@contact.com" class="content-box">
                                    <div class="footer-content-icon">
                                        <svg>
                                            <use xlink:href="{{asset('frontend')}}/assets/svg/footer-icon.svg#mail"></use>
                                        </svg>
                                    </div>
                                    <h5>kartify@contact.com</h5>
                                </a>
                            </li>
                        </ul>
                        <div class="social-icon-box">
                            <h5 class="content-color">Stay Connected :</h5>
                            <ul class="social-icon-list">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-x-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.ca/" target="_blank">
                                        <i class="ri-pinterest-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>Information</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Collection</a>
                            </li>
                            <li>
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li>
                                <a href="blog-3-grid.html">Blogs</a>
                            </li>
                            <li>
                                <a href="shop-banner.html">Offer</a>
                            </li>
                            <li>
                                <a href="search.html">Search</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ's</a>
                            </li>
                            <li>
                                <a href="contact-us.html">Contact us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>Our Services</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="shop-left-sidebar.html">Mobile Phones</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Television</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Washing Machine</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Women Fashion</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Laptop</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>My Account</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="user-dashboard.html">My Account</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">My Shop</a>
                            </li>
                            <li>
                                <a href="cart.html">My Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="wishlist.html">My Wishlist</a>
                            </li>
                            <li>
                                <a href="order-tracking.html">Tracking Order</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-4">
                        <div class="footer-title-2">
                            <h4>Get Shopping App</h4>
                        </div>
                        <ul class="footer-list-2">
                            <li>
                                <p>Quick & Direct ordering</p>
                            </li>
                            <li>
                                <p>Shop smarter, save time & Simply</p>
                            </li>
                            <li>
                                <p>Save more on app</p>
                            </li>
                        </ul>
                        <ul class="app-store-link">
                            <li>
                                <a href="https://play.google.com/store/apps" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/google-play.svg" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.apple.com/in/app-store/" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/app-store.svg" class="img-fluid" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sub-footer">
                <a href="index.html" class="sub-footer-logo">
                    <img src="{{asset('frontend')}}/assets/images/logo/4.svg" class="img-fluid" alt="">
                </a>
                <ul class="payment-list">
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/1.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/2.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/3.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/4.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/5.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/6.svg" class="img-fluid" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/assets/images/payment/7.svg" class="img-fluid" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Cart Offcanvas Start -->
    <div class="offcanvas offcanvas-end cart-offcanvas" id="cartOffcanvas">
        <div class="offcanvas-header">
            <div class="title-offcanvas">
                <h4>Shopping Cart</h4>
                <button class="btn close-btn" data-bs-dismiss="offcanvas">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="cart-product-box">
                <ul class="product-box-list">
                    <li class="vertical-product-box">
                        <a href="product-color.html" class="product-image">
                            <img src="{{asset('frontend')}}/assets/images/product/1.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <a href="product-color.html">
                                <h5 class="name title-color">Smart Watch Series X3</h5>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                            </ul>
                            <h5 class="price">$202.34 <del>$250.00</del></h5>
                            <div class="quantity-box qty-container">
                                <button class="btn qty-btn-minus">
                                    <i class=" ri-subtract-line"></i>
                                </button>
                                <button class="btn btn-trash">
                                    <i class=" ri-delete-bin-line"></i>
                                </button>
                                <input type="number" name="qty" disabled="" class="quantity form-control input-qty" value="1">
                                <button class="btn qty-btn-plus">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn close-button">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </li>

                    <li class="vertical-product-box">
                        <a href="product-color.html" class="product-image">
                            <img src="{{asset('frontend')}}/assets/images/product/2.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <a href="product-color.html">
                                <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                            </ul>
                            <h5 class="price">$700.00 <del>$720.00</del></h5>
                            <div class="quantity-box qty-container">
                                <button class="btn qty-btn-minus">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <button class="btn btn-trash">
                                    <i class=" ri-delete-bin-line"></i>
                                </button>
                                <input type="number" name="qty" disabled="" class="quantity form-control input-qty" value="1">
                                <button class="btn qty-btn-plus">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn close-button">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </li>

                    <li class="vertical-product-box">
                        <a href="product-color.html" class="product-image">
                            <img src="{{asset('frontend')}}/assets/images/product/3.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <a href="product-color.html">
                                <h5 class="name title-color">Portable Laptop Table</h5>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                            </ul>
                            <h5 class="price">$398.00 <del>$450.00</del></h5>
                            <div class="quantity-box qty-container">
                                <button class="btn qty-btn-minus">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <button class="btn btn-trash">
                                    <i class=" ri-delete-bin-line"></i>
                                </button>
                                <input type="number" name="qty" disabled="" class="quantity form-control input-qty" value="1">
                                <button class="btn qty-btn-plus">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn close-button">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </li>

                    <li class="vertical-product-box">
                        <a href="product-color.html" class="product-image">
                            <img src="{{asset('frontend')}}/assets/images/product/5.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <a href="product-color.html">
                                <h5 class="name title-color">Kitchen Accessories</h5>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                            </ul>
                            <h5 class="price">$300.00 <del>$312.56</del></h5>
                            <div class="quantity-box qty-container">
                                <button class="btn qty-btn-minus">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <button class="btn btn-trash">
                                    <i class=" ri-delete-bin-line"></i>
                                </button>
                                <input type="number" name="qty" disabled="" class="quantity form-control input-qty" value="1">
                                <button class="btn qty-btn-plus">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn close-button">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </li>

                    <li class="vertical-product-box">
                        <a href="product-color.html" class="product-image">
                            <img src="{{asset('frontend')}}/assets/images/product/6.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <a href="product-color.html">
                                <h5 class="name title-color">Rockerz Bluetooth Headphone</h5>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill fill"></i>
                                </li>
                            </ul>
                            <h5 class="price">$100.00 <del>$180.00</del></h5>
                            <div class="quantity-box qty-container">
                                <button class="btn qty-btn-minus">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <button class="btn btn-trash">
                                    <i class=" ri-delete-bin-line"></i>
                                </button>
                                <input type="number" name="qty" disabled="" class="quantity form-control input-qty" value="1">
                                <button class="btn qty-btn-plus">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn close-button">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </li>
                    <li class="empty-cart">
                        <svg>
                            <use xlink:href="{{asset('frontend')}}/assets/images/inner-page/empty-cart.svg#emptyCart"></use>
                        </svg>
                        <h4>Your cart is empty.</h4>
                    </li>
                </ul>

                <div class="total-price-box">
                    <p class="free">Almost there, add $32.50 more to get <b>FREE SHIPPING!</b></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%">
                            <i class="iconsax" data-icon-name="truck"></i>
                        </div>
                    </div>
                    <h4 class="sub-total">Subtotal <span id="total-price">$1700.00 USD</span></h4>
                    <p class="tax-text">Tax included <span>shipping</span>calculator at checkout.</p>
                    <div class="cart-btn-group">
                        <a href="checkout.html" class="btn check-out-button">Check Out</a>
                        <a href="cart.html" class="btn cart-button">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Offcanvas End -->

    <!-- Wishlist Offcanvas Start -->
    <div class="offcanvas offcanvas-end wishlist-offcanvas cart-offcanvas" id="wishlistOffcanvas">
        <div class="offcanvas-header">
            <div class="title-offcanvas">
                <h4>Wishlist</h4>
                <button class="btn close-btn" data-bs-dismiss="offcanvas">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="cart-product-box">
                <ul class="product-box-list">
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/1.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Smart Watch Series X3</h5>
                                </a>
                                <h5 class="price">$239.00 <del>$250.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/2.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                </a>
                                <h5 class="price">$700.00 <del>$720.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/3.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Portable Laptop Table</h5>
                                </a>
                                <h5 class="price">$199.00 <del>$200.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/4.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Kitchen Accessories</h5>
                                </a>
                                <h5 class="price">$300.00 <del>$312.56</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/5.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Rockerz 558 Bluetooth</h5>
                                </a>
                                <h5 class="price">$86.00 <del>$96.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/26.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">EvoFox Game Box 32 GB with Asphalt 8</h5>
                                </a>
                                <h5 class="price">$130.00 <del>$153.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{asset('frontend')}}/assets/images/product/23.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">BlackBerry Keyone BBB100-7 64gb unlocked gSM</h5>
                                </a>
                                <h5 class="price">$1920.36 <del>$2000.95</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas" data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                </ul>

                <div class="total-price-box">
                    <p class="tax-text">Now that you have products in your wishlist, remember to put them in your cart
                        later.</p>
                    <div class="cart-btn-group">
                        <button onclick="location.href = 'wishlist.html';" class="btn check-out-button">View
                            Wishlist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Offcanvas End -->

    <!-- Cookie Box Start -->
    <div class="cookie-bar-box1 cookie">
        <div class="cookie-bar-box">
            <h4>🍪 Cookie Notice</h4>
            <p>We use cookies to learn how you interact with our content, and show you relevant content and ads based on
                your browsing history. You can adjust your settings below. Here's our policy.</p>
            <div class="cookie-buttons">
                <span>Manage your preferences</span>
                <button class="btn allow-btn">Accept</button>
            </div>
        </div>
    </div>
    <!-- Cookie Box End -->

    <!-- Authentication Modal Start -->
    <div class="modal authentication-modal fade" id="authenticationModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-fill"></i>
                    </button>
                    <div class="authentication-box login-box">
                        <div class="auth-title">
                            <h4>Log in</h4>
                            <p>Welcome! To access your account, please enter your username and password.</p>
                        </div>
                        <form class="auth-form">
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="forgot-box">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember for 30
                                        days</label>
                                </div>
                                <a href="#!" class="forgot-pass">Forgot Password</a>
                            </div>
                            <a href="index.html" class="btn btn-bg-theme mt-3 w-100">Log In</a>
                            <div class="divider">
                                <span>OR</span>
                            </div>
                            <div class="social-link">
                                <a href="https://www.google.com/" class="btn w-100" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/inner-page/google.png" class="img-fluid" alt="">
                                    <span>Sign in with google</span>
                                </a>
                                <a href="https://www.facebook.com/" class="btn w-100" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/inner-page/facebook.png" class="img-fluid" alt="">
                                    <span>Sign in with facebook</span>
                                </a>
                            </div>
                            <h5 class="sign-up-next">Don't have an account? <button class="next-button btn">Sign up
                                    now</button></h5>
                        </form>
                    </div>

                    <div class="authentication-box signup-box">
                        <div class="auth-title">
                            <h4>Sign Up</h4>
                            <p>Welcome! To access your account, please enter your username and password.</p>
                        </div>
                        <form class="auth-form">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter full name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Create your password">
                            </div>
                            <div class="forgot-box">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">I agree with all text in the
                                        agreement.</label>
                                </div>
                            </div>
                            <a href="index.html" class="btn btn-bg-theme mt-3 w-100">Sing up</a>
                            <div class="divider">
                                <span>OR</span>
                            </div>
                            <div class="social-link">
                                <a href="https://www.google.com/" class="btn w-100" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/inner-page/google.png" class="img-fluid" alt="">
                                    <span>Sign up with google</span>
                                </a>
                                <a href="https://www.facebook.com/" class="btn w-100" target="_blank">
                                    <img src="{{asset('frontend')}}/assets/images/inner-page/facebook.png" class="img-fluid" alt="">
                                    <span>Sign up with facebook</span>
                                </a>
                            </div>
                            <h5 class="sign-up-next">I am already member. <button class="btn next-button2">Sign
                                    in</button>
                            </h5>
                        </form>
                    </div>

                    <div class="authentication-box forgot-password-box">
                        <div class="auth-title">
                            <h4>Reset Password</h4>
                            <p>Have you forgotten your password? Kindly provide your email address. An email with a link
                                to establish a new password will be sent to you.</p>
                        </div>
                        <form class="auth-form">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address">
                            <div class="d-flex flex-wrap-nowrap mt-3 gap-3">
                                <button class="btn btn-bg-theme w-100">Submit</button>
                                <a href="#!" class="btn btn-bg-theme w-100 cancel-btn">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Authentication Modal End -->

    <!-- Tap To Top Button Start -->
    <div class="tap-top-button">
        <button class="btn">
            <i class="iconsax" data-icon-name="arrow-up"></i>
        </button>
    </div>
    <!-- Tap To Top Button End -->

    <!-- Recent Product View Box Start -->
    <div class="recently-product-box">
        <button class="btn recent-close">
            <i class="iconsax" data-icon-name="add"></i>
        </button>
        <a href="product-color.html">
            <img src="{{asset('frontend')}}/assets/images/product/1.png" class="img-fluid" alt="Product Image">
        </a>
        <div class="recent-content">
            <a href="product-color.html">Smart Watch Series X3</a>
            <h5 class="price">$239.00 <del>$250.00</del></h5>
            <h6 class="timer">1 minutes ago</h6>
        </div>
    </div>
    <!-- Recent Product View Box End -->

    <!-- Quick View Modal Start -->
    <div class="modal fade quick-view-modal theme-modal" id="quickViewModal">
        <div class="modal-dialog modal-custom-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="row g-sm-4 g-3">
                        <div class="col-md-6">
                            <div class="left-box-contain">
                                <div class="swiper quick-main-slider quick-slider-product-box">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="{{asset('frontend')}}/assets/images/product/15.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="{{asset('frontend')}}/assets/images/product/25.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="{{asset('frontend')}}/assets/images/product/98.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next">
                                        <i class="ri-arrow-right-s-line"></i>
                                    </div>
                                    <div class="swiper-button-prev">
                                        <i class="ri-arrow-left-s-line"></i>
                                    </div>
                                </div>

                                <div class="swiper quick-thumbnail-product-box quick-thumbnail-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="{{asset('frontend')}}/assets/images/product/15.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="{{asset('frontend')}}/assets/images/product/25.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="{{asset('frontend')}}/assets/images/product/98.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-right-box">
                                <div class="right-box-contain">
                                    <a href="seller-details-2.html" class="offer-top">Visit SmartBuy Store</a>
                                    <h2 class="name">Next-level performance with stunning design & cutting-edge features
                                    </h2>
                                    <div class="price-rating">
                                        <ul class="rating-review-sold-box">
                                            <li>
                                                <h3><i class="ri-star-fill"></i> 4.8 Ratings</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>4.5M+ Reviews</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>3.5M+ Sold</h3>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="product-contain">
                                        <p>Experience brilliance with the iPhone 14 Pro Max, designed with a sleek
                                            finish and a stunning Super Retina XDR display. Powered by the A16 Bionic
                                            chip, it delivers lightning-fast performance and efficiency. The advanced
                                            triple-camera system captures professional-quality photos and videos in all
                                            lighting conditions.</p>
                                    </div>

                                    <div class="product-package product-spacing">
                                        <div class="product-title">
                                            <h4>Choose Color :</h4>
                                        </div>
                                        <form class="select-package color-product">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="6" checked="" style="background-color: #d5dde0;">
                                                <label class="form-check-label bg-transparent" for="6"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="7" style="background-color: #edd4d7;">
                                                <label class="form-check-label bg-transparent" for="7"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="8" style="background-color: #ece7c9;">
                                                <label class="form-check-label bg-transparent" for="8"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="9" style="background-color: #d4ddce;">
                                                <label class="form-check-label bg-transparent" for="9"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="10" style="background-color: #4d5154;">
                                                <label class="form-check-label bg-transparent" for="10"></label>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="hurry-up-box">
                                        <h4 class="h5">There are just <span class="theme-color">5</span> left in stock, so please
                                            act immediately.</h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 50%"></div>
                                        </div>
                                    </div>

                                    <div class="about-item-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>About Item :</h4>
                                        </div>

                                        <ul class="about-item-list">
                                            <li>Brand : <span>Apple</span></li>
                                            <li>Category : <span>Smartphone</span></li>
                                            <li>Condition : <span>Brand New</span></li>
                                            <li>Color : <span>Deep Purple</span></li>
                                            <li>Pattern : <span>Glossy finish</span></li>
                                            <li>Style : <span>Premium</span></li>
                                        </ul>
                                    </div>

                                    <div class="qty-stock-box">
                                        <div class="qty-box h-100 qty-container quantity-box-2">
                                            <button class="btn qty-btn qty-btn-minus">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            <input type="number" readonly="" name="qty" value="0" class="qty-input form-control input-qty">
                                            <button class="btn qty-btn qty-btn-plus">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>

                                        <button onclick="location.href = 'cart.html';" class="btn buy-btn theme-border fw-500">
                                            <i class="ri-shopping-bag-line"></i> Add to bag</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal End -->

    <!-- Exit Modal Start -->
    <div class="modal fade exit-modal theme-modal" id="exitModal">
        <div class="modal-dialog modal-custom-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="exit-box">
                        <div class="row g-0">
                            <div class="col-sm-6 order-sm-1 order-2">
                                <div class="exit-left-box">
                                    <h3>HEY YOU</h3>
                                    <h4>Don't leave now!</h4>
                                    <h5>OFFER68</h5>
                                    <h6>Use this coupon code to get 68% off</h6>
                                    <ul class="clock-list">
                                        <li>
                                            <div class="digits minutes" id="minutes"></div>
                                        </li>
                                        <li class="dots">:</li>
                                        <li>
                                            <div class="digits seconds" id="seconds"></div>
                                        </li>
                                    </ul>
                                    <h6>This coupon code expires in</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 order-sm-2 order-1">
                                <div class="exit-right-box">
                                    <img src="{{asset('frontend')}}/assets/images/exit-modal/4.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exit Modal End -->

    <!-- Category Offcanvas Start -->
    <div class="category-fixed-box offcanvas offcanvas-start" id="categoryCanvas">
        <div class="category-header">
            <h5>Category</h5>
            <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas">
                <i class="ri-close-fill"></i>
            </button>
        </div>
        <div class="category-menu-list">
            <ul class="top-menu-list">
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <svg>
                            <use xlink:href="{{asset('frontend')}}/assets/svg/category.svg#daily"></use>
                        </svg>
                        <h5>Daily Deals</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <svg>
                            <use xlink:href="{{asset('frontend')}}/assets/svg/category.svg#top"></use>
                        </svg>
                        <h5>Top Promotions</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <svg>
                            <use xlink:href="{{asset('frontend')}}/assets/svg/category.svg#trending"></use>
                        </svg>
                        <h5>Now Trending <span class="theme-bg-color2 text-white">Hot</span></h5>
                    </a>
                </li>
            </ul>
            <ul class="sub-menu-list">
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-macbook-line"></i>
                        <h5>Mobiles, Computers</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-plug-2-line"></i>
                        <h5>TV, Appliances, Electronics</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-men-line"></i>
                        <h5>Men's Fashion</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-women-line"></i>
                        <h5>Women's Fashion <span class="success-bg-color">New</span></h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-knife-line"></i>
                        <h5>Home, Kitchen, Pets</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-empathize-line"></i>
                        <h5>Beauty, Health, Grocery</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-boxing-line"></i>
                        <h5>Sports, Fitness, Bags, Luggage</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-open-arm-line"></i>
                        <h5>Toys, Baby Products, Kid's Fashion</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-car-line"></i>
                        <h5>Car, Motorbike, Industrial</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-book-open-line"></i>
                        <h5>Books</h5>
                    </a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html" class="sub-category-box">
                        <i class="ri-gamepad-line"></i>
                        <h5>Game Consoles</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Category Offcanvas End -->

    <!-- Alert Box Start -->
    <div id="alertBox" class="alert-box">
        <div class="alert-message" id="alertMessage"></div>
        <div class="alert-progressbar" id="progressBar"></div>
        <div class="button-group">
            <button class="remove-wishlist btn">remove wishlist</button>
            <button class="add-cart-btn btn" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">Add to
                cart</button>
        </div>
    </div>
    <!-- Alert Box End -->

    <!-- Bg Overlay Start -->
    <div id="overlay" class="bg-overlay"></div>
    <!-- Bg Overlay End -->

    <!-- Newsletter Modal Start -->
    <div class="modal fade theme-modal newsletter-modal" id="newsletterModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="newsletter-box">
                        <img src="{{asset('frontend')}}/assets/images/newsletter.jpg" alt="" class="img-fluid newsletter-image">

                        <div class="newsletter-content">
                            <h3>Your Direct Line to Offers</h3>
                            <p>Subscribe now and enjoy insider tips, special rewards, and early access to our latest
                                products.</p>
                            <div class="newsletter-form-box">
                                <input type="email" class="form-control" placeholder="Your Email">
                                <button class="newsletter-button btn">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Modal End -->

    <!-- Page Load GSAP Js -->
    <script src='{{asset('frontend')}}/assets/js/gsap/gsap.min.js'></script>
    <script src='{{asset('frontend')}}/assets/js/gsap/split-type.js'></script>

    <!-- Bootstrap Js -->
    <script src="{{asset('frontend')}}/assets/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap/bootstrap-tooltip.js"></script>

    <!-- Swiper Js -->
    <script src="{{asset('frontend')}}/assets/js/swiper.js"></script>
    <script src="{{asset('frontend')}}/assets/js/custom-swiper.js"></script>

    <!-- Lazyload Js -->
    <script src="{{asset('frontend')}}/assets/js/lazyload.js"></script>

    <!-- Iconsax js -->
    <script src="{{asset('frontend')}}/assets/js/iconsax.js"></script>

    <!-- Timer Js -->
    <script src="{{asset('frontend')}}/assets/js/timer-2.js"></script>

    <!-- Quantity js -->
    <script src="{{asset('frontend')}}/assets/js/qty.js"></script>

    <!-- Wishlist Notification Js -->
    <script src="{{asset('frontend')}}/assets/js/wishlist-notify.js"></script>

    <!-- Cookie Js -->
    <script src="{{asset('frontend')}}/assets/js/cookie.js"></script>

    <!-- Script js -->
    <script src="{{asset('frontend')}}/assets/js/script.js"></script>

    <!-- Template Setting Js -->
    <script src="{{asset('frontend')}}/assets/js/theme-setting.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function () {

    const images = document.querySelectorAll("img:not(.no-lazy)");

    const loadImage = (img) => {
        if (img.dataset.src) {
            img.src = img.dataset.src;
        }
        img.classList.add("loaded");
    };

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    loadImage(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        images.forEach(img => {
            // যদি আগে থেকেই src থাকে, তাও lazy behave করবে
            observer.observe(img);
        });

    } else {
        images.forEach(img => loadImage(img));
    }

});
</script>
</body>

</html>