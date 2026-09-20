@extends('frontend.layouts.app')
@section('title', 'Company Information')
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
                <h1 class="page-title mb-0">Company Information</h1>
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Company
                            Information</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <hr class="mb-10 mt-0">
    <!-- End breadcrumb -->
    <div class="container ">
        <div class="mb-10">
            <section class="content-title-section mb-10">
                <p class="mb-4"><strong>Company Name:</strong> Sunnah AtoZ</p>
                <p class="mb-4"><strong>Trade License No:</strong> TRAD/DNCC/012345/2024</p>
                <p class="mb-4"><strong>TIN Number:</strong> 123456789012</p>
                <p class="mb-4"><strong>BIN Number:</strong> 004688135-0203</p>
                <p class="mb-4"><strong>DBID No:</strong> 437361335</p>
            </section>
        </div>
    </div>

@endsection
