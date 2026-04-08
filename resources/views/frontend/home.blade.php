@extends('frontend.layouts.app')
@section('content')

    <!-- Home Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-xl-block d-none">
                    <a href="shop-left-sidebar.html" class="banner-box h-100">
                        <img src="{{asset('frontend')}}/assets/images/banner/43.jpg" class="img-fluid lazy-loader" alt="">
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
@endsection