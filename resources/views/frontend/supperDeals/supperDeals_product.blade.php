@extends('frontend.layouts.app')
@section('title', 'Super Deal Product')
@push('header_script')
    <style>
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

    <style>
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 0;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #eee;
            border-top: 5px solid #0d6efd;
            /* primary color */
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush
@section('content')

    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            Super Deal</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-8">
            <!-- Shop-control-bar Title -->
            <div class="flex-center-between mb-3">
                <h3 class="font-size-25 mb-0">Super Deal</h3>
            </div>
            <!-- End shop-control-bar Title -->

            <!-- Shop Body -->
            <!-- Tab Content -->
            <div class="">
                <ul class="row list-unstyled products-group no-gutters">
                    @forelse ($products as $product)
                        <li class="col-6 col-md-3 col-lg-2 product-item remove-divider">
                            <div class="product-item__outer h-100 m-1">
                                <div class="product-item__inner px-wd-3 p-2 p-md-3 border rounded bg-light">
                                    <div class="product-item__body">
                                        <h5 class="mb-0 product-item__title">
                                            <a href="{{ route('product', $product->slug) }}"
                                                class="text-blue font-weight-bold text-center js-short-product-name">
                                               {{ Str::limit($product->name, 18, '...') }}
                                            </a>
                                        </h5>
                                        <div class="mb-2">
                                            <a href="{{ route('product', $product->slug) }}"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset($product->image) }}" alt="Image Description"></a>
                                        </div>
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">৳{{ productPrice($product->id) }}
                                            </div>
                                        </div>
                                        <div class="mt-2">

                                            <a href="{{ route('product', $product->slug) }}"
                                                class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-1"><i
                                                    class="ec ec-add-to-cart"></i> Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="col-12 w-100 text-center py-5">
                            <div class="no-product-found mx-auto" style="max-width: 400px;">
                                <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found"
                                    class="img-fluid mb-4" style="opacity: 0.6; max-height: 200px;">
                                <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
                                <p class="text-muted">Sorry, we couldn't find any products matching your current filters.
                                    Try adjusting your
                                    search or filters.</p>
                                <button onclick="location.reload()" class="btn btn-info btn-sm mt-3 px-4 rounded-pill">
                                    <i class="ri-refresh-line"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    @endforelse
                </ul>
            </div>
            <!-- End Tab Content -->
            <!-- End Shop Body -->
            <!-- Shop Pagination -->
            @if ($products->hasPages())
                <nav class="d-md-flex justify-content-end align-items-center border-top pt-3"
                    aria-label="Page navigation example">
                    {{ $products->links() }}
                </nav>
            @endif
            <!-- End Shop Pagination -->
        </div>
    </div>

    @if ($banner)
        <!-- Banner Section Start --->

        <div class="mb-4">
            <a href="{{ $banner->url }}" class="d-block text-gray-90">
                <img src="{{ asset($banner->image) }}" alt="Banner" class="img-fluid w-100 banner-image" loading="eager"
                    fetchpriority="high" decoding="async">
            </a>
        </div>
        <!-- Banner Section End -->
    @endif

@endsection
