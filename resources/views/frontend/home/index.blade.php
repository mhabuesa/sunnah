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
            width: 80px;
            height: 80px;
            margin: 0 auto 10px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
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
                width: 50px;
                height: 50px;
            }

            .category-name {
                font-size: 11px;
            }

            .home-category-slider {
                padding: 15px 10px;
            }

            .category-item {
                height: 80px;
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



        /* Brand Carousel Fix */
        .brand-carousel {
            padding-bottom: 10px;
        }

        /* Hide Brand Carousel Arrows */
        .brand-carousel .slick-arrow,
        .brand-carousel .u-slick__arrow {
            display: none !important;
        }


        .u-slick-deal-arrow__border .u-slick__pagination {
            position: absolute;
            bottom: -40px;
            left: 0;
            right: 0;
            z-index: 10;
        }
    </style>

    <style>
        /* Compact Special Deal Design */
        @media (max-width: 767.98px) {

            /* Card */
            .special-deal-card {
                padding: 10px !important;
                border: 1.5px solid #123d2d !important;
                border-radius: 16px !important;
                overflow: hidden;
                min-height: 175px;
            }

            /* Horizontal Layout */
            .special-deal-row {
                display: flex !important;
                flex-wrap: nowrap !important;
                align-items: center !important;
                margin: 0 !important;
            }

            /* Image Column */
            .special-deal-image {
                flex: 0 0 38% !important;
                max-width: 38% !important;
                padding: 0 8px 0 0 !important;
            }

            .special-deal-image>.mb-4 {
                margin-bottom: 0 !important;
            }

            .special-deal-image img {
                width: 100%;
                height: 145px;
                object-fit: contain;
            }

            /* Content Column */
            .special-deal-content {
                flex: 0 0 62% !important;
                max-width: 62% !important;
                padding: 0 2px !important;
            }

            .special-deal-content>div {
                margin-top: 0 !important;
            }

            .special-deal-content h5 {
                font-size: 12px !important;
                line-height: 1.4 !important;
                margin-bottom: 7px !important;
                max-width: 100% !important;
            }

            /* Price */
            .special-deal-content ins {
                font-size: 20px !important;
            }

            .special-deal-content del {
                font-size: 12px !important;
            }

            .special-deal-content .d-flex.align-items-center.justify-content-center {
                margin-bottom: 7px !important;
            }

            /* Available and Sold */
            .special-deal-content .mb-4.mb-xl-5 {
                margin-bottom: 8px !important;
                padding-bottom: 0 !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            .special-deal-content .justify-content-between span {
                font-size: 10px;
            }

            .special-deal-content .height-xl-20 {
                height: 9px !important;
            }

            /* Countdown */
            .special-deal-content h6 {
                font-size: 10px !important;
                margin-bottom: 6px !important;
            }

            .special-deal-content .js-countdown {
                gap: 2px;
                justify-content: flex-start !important;
            }

            .special-deal-content .js-countdown>div {
                flex: 1;
                min-width: 0;
            }

            .special-deal-content .js-countdown .font-size-30 {
                font-size: 15px !important;
                padding: 5px 2px !important;
                text-align: center;
                margin-bottom: 3px !important;
            }

            .special-deal-content .js-countdown .font-size-24 {
                font-size: 12px !important;
                margin: 0 1px !important;
            }

            .special-deal-content .js-countdown .font-size-12 {
                font-size: 8px !important;
            }

            /* Discount Badge */
            .special-deal-card .height-75 {
                width: 48px !important;
                height: 48px !important;
            }

            .special-deal-card .height-75 .font-size-20 {
                font-size: 10px !important;
                margin-top: 5px
            }

            .special-deal-card .height-75 .font-size-12 {
                font-size: 9px !important;
            }

            .taka::before {
                content: "৳";
                margin-right: 2px;
                font-size: 10px;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Banner Section -->
    @if (isset($mainBanners) && $mainBanners->count() > 0)
        <div class="container mb-3">
            <div class="col-xl-12 px-0">
                <div class="banner-carousel-container overflow-hidden position-relative rounded">

                    <div class="js-slick-carousel u-slick" data-autoplay="true" data-speed="7000" data-arrows="true"
                        data-dots="true" data-slides-scroll="1" data-infinite="true"
                        data-arrow-left-classes="ec ec-arrow-left u-slick__arrow u-slick__arrow-media-left font-size-20"
                        data-arrow-right-classes="ec ec-arrow-right u-slick__arrow u-slick__arrow-media-right font-size-20"
                        data-pagi-classes="text-center u-slick__pagination u-slick__pagination--long">

                        @foreach ($mainBanners as $banner)
                            <div class="js-slide">
                                <a href="{{ $banner->url ?? '#' }}" class="m-auto">
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

    <!-- Promotional Sections -->
    <div class="container">
        <!-- Main Offer Cards -->
        <div class="home-main-offers row g-2 g-md-3 justify-content-center">
            <div class="col-6 col-md-6 col-xl-3">
                <a href="{{ route('sunnah.products') }}"
                    class="promo-card-main d-flex align-items-center p-3 text-decoration-none">
                    <div class="promo-icon-wrapper mr-3">
                        <img src="{{ asset('frontend/assets/images/bag.png') }}" alt="Shopping" class="img-fluid rounded"
                            style="width: 60px; height: 60px; object-fit: cover;">
                    </div>
                    <div class="promo-content">
                        <h6 class="mb-1 text-gray-90 font-weight-bold">সুন্নাহ কেনাকাটা</h6>
                        <p class="mb-0 text-gray-50 font-size-12">
                            সুন্নাহসম্মত জীবনযাপনের নিত্যপ্রয়োজনীয় সামগ্রী।
                        </p>
                    </div>
                </a>
            </div>

            {{-- First 3 offers --}}
            @foreach ($offers->take(3) as $promo)
                <div class="col-6 col-md-6 col-xl-3">
                    @if ($promo->type == 'product')
                        <a href="{{ route('offers', $promo->slug) }}"
                            class="promo-card-main d-flex align-items-center p-3 text-decoration-none">
                            <div class="promo-icon-wrapper mr-3">
                                @if ($promo->image)
                                    <img src="{{ asset($promo->image) }}" alt="{{ $promo->type }}"
                                        class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="promo-content">
                                <h6 class="mb-1 text-gray-90 font-weight-bold">
                                    {{ $promo->title ?? 'Special Offer' }}
                                </h6>
                                <p class="mb-0 text-gray-50">
                                    {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                </p>
                            </div>
                        </a>
                    @else
                        <div class="promo-card-main d-flex align-items-center p-3">
                            <a href="javascript:void(0)" class="d-flex align-items-center text-decoration-none flex-grow-1"
                                style="min-width: 0;">

                                @if ($promo->image)
                                    <div class="promo-icon-wrapper mr-3">
                                        <img src="{{ asset($promo->image) }}" alt="{{ $promo->type }}"
                                            class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="promo-content" style="min-width: 0;">
                                    <h6 class="mb-1 text-gray-90 font-weight-bold">
                                        {{ $promo->title ?? 'Special Offer' }}
                                    </h6>

                                    <p class="mb-0 text-gray-50">
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

        @if ($offers->count() > 3)
            {{-- Mini Offer Cards: Remaining offers after the first 4 --}}
            <div class="home-mini-offers row g-3 mb-2 justify-content-center">
                @foreach ($offers->skip(3) as $promo)
                    @if ($promo->type == 'product')
                        <div class="col-xl-3 col-md-4 col-6 mt-2">
                            <a href="{{ route('offers', $promo->slug) }}"
                                class="promo-card-mini d-flex flex-column align-items-center text-center p-3 text-decoration-none">
                                @if ($promo->image)
                                    <div class="mini-icon mb-2">
                                        <img src="{{ asset($promo->image) }}" alt="{{ $promo->title ?? 'Gift' }}"
                                            class="img-fluid rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>
                                @endif
                                <div class="promo-content">
                                    <h6 class="mb-1 text-gray-90 font-weight-bold">
                                        {{ $promo->title ?? 'Special Offer' }}
                                    </h6>
                                    <p class="mb-0 text-gray-50">
                                        {{ $promo->subtitle ?? 'Discover our exclusive deals' }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-xl-3 col-md-4 col-6 mt-2">
                            <div class="promo-card-mini d-flex flex-column align-items-center text-center p-3">

                                <a href="javascript:void(0)"
                                    class="d-flex flex-column align-items-center text-decoration-none w-100">
                                    @if ($promo->image)
                                        <div class="mini-icon mb-2">
                                            <img src="{{ asset($promo->image) }}" alt="{{ $promo->title ?? 'Gift' }}"
                                                class="img-fluid rounded-circle"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <div class="promo-content">
                                        <h6 class="mb-1 text-gray-90 font-weight-bold">
                                            {{ $promo->title ?? 'Special Offer' }}
                                        </h6>

                                        <p class="mb-0 text-gray-50">
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
        @endif

    </div>

    <div class="container mt-3">
        <!-- Category Slider -->
        <div class="home-category-slider">
            <div class="home-category-header d-flex justify-content-between align-items-center mb-0">
                <h3 class="section-title section-title__full mb-0 font-size-22">ক্যাটাগরি অনুযায়ী কেনাকাটা</h3>
                <a href="{{ route('products') }}" class="d-block text-gray-16 text-decoration-none">
                    সব দেখুন <i class="ec ec-arrow-right-categproes"></i>
                </a>
            </div>
            <div class="js-slick-carousel u-slick category-carousel pb-0" data-slides-show="10" data-slides-scroll="1"
                data-arrows="true" data-dots="false" data-autoplay="true" data-speed="600" data-infinite="true"
                data-responsive='[
                {"breakpoint": 1400, "settings": {"slidesToShow": 8}},
                {"breakpoint": 1200, "settings": {"slidesToShow": 6}},
                {"breakpoint": 992, "settings": {"slidesToShow": 4}},
                {"breakpoint": 768, "settings": {"slidesToShow": 3}},
                {"breakpoint": 554, "settings": {"slidesToShow": 4}}
             ]'>
                @foreach ($categories as $category)
                    <div class="js-slide text-center d-flex justify-content-center pb-3">
                        <a href="{{ route('category', $category->slug) }}" class="category-item">
                            <div class="category-img-wrapper">
                                @if ($category->logo)
                                    <img src="{{ asset($category->logo) }}" alt="{{ $category->name }}" loading="lazy">
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

        @if ($specialDeals->count() > 0)
            {{-- Special Deals Section --}}
            <div class="mb-6 position-relative mt-4">

                {{-- Section Header --}}
                <div
                    class="home-category-header d-flex justify-content-between flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">

                    <h3 class="section-title section-title__full mb-0 font-size-22">
                        সেরা অফার
                    </h3>

                    <a class="d-block text-gray-16" href="{{ route('special.deal') }}">
                        সব দেখুন
                        <i class="ec ec-arrow-right-categproes"></i>
                    </a>

                </div>

                {{-- Special Deal Slider --}}
                <div class="p-xl-4 p-wd-0 border-wd-0 pb-5 pb-wd-0">

                    <div class="js-slick-carousel u-slick u-slick--gutters-2 u-slick-deal-arrow__border"
                        data-slides-show="2" data-slides-scroll="1"
                        data-pagi-classes="text-center d-xl-none d-wd-flex u-slick__pagination u-slick__pagination--long position-absolute right-0 left-0 bottom-0 mb-2 z-index-2"
                        data-arrows-classes="d-none d-xl-inline-flex d-wd-none align-items-center u-slick__arrow-normal u-slick-deal-arrow position-absolute z-index-9 font-size-18 top-3"
                        data-arrow-left-classes="fa fa-angle-left right-xl-220 u-slick-deal-arrow__left"
                        data-arrow-right-classes="fa fa-angle-right right-1 u-slick-deal-arrow__right"
                        data-autoplay="false" data-speed="600"
                        data-responsive='[
                    {
                        "breakpoint": 1399,
                        "settings": {
                            "slidesToShow": 1
                        }
                    },
                    {
                        "breakpoint": 768,
                        "settings": {
                            "slidesToShow": 1
                        }
                    },
                    {
                        "breakpoint": 554,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }
                ]'>

                        @foreach ($specialDeals as $item)
                            @php
                                $product = $item->product ?? $item;
                            @endphp

                            <div class="js-slide">

                                <div
                                    class="special-deal-card p-4 p-xl-0 p-wd-4 border border-xl-0 border-width-2 border-primary borders-radius-20 bg-white">

                                    <div class="row align-items-md-center special-deal-row">

                                        {{-- Product Image --}}
                                        <div class="col-md-6 col-xl-7 col-wd-6 px-0 align-self-center special-deal-image">

                                            @if (productPrice($product->id) < previousPrice($product->id))
                                                {{-- Discount Badge --}}
                                                <div
                                                    class="d-inline-flex justify-content-between align-items-center position-absolute left-3 top-0 z-index-9">

                                                    <div
                                                        class="text-white d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1">

                                                        <span class="font-size-12">
                                                            সাশ্রয়
                                                        </span>

                                                        <div class="font-size-20 font-weight-bold taka">
                                                            {{ previousPrice($product->id) - productPrice($product->id) }}
                                                        </div>

                                                    </div>

                                                </div>
                                            @endif

                                            <div class="mb-4 mb-md-0">

                                                <div class="row align-items-center">

                                                    <div class="col">

                                                        <a href="{{ route('product', $product->slug) }}"
                                                            class="d-block text-center">

                                                            <img class="img-fluid mx-auto"
                                                                src="{{ asset($product->image) }}"
                                                                alt="{{ $product->name }}" loading="lazy">

                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        {{-- Product Details --}}
                                        <div class="col-md-6 col-xl-5 col-wd-6 special-deal-content">

                                            <div class="space-top-xl-2 space-top-wd-0 mt-xl-4 mt-wd-0">

                                                {{-- Product Name --}}
                                                <h5
                                                    class="mb-3 mb-xl-2 mb-wd-1 font-size-14 text-center mx-auto max-width-180 text-lh-18">

                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="text-blue font-weight-bold">
                                                        {{ $product->name }}
                                                    </a>

                                                </h5>

                                                @php
                                                    $currentPrice = productPrice($product->id);
                                                    $prevPrice = previousPrice($product->id);
                                                @endphp

                                                {{-- Product Price --}}
                                                <div class="d-flex align-items-center justify-content-center mb-3">

                                                    @if ($prevPrice > $currentPrice)
                                                        <del class="font-size-18 mr-2 text-gray-2">
                                                            {{ $prevPrice }}
                                                        </del>
                                                    @endif

                                                    <ins
                                                        class="font-size-xl-30 font-size-wd-25 text-red text-decoration-none taka">
                                                        {{ $currentPrice }}
                                                    </ins>

                                                </div>

                                                {{-- Available and Sold --}}
                                                <div class="mb-4 mb-xl-5 mb-wd-2 pb-wd-1 mx-2">

                                                    <div class="d-flex justify-content-between align-items-center mb-2">

                                                        <span>
                                                            Available:
                                                            <strong>{{ $item->available }}</strong>
                                                        </span>

                                                        <span>
                                                            Already Sold:
                                                            <strong>{{ $item->sold }}</strong>
                                                        </span>

                                                    </div>

                                                    {{-- Progress Bar --}}
                                                    <div class="rounded-pill bg-gray-3 height-wd-14 height-xl-20 position-relative">

                                                        <span class="position-absolute left-0 top-0 bottom-0 rounded-pill bg-primary" style="width: 20%"></span>

                                                    </div>

                                                </div>

                                                {{-- Countdown --}}
                                                <div class="mb-2">

                                                    <h6 class="font-size-15 text-gray-2 text-center mb-xl-3 mb-wd-2">
                                                        Hurry Up! Offer ends in:
                                                    </h6>

                                                    <div class="js-countdown d-flex justify-content-center"
                                                        data-end-date="{{ $item->validity->format('Y/m/d H:i:s') }}"
                                                        data-days-format="%D" data-hours-format="%H"
                                                        data-minutes-format="%M" data-seconds-format="%S">

                                                        {{-- Days --}}
                                                        <div class="text-lh-1 mx-1">

                                                            <div
                                                                class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                                <span class="js-cd-days"></span>
                                                            </div>

                                                            <div class="text-gray-2 font-size-12 text-center">
                                                                DAYS
                                                            </div>

                                                        </div>


                                                        {{-- Hours --}}
                                                        <div class="text-lh-1 mx-1">

                                                            <div
                                                                class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                                <span class="js-cd-hours"></span>
                                                            </div>

                                                            <div class="text-gray-2 font-size-12 text-center">
                                                                HOURS
                                                            </div>

                                                        </div>

                                                        {{-- Minutes --}}
                                                        <div class="text-lh-1 mx-1">

                                                            <div
                                                                class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                                <span class="js-cd-minutes"></span>
                                                            </div>

                                                            <div class="text-gray-2 font-size-12 text-center">
                                                                MINS
                                                            </div>

                                                        </div>

                                                        {{-- Seconds --}}
                                                        <div class="text-lh-1 mx-1">

                                                            <div
                                                                class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                                <span class="js-cd-seconds"></span>
                                                            </div>

                                                            <div class="text-gray-2 font-size-12 text-center">
                                                                SECS
                                                            </div>

                                                        </div>

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

            </div>
        @endif

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
                <div class="mb-1 home-category-slider">
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
                        data-slides-show="7" data-slides-scroll="1" data-arrows="true" data-dots="false"
                        data-autoplay="true" data-speed="600" data-infinite="true"
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
                            <div class="js-slide px-1">
                                <div class="product-item remove-divider">
                                    <div class="product-item__outer">
                                        <div class="product-item__inner p-2 p-md-3 border rounded bg-light">
                                            <div class="product-card-custom">

                                                {{-- Product Image --}}
                                                <div class="product-image-box rounded">
                                                    <a href="{{ route('product', $product->slug) }}">
                                                        <img class="img-fluid" src="{{ asset($product->image) }}"
                                                            alt="{{ $product->name }}" loading="lazy">
                                                    </a>
                                                </div>

                                                {{-- Product Name --}}
                                                <h5 class="product-title-custom">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="text-primary font-weight-bold">
                                                        {{ $product->name }}
                                                    </a>
                                                </h5>

                                                {{-- Product Price --}}
                                                <div class="product-price-custom text-black">
                                                    ৳ {{ productPrice($product->id) }}
                                                </div>

                                                {{-- Add to Cart Button --}}
                                                <div class="product-cart-custom">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-2 ajax-add-to-cart"
                                                        data-product-id="{{ $product->id }}">
                                                        <i class="ec ec-add-to-cart"></i> Add to Cart
                                                    </button>
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
            <div class="mb-4 home-category-slider">
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

                            @foreach ($latestProducts as $product)
                                <li class="col-6 col-md-3 col-lg-2 product-item remove-divider mt-2">

                                    <div class="product-item__outer h-100 m-1">

                                        <div class="product-item__inner p-2 p-md-3 border rounded bg-light h-100">

                                            <div class="product-card-custom">

                                                {{-- Product Image --}}
                                                <div class="product-image-box rounded">
                                                    <a href="{{ route('product', $product->slug) }}">
                                                        <img class="img-fluid" src="{{ asset($product->image) }}"
                                                            alt="{{ $product->name }}" loading="lazy">
                                                    </a>
                                                </div>

                                                {{-- Product Name --}}
                                                <h5 class="product-title-custom">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                        class="text-primary font-weight-bold ">
                                                        {{ $product->name }}
                                                    </a>
                                                </h5>

                                                {{-- Product Price --}}
                                                <div class="product-price-custom text-black">
                                                    ৳ {{ productPrice($product->id) }}
                                                </div>

                                                {{-- Add to Cart --}}
                                                <div class="product-cart-custom">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-2 ajax-add-to-cart"
                                                        data-product-id="{{ $product->id }}">

                                                        <i class="ec ec-add-to-cart"></i>
                                                        Add to Cart

                                                    </button>
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

        <!-- Brand Carousel -->
        <div class="mb-3">
            <!-- Carousel Wrapper -->
            <div class="js-slick-carousel u-slick my-1 brand-carousel" data-slides-show="5" data-slides-scroll="1"
                data-arrows="false" data-dots="false" data-autoplay="true" data-speed="600" data-infinite="true"
                data-responsive='[{
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
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
                @foreach ($brands as $brand)
                    <div class="js-slide px-2">
                        <!-- Brand Card Box with Border & Padding -->
                        <div class="border rounded bg-white d-flex justify-content-center align-items-center"
                            style="height: 95px;">
                            <a href="{{ route('brand', $brand->slug) }}"
                                class="d-flex justify-content-center align-items-center w-100 h-100">
                                <img class="img-fluid m-auto" style="max-height: 60px; object-fit: contain;"
                                    src="{{ $brand->logo }}" alt="Brand Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Brand Carousel -->

        <!-- Recently viewed -->
        @if ($recentProducts->count())
            <div class="mb-6 home-category-slider">
                <div
                    class="home-category-header d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">সম্প্রতি দেখা পণ্যসমূহ</h3>
                </div>
                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                    data-slides-show="7" data-slides-scroll="1" data-arrows="true" data-dots="false"
                    data-autoplay="true" data-speed="600" data-infinite="true"
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
                        <div class="js-slide px-1">
                            <div class="product-item remove-divider">
                                <div class="product-item__outer">
                                    <div class="product-item__inner p-2 p-md-3 border rounded bg-light">
                                        <div class="product-card-custom">

                                            {{-- Product Image --}}
                                            <div class="product-image-box rounded">
                                                <a href="{{ route('product', $product->slug) }}">
                                                    <img class="img-fluid" src="{{ asset($product->image) }}"
                                                        alt="{{ $product->name }}" loading="lazy">
                                                </a>
                                            </div>

                                            {{-- Product Name --}}
                                            <h5 class="product-title-custom">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="text-primary font-weight-bold">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>

                                            {{-- Product Price --}}
                                            <div class="product-price-custom text-black">
                                                ৳ {{ productPrice($product->id) }}
                                            </div>

                                            {{-- Add to Cart Button --}}
                                            <div class="product-cart-custom">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-2 ajax-add-to-cart"
                                                    data-product-id="{{ $product->id }}">
                                                    <i class="ec ec-add-to-cart"></i> Add to Cart
                                                </button>
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
