@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- Banner Section -->
        @if ($mainBanner)
        <div class="container">
            {{-- <div class="col-xl pr-xl-2 mb-4 mb-xl-0">
                <div class="bg-img-hero mr-xl-1 height-410-xl  overflow-hidden"
                    style="background-image: url({{asset('frontend')}}/assets/img/1920X422/img1.jpg);">
                    <div class="js-slick-carousel u-slick" data-autoplay="true" data-speed="7000"
                        data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start ml-9 mb-3 mb-md-5">
                        <div class="js-slide bg-img-hero-center">
                            <div class="row height-410-xl py-7 py-md-0 mx-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col-6 col-md-6 mt-md-8">
                                    <h1 class="font-size-64 text-lh-57 font-weight-light" data-scs-animation-in="fadeInUp">
                                        THE NEW <span class="d-block font-size-55">STANDARD</span>
                                    </h1>
                                    <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                    </h6>
                                    <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                        <span class="font-size-13">FROM</span>
                                        <div class="font-size-50 font-weight-bold text-lh-45">
                                            <sup class="">$</sup>749<sup class="">99</sup>
                                        </div>
                                    </div>
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                        Start Buying
                                    </a>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-center ml-auto ml-md-0"
                                    data-scs-animation-in="zoomIn" data-scs-animation-delay="500">
                                    <img class="img-fluid" src="{{asset('frontend')}}/assets/img/500X380/img1.png" alt="Image Description">
                                </div>
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center">
                            <div class="row height-410-xl py-7 py-md-0 mx-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col-6 col-md-6 mt-md-8">
                                    <h1 class="font-size-64 text-lh-57 font-weight-light"
                                        data-scs-animation-in="slideInLeft">
                                        THE NEW <span class="d-block font-size-55">STANDARD</span>
                                    </h1>
                                    <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="slideInLeft"
                                        data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                    </h6>
                                    <div class="mb-4" data-scs-animation-in="slideInLeft" data-scs-animation-delay="400">
                                        <span class="font-size-13">FROM</span>
                                        <div class="font-size-50 font-weight-bold text-lh-45">
                                            <sup class="">$</sup>749<sup class="">99</sup>
                                        </div>
                                    </div>
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                        Start Buying
                                    </a>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-center ml-auto ml-md-0"
                                    data-scs-animation-in="slideInRight" data-scs-animation-delay="800">
                                    <img class="img-fluid" src="{{asset('frontend')}}/assets/img/500X380/img2.png" alt="Image Description">
                                </div>
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center">
                            <div class="row height-410-xl py-7 py-md-0 mx-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col-6 col-md-6 mt-md-8">
                                    <h1 class="font-size-64 text-lh-57 font-weight-light" data-scs-animation-in="fadeInUp">
                                        THE NEW <span class="d-block font-size-55">STANDARD</span>
                                    </h1>
                                    <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="200">UNDER FAVORABLE SMARTWATCHES
                                    </h6>
                                    <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                        <span class="font-size-13">FROM</span>
                                        <div class="font-size-50 font-weight-bold text-lh-45">
                                            <sup class="">$</sup>749<sup class="">99</sup>
                                        </div>
                                    </div>
                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                        class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                        Start Buying
                                    </a>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-center ml-auto ml-md-0"
                                    data-scs-animation-in="zoomIn" data-scs-animation-delay="500">
                                    <img class="img-fluid" src="{{asset('frontend')}}/assets/img/500X380/img3.png" alt="Image Description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="mb-4">
                <div class="banner-section">
                    <a href="{{ $mainBanner->url }}">
                        <img src="{{ asset($mainBanner->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
                            loading="eager" fetchpriority="high" decoding="async">
                    </a>
                </div>
            </div> --}}

            <div class="col-xl pr-xl-2 mb-4 mb-xl-0">
                <div class="bg-img-hero mr-xl-1 height-410-xl overflow-hidden">

                    <div class="js-slick-carousel u-slick" data-autoplay="true" data-speed="7000" data-arrows="true"
                        data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-center mb-3">


                        <div class="js-slide bg-img-hero-center">
                            <a href="{{ $mainBanner->url ?? '#' }}">
                                <img src="{{ asset($mainBanner->image) }}" alt="Banner"
                                    class="img-fluid w-100 banner-image" loading="eager" fetchpriority="high"
                                    decoding="async">
                            </a>
                        </div>
                        <div class="js-slide bg-img-hero-center">
                            <a href="{{ $mainBanner->url ?? '#' }}">
                                <img src="{{ asset($mainBanner->image) }}" alt="Banner"
                                    class="img-fluid w-100 banner-image" loading="eager" fetchpriority="high"
                                    decoding="async">
                            </a>
                        </div>
                        <div class="js-slide bg-img-hero-center">
                            <a href="{{ $mainBanner->url ?? '#' }}">
                                <img src="{{ asset($mainBanner->image) }}" alt="Banner"
                                    class="img-fluid w-100 banner-image" loading="eager" fetchpriority="high"
                                    decoding="async">
                            </a>
                        </div>


                    </div>

                </div>
            </div>


        </div>
    @endif

    {{-- <div class="container category-wrapper d-none d-xl-block mb-4">
        <div class="category-box">

            <div class="row g-0">

                @foreach ($categories as $category)
                    <div class="col">
                        <a href="#" class="category-item">
                            <div class="category-icon">
                                <img src="{{ asset($category->logo) }}" alt="Food" loading="lazy" decoding="async"
                                    width="40" height="40">
                            </div>
                            <span>{{ $category->name }}</span>
                        </a>
                    </div>
                @endforeach

                <div class="col">
                    <a href="#" class="category-item category-view-all">
                        <div class="category-icon view-all">
                            →
                        </div>
                        <span class="text-center">View All Categories</span>
                    </a>
                </div>

            </div>

        </div>
    </div> --}}

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
            <div class="mb-6">
                <div
                    class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Todays Deal</h3>
                    <a class="d-block text-gray-16"
                        href="{{ route('todays.deal') }}">Go
                        to Todays Deal
                        <i class="ec ec-arrow-right-categproes"></i></a>
                </div>
                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-3 pb-6 px-1"
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
                            <div class="product-item">
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
        <!-- Latest Prodcut Section -->
        <div class="mb-6">
            <div
                class="d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Latest products</h3>
                <a class="d-block text-gray-16" href="{{ route('products') }}">Go
                    to All products
                    <i class="ec ec-arrow-right-categproes"></i></a>
            </div>
            <!-- Latest Content -->
            <div class="tab-content">
                <div class="pt-0">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach ($latestProducts as $latestProduct)
                            <li class="col-6 col-md-3 col-lg-2 product-item ">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3 ">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="{{ route('product', $latestProduct->slug) }}"
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
                                                    <div class="text-gray-100">৳ {{ productPrice($latestProduct->id) }}
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


    <div class="container">
        <!-- Recently viewed -->
        @if ($recentProducts->count())
            <div class="mb-6">
                <div
                    class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Recently Viewed Products</h3>
                </div>
                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-3 pb-6 px-1"
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
                            <div class="product-item">
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
