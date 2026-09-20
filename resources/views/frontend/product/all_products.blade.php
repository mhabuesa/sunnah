@extends('frontend.layouts.app')
@section('title', 'All Product')
@push('header_script')
    <style>
        .loading {
            text-align: center;
            padding: 50px;
        }

        .select-option-box {
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }

        .select-option-box.active {
            opacity: 1;
            visibility: visible;
        }

        .current {
            color: #fff !important;
        }

        .irs-bar {
            background: rgb(13, 49, 35) !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp2/vendor/ion-rangeslider/css/ion.rangeSlider.css">
@endpush
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Categories</h4>

                        @foreach ($categories->take(7) as $category)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input category-filter"
                                        id="category{{ $category->id }}" value="{{ $category->id }}">

                                    <label class="custom-control-label" for="category{{ $category->id }}">
                                        {{ $category->name }}
                                        <span class="text-gray-25 font-size-12 font-weight-normal">
                                            ({{ $category->products_count }})
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <!-- End First 5 Brands -->


                        @if ($categories->count() > 7)

                            <!-- Remaining Categories -->
                            <div class="collapse" id="collapseCategory">

                                @foreach ($categories->skip(7) as $category)
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input category-filter"
                                                id="category{{ $category->id }}" value="{{ $category->id }}">

                                            <label class="custom-control-label" for="category{{ $category->id }}">
                                                {{ $category->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                    ({{ $category->products_count }})
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- End Remaining Categories -->


                            <!-- Show More / Less -->
                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false"
                                aria-controls="collapseCategory">

                                <span class="link__icon text-gray-27 bg-white">
                                    <span class="link__icon-inner">+</span>
                                </span>

                                <span class="link-collapse__default">Show more</span>
                                <span class="link-collapse__active">Show less</span>
                            </a>
                            <!-- End Show More / Less -->

                        @endif
                    </div>

                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>

                        <!-- First 5 Brands -->
                        @foreach ($brands->take(7) as $brand)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input brand-filter"
                                        id="brand{{ $brand->id }}" value="{{ $brand->id }}">

                                    <label class="custom-control-label" for="brand{{ $brand->id }}">
                                        {{ $brand->name }}
                                        <span class="text-gray-25 font-size-12 font-weight-normal">
                                            ({{ $brand->products_count }})
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <!-- End First 5 Brands -->


                        @if ($brands->count() > 7)

                            <!-- Remaining Brands -->
                            <div class="collapse" id="collapseBrand">

                                @foreach ($brands->skip(7) as $brand)
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input brand-filter"
                                                id="brand{{ $brand->id }}" value="{{ $brand->id }}">

                                            <label class="custom-control-label" for="brand{{ $brand->id }}">
                                                {{ $brand->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                    ({{ $brand->products_count }})
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- End Remaining Brands -->


                            <!-- Show More / Less -->
                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false"
                                aria-controls="collapseBrand">

                                <span class="link__icon text-gray-27 bg-white">
                                    <span class="link__icon-inner">+</span>
                                </span>

                                <span class="link-collapse__default">Show more</span>
                                <span class="link-collapse__active">Show less</span>
                            </a>
                            <!-- End Show More / Less -->

                        @endif

                    </div>

                    <div class="range-slider">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                        <!-- Range Slider -->
                        <input class="bg-color-red js-range-slider" type="range"
                            data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                            data-type="double" data-grid="false" data-hide-from-to="true" data-prefix="৳" data-min="0"
                            data-max="10000" data-from="0" data-to="10000" data-result-min="#rangeSliderExample3MinResult"
                            data-result-max="#rangeSliderExample3MaxResult">
                        <!-- End Range Slider -->
                        <div class="mt-1 text-gray-111 d-flex mb-4 d-flex align-items-center justify-content-between">
                            <div class="">
                                <span>৳</span>
                                <span id="rangeSliderExample3MinResult" class=""></span>
                            </div>
                            <div class="">
                                <span>৳</span>
                                <span id="rangeSliderExample3MaxResult" class=""></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <div class="flex-center-between mb-3">
                    <h3 class="font-size-25 mb-0">Shop</h3>
                </div>
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <div class="py-1 d-flex justify-content-end">
                    <div class="d-flex">
                        <form method="get">
                            <!-- Select -->
                            <select id="product-sort"
                                class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="">Sort By</option>

                                <option value="low">
                                    Price: Low to High
                                </option>

                                <option value="high">
                                    Price: High to Low
                                </option>

                                <option value="aToz">
                                    Name: A to Z
                                </option>

                                <option value="zToa">
                                    Name: Z to A
                                </option>

                                <option value="pop">
                                    Popular
                                </option>
                            </select>
                            <!-- End Select -->
                        </form>
                    </div>
                </div>
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <div class="row">
                            <ul id="product-list" class="row list-unstyled products-group no-gutters w-100">
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
                <!-- End Shop Body -->
                <!-- Shop Pagination -->
                <nav class="d-md-flex justify-content-end align-items-center border-top pt-3"
                    aria-label="Page navigation example">
                    {{-- <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                        <li class="page-item"><a class="page-link current" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul> --}}

                    <div id="product-pagination">
                    </div>
                </nav>
                <!-- End Shop Pagination -->
            </div>
        </div>
    </div>

    @if ($banner)
        <!-- Banner Section Start -->
        <section class="section-t-space pt-2">
            <div class="custom-container">
                <a href="{{ $banner->url }}" class="banner-box">
                    <img class="lazy img-fluid" data-src="{{ asset($banner->image) }}">
                </a>
            </div>
        </section>
        <!-- Banner Section End -->
    @endif

@endsection

@push('footer_script')
    <!-- Range Slider js -->
    <script src="{{ asset('frontend') }}/temp/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    {{-- <script>
        let filters = {
            categories: [],
            min_price: 1,
            max_price: 20000,
            sort: null,
            rating: null,
            page: 1,
            search: ''
        };

        // =========================
        // LOAD PRODUCTS
        // =========================
        function loadProducts(page = 1) {
            filters.page = page;

            $('.product-list-section').html('<div class="loading">Loading...</div>');

            $.ajax({
                url: "{{ route('products.ajax') }}",
                method: "GET",
                data: filters,
                success: function(res) {
                    $('.product-list-section').html(res.html);
                    $('.custom-pagination').html(res.pagination);
                }
            });


        }

        loadProducts();

        // =========================
        // CATEGORY FILTER (delegated safe)
        // =========================
        $(document).on('change', '.checkbox_animated', function() {
            let id = $(this).val();

            if ($(this).is(':checked')) {
                if (!filters.categories.includes(id)) {
                    filters.categories.push(id);
                }
            } else {
                filters.categories = filters.categories.filter(c => c != id);
            }

            loadProducts(1);
        });

        // =========================
        // PRICE FILTER
        // =========================
        let priceTimeout;

        $(document).on('input', '#minRange, #maxRange', function() {
            clearTimeout(priceTimeout);

            priceTimeout = setTimeout(() => {
                filters.min_price = parseInt($('#minRange').val()) || 0;
                filters.max_price = parseInt($('#maxRange').val()) || 0;

                loadProducts(1);
            }, 400);
        });

        // =========================
        // SORT
        // =========================
        $(document).on('click', '.dropdown-item', function() {
            filters.sort = $(this).attr('id');
            loadProducts(1);
        });

        // =========================
        // PAGINATION
        // =========================
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            let page = $(this).attr('href').split('page=')[1];
            loadProducts(page);
        });

        // =========================
        // ⭐ SELECT OPTIONS FIX (THIS IS THE MAIN FIX)
        // =========================
        $(document).on('click', '.select-btn', function(e) {
            e.preventDefault();

            let box = $(this).closest('.product-box-4-main');

            // toggle only this product overlay
            box.find('.select-option-box').toggleClass('active');
        });

        // close button
        $(document).on('click', '.close-btn', function() {
            $(this).closest('.product-box-4-main')
                .find('.select-option-box')
                .removeClass('active');
        });
    </script> --}}

    <script>
        $(document).ready(function() {

            function loadProducts(page = 1) {

                let categories = [];
                let brands = [];


                // Categories
                $('.category-filter:checked').each(function() {
                    categories.push($(this).val());
                });


                // Brands
                $('.brand-filter:checked').each(function() {
                    brands.push($(this).val());
                });


                // Price
                let minPrice = '';
                let maxPrice = '';

                let priceSlider = $('.js-range-slider').data('ionRangeSlider');

                if (priceSlider) {
                    minPrice = priceSlider.result.from;
                    maxPrice = priceSlider.result.to;
                }


                // Sort
                let sort = $('#product-sort').val();


                $.ajax({

                    url: '{{ route('ajax.products') }}',

                    type: 'GET',

                    data: {
                        categories: categories,
                        brands: brands,
                        min_price: minPrice,
                        max_price: maxPrice,
                        sort: sort,
                        page: page
                    },

                    beforeSend: function() {

                        $('#product-list').css('opacity', '0.5');

                    },

                    success: function(response) {

                        $('#product-list').html(response.html);

                        $('#product-pagination').html(response.pagination);

                    },

                    error: function(xhr) {

                        console.log(xhr.responseText);

                    },

                    complete: function() {

                        $('#product-list').css('opacity', '1');

                    }

                });
            }


            // ==========================================
            // FIRST PAGE LOAD
            // ==========================================

            loadProducts(1);


            // ==========================================
            // CATEGORY FILTER
            // ==========================================

            $(document).on('change', '.category-filter', function() {

                loadProducts(1);

            });


            // ==========================================
            // BRAND FILTER
            // ==========================================

            $(document).on('change', '.brand-filter', function() {

                loadProducts(1);

            });


            // ==========================================
            // SORT
            // ==========================================

            $(document).on('change', '#product-sort', function() {

                loadProducts(1);

            });


            // ==========================================
            // PRICE RANGE
            // ==========================================

            $(document).on('change', '.js-range-slider', function() {

                loadProducts(1);

            });


            // ==========================================
            // PAGINATION
            // ==========================================

            $(document).on(
                'click',
                '#product-pagination .page-link',
                function(e) {

                    e.preventDefault();

                    let url = $(this).attr('href');

                    if (!url || url === '#') {
                        return;
                    }

                    let urlObject = new URL(url);

                    let page = urlObject.searchParams.get('page');

                    if (page) {
                        loadProducts(page);
                    }

                }
            );

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.js-range-slider').ionRangeSlider({

                onStart: function(data) {
                    $('#rangeSliderExample3MinResult').text(data.from);
                    $('#rangeSliderExample3MaxResult').text(data.to);
                },

                onChange: function(data) {
                    $('#rangeSliderExample3MinResult').text(data.from);
                    $('#rangeSliderExample3MaxResult').text(data.to);
                }

            });

        });
    </script>
@endpush
