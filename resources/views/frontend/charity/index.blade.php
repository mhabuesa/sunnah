@extends('frontend.layouts.app')
@section('title', 'Sadakah & Charity')
@push('header_script')
    <style>
        /* Modern & Premium Mobile Category Button Style */
        #mobileCategoryToggle {
            border: none !important;
            border-radius: 8px !important;
            font-weight: 500 !important;
            font-size: 16px;
            padding: 8px 12px !important;
        }

        #mobileCategoryToggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(13, 49, 35, 0.3);
            /* background: linear-gradient(135deg, #164e3b 0%, #0d3123 100%) !important; */
        }


        /* Charity Card */


        .charity-category-card {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 12px;
            padding: 22px 18px;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.035);
        }

        .charity-category-card:hover {
            border-color: #164e3b;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(22, 78, 59, 0.10);
            color: #333;
        }

        .charity-category-title {
            font-size: 17px;
            font-weight: 700;
            color: #164e3b;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .charity-category-description {
            font-size: 13px;
            color: #777;
            line-height: 1.8;
        }

        .charity-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 15px;
            font-size: 13px;
            font-weight: 600;
            color: #164e3b;
        }

        .charity-category-card:hover .charity-card-footer i {
            transform: translateX(5px);
        }

        .charity-card-footer i {
            transition: transform 0.3s ease;
        }

        @media (max-width: 575px) {
            .charity-category-card {
                padding: 15px 12px;
                min-height: 185px;
            }

            .charity-category-title {
                font-size: 15px;
            }

            .charity-category-description {
                font-size: 12px;
            }

            .charity-card-footer {
                font-size: 12px;
            }
        }
    </style>
@endpush
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3 d-flex justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 mt-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">ছ্বদাকাহ ও চ্যারিটি </li>
                    </ol>
                </nav>
                <div class="mt-3 mb-3 px-0">
                    <a href="{{route('zakatCalculator')}}" class="btn d-flex align-items-center justify-content-end btn-primary text-white"
                        id="mobileCategoryToggle">
                        <i class="fa fa-taka mr-2 font-size-15"></i>
                        <span> ৳ যাকাত ক্যালকুলেটর</span>
                    </a>
                </div>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container mb-4">

        <!-- Charity Categories -->
        <div class="row g-3">

            @forelse ($charityCategories as $item)
                <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-3">

                    <a href="{{ route('charity.details', $item->slug) }}"
                        class="charity-category-card d-flex flex-column h-100 text-decoration-none">

                        <div class="charity-card-content">
                            <h5 class="charity-category-title">
                                {{ $item->category }}
                            </h5>

                            <p class="charity-category-description mb-0">
                                {{ $item->description }}
                            </p>
                        </div>

                        <div class="charity-card-footer">
                            <span>আরও জানুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>

                    </a>

                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <h5 class="text-muted">কোনো ক্যাটাগরি পাওয়া যায়নি!</h5>
                    </div>
                </div>
            @endforelse

        </div>
        <!-- End Charity Categories -->

    </div>

@endsection

@push('footer_script')
@endpush
