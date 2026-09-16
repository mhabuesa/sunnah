@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- Banner Section -->
    @if ($mainBanner)
        <div class="container">
            <div class="mb-4">
                <div class="banner-section">
                    <a href="{{ $mainBanner->url }}">
                        <img src="{{ asset($mainBanner->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
                            loading="eager" fetchpriority="high" decoding="async">
                    </a>
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
        <!-- Trending products -->
        <div class="mb-6">
            <div
                class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Todays Deal</h3>
                <a class="d-block text-gray-16" href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html">Go
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
                                                    src="{{ asset($product->product->image) }}" alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">৳{{ productPrice($product->product->id) }}</div>
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
        <!-- End Trending products -->

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
                <a class="d-block text-gray-16" href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html">Go
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
                                                    <div class="text-gray-100">৳{{ productPrice($latestProduct->id) }}
                                                    </div>
                                                </div>

                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
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
        <!-- Featured Product -->
        <div class="mb-6">
            <div class="position-relative">
                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Featured Product</h3>
                </div>
                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                    data-slides-show="7" data-slides-scroll="1"
                    data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-1"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-responsive='[{
                            "breakpoint": 1400,
                            "settings": {
                            "slidesToShow": 6
                            }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                                "slidesToShow": 4
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
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img2.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img3.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img4.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img5.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img6.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img7.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Recently viewed -->
    </div>

    <div class="container">
        <!-- Recently viewed -->
        <div class="mb-6">
            <div class="position-relative">
                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Recently Viewed</h3>
                </div>
                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                    data-slides-show="7" data-slides-scroll="1"
                    data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-1"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-responsive='[{
                            "breakpoint": 1400,
                            "settings": {
                            "slidesToShow": 6
                            }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                                "slidesToShow": 4
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
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img2.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img3.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img4.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img5.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img6.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img7.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html"
                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                        <h5 class="mb-1 product-item__title"><a
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="text-blue font-weight-bold">Wireless Audio System Multiroom 360
                                                degree Full base audio</a></h5>
                                        <div class="mb-2">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset('frontend') }}/temp/img/212X200/img1.jpg"
                                                    alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                                class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
