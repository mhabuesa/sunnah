@extends('frontend.layouts.app')
@section('title', 'All Brands')
@push('header_script')
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Brands</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-6">
            <div
                class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">All Brands</h3>
            </div>
            <ul class="row list-unstyled products-group no-gutters mb-6">
                @forelse ($brands as $brand)
                    <li class="col-6 col-md-2 col-xl-1gdot7 product-item">
                        <div class="product-item__outer h-100 w-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2">
                                        <a href="{{ route('brand', $brand->slug) }}" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset($brand->logo) }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <h5 class="text-center mb-1 product-item__title"><a
                                            href="{{ route('brand', $brand->slug) }}"
                                            class="font-size-15 text-gray-90">{{ $brand->name }}</a></h5>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="no-product-found mx-auto text-center" style="max-width: 400px;">
                        <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found"
                            class="img-fluid mb-4" style="opacity: 0.6; max-height: 200px;">
                        <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
                        <p class="text-muted">Sorry, we couldn't find any products matching your current
                            Brand.</p>
                    </div>
                @endempty
        </ul>
        <nav class="custom-pagination">
            {{ $brands->links() }}
        </nav>

    </div>

@endsection
