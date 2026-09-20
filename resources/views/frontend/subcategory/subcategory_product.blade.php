@extends('frontend.layouts.app')
@section('title', 'Subcategory Product')
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="{{ route('category', $subcategory->category->slug) }}">{{ $subcategory->category->name }}</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            {{ $subcategory->name }}</li>
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
                <h3 class="font-size-25 mb-0">{{ $subcategory->name }}</h3>
            </div>
            <!-- End shop-control-bar Title -->

            <!-- Shop Body -->
            <!-- Tab Content -->
            <div class="">
                <ul class="row list-unstyled products-group no-gutters">
                    @forelse ($products as $product)
                        <li class="col-6 col-md-3 col-xl-2 product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <h5 class="mb-1 product-item__title"><a
                                                href="{{ route('product', $product->slug) }}"
                                                class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                                        <div class="mb-2">
                                            <a href="{{ route('product', $product->slug) }}"
                                                class="d-block text-center"><img class="img-fluid"
                                                    src="{{ asset($product->image) }}" alt="Image Description"></a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">৳ {{ $product->price }}</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="{{ route('product', $product->slug) }}"
                                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                                        class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="compare.html" class="text-gray-6 font-size-13"><i
                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="no-product-found mx-auto text-center" style="max-width: 400px;">
                            <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found"
                                class="img-fluid mb-4" style="opacity: 0.6; max-height: 200px;">
                            <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
                            <p class="">Sorry, we couldn't find any products matching your current
                                Subcategory.</p>
                            <a href="{{ route('index') }}"
                                class="btn btn-primary btn-sm mt-3 px-4 rounded-pill text-white">
                                <i class="ri-refresh-line"></i> Home
                            </a>
                        </div>
                    @endforelse
                </ul>
            </div>
            <!-- End Tab Content -->
            <!-- End Shop Body -->
            <!-- Shop Pagination -->
            @if ($products->hasPages())
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
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

@push('footer_script')
@endpush
