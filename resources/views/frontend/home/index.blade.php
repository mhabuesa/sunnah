@extends('frontend.layouts.app')
@section('title', 'Home Page')
@push('header_script')
    <style>
        .banner-image {
            display: block;
            width: 100%;
            max-height: 450px;
            object-fit: cover;
        }

        .banner-carousel-container {
            position: relative;
        }

        .u-slick__arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .u-slick__arrow:hover {
            background: #ffffff;
            color: #000;
        }

        .u-slick__arrow-media-left {
            left: 20px;
        }

        .u-slick__arrow-media-right {
            right: 20px;
        }

        .u-slick__pagination {
            z-index: 5;
            position: absolute;
            bottom: 15px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .u-slick__pagination li {
            margin: 0 4px;
        }

        .u-slick__pagination li span {
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            text-indent: -9999px;
            cursor: pointer;
        }

        .u-slick__pagination li.slick-active span {
            width: 35px;
            border-radius: 5px;
        }

        /* New Promo Section Styles */
        .home-promo-section {
            padding-top: 20px;
        }

        .promo-card-main {
            background-color: #fdfbf7;
            border: 1px solid #efebe4;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
            height: 100%;
        }

        .promo-card-main:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
            background-color: #fffcf5;
        }

        @media (max-width: 576px) {
            .promo-card-main {
                padding: 8px !important;
            }

            .promo-card-main .promo-icon-wrapper img {
                width: 34px !important;
                height: 34px !important;
            }

            .promo-card-main .promo-content h6 {
                font-size: 12px;
                margin-bottom: 1px;
            }

            .promo-card-main .promo-content p {
                font-size: 10px;
                line-height: 1.1;
            }
        }

        .promo-card-main .promo-content h6 {
            color: #2c3e50;
            margin-bottom: 2px;
        }

        .promo-card-main .promo-content p {
            color: #7f8c8d;
            line-height: 1.2;
        }

        .promo-card-mini {
            background-color: #fdfbf7;
            border: 1px solid #efebe4;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
            height: 100%;
        }

        .promo-card-mini:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
            background-color: #fffcf5;
        }

        .promo-card-mini .promo-content h6 {
            color: #2c3e50;
            margin-bottom: 2px;
        }

        .promo-card-mini .promo-content p {
            color: #7f8c8d;
            line-height: 1.1;
        }

        /* Fixed Category Section Styles */
        .home-category-slider {
            background-color: #ffffff;
            border: 1px solid #efebe4;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        .home-category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #fdfbf7;
            padding-bottom: 10px;
        }

        .home-category-header h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 0;
            position: relative;
        }

        .home-category-header h3::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: #1a5d1a;
            /* Dark Green underline */
            border-radius: 2px;
        }

        .category-carousel {
            padding: 10px 0;
        }

        .category-item {
            display: block;
            text-decoration: none;
            transition: all 0.3s ease;
            color: inherit;
            outline: none;
        }

        .category-img-wrapper {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            background: #fdfbf7;
            border: 1px solid #efebe4;
        }

        .category-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .category-name {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #4a5568;
            line-height: 1.2;
            text-align: center;
        }

        .category-item:hover {
            transform: translateY(-3px);
        }

        .category-item:hover .category-img-wrapper img {
            transform: scale(1.1);
        }

        .category-item:hover .category-name {
            color: #1a5d1a;
        }

        @media (max-width: 576px) {
            .category-img-wrapper {
                width: 40px;
                height: 40px;
            }

            .category-name {
                font-size: 11px;
            }

            .home-category-slider {
                padding: 15px 10px;
            }
        }

        /* Mobile responsive coupon copy button */
         .copy-coupon-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.2;
            border-radius: 6px;
            flex-shrink: 0;
        }

        @media (max-width: 767.98px) {
            .copy-coupon-btn {
                padding: 5px 7px !important;
                margin-left: 6px !important;
                font-size: 12px;
                line-height: 1;
                border-radius: 5px;
            }

            .copy-coupon-btn i {
                font-size: 13px;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Banner Section -->
    @if (isset($mainBanners) && $mainBanners->count() > 0)
        <div class="container mb-4">
            <div class="col-xl-12 px-0">
                <div class="banner-carousel-container overflow-hidden position-relative rounded">

                    <div class="js-slick-carousel u-slick" data-autoplay="true" data-speed="7000" data-arrows="true"
                        data-dots="true"
                        data-arrow-left-classes="ec ec-arrow-left u-slick__arrow u-slick__arrow-media-left font-size-20"
                        data-arrow-right-classes="ec ec-arrow-right u-slick__arrow u-slick__arrow-media-right font-size-20"
                        data-pagi-classes="text-center u-slick__pagination u-slick__pagination--long">

                        @foreach ($mainBanners as $banner)
                            <div class="js-slide">
                                <a href="{{ $banner->url ?? '#' }}">
                                    <img src="{{ asset($banner->image) }}" alt="Banner"
                                        class="img-fluid w-100 banner-image" loading="eager" fetchpriority="high"
                                        decoding="async">
                                </a>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <!-- Promotional Sections -->
        <div class="home-promo-section container mb-5 px-2 px-md-0">
            <!-- Main Offer Cards -->
            <div class="home-main-offers row g-2 g-md-3 mb-4">
                <div class="col-6 col-md-6 col-xl-3 pb-2 px-2">
                    <a href="{{ route('sunnah.products') }}"
                        class="promo-card-main d-flex align-items-center p-3 text-decoration-none">
                        <div class="promo-icon-wrapper mr-3">
                            <img src="{{ asset('frontend/assets/images/bag.png') }}" alt="Shopping"
                                class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                        </div>
                        <div class="promo-content">
                            <h6 class="mb-1 text-gray-90 font-weight-bold">সুন্নাহ শপিং</h6>
                            <p class="mb-0 text-gray-50 font-size-12">
                                সুন্নাহসম্মত জীবনযাপনের নিত্যপ্রয়োজনীয় সামগ্রী।
                            </p>
                        </div>
                    </a>
                </div>

                {{-- First 3 offers --}}
                @foreach ($offers->take(3) as $promo)
                    <div class="col-6 col-md-6 col-xl-3 pb-2 px-2">
                        @if ($promo->type == 'product')
                            <a href="{{ route('offers', $promo->slug) }}"
                                class="promo-card-main d-flex align-items-center p-3 text-decoration-none">
                                <div class="promo-icon-wrapper mr-3">
                                    <img src="{{ asset($promo->image) }}" alt="{{ $promo->type }}"
                                        class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                </div>
                                <div class="promo-content">
                                    <h6 class="mb-1 text-gray-90 font-weight-bold">
                                        {{ $promo->title ?? 'Special Offer' }}
                                    </h6>
                                    <p class="mb-0 text-gray-50 font-size-12">
                                        {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                    </p>
                                </div>
                            </a>
                        @else
                            <div class="promo-card-main d-flex align-items-center p-3">
                                <a href="javascript:void(0)"
                                    class="d-flex align-items-center text-decoration-none flex-grow-1"
                                    style="min-width: 0;">

                                    <div class="promo-icon-wrapper mr-3">
                                        <img src="{{ asset($promo->image) }}" alt="{{ $promo->type }}"
                                            class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                    </div>

                                    <div class="promo-content" style="min-width: 0;">
                                        <h6 class="mb-1 text-gray-90 font-weight-bold">
                                            {{ $promo->title ?? 'Special Offer' }}
                                        </h6>

                                        <p class="mb-0 text-gray-50 font-size-12">
                                            {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                        </p>
                                    </div>
                                </a>

                                {{-- Copy Coupon Button --}}
                                <button type="button" class="btn btn-light border ml-2 copy-coupon-btn"
                                    data-coupon="{{ $promo->coupon->coupon_code ?? '' }}" title="Copy coupon code"
                                    aria-label="Copy coupon code" style="flex-shrink: 0;">

                                    <i class="far fa-copy"></i>
                                </button>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>

            {{-- Mini Offer Cards: Remaining offers after the first 4 --}}
            <div class="home-mini-offers row g-3 mb-5 justify-content-center">
                @foreach ($offers->skip(3) as $promo)
                    @if ($promo->type == 'product')
                        <div class="col-xl-2 col-md-4 col-6 mt-2">
                            <a href="{{ route('offers', $promo->slug) }}"
                                class="promo-card-mini d-flex flex-column align-items-center text-center p-3 text-decoration-none">
                                <div class="mini-icon mb-2">
                                    <img src="{{ asset($promo->image) }}" alt="{{ $promo->title ?? 'Gift' }}"
                                        class="img-fluid rounded-circle"
                                        style="width: 40px; height: 40px; object-fit: cover;">
                                </div>
                                <div class="promo-content">
                                    <h6 class="mb-1 text-gray-90 font-weight-bold font-size-14">
                                        {{ $promo->title ?? 'Special Offer' }}
                                    </h6>
                                    <p class="mb-0 text-gray-50 font-size-11">
                                        {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-xl-2 col-md-4 col-6 mt-2">
                            <div class="promo-card-mini d-flex flex-column align-items-center text-center p-3">

                                <a href="javascript:void(0)"
                                    class="d-flex flex-column align-items-center text-decoration-none w-100">

                                    <div class="mini-icon mb-2">
                                        <img src="{{ asset($promo->image) }}" alt="{{ $promo->title ?? 'Gift' }}"
                                            class="img-fluid rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>

                                    <div class="promo-content">
                                        <h6 class="mb-1 text-gray-90 font-weight-bold font-size-14">
                                            {{ $promo->title ?? 'Special Offer' }}
                                        </h6>

                                        <p class="mb-0 text-gray-50 font-size-11">
                                            {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                        </p>
                                    </div>
                                </a>

                                {{-- Copy Coupon Button --}}
                                <button type="button" class="btn btn-light border copy-coupon-btn mt-2"
                                    data-coupon="{{ $promo->coupon->coupon_code ?? '' }}" title="Copy coupon code"
                                    aria-label="Copy coupon code">

                                    <i class="far fa-copy"></i>
                                </button>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Category Slider -->
            <div class="home-category-slider">
                <div class="home-category-header d-flex justify-content-between align-items-center mb-3">
                    <h3 class="section-title section-title__full mb-0 font-size-22">ক্যাটাগরি অনুযায়ী কেনাকাটা</h3>
                    <a href="{{ route('products') }}" class="d-block text-gray-16 text-decoration-none">
                        সব দেখুন <i class="ec ec-arrow-right-categproes"></i>
                    </a>
                </div>
                <div class="js-slick-carousel u-slick category-carousel" data-slides-show="10" data-slides-scroll="1"
                    data-arrows="true" data-dots="false"
                    data-responsive='[
                    {"breakpoint": 1400, "settings": {"slidesToShow": 8}},
                    {"breakpoint": 1200, "settings": {"slidesToShow": 6}},
                    {"breakpoint": 992, "settings": {"slidesToShow": 4}},
                    {"breakpoint": 768, "settings": {"slidesToShow": 3}},
                    {"breakpoint": 554, "settings": {"slidesToShow": 5}}
                 ]'>
                    @foreach ($categories as $category)
                        <div class="js-slide text-center">
                            <a href="{{ route('category', $category->slug) }}" class="category-item pt-3">
                                <div class="category-img-wrapper">
                                    @if ($category->logo)
                                        <img src="{{ asset($category->logo) }}" alt="{{ $category->name }}"
                                            loading="lazy">
                                    @else
                                        <img src="{{ asset('frontend/assets/img/placeholder-category.png') }}"
                                            alt="{{ $category->name }}" loading="lazy">
                                    @endif
                                </div>
                                <span class="category-name">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Full banner -->
        @if ($topBanner)
            <div class="mb-4">
                <a href="{{ $topBanner->url }}" class="d-block text-gray-90">
                    <img src="{{ asset($topBanner->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
                        loading="eager" fetchpriority="high" decoding="async">
                </a>
            </div>
        @endif
        <!-- End Full banner -->

        <!-- End Banner -->
        <!-- Todays Deal products -->
        @if ($todaysDeals->count() > 0)
            <div class="mb-6 home-category-slider">
                <div
                    class="home-category-header d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 font-size-22">আজকের সেরা অফার</h3>
                    <a class="d-block text-gray-16" href="{{ route('todays.deal') }}">সব দেখুন
                        <i class="ec ec-arrow-right-categproes"></i></a>
                </div>
                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                    data-slides-show="7" data-slides-scroll="1"
                    data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 5
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>

                    @foreach ($todaysDeals as $product)
                        <div class="js-slide products-group">
                            <div class="product-item remove-divider">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="{{ route('product', $product->product->slug) }}"
                                                    class="font-size-12 text-gray-5">{{ $product->product->category->name }}</a>
                                            </div>
                                            <h5 class="mb-1 product-item__title"><a
                                                    href="{{ route('product', $product->product->slug) }}"
                                                    class="text-blue font-weight-bold">{{ Str::limit($product->product->name, '20', '...') }}</a>
                                            </h5>
                                            <div class="mb-2">
                                                <a href="{{ route('product', $product->product->slug) }}"
                                                    class="d-block text-center"><img class="img-fluid"
                                                        src="{{ asset($product->product->image) }}"
                                                        alt="Image Description"></a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    <div class="text-gray-100">৳{{ productPrice($product->product->id) }}
                                                    </div>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="{{ route('product', $product->product->slug) }}"
                                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                                            class="ec ec-add-to-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
        <!-- End Todays Deal products -->

        <!-- Todays Deal banner -->
        @if ($middleBanner)
            <div class="mb-4">
                <a href="{{ $middleBanner->url }}" class="d-block text-gray-90">
                    <img src="{{ asset($middleBanner->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
                        loading="eager" fetchpriority="high" decoding="async">
                </a>
            </div>
        @endif
        <!-- End Todays Deal banner -->
    </div>

    <div class="container">
        <!-- Category products -->

        @foreach ($categories as $category)
            @if ($category->activeProducts->isNotEmpty())
                <div class="mb-6 home-category-slider">
                    <div
                        class="home-category-header d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                        <h3 class="section-title section-title__full mb-0 font-size-22">
                            {{ $category->name }}
                        </h3>

                        <a class="d-block text-gray-16" href="{{ route('category', $category->slug) }}">
                            সব দেখুন
                            <i class="ec ec-arrow-right-categproes"></i>
                        </a>
                    </div>

                    <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble px-1"
                        data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                        data-slides-show="7" data-slides-scroll="1"
                        data-responsive='[{
                        "breakpoint": 1400,
                        "settings": {"slidesToShow": 5}
                    }, {
                        "breakpoint": 1200,
                        "settings": {"slidesToShow": 3}
                    }, {
                        "breakpoint": 992,
                        "settings": {"slidesToShow": 3}
                    }, {
                        "breakpoint": 768,
                        "settings": {"slidesToShow": 2}
                    }, {
                        "breakpoint": 554,
                        "settings": {"slidesToShow": 2}
                    }]'>
                        @foreach ($category->activeProducts as $product)
                            <div class="js-slide products-group">
                                <div class="product-item remove-divider">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="font-size-12 text-gray-5">
                                                        {{ $product->category->name ?? '' }}
                                                    </a>
                                                </div>

                                                <h5 class="mb-1 product-item__title">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="text-blue font-weight-bold">
                                                        {{ Str::limit($product->name, 20, '...') }}
                                                    </a>
                                                </h5>

                                                <div class="mb-2">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="d-block text-center">
                                                        <img class="img-fluid" src="{{ asset($product->image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>

                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">
                                                            ৳{{ productPrice($product->id) }}
                                                        </div>
                                                    </div>

                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="{{ route('product', $product->slug) }}"
                                                            class="btn-add-cart btn-primary transition-3d-hover">
                                                            <i class="ec ec-add-to-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
        @endforeach

        <!-- End Category products -->
    </div>
    @if ($latestProducts->count() > 0)
        <div class="container">
            <!-- Latest Prodcut Section -->
            <div class="mb-6 home-category-slider">
                <div
                    class="home-category-header d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">নতুন পণ্যসমূহ</h3>
                    <a class="d-block text-gray-16" href="{{ route('products') }}">সব দেখুন
                        <i class="ec ec-arrow-right-categproes"></i></a>
                </div>
                <!-- Latest Content -->
                <div class="tab-content">
                    <div class="pt-0">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach ($latestProducts as $latestProduct)
                                <li class="col-6 col-md-3 col-lg-2 product-item remove-divider">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3 ">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a
                                                        href="{{ route('product', $latestProduct->slug) }}"
                                                        class="font-size-12 text-gray-5">{{ $latestProduct->category->name }}</a>
                                                </div>
                                                <h5 class="mb-1 product-item__title"><a
                                                        href="{{ route('product', $latestProduct->slug) }}"
                                                        class="text-blue font-weight-bold">{{ Str::limit($latestProduct->name, '20', '...') }}</a>
                                                </h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('product', $latestProduct->slug) }}"
                                                        class="d-block text-center"><img class="img-fluid"
                                                            src="{{ asset($latestProduct->image) }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">৳
                                                            {{ productPrice($latestProduct->id) }}
                                                        </div>
                                                    </div>

                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="{{ route('product', $latestProduct->slug) }}"
                                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!-- End Latest Content -->
            </div>
            <!-- End Latest Prodcut Section -->
        </div>
    @endif


    <div class="container">
        <!-- Recently viewed -->
        @if ($recentProducts->count())
            <div class="mb-6 home-category-slider">
                <div
                    class="home-category-header d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">সম্প্রতি দেখা পণ্যসমূহ</h3>
                </div>
                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                    data-slides-show="7" data-slides-scroll="1"
                    data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 5
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>

                    @foreach ($recentProducts as $product)
                        <div class="js-slide products-group">
                            <div class="product-item remove-divider">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="{{ route('product', $product->slug) }}"
                                                    class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                            </div>
                                            <h5 class="mb-1 product-item__title"><a
                                                    href="{{ route('product', $product->slug) }}"
                                                    class="text-blue font-weight-bold">{{ Str::limit($product->name, '20', '...') }}</a>
                                            </h5>
                                            <div class="mb-2">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="d-block text-center"><img class="img-fluid"
                                                        src="{{ asset($product->image) }}" alt="Image Description"></a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    <div class="text-gray-100">৳ {{ productPrice($product->id) }}
                                                    </div>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                                            class="ec ec-add-to-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
        <!-- End Recently viewed -->
    </div>

    <!-- Bottom banner -->
    <div class="container">
        @if ($bottomBanner)
            <div class="mb-4">
                <a href="{{ $bottomBanner->url }}" class="d-block text-gray-90">
                    <img src="{{ asset($bottomBanner->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
                        loading="eager" fetchpriority="high" decoding="async">
                </a>
            </div>
        @endif
    </div>
    <!-- End Bottom banner -->
@endsection

@push('footer_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.copy-coupon-btn').forEach(function(button) {
                button.addEventListener('click', async function() {
                    const couponCode = this.dataset.coupon;

                    if (!couponCode) {
                        showCouponToast('Coupon code is not available!', 'error');
                        return;
                    }

                    try {
                        await navigator.clipboard.writeText(couponCode);

                        showCouponToast('Coupon code copied successfully!', 'success');
                    } catch (error) {
                        // Fallback for browsers where Clipboard API is unavailable.
                        const textarea = document.createElement('textarea');
                        textarea.value = couponCode;
                        textarea.style.position = 'fixed';
                        textarea.style.opacity = '0';

                        document.body.appendChild(textarea);
                        textarea.select();

                        const copied = document.execCommand('copy');
                        textarea.remove();

                        if (copied) {
                            showCouponToast('Coupon code copied successfully!', 'success');
                        } else {
                            showCouponToast('Unable to copy coupon code.', 'error');
                        }
                    }
                });
            });

            function showCouponToast(message, type) {
                const toast = document.createElement('div');

                toast.textContent = message;
                toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 99999;
                padding: 12px 20px;
                border-radius: 8px;
                color: #fff;
                background: ${type === 'success' ? '#198754' : '#dc3545'};
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                font-size: 14px;
                max-width: calc(100vw - 40px);
            `;

                document.body.appendChild(toast);

                setTimeout(function() {
                    toast.remove();
                }, 3000);
            }
        });
    </script>
@endpush
