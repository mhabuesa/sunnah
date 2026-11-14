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
                <h1 class="page-title mb-0">{{ $content->name }}</h1>
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            {{ $content->name }}</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <hr class="mb-10 mt-0">
    <!-- End breadcrumb -->
    <div class="container ">
        <!-- Company Information -->

        <div class="mb-4">
            {!! $content->content !!}
        </div>

        <!-- Company Information -->
    </div>

@endsection
