@extends('frontend.layouts.app')
@section('title', 'Contact Us')
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
                <h1 class="page-title mb-0">Contact Us</h1>
                <p class="text-gray-44">We'd love to hear from you! Please feel free to reach out to us with any questions or
                concerns.</p>
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <hr class="mb-10 mt-0">

    <div class="container">
        <div class="mb-10">
            <div>
                <div><b>Our Customer Care Team is Always Here to Assist You.</b></div>
                <div>For any questions or issues related to orders, delivery, returns, refunds, or anything else, you can
                    reach us through the following channels:</div>
                <div><br></div>
                <div>📞 Call: 01700000000 (24/7)</div>
                <div>💬 WhatsApp: +8801700000000</div>
                <div><br></div>
                <div><br></div>
                <div>📧 Email</div>
                <div>General Contact: contact@yourdomain.com</div>
                <div>Support: support@yourdomain.com</div>
                <div><br></div>
                <div>🕒 Service Hours Available: 24/7</div>
                <div>Our customer care team is always ready to provide fast and reliable support for any issue or inquiry
                    you may have.</div>
            </div>
        </div>
    </div>

@endsection
