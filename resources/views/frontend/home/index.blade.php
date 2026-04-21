@extends('frontend.layouts.app')
@section('title', 'Home Page')
@push('header_script')

@endpush
@section('content')

    <!-- Home Banner Section Start -->
    @if ($mainBanners->count() > 0)
        <section class="section-t-space">
            <div class="custom-container">
                <div class="row m-auto d-flex justify-content-center">
                    @php
                        $count = $mainBanners->count();
                    @endphp

                    {{-- 1 Banner --}}
                    @if ($count == 1)

                        <div class="col-xl-12 col-md-12 px-0">
                            <a href="{{ $mainBanners->first()->url }}" class="banner-box">
                                <img class="lazy img-fluid" data-src="{{ asset($mainBanners->first()->image) }}">
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
    @endif
    <!-- Home Banner Section End -->

    <!-- Todays Deal Product Section Start -->
    @if ($todaysDeals->count() > 0)
        <section section class="section-t-space">
            <div class="custom-container">
                <div class="title slider-button">
                    <div class="title-flex">
                        <h3>Today Deal</h3>
                        <a href="{{ route('todays.deal') }}" class="light-blue">See all Deals</a>
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
                    @if ($todaysBanner)
                        <div class="col-xl-3 d-xl-block d-none">
                            <a href="{{ $todaysBanner->url }}" class="banner-box">
                                <img class="lazy img-fluid" data-src="{{ asset($todaysBanner->image) }}">
                            </a>
                        </div>
                    @endif

                    <div class="col-xl-{{ $todaysBanner == null ? '12' : '9' }}">
                        <div class="swiper product-five-slider product-option-box">
                            <div class="swiper-wrapper">
                                @foreach ($todaysDeals->chunk(2) as $chunk)
                                    <div class="swiper-slide">
                                        @foreach ($chunk as $deal)
                                            <div class="product-box-4-main">
                                                <div class="select-option-box" data-product="{{ $deal->product->id }}">
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
                                                                                    <a href="#!"
                                                                                        class="variation-option"
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
                                                            <div
                                                                class="qty-box mt-3 d-flex align-items-center gap-2 mb-2   ">

                                                                <button class="btn qty-btn qty-minus">
                                                                    <i class="ri-subtract-line"></i>
                                                                </button>

                                                                <input type="number"
                                                                    class="form-control qty-input text-center"
                                                                    value="1" min="1">

                                                                <button class="btn qty-btn qty-plus">
                                                                    <i class="ri-add-line"></i>
                                                                </button>

                                                            </div>

                                                            <button class="btn add-cart-btn">Add to cart</button>
                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                <i class="ri-close-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="productMain product-box-4 rounded-0">
                                                    <div class="product-image">
                                                        <a href="{{ route('product', $deal->product->slug) }}">
                                                            <img class="lazy img-fluid productImage"
                                                                data-src="{{ asset($deal->product->image) }}">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h5 class="sub-name productName">
                                                            {{ $deal->product->category->name }}
                                                        </h5>
                                                        <a href="{{ route('product', $deal->product->slug) }}"
                                                            class="name">
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
                                                        <h5 class="price">৳{{ productPrice($deal->product->id) }} </h5>
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
                            <div class="text-center">
                                <a href="{{ route('todays.deal') }}" class="btn btn-sm btn-load-more mt-0">See all
                                    Deals</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Todays Deal Product Section End -->


    <!-- Latest Product Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title justify-content-between d-sm-flex d-block">
                <h3 class="d-flex align-center">Latest Products<a href="{{ route('products') }}"
                        class="ms-2 light-blue">See
                        All Products</a>
                </h3>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-new">
                    <div class="row g-sm-4 g-3">
                        @foreach ($latestProducts as $latestProduct)
                            <div class="col-xxl-7-1 col-lg-3 col-md-4 col-6">
                                <div class="product-box-4-main">
                                    <div class="select-option-box" data-product="{{ $latestProduct->id }}">
                                        <div class="select-box">
                                            <div>

                                                @if ($latestProduct->variations && $latestProduct->variations->count() > 0)
                                                    @foreach ($latestProduct->variations->groupBy('attribute_id') as $variations)
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
                                            <a href="{{ route('product', $latestProduct->slug) }}">
                                                <img class="lazy img-fluid productImage"
                                                    data-src="{{ asset($latestProduct->image) }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">{{ $latestProduct->category->name }}</h5>
                                            <a href="{{ route('product', $latestProduct->slug) }}" class="name">
                                                <h5>{{ Str::limit($latestProduct->name, '20', '...') }}</h5>
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
                                            <h5 class="price">৳{{ productPrice($latestProduct->id) }}</h5>
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
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ route('products') }}" class="btn btn-sm btn-load-more">See All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fashion Product Section End -->

    @if ($middleBanners)
        <!-- Banner Section Start -->
        <section class="section-t-space">
            <div class="custom-container">
                <a href="{{ $middleBanners->url }}" class="banner-box">
                    <img class="lazy img-fluid" data-src="{{ asset($middleBanners->image) }}">
                </a>
            </div>
        </section>
        <!-- Banner Section End -->
    @endif


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


    @if ($bottomBanners)
        <!-- Banner Section Start -->
        <section class="section-t-space">
            <div class="custom-container">
                <a href="{{ $bottomBanners->url }}" class="banner-box">
                    <img class="lazy img-fluid" data-src="{{ asset($bottomBanners->image) }}">
                </a>
            </div>
        </section>
        <!-- Banner Section End -->
    @endif


@endsection

@push('footer_script')


   
@endpush
