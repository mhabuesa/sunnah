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

        /* Professional Category Container & Sidebar Style */
        .category-accordion-item {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            margin-bottom: 8px;
            background-color: #fff;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .category-accordion-item:hover {
            border-color: #d1d5db;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .category-row {
            cursor: pointer;
            user-select: none;
            padding: 10px 12px;
            width: 100%;
        }

        .category-row .control-label {
            cursor: pointer;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0;
        }

        .category-row:hover .control-label {
            color: #0d3123;
        }

        .category-arrow {
            transition: transform 0.25s ease;
            flex-shrink: 0;
            font-size: 12px;
            color: #6b7280;
        }

        .category-row[aria-expanded="true"] .category-arrow {
            transform: rotate(180deg);
        }

        /* Smooth slide wrapper */
        .subcategory-list {
            display: none;
            overflow: hidden;
            margin: 0 !important;
            padding: 0 !important;
        }

        .subcategory-inner {
            padding: 8px 12px 8px 24px;
            border-top: 1px solid #f3f4f6;
            background-color: #f9fafb;
        }

        .subcategory-inner .form-group {
            margin-bottom: 1px !important;
        }

        .subcategory-inner label {
            cursor: pointer;
            color: #4b5563;
            font-size: 13px;
            transition: color 0.2s;
            margin-bottom: 0;
        }

        .subcategory-inner label:hover {
            color: #111827;
        }

        /* Mobile Drawer Styling */
        .mobile-category-drawer {
            position: fixed;
            top: 0;
            left: -320px;
            width: 300px;
            height: 100%;
            background: #fff;
            z-index: 99999;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.15);
            transition: left 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        .mobile-category-drawer.open {
            left: 0;
        }

        .mobile-drawer-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99998;
            display: none;
        }

        /* Modern & Premium Mobile Category Button Style */
        #mobileCategoryToggle {
            /* background: linear-gradient(135deg, #0d3123 0%, #164e3b 100%) !important; */
            border: none !important;
            border-radius: 8px !important;
            color: #000000 !important;
            font-weight: 600;
            font-size: 12px;
            padding: 12px 12px !important;
            box-shadow: 0 4px 12px rgba(13, 49, 35, 0.2);
            transition: all 0.3s ease;
        }

        #mobileCategoryToggle:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(13, 49, 35, 0.3);
            /* background: linear-gradient(135deg, #164e3b 0%, #0d3123 100%) !important; */
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
@endpush
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Sunnah
                            Shopping
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">

            <!-- Desktop Sidebar (Hidden on Mobile) -->
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-6">
                    <div class="pb-4 mb-4" id="categoryAccordion">
                        <h4 class="font-size-14 mb-3 font-weight-bold text-dark">Browse Categories</h4>

                        @foreach ($sunnahCategories as $category)
                            <div class="category-accordion-item">
                                <div class="category-row d-flex align-items-center justify-content-between"
                                    data-target="#subcategories{{ $category->id }}" role="button" tabindex="0"
                                    aria-expanded="false">
                                    <div class="custom-control p-0 flex-grow-1">
                                        <label class="control-label">{{ $category->category }}</label>
                                    </div>
                                    <i class="fa fa-chevron-down category-arrow"></i>
                                </div>

                                <div class="subcategory-list" id="subcategories{{ $category->id }}">
                                    <div class="subcategory-inner">
                                        @foreach ($category->subcategories as $subcategory)
                                            <div class="form-group">
                                                <div class="custom-control p-0">
                                                    <label class="control-label subcategory-filter-btn"
                                                        data-id="{{ $subcategory->id }}">
                                                        {{ $subcategory->subcategory }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if ($category->subcategories->isEmpty())
                                            <small class="text-muted">No subcategories available.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Side Products Area -->
            <div class="col-12 col-xl-9 col-wd-9gdot5">

                <!-- Shop-control-bar Title -->
                <div class="flex-center-between mb-3 align-items-center flex-wrap">
                    <h3 class="font-size-25 mb-0">Sunnah Shopping</h3>

                    <!-- Mobile Category Trigger Button (Visible only on mobile/tablet) -->
                    <div class="d-xl-none mt-3 mb-3 px-0">
                        <button class="btn d-flex align-items-center justify-content-end"
                            id="mobileCategoryToggle">
                            <i class="fa fa-th-large mr-2 font-size-15"></i>
                            <span>Browse Categories</span>
                            <i class="fa fa-chevron-down ml-2 font-size-12"></i>
                        </button>
                    </div>
                </div>
                <!-- End shop-control-bar Title -->

                <!-- Mobile Drawer & Overlay -->
                <div id="mobileCategoryDrawer" class="mobile-category-drawer">
                    <div
                        class="mobile-drawer-header d-flex align-items-center justify-content-between p-3 border-bottom bg-light">
                        <h4 class="font-size-16 font-weight-bold mb-0 text-dark">Categories</h4>
                        <button type="button" class="btn border-0 bg-transparent font-size-22 p-0 text-dark"
                            id="closeMobileDrawer">&times;</button>
                    </div>
                    <div class="mobile-drawer-body p-3 overflow-auto flex-grow-1">
                        @foreach ($sunnahCategories as $category)
                            <div class="category-accordion-item">
                                <div class="category-row d-flex align-items-center justify-content-between"
                                    data-target="#mob-subcategories{{ $category->id }}" role="button" tabindex="0"
                                    aria-expanded="false">
                                    <div class="custom-control p-0 flex-grow-1">
                                        <label class="control-label">{{ $category->category }}</label>
                                    </div>
                                    <i class="fa fa-chevron-down category-arrow"></i>
                                </div>

                                <div class="subcategory-list" id="mob-subcategories{{ $category->id }}">
                                    <div class="subcategory-inner">
                                        @foreach ($category->subcategories as $subcategory)
                                            <div class="form-group mb-2">
                                                <div class="custom-control p-0">
                                                    <label class="control-label subcategory-filter-btn"
                                                        data-id="{{ $subcategory->id }}">
                                                        {{ $subcategory->subcategory }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if ($category->subcategories->isEmpty())
                                            <small class="text-muted">No subcategories available.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="mobileDrawerOverlay" class="mobile-drawer-overlay"></div>

                <!-- Shop Body -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab" data-target-group="groups">

                        <!-- Loading Spinner Container -->
                        <div id="product-loading" style="display: none; text-align: center; padding: 40px;">
                            <div class="spinner-border text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading products...</p>
                        </div>

                        <div class="row">
                            <ul id="product-list" class="row list-unstyled products-group no-gutters w-100">
                                @include('frontend.sunnah_shopping.partials.product_list', [
                                    'products' => $products,
                                ])
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Shop Body -->

                <!-- Shop Pagination -->
                <nav class="d-md-flex justify-content-end align-items-center border-top pt-3"
                    aria-label="Page navigation example">
                    <div id="product-pagination">
                        @include('frontend.sunnah_shopping.partials.pagination', ['products' => $products])
                    </div>
                </nav>
                <!-- End Shop Pagination -->
            </div>

        </div>
    </div>

@endsection

@push('footer_script')
    <script>
        let currentSubcategoryId = '';
        let currentPage = 1;

        $(document).ready(function() {
            // Category accordion toggle for both desktop and mobile
            $(document).on('click', '.category-row', function() {
                toggleCategory($(this));
            });

            function toggleCategory($row) {
                const target = $row.data('target');
                const $subcategoryList = $(target);
                const isExpanded = $row.attr('aria-expanded') === 'true';

                // Close other categories inside the same container
                const $parentContainer = $row.closest('.border-bottom, .mobile-drawer-body');
                $parentContainer.find('.category-row').not($row).attr('aria-expanded', 'false').removeClass(
                    'active');
                $parentContainer.find('.subcategory-list').not($subcategoryList).stop(true, true).slideUp(250);

                if (isExpanded) {
                    $row.attr('aria-expanded', 'false').removeClass('active');
                    $subcategoryList.stop(true, true).slideUp(250);
                } else {
                    $row.attr('aria-expanded', 'true').addClass('active');
                    $subcategoryList.stop(true, true).slideDown(250);
                }
            }

            // Mobile Drawer Toggle Events
            $('#mobileCategoryToggle, #mobileDrawerOverlay, #closeMobileDrawer').on('click', function() {
                $('#mobileCategoryDrawer').toggleClass('open');
                $('#mobileDrawerOverlay').toggle();
            });

            // Subcategory Click Event (AJAX Filter)
            $(document).on('click', '.subcategory-filter-btn', function(e) {
                e.preventDefault();
                $('.subcategory-filter-btn').removeClass('text-success font-weight-bold');
                $(this).addClass('text-success font-weight-bold');

                currentSubcategoryId = $(this).data('id');
                currentPage = 1;
                fetchProducts();

                // Close mobile drawer automatically on subcategory selection
                if ($('#mobileCategoryDrawer').hasClass('open')) {
                    $('#mobileCategoryDrawer').removeClass('open');
                    $('#mobileDrawerOverlay').hide();
                }
            });

            // Pagination Click Event (AJAX)
            $(document).on('click', '.ajax-pagination-link', function(e) {
                e.preventDefault();
                let href = $(this).attr('href');
                if (href && href.includes('page=')) {
                    let page = href.split('page=')[1].split('&')[0];
                    if (page) {
                        currentPage = page;
                        fetchProducts();
                    }
                }
            });

            function fetchProducts() {
                $('#product-loading').show();
                $('#product-list').css('opacity', '0.3');

                $.ajax({
                    url: "{{ route('sunnah.filter.products') }}",
                    type: "GET",
                    data: {
                        subcategory_id: currentSubcategoryId,
                        page: currentPage
                    },
                    success: function(response) {
                        $('#product-loading').hide();
                        $('#product-list').css('opacity', '1');
                        $('#product-list').html(response.product_html);
                        $('#product-pagination').html(response.pagination_html);

                        // Smooth scroll to top of product list
                        $('html, body').animate({
                            scrollTop: $('#product-list').offset().top - 120
                        }, 300);
                    },
                    error: function(xhr) {
                        $('#product-loading').hide();
                        $('#product-list').css('opacity', '1');
                        console.log(xhr.responseText);
                        alert('Something went wrong. Please try again.');
                    }
                });
            }
        });
    </script>
@endpush
