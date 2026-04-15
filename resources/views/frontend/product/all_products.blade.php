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
    </style>
@endpush
@section('content')

    <!-- Shop Section Start -->
    <section class="section-t-space shop-section pt-4">
        <div class="custom-container">
            <div class="row">
                <div class="col-custom-3">
                    <div class="left-box">
                        <div class="shop-left-sidebar">
                            <button class="back-button btn">
                                <i class="ri-arrow-left-line"></i> Back
                            </button>

                            <div class="accordion custom-accordion-2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo">
                                            <span>Categories</span>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="category-list custom-padding custom-height">
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <div class="form-check category-list-box">
                                                            <input class="checkbox_animated" type="checkbox"
                                                                value="{{ $category->id }}" id="cat{{ $category->id }}">
                                                            <label class="form-check-label" for="cat{{ $category->id }}">
                                                                <span class="name">{{ $category->name }}</span>
                                                                <span
                                                                    class="number">({{ $category->products_count }})</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseThree">
                                            <span>Price</span>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="price-range-slider">
                                                <div class="slider-container">
                                                    <div class="range-slider">
                                                        <div class="range-fill"></div>
                                                        <input type="range" id="minRange" min="1" max="50000"
                                                            value="1" step="100">
                                                        <input type="range" id="maxRange" min="100" max="50000"
                                                            value="20000" step="100">
                                                    </div>
                                                    <div class="price-values">
                                                        <span id="min-price">0</span>
                                                        <span class="dash">-</span>
                                                        <span id="max-price">20000</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseFive">
                                            <span>Customer Review</span>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="category-list custom-padding">
                                                <li>
                                                    <div class="form-check category-list-box">
                                                        <input class="checkbox_animated" type="checkbox">
                                                        <div class="form-check-label category-rating-box">
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
                                                            <span class="text-content">(31)</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check category-list-box">
                                                        <input class="checkbox_animated" type="checkbox">
                                                        <div class="form-check-label category-rating-box">
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
                                                            <span class="text-content">(15)</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check category-list-box">
                                                        <input class="checkbox_animated" type="checkbox">
                                                        <div class="form-check-label category-rating-box">
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
                                                            <span class="text-content">(24)</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check category-list-box">
                                                        <input class="checkbox_animated" type="checkbox">
                                                        <div class="form-check-label category-rating-box">
                                                            <ul class="rating">
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
                                                                <li>
                                                                    <i class="ri-star-fill"></i>
                                                                </li>
                                                            </ul>
                                                            <span class="text-content">(10)</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check category-list-box">
                                                        <input class="checkbox_animated" type="checkbox">
                                                        <div class="form-check-label category-rating-box">
                                                            <ul class="rating">
                                                                <li>
                                                                    <i class="ri-star-fill fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill"></i>
                                                                </li>
                                                            </ul>
                                                            <span class="text-content">(08)</span>
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
                </div>

                <div class="col-custom-9">
                    <div class="show-button show-button-2 mb-0">
                        <div class="top-filter-menu">
                            <div class="category-dropdown">
                                <div class="filter-button d-inline-block d-lg-none">
                                    <a href="#!"><i class="ri-equalizer-2-line"></i> Filter Menu</a>
                                </div>
                                <div class="d-flex align-items-center dropdown-box">
                                    <h5 class="text-content">Sort By :</h5>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown">
                                            <span>Most Popular</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" id="pop" href="#!">Popularity</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="low" href="#!">Low - High
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="high" href="#!">High - Low
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="rating" href="#!">Average
                                                    Rating</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="aToz" href="#!">A - Z
                                                    Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="zToa" href="#!">Z - A
                                                    Order</a>
                                            </li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2
                    product-list-section">

                    </div>

                    <nav class="custom-pagination">
                        {{-- <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#!">
                                    <i class="ri-arrow-left-s-line"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#!">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">
                                    <span>3</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">
                                    <i class="ri-arrow-right-s-line"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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
    <script src="{{ asset('frontend') }}/assets/js/range-slider.js"></script>

    <!-- Filter Sidebar js -->
    <script src="{{ asset('frontend') }}/assets/js/filter-sidebar.js"></script>

    <!-- Change Grid js -->
    <script src="{{ asset('frontend') }}/assets/js/change-grid.js"></script>

    <script>
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
    </script>
@endpush
