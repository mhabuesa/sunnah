@extends('frontend.layouts.app')
@section('title', 'About Us')
@push('header_script')
    <style>
        .page-header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 15rem;
            background-color: #eee;
            text-align: center;
            text-transform: capitalize;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700 !important;
        }
    </style>
@endpush
@section('content')


    <div class="page-header">
        <div class="container">
            <div class="flex-center flex-column">
                <h1 class="page-title mb-0">About Us</h1>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="mt-3 mb-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <hr class="mb-10 mt-0">
    <!-- End breadcrumb -->

    <div class="container">

        <div class="mb-10">
            <h3 class="mb-3 pb-2 font-size-25">Introduction</h3>
            <p>
                Sunnah AtoZ is an online platform dedicated to providing authentic,
                high-quality, and carefully selected products inspired by the Sunnah
                and Islamic lifestyle. Our goal is to make beneficial and trustworthy
                products easily accessible to individuals and families across Bangladesh.
                We are committed to maintaining product quality, authenticity, and
                customer satisfaction in everything we do.
            </p>
        </div>

        <div class="mb-10">
            <h3 class="mb-3 pb-2 font-size-25">Our Journey</h3>
            <p>
                Sunnah AtoZ began with a simple vision: to make it easier for people
                to discover and purchase quality products that complement their
                Islamic values and everyday lifestyle. From Sunnah-inspired products
                to useful daily essentials, we carefully select our products with
                a strong focus on quality, authenticity, and value. As we continue
                to grow, our commitment remains to serve our customers with honesty,
                care, and dedication.
            </p>
        </div>

        <div class="mb-10">
            <h3 class="mb-3 pb-2 font-size-25">Our Values</h3>
            <p>
                At Sunnah AtoZ, trust, quality, authenticity, and customer satisfaction
                are at the heart of our business. We believe that every customer deserves
                clear product information, dependable service, and a smooth shopping
                experience. We carefully source and select our products and continuously
                strive to maintain high standards throughout our operations.
            </p>
        </div>

        <div class="mb-10">
            <h3 class="mb-3 pb-2 font-size-25">Our Mission</h3>
            <p>
                Our mission is to make quality and beneficial products inspired by the
                Sunnah and Islamic lifestyle more accessible to people across Bangladesh.
                We aim to build a reliable online shopping platform where customers can
                discover thoughtfully selected products with confidence. Through
                quality products, honest service, and a customer-focused approach,
                we aspire to make everyday shopping more meaningful and convenient.
            </p>
        </div>

        <div class="mb-10">
            <h3 class="mb-3 pb-2 font-size-25">Contact Us</h3>
            <p class="text-gray-90">
                If you have any questions, suggestions, or require further information
                about Sunnah AtoZ, please feel free to
                <a href="{{ route('contact') }}" class="text-blue font-weight-bold">contact us</a>.
                Our team will be happy to assist you.
            </p>
        </div>

    </div>

@endsection
