@extends('frontend.layouts.app')
@section('title', 'Category Product')
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

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <ul class="breadcrumb h4">
                    <li><a href="{{ route('index') }}">Home / &nbsp;</a></li>
                    <li class="text-muted">Category /&nbsp;</li>
                    <li class="text-muted">{{ $category->name }}</li>
                </ul>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <section class="section-t-space shop-section pt-4">
        <div class="custom-container">
            <div class="row">

                <div class="col-custom-12">
                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2
                    product-list-section">
                        @forelse ($products as $product)
                            <div class="col">
                                <div class="product-box-4-main">
                                    <div class="product-box-4 productMain pro-bg-white">
                                        <div class="product-image">
                                            <a href="{{ route('product', $product->slug) }}">
                                                <img class="lazy img-fluid productImage loaded"
                                                    data-src="{{ asset($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="sub-name productName">{{ $product->category->name }}</h5>
                                            <a href="{{ route('product', $product->slug) }}" class="name">
                                                <h5>{{ Str::limit($product->name, '20', '...') }}</h5>
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
                                            <h5 class="price">৳{{ $product->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 w-100 text-center py-5">
                                <div class="no-product-found mx-auto" style="max-width: 400px;">
                                    <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found"
                                        class="img-fluid mb-4" style="opacity: 0.6; max-height: 200px;">
                                    <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
                                    <p class="text-muted">Sorry, we couldn't find any products matching your current
                                        category.</p>
                                </div>
                            </div>
                        @endforelse


                    </div>

                    <nav class="custom-pagination">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    @if ($banner)
        <!-- Banner Section Start -->
        <section class="section-t-space">
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
    
@endpush
