@extends('frontend.layouts.app')

@section('title', 'About Us')

@push('header_script')
    <style>
        .page-header {
            height: 15rem;
            background-color: #eee;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700 !important;
        }

        @media (max-width: 767px) {
            .page-title {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Page Header -->
    <div class="page-header d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="flex-center flex-column">
                <h1 class="page-title mb-0">About Us</h1>
            </div>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="mt-3 mb-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">

                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
                            <a href="{{ route('index') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active"
                            aria-current="page">
                            About Us
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <hr class="mb-10 mt-0">


    <!-- About Us Content -->
    <div class="container">

        <!-- About Us -->
        <div class="mb-10">

            <h3 class="mb-3 pb-2 font-size-25">
                আমাদের সম্পর্কে
                <span class="text-primary">(About Us)</span>
            </h3>

            <p>
                <strong>SUNNAH A to Z</strong>-এ আপনাকে স্বাগতম। আমাদের প্ল্যাটফর্মটি
                আধুনিক ই-কমার্সের সঙ্গে সুন্নাতে নববী
                <strong>ছল্লাল্লাহু আলাইহি ওয়া সাল্লাম</strong>-এর শাশ্বত আদর্শের
                এক অপূর্ব সমন্বয়। আমরা বিশ্বাস করি, দৈনন্দিন জীবনে সুন্নাহর
                অনুসরণ মানুষের জীবনকে প্রশান্তিময়, কল্যাণময় ও বরকতময় করে তোলে।
            </p>

            <p>
                আমাদের ওয়েবসাইটে সুন্নতী জীবনযাপনের সামগ্রিক বিষয়ের পাশাপাশি
                বই, তাহারাত ও ইবাদতের প্রয়োজনীয় সামগ্রী, পোশাক, খাঁটি ও
                অর্গানিক খাদ্যপণ্য, স্বাস্থ্য ও বিউটি কেয়ার সামগ্রী,
                হোম ও কিচেন অ্যাপ্লায়েন্স, নবজাতক ও মায়ের যত্নের পণ্য,
                ইলেকট্রনিক্স ও গ্যাজেটসহ জীবনের বিভিন্ন প্রয়োজনীয়
                ক্যাটাগরির পণ্য এক প্ল্যাটফর্মে পাওয়া যায়।
            </p>

            <p class="mb-0">
                প্রতিটি পণ্যের ক্ষেত্রে গুণগতমান, বিশুদ্ধতা ও নির্ভরযোগ্যতা
                বজায় রাখাকে আমরা সর্বোচ্চ গুরুত্ব দিয়ে থাকি।
            </p>

        </div>


        <!-- English About Us -->
        <div class="mb-10">

            <h3 class="mb-3 pb-2 font-size-25">
                About Us
            </h3>

            <p>
                Welcome to <strong>SUNNAH A to Z</strong>. Our platform is a seamless
                integration of modern e-commerce and the timeless ideals of the Sunnah
                of Prophet <strong>Sallallahu Alaihi Wa Sallam</strong>. We believe
                that embracing the Sunnah in everyday life brings peace, barakah,
                and holistic well-being.
            </p>

            <p>
                We offer a comprehensive selection of products designed to support
                a Sunnah-inspired lifestyle, including books, Taharat and Ebadat
                essentials, apparel, authentic and organic food products, health
                and beauty care essentials, home and kitchen appliances,
                newborn and mother care products, electronics, gadgets, and
                various other everyday essentials—all conveniently available
                on a single platform.
            </p>

            <p class="mb-0">
                We place the highest priority on quality, authenticity, purity,
                and reliability across every product we offer.
            </p>

        </div>


        <!-- Vision & Mission -->
        <div class="mb-10">

            <h3 class="mb-4 pb-2 font-size-25">
                আমাদের লক্ষ্য ও উদ্দেশ্য
                <span class="text-primary">(Our Vision &amp; Mission)</span>
            </h3>


            <!-- Core Vision -->
            <h4 class="font-size-18 mb-2">
                প্রধান লক্ষ্য
                <span class="text-primary">(Core Vision)</span>
            </h4>

            <p>
                সারা বিশ্বে সুন্নাতে নববী
                <strong>ছল্লাল্লাহু আলাইহি ওয়াসাল্লাম</strong>-এর সুমহান
                আদর্শ ও জীবনধারার ব্যাপক প্রচার ও প্রসার করা।
            </p>


            <!-- Commitment -->
            <h4 class="font-size-18 mb-2">
                প্রতিশ্রুতি
                <span class="text-primary">(Commitment)</span>
            </h4>

            <p>
                আমাদের গ্রাহকদের দোরগোড়ায় সুন্নতী, খাঁটি, প্রাকৃতিক,
                অর্গানিক, স্বাস্থ্যকর, মানসম্মত ও নিরাপদ পণ্য এবং
                নির্ভরযোগ্য সেবা পৌঁছে দেওয়া।
            </p>


            <!-- Core Values -->
            <h4 class="font-size-18 mb-2">
                মূল্যবোধ
                <span class="text-primary">(Core Values)</span>
            </h4>

            <p class="mb-0">
                সততা, আমানতদারি, মানবিক মূল্যবোধ, মানবাধিকারের প্রতি সম্মান
                এবং গ্রাহক সন্তুষ্টিকে গুরুত্ব দিয়ে ক্রেতা ও বিক্রেতার মধ্যে
                একটি বিশ্বস্ত, নির্ভরযোগ্য, মনোরম ও নৈতিক হালাল ব্যবসায়িক
                পরিবেশ গড়ে তোলা।
            </p>

        </div>


        <!-- English Vision & Mission -->
        <div class="mb-10">

            <h3 class="mb-4 pb-2 font-size-25">
                Our Vision &amp; Mission
            </h3>


            <h4 class="font-size-18 mb-2">
                Core Vision
            </h4>

            <p>
                To extensively promote and spread the noble ideals and lifestyle
                of the Sunnah of Prophet <strong>Sallallahu Alaihi Wa Sallam</strong>
                across the world.
            </p>


            <h4 class="font-size-18 mb-2">
                Commitment
            </h4>

            <p>
                To deliver Sunnah-inspired, pure, natural, organic, healthy,
                quality, and safe products and reliable services directly to
                the doorsteps of our customers.
            </p>


            <h4 class="font-size-18 mb-2">
                Core Values
            </h4>

            <p class="mb-0">
                To foster a trusted, reliable, pleasant, halal, and ethical
                business environment between buyers and sellers, built on
                integrity, trustworthiness (Amanah), respect for human rights,
                human values, and a strong commitment to customer satisfaction.
            </p>

        </div>


        <!-- Contact Us -->
        <div class="mb-10">

            <h3 class="mb-3 pb-2 font-size-25">
                যোগাযোগ করুন
                <span class="text-primary">(Contact Us)</span>
            </h3>

            <p class="text-gray-90 mb-0">
                SUNNAH A to Z সম্পর্কে কোনো প্রশ্ন, পরামর্শ বা অতিরিক্ত তথ্যের
                প্রয়োজন হলে অনুগ্রহ করে
                <a href="{{ route('contact') }}" class="text-blue font-weight-bold">
                    আমাদের সাথে যোগাযোগ করুন
                </a>।
                আমাদের টিম আপনাকে সহযোগিতা করতে সর্বদা প্রস্তুত।
            </p>

        </div>

    </div>
    <!-- End About Us Content -->

@endsection