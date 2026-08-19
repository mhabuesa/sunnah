@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- Banner Section -->
    @if ($mainBanners->count() > 0)
        <div class="container">
            <div class="mb-4">
                <div class="banner-section">
                    <a href="{{ $mainBanners->first()->url }}">
                        <img src="{{ asset($mainBanners->first()->image) }}" alt="Banner"
                            class="img-fluid w-100 banner-image" loading="eager" fetchpriority="high" decoding="async">
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="container category-wrapper d-none d-xl-block mb-4">
        <div class="category-box">

            <div class="row g-0">

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Food</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates2.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Honey</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Black Seed</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates2.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Quran</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Miswak</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates2.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Dates</span>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="category-item">
                        <div class="category-icon">
                            <img src="{{ asset('frontend') }}/temp/img/category/dates.png" alt="Food" loading="lazy"
                                decoding="async" width="40" height="40">
                        </div>
                        <span>Attar</span>
                    </a>
                </div>

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
    </div>

    <div class="container">
        <!-- Full banner -->
        @if ($middleBanners)
            <div class="mb-4">
                <a href="{{ $middleBanners->url }}" class="d-block text-gray-90">
                    <img src="{{ asset($middleBanners->image) }}" alt="Banner" class="img-fluid w-100 banner-image"
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
                <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Trending products</h3>
                <a class="d-block text-gray-16" href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html">Go
                    to Trending products
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
        <!-- End Trending products -->

        <div class="mb-6">
            <div class="row">
                <div class="col-md-6 col-lg-8 mb-5 m-auto">
                    <div class="h-100">
                        <div class="bg-gray-17">
                            <a href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html"
                                class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="ml-md-7 mt-6 mt-md-0 ml-4 text-gray-90">
                                        <h2 class="font-size-28 font-size-20-lg max-width-270 text-lh-1dot2">G9 Laptops
                                            with Ultra 4K HD Display</h2>
                                        <p class="font-size-18 font-size-14-lg text-gray-90 font-weight-light">and the
                                            fastest Intel Core i7 processor ever</p>
                                        <div class="text-lh-28">
                                            <span class="font-size-18 font-size-14-lg font-weight-light">from</span>
                                            <span class="font-size-46 font-size-30-lg font-weight-semi-bold"><sup
                                                    class="">$</sup>399</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{ asset('frontend') }}/temp/img/446X262/img1.jpg"
                                        alt="Image Description">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 m-auto">
                    <div class="h-100">
                        <a href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html" class="d-block">
                            <img class="img-fluid" src="{{ asset('frontend') }}/temp/img/446X262/img3.jpg"
                                alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
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

        <!-- Brand Carousel -->
        <div class="py-2 border-top border-bottom mb-8">
            <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1"
                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                data-responsive='[{
                            "breakpoint": 992,
                            "settings": {
                                "slidesToShow": 2
                            }
                        }, {
                            "breakpoint": 768,
                            "settings": {
                                "slidesToShow": 1
                            }
                        }, {
                            "breakpoint": 554,
                            "settings": {
                                "slidesToShow": 1
                            }
                        }]'>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img1.png" alt="Image Description">
                    </a>
                </div>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img2.png" alt="Image Description">
                    </a>
                </div>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img3.png" alt="Image Description">
                    </a>
                </div>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img4.png" alt="Image Description">
                    </a>
                </div>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img5.png" alt="Image Description">
                    </a>
                </div>
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                            src="{{ asset('frontend') }}/temp/img/200X60/img6.png" alt="Image Description">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
@endsection
