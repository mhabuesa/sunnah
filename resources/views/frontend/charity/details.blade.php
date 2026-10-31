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


        /* Donate Form */

        /* Donation Section */
        .charity-donation-section {
            background: #f7faf8;
            border-radius: 16px;
            padding: 25px;
        }

        /* Donation Image */
        .donation-image-wrapper {
            position: relative;
            min-height: 100%;
            overflow: hidden;
            border-radius: 13px;
            background: #164e3b;
        }

        .donation-image {
            width: 100%;
            height: 100%;
            min-height: 550px;
            object-fit: cover;
            display: block;
        }

        .donation-image-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px;
            color: #fff;
            background: linear-gradient(to top,
                    rgba(7, 38, 26, 0.95),
                    rgba(7, 38, 26, 0.05));
        }

        .donation-image-overlay h3 {
            color: #fff;
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .donation-image-overlay p {
            color: #f1f5f2;
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 0;
        }

        /* Form Card */
        .donation-form-card {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 13px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.035);
        }

        .donation-form-heading {
            margin-bottom: 25px;
        }

        .donation-subtitle {
            color: #168052;
            font-size: 13px;
            font-weight: 600;
        }

        .donation-form-heading h3 {
            color: #164e3b;
            font-size: 24px;
            font-weight: 700;
            margin: 8px 0;
        }

        .donation-form-heading p {
            color: #888;
            font-size: 13px;
            margin-bottom: 0;
        }

        /* Input Fields */
        .donation-form-card label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .donation-form-card label span {
            color: #0a0001;
            margin-left: 10px;
        }

        .donation-input {
            height: 46px;
            border: 1px solid #e3e9e5;
            border-radius: 8px;
            background: #fbfdfb;
            font-size: 14px;
            padding: 10px 13px;
            box-shadow: none !important;
        }

        .donation-input:focus {
            border-color: #168052;
            background: #fff;
        }

        textarea.donation-input {
            height: auto;
            resize: vertical;
        }

        .donation-amount-wrapper {
            position: relative;
        }

        .donation-amount-wrapper>span {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #164e3b;
            font-weight: 700;
            z-index: 2;
        }

        .donation-amount-wrapper input {
            padding-left: 38px;
        }

        /* Submit Button */
        .donation-submit-btn {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 14px 20px;
            background: #164e3b;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .donation-submit-btn:hover {
            background: #0d3123;
            box-shadow: 0 6px 16px rgba(13, 49, 35, 0.2);
            transform: translateY(-2px);
        }

        .donation-secure-text {
            font-size: 12px;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .donation-image {
                min-height: 220px;
                max-height: 250px;
            }

            .donation-image-overlay {
                padding: 20px;
            }

            .donation-image-overlay h3 {
                font-size: 21px;
                margin-bottom: 5px;
            }

            .donation-image-overlay p {
                font-size: 12px;
                line-height: 1.6;
            }

            .donation-form-card {
                padding: 22px;
            }
        }

        @media (max-width: 575px) {
            .charity-donation-section {
                padding: 12px;
            }

            .donation-image {
                min-height: 150px;
                max-height: 170px;
            }

            .donation-form-card {
                padding: 18px 14px;
            }

            .donation-form-heading h3 {
                font-size: 20px;
            }
        }

        .donation-option {
            border: 1px solid #e5e9e6;
            background: #fff;
            cursor: pointer;
            transition: all .2s ease;
        }

        .donation-option:hover {
            border-color: #164e3b;
            background: #f5faf7;
        }

        .donation-option input {
            width: 17px;
            height: 17px;
            accent-color: #164e3b;
            cursor: pointer;
            flex-shrink: 0;
        }

        .donation-option:has(input:checked) {
            border-color: #164e3b;
            background: #f0f7f2;
        }


        /* donation fixed Button */

        #donateNowBtn {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 13px;
            background: #164e3b;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500 !important;
            border-radius: 10px 0 0 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
            writing-mode: vertical-rl;
            animation: donatePulse 2s infinite;
            transition: background .3s ease;
        }

        #donateNowBtn:hover {
            background: #0d382a;
            color: #fff;
        }

        #donateNowBtn i {
            transform: rotate(90deg);
        }

        @keyframes donatePulse {

            0%,
            100% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
            }

            50% {
                box-shadow: 0 4px 22px rgba(22, 78, 59, .55);
            }
        }

        html {
            scroll-behavior: smooth;
        }

        #donationForm {
            scroll-margin-top: 30px;
        }

        @media(max-width:575px) {
            #donateNowBtn {
                padding: 12px 10px;
                font-size: 13px;
            }
        }


        /* Selected Donation Amount Fields */
        .selected-donation-wrapper {
            margin-top: 20px;
        }

        .selected-donation-title {
            color: #164e3b;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .selected-donation-item {
            background: #f7faf8;
            border: 1px solid #e5e9e6;
            border-radius: 9px;
            padding: 13px;
            margin-bottom: 12px;
        }

        .selected-donation-item label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #164e3b;
            margin-bottom: 8px;
        }

        .selected-donation-item .form-control {
            height: 44px;
            border-radius: 7px;
            box-shadow: none;
        }

        .selected-donation-item .input-group {
            display: flex;
            align-items: stretch;
        }

        .donation-remove-btn {
            width: 44px;
            border: none;
            border-radius: 7px !important;
            background: #fff0f0;
            color: #dc3545;
            margin-left: 8px !important;
            cursor: pointer;
            transition: all .2s ease;
        }

        .donation-remove-btn:hover {
            background: #dc3545;
            color: #fff;
        }

        #selectedDonationFields:empty {
            display: none;
        }



        .selected-donation-item {
            margin-bottom: 15px;
        }

        .selected-donation-item label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .selected-donation-item .input-group {
            display: flex;
            align-items: stretch;
        }

        .selected-donation-item .input-group-text {
            background: #f8faf9;
            border: 1px solid #dee2e6;
            border-right: 0;
            padding: 12px 15px;
            color: #145c46;
            border-radius: 8px 0 0 8px;
        }

        .selected-donation-item .form-control {
            min-height: 48px;
            border-radius: 0;
            border: 1px solid #dee2e6;
            box-shadow: none;
        }

        .selected-donation-item .donation-remove-btn {
            width: 48px;
            min-width: 48px;
            margin-left: 8px;
            border: none;
            border-radius: 8px;
            background: #fff0f1;
            color: #dc3545;
            font-size: 18px;
        }

        .selected-donation-item .donation-remove-btn:hover {
            background: #dc3545;
            color: #fff;
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><a
                                href="{{ route('charity.index') }}">ছ্বদাকাহ ও চ্যারিটি </a></li>
                    </ol>
                </nav>
                <div class="mt-3 mb-3 px-0">
                    <a href="{{ route('zakatCalculator') }}"
                        class="btn d-flex align-items-center justify-content-end btn-primary text-white"
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

            @foreach ($contents as $content)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                    <div class="charity-category-card d-flex flex-column h-100 text-decoration-none">

                        <div class="charity-card-content">
                            <h5 class="charity-category-title">
                                {{ $content->title }}
                            </h5>

                            <p class="charity-category-description mb-0">
                                {!! $content->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- End Charity Categories -->


        <!-- Donation Form Section -->
        <div class="charity-donation-section mt-5 mb-5">

            <div class="row align-items-stretch">

                <!-- Left Donation Image -->
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <div class="donation-image-wrapper h-100">
                        <img src="{{ asset('frontend/assets/images/charity-donation.jpg') }}"
                            alt="Support Charity and Donation" class="donation-image">

                        <div class="donation-image-overlay">
                            <h3>ফাসতাবিকুল খইরত</h3>
                            <p>কল্যাণের কাজে প্রতিযোগিতা করুন। আপনার সামান্য অনুদানও হতে পারে কারো জীবনে বড় পরিবর্তনের কারণ।
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Donation Form -->
                <div class="col-lg-7" id="donationForm">
                    <div class="donation-form-card h-100">

                        <div class="donation-form-heading">
                            <span class="donation-subtitle">আপনার অনুদান পৌঁছে দিন</span>
                            <h3>দান ও সদাকাহ প্রদান করুন</h3>
                            <p>আপনার পছন্দের খাত নির্বাচন করে অনুদানের পরিমাণ প্রদান করুন।</p>
                        </div>

                        <form action="#" method="POST">
                            @csrf

                            {{-- Donation Subcategory --}}
                            <div class="mb-4">
                                <label class="form-label fw-bold mb-3">
                                    অনুদানের খাত নির্বাচন করুন
                                </label>

                                <div class="row g-2">
                                    @foreach ($subcategories as $subcategory)
                                        <div class="col-12 col-md-6">
                                            <label class="donation-option d-flex align-items-center gap-2 p-3 rounded">

                                                <input type="checkbox" class="donation-subcategory-checkbox"
                                                    value="{{ $subcategory->id }}"
                                                    data-subcategory-name="{{ $subcategory->subcategory }}">

                                                <span>{{ $subcategory->subcategory }}</span>

                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Selected Subcategory Amount Fields --}}
                            <div class="selected-donation-wrapper">

                                <h5 class="selected-donation-title">
                                    নির্বাচিত খাতের অনুদানের পরিমাণ
                                </h5>

                                <div id="selectedDonationFields"></div>

                            </div>

                            <!-- Donation Amount -->
                            <div id="normalDonationAmountWrapper">
                                <div class="form-group mb-3">
                                    <label>অনুদানের পরিমাণ (টাকা) <span>*</span></label>

                                    <div class="donation-amount-wrapper">
                                        <span>৳</span>
                                        <input type="number" name="amount" class="form-control donation-input"
                                            placeholder="অনুদানের পরিমাণ লিখুন" min="1" step="1" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="form-group mb-3">
                                <label>আপনার নাম <span>*</span></label>

                                <input type="text" name="name" class="form-control donation-input"
                                    placeholder="আপনার পূর্ণ নাম লিখুন" required>
                            </div>

                            <!-- Mobile -->
                            <div class="form-group mb-3">
                                <label>মোবাইল নম্বর <span>*</span></label>

                                <input type="tel" name="phone" class="form-control donation-input"
                                    placeholder="01XXXXXXXXX" pattern="01[0-9]{9}" maxlength="11" required>
                            </div>

                            <!-- Note -->
                            <div class="form-group mb-4">
                                <label>আপনার মন্তব্য (ঐচ্ছিক)</label>

                                <textarea name="note" rows="3" class="form-control donation-input"
                                    placeholder="কোনো বিশেষ নির্দেশনা থাকলে লিখুন..."></textarea>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="donation-submit-btn">
                                <i class="fas fa-heart mr-2"></i>
                                অনুদান প্রদান করুন
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>

                            <div class="donation-secure-text text-center mt-3">
                                <i class="fas fa-lock mr-1"></i>
                                আপনার তথ্য নিরাপদে সংরক্ষিত থাকবে।
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!-- End Donation Form -->


    </div>

    <a href="#donationForm" id="donateNowBtn">
        <i class="fas fa-hand-holding-heart"></i>
        <span>দান করুন</span>
    </a>

@endsection

@push('footer_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const donationFields = document.getElementById('selectedDonationFields');
            const normalAmountWrapper = document.getElementById('normalDonationAmountWrapper');

            function updateNormalAmountVisibility() {
                const selectedCount = document.querySelectorAll(
                    '.donation-subcategory-checkbox:checked'
                ).length;

                if (normalAmountWrapper) {
                    normalAmountWrapper.style.display =
                        selectedCount > 0 ? 'none' : '';
                }
            }

            function addDonationField(checkbox) {
                const subcategoryId = checkbox.value;
                const subcategoryName = checkbox.dataset.subcategoryName;

                if (donationFields.querySelector(
                        `[data-subcategory-id="${subcategoryId}"]`
                    )) {
                    return;
                }

                const item = document.createElement('div');
                item.className = 'selected-donation-item';
                item.dataset.subcategoryId = subcategoryId;

                item.innerHTML = `
            <label>${subcategoryName}</label>

            <div class="input-group">
                <span class="input-group-text">৳</span>

                <input
                    type="hidden"
                    name="donations[${subcategoryId}][subcategory_id]"
                    value="${subcategoryId}"
                >

                <input
                    type="number"
                    name="donations[${subcategoryId}][amount]"
                    class="form-control"
                    placeholder="অনুদানের পরিমাণ লিখুন"
                    min="0"
                    step="0.01"
                    required
                >

                <button
                    type="button"
                    class="donation-remove-btn"
                    title="Remove"
                >
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        `;

                donationFields.appendChild(item);

                item.querySelector('.donation-remove-btn').addEventListener('click', function() {
                    checkbox.checked = false;
                    item.remove();
                    updateNormalAmountVisibility();
                });
            }

            document.querySelectorAll('.donation-subcategory-checkbox').forEach(function(checkbox) {

                checkbox.addEventListener('change', function() {

                    if (this.checked) {
                        addDonationField(this);
                    } else {
                        const item = donationFields.querySelector(
                            `[data-subcategory-id="${this.value}"]`
                        );

                        if (item) {
                            item.remove();
                        }
                    }

                    updateNormalAmountVisibility();
                });

            });

            updateNormalAmountVisibility();

        });
    </script>
@endpush
