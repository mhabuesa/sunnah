@extends('frontend.layouts.app')
@section('title', 'Home Page')
@push('header_script')
    <style>
        .qty-btn {
            border: 1px solid #ddd;
            padding: 0px 5px;
        }

        .qty-btn:hover {
            color: rgba(var(--white), 1);
            background-color: rgba(var(--primary-color), 1);
        }

        .qty-input {
            height: 30px;
            width: 45px
        }
    </style>
@endpush
@section('content')

    <!-- Home Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="row m-auto d-flex justify-content-center">
                @php
                    $count = $mainBanners->count();
                @endphp

                {{-- 1 Banner --}}
                @if ($count == 1)

                    <div class="col-xl-12 col-md-12 px-0">
                        <a href="{{ $mainBanners[0]->url }}" class="banner-box">
                            <img class="lazy img-fluid" data-src="{{ asset($mainBanners[0]->image) }}">
                        </a>
                    </div>

                    {{-- 2 Banners --}}
                @elseif($count == 2)
                    @foreach ($mainBanners as $banner)
                        <div class="col-xl-6 col-md-6 px-0">
                            <a href="{{ $banner->url }}" class="banner-box">
                                <img class="lazy img-fluid" data-src="{{ asset($banner->image) }}">
                            </a>
                        </div>
                    @endforeach

                    {{-- 3 Banners --}}
                @elseif($count >= 3)
                    <div class="col-xl-8 col-md-8 px-0 my-auto">
                        <a href="{{ $mainBanners[0]->url }}" class="banner-box">
                            <img class="lazy img-fluid" data-src="{{ asset($mainBanners[0]->image) }}">
                        </a>
                    </div>

                    <div class="col-xl-4 col-md-4 d-md-block d-none">
                        <div class="row h-100">

                            @foreach ($mainBanners->slice(1, 2) as $banner)
                                <div class="col-12 {{ !$loop->first ? 'mt-2' : '' }}">
                                    <a href="{{ $banner->url }}" class="banner-box h-100">
                                        <img class="lazy img-fluid" data-src="{{ asset($banner->image) }}">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>

                @endif


            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Product Section Start -->
    <section section class="section-t-space">
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
                        <img src="{{ asset('frontend') }}/assets/images/banner/48.jpg" class="img-fluid" alt="">
                    </a>
                </div>

                <div class="col-xl-9">
                    <div class="swiper product-five-slider product-option-box">
                        <div class="swiper-wrapper">
                            @foreach ($todaysDeals->chunk(2) as $chunk)
                                <div class="swiper-slide">
                                    @foreach ($chunk as $deal)
                                        <div class="product-box-4-main">
                                            <div class="select-option-box">
                                                <div class="select-box">
                                                    <div>

                                                        @if ($deal->product->variations && $deal->product->variations->count() > 0)
                                                            @foreach ($deal->product->variations->groupBy('attribute_id') as $variations)
                                                                <div class="size-box">
                                                                    <h4 class="h5">
                                                                        {{ $variations->first()->attribute?->name }}
                                                                    </h4>

                                                                    <ul class="size-list">
                                                                        @foreach ($variations as $variation)
                                                                            <li>
                                                                                <a href="#!" class="variation-option"
                                                                                    data-id="{{ $variation->id }}">
                                                                                    {{ $variation->attributeValue?->value }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                        {{-- Quantity Box --}}
                                                        <div class="qty-box mt-3 d-flex align-items-center gap-2 mb-2   ">

                                                            <button class="btn qty-btn qty-minus">
                                                                <i class="ri-subtract-line"></i>
                                                            </button>

                                                            <input type="number" class="form-control qty-input text-center"
                                                                value="1" min="1">

                                                            <button class="btn qty-btn qty-plus">
                                                                <i class="ri-add-line"></i>
                                                            </button>

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
                                                        <img class="lazy img-fluid productImage"
                                                            data-src="{{ asset($deal->product->image) }}">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h5 class="sub-name productName">{{ $deal->product->category->name }}
                                                    </h5>
                                                    <a href="product-color.html" class="name">
                                                        <h5>{{ Str::limit($deal->product->name, 20, '...') }}</h5>
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
                                                    <h5 class="price">৳{{ $deal->product->price }} </h5>
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
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


       <!-- Fashion Product Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title justify-content-between d-sm-flex d-block">
                <h3 class="d-flex align-center">Fashion Products<a href="shop-left-sidebar.html"
                        class="ms-2 light-blue">See all Products</a>
                </h3>
                <ul class="nav nav-pills theme-nav-color title-nav-pills mt-sm-0 mt-3" id="pills-tab">
                    <li class="nav-item">
                        <button class="nav-link active" id="pills-new-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-new" type="button">New Arrival</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pills-selling-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-selling" type="button">Best Selling</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pills-top-tab" data-bs-toggle="pill" data-bs-target="#pills-top"
                            type="button">Top Rated</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/106.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/107.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/108.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/109.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/110.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/111.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/112.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/113.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/114.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/105.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/115.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/116.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/117.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/118.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/106.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/107.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/108.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/109.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/110.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/111.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/112.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/113.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/114.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/105.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/115.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/116.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/117.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/118.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/106.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/107.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/108.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/109.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/110.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/111.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/112.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/113.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/114.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/105.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/115.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/116.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/117.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                                            <img src="{{ asset('frontend') }}/assets/images/product/118.png"
                                                class="img-fluid productImage" alt="">
                                        </a>
                                        <div class="quick-view-button-box">
                                            <button class="btn view-btn" data-bs-target="#quickViewModal"
                                                data-bs-toggle="modal">Quick View</button>
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
                <img src="{{ asset('frontend') }}/assets/images/banner/52.jpg" class="img-fluid" alt="">
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
                                <button class="nav-link active" id="pills-top-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-top1" type="button">Top 20</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-rate-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-rate" type="button">Best Rated</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-choice-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-choice" type="button">Editor's
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/22.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/23.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/24.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/25.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/26.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/27.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/28.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/29.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/30.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/22.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/23.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/24.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/25.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/26.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/27.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/28.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/29.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/30.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/22.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/23.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/24.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/25.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/26.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/27.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/28.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/29.png"
                                                            class="img-fluid" alt="">
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
                                                        <img src="{{ asset('frontend') }}/assets/images/product/30.png"
                                                            class="img-fluid" alt="">
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
                                <img src="{{ asset('frontend') }}/assets/images/banner/53.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="shop-left-sidebar.html" class="banner-box">
                                <img src="{{ asset('frontend') }}/assets/images/banner/54.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommendations Product Section End -->


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
                        <img src="{{ asset('frontend') }}/assets/images/banner/55.jpg" class="img-fluid"
                            alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{ asset('frontend') }}/assets/images/banner/56.jpg" class="img-fluid"
                            alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{ asset('frontend') }}/assets/images/banner/57.jpg" class="img-fluid"
                            alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-6">
                    <a href="shop-left-sidebar.html" class="offer-product-box">
                        <img src="{{ asset('frontend') }}/assets/images/banner/58.jpg" class="img-fluid"
                            alt="">
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
                                <img src="{{ asset('frontend') }}/assets/images/product/119.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/120.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/121.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/122.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/123.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/124.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/125.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/126.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/127.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/128.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="product-color.html" class="recent-product-box">
                                <img src="{{ asset('frontend') }}/assets/images/product/119.jpg" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Viewed Products Section End -->


@endsection

@push('footer_script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll("img.lazy");

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove("lazy");
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => observer.observe(img));
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.qty-box').forEach(box => {

                let input = box.querySelector('.qty-input');

                box.querySelector('.qty-plus').addEventListener('click', () => {
                    input.value = parseInt(input.value) + 1;
                });

                box.querySelector('.qty-minus').addEventListener('click', () => {
                    if (input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });

            });

        });
    </script>
@endpush
