@extends('frontend.layouts.app')
@section('title', 'Cart Page')
@push('header_script')
    <style>
        /* Selectize input box ke Bootstrap 5 er moto height o padding deya */
        .selectize-input {
            padding: 10px 15px !important;
            /* Apnar theme er input padding onujayi adjust korun */
            border: 1px solid #eee !important;
            /* Image onujayi light border */
            border-radius: 8px !important;
            /* Roundness match korar jonno */
            box-shadow: none !important;
            background-color: #f9f9f9 !important;
            /* Apnar form input er background color */
            display: flex !important;
            align-items: center !important;
            min-height: 50px !important;
            /* Bootstrap 5 standard height match korte */
        }

        /* Focus state color */
        .selectize-input.focus {
            border-color: #86b7fe !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        }

        /* Dropdown arrow position thik kora */
        .selectize-control.single .selectize-input:after {
            border-width: 5px 5px 0 5px !important;
            border-color: #666 transparent transparent transparent !important;
            right: 15px !important;
        }

        /* Dropdown open thaka obosthay arrow reverse kora */
        .selectize-control.single .selectize-input.dropdown-active:after {
            border-width: 0 5px 5px 5px !important;
            border-color: transparent transparent #666 transparent !important;
        }

        /* Dropdown menu items styling */
        .selectize-dropdown {
            border-radius: 8px !important;
            box-shadow: 0 6px 12px rgba(0, 0, 0, .1) !important;
        }
    </style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap5.min.css">
@endpush
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->



    <!-- Cart Section Start -->
    <div class="container">

        <form action="{{ route('placeOrder') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xxl-9 col-xl-9 col-lg-8">
                    <div class="row">
                        {{-- Cart Section --}}
                        <div class="col-12 mb-3">
                            <div class="mb-10 cart-table">
                                <div class="card border-0 shadow-sm rounded-2">
                                    <div class="card-header border-0">
                                        <strong class="font-size-18 mb-0">Your Cart</strong>
                                    </div>
                                    <div class="card-body mb-4 pt-0">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity w-lg-15">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartItems as $item)
                                                    @php
                                                        $product = $cartProducts[$item['product_id']] ?? null;
                                                        $variation = $cartVariations[$item['variation_id']] ?? null;

                                                        $price = $variation?->price ?? $product?->price;
                                                    @endphp
                                                    <tr class="table-row cart-item" data-product="{{ $item['product_id'] }}"
                                                        data-variation="{{ $item['variation_id'] }}">
                                                        <td class="text-center">
                                                            <a href="#"
                                                                class="text-gray-32 font-size-26 remove-row btn">×</a>
                                                        </td>
                                                        <td class="d-none d-md-table-cell">
                                                            <a href="{{ route('product', $product->slug) }}">
                                                                <img class="img-fluid max-width-100 p-1 border border-color-1"
                                                                    src="{{ asset($product?->image) }}"
                                                                    alt="Image Description">
                                                            </a>
                                                        </td>

                                                        <td data-title="Product">
                                                            <a href="{{ route('product', $product->slug) }}"
                                                                class="text-gray-90">{{ $product?->name }}</a>
                                                            @if ($variation)
                                                                <span
                                                                    class="text-success d-block font-size-14">{{ $variation->attribute->name ?? '' }}:
                                                                    {{ $variation->attributeValue->value ?? '' }}</span>
                                                            @endif
                                                        </td>

                                                        <td data-title="Price">
                                                            <span class="price taka d-inline"
                                                                data-price="{{ $price }}">
                                                                {{ $price }}</span>
                                                        </td>

                                                        <td data-title="Quantity">
                                                            <span class="sr-only">Quantity</span>
                                                            <!-- Quantity -->
                                                            <div
                                                                class="border rounded-pill py-1 width-122 w-xl-80 px-2 border-color-1">
                                                                <div class="js-quantity row align-items-center">
                                                                    <div class="col pl-4 pr-0">
                                                                        <input
                                                                            class="js-result quantity form-control input-qty h-auto border-0 rounded p-0 shadow-none"
                                                                            type="text" value="{{ $item['qty'] }}"
                                                                            data-product-id="{{ $item['product_id'] }}"
                                                                            data-variation-id="{{ $item['variation_id'] ?? '' }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-auto pl-0">
                                                                        <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 qty-btn-minus"
                                                                            href="javascript:;">
                                                                            <small
                                                                                class="fas fa-minus btn-icon__inner"></small>
                                                                        </a>
                                                                        <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 qty-btn-plus"
                                                                            href="javascript:;">
                                                                            <small
                                                                                class="fas fa-plus btn-icon__inner"></small>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Quantity -->
                                                        </td>

                                                        <td data-title="Total">
                                                            <span class="productPrice">{{ $item['qty'] * $price }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="empty-card" style="display: none;">
                                                    <td colspan="6" class="text-center py-5">
                                                        <div class="no-product-found mx-auto" style="max-width: 400px;">

                                                            <img src="{{ asset('frontend') }}/assets/images/cartEmpty.png"
                                                                alt="Empty Cart" class="img-fluid mb-4"
                                                                style="opacity: 0.7; max-height: 200px;">

                                                            <h3 class="fw-bold mb-2">
                                                                Your cart is currently empty
                                                            </h3>

                                                            <p class="mb-0">
                                                                Sorry, we couldn't find any items in your cart.
                                                            </p>

                                                            <a href="{{ url('/') }}"
                                                                class="btn btn-success text-white mt-3">
                                                                Continue Shopping
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card border-0 shadow-sm rounded-2">
                                <div class="card-body p-4">
                                    <div class="pb-7 mb-7">
                                        <!-- Title -->
                                        <div class="border-bottom border-color-1 mb-5">
                                            <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                                        </div>
                                        <!-- End Title -->

                                        <!-- Billing Form -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Full Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Your Full Name" required=""
                                                        data-msg="Please enter your full name."
                                                        data-error-class="u-has-error" data-success-class="u-has-success"
                                                        autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="w-100"></div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Email Address (optional)
                                                    </label>
                                                    <input type="text" class="form-control" name="email"
                                                        placeholder="Email Address" aria-label="Email Address"
                                                        data-msg="Please enter your email address."
                                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Phone Number <strong class="text-danger">*</strong>
                                                    </label>
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="Phone Number" aria-label="Phone Number"
                                                        data-msg="Please enter your phone number."
                                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Full Address * <strong class="text-danger">*</strong>
                                                    </label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Full Address" aria-label="Full Address"
                                                        data-msg="Please enter your full address."
                                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Country
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control js-select selectpicker dropdown-select"
                                                        required="" data-msg="Please select country."
                                                        data-error-class="u-has-error" data-success-class="u-has-success"
                                                        data-live-search="true"
                                                        data-style="form-control border-color-1 font-weight-normal"
                                                        id="search-select" name="district">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->name }}">{{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label" for="destination">
                                                        Shipping Destination
                                                    </label>
                                                    <select class="form-control" id="destination" name="destination"
                                                        disabled>
                                                        <option value="inside_dhaka">Inside Dhaka</option>
                                                        <option value="outside_dhaka">Outside Dhaka</option>
                                                    </select>
                                                </div>
                                                <!-- End Input -->
                                            </div>


                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Email address
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" name="emailAddress"
                                                        placeholder="jackwayley@gmail.com"
                                                        aria-label="jackwayley@gmail.com" required=""
                                                        data-msg="Please enter a valid email address."
                                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Phone
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="+1 (062) 109-9222" aria-label="+1 (062) 109-9222"
                                                        data-msg="Please enter your last name."
                                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="w-100"></div>
                                        </div>
                                        <!-- End Billing Form -->

                                        <!-- Accordion -->
                                        <div id="shopCartAccordion2" class="accordion rounded mb-6">
                                            <!-- Card -->
                                            <div class="card border-0">
                                                <div id="shopCartHeadingThree"
                                                    class="custom-control custom-checkbox d-flex align-items-center">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="createAnaccount" name="createAnaccount">
                                                    <label class="custom-control-label form-label" for="createAnaccount"
                                                        data-toggle="collapse" data-target="#shopCartThree"
                                                        aria-expanded="false" aria-controls="shopCartThree">
                                                        Create an account?
                                                    </label>
                                                </div>
                                                <div id="shopCartThree" class="collapse"
                                                    aria-labelledby="shopCartHeadingThree"
                                                    data-parent="#shopCartAccordion2" style="">
                                                    <!-- Form Group -->
                                                    <div class="js-form-message form-group py-5">
                                                        <label class="form-label" for="signinSrPasswordExample1">
                                                            Create account password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="signinSrPasswordExample1" placeholder="********"
                                                            aria-label="********" required=""
                                                            data-msg="Enter password." data-error-class="u-has-error"
                                                            data-success-class="u-has-success">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                        <!-- End Accordion -->
                                        <!-- Input -->
                                        <div class="js-form-message mb-6">
                                            <label class="form-label">
                                                Order notes (optional)
                                            </label>

                                            <div class="input-group">
                                                <textarea class="form-control p-5" rows="4" name="text"
                                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4">
                    <div class="d-lg-block position-sticky" style="top: 5px;">
                        <div class="card border-0 shadow-sm rounded-2">
                            <div class="card-body p-4">

                                {{-- Cart Total --}}
                                {{-- <h4 class="fw-bold mb-4 strong">Cart Total</h4> --}}
                                <div class="border-bottom pb-2 mb-2">
                                    <strong class="font-size-18">Cart Total</strong>
                                </div>

                                {{-- Subtotal --}}
                                <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                    <span class="fw-medium">Subtotal</span>
                                    <span class="fw-medium price cart-subtotal taka">৳0.00</span>
                                </div>

                                {{-- Coupon Discount --}}
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="fw-medium">Coupon Discount</span>
                                    <span class="fw-medium price taka coupon-discount-text">৳(-) 0.00</span>
                                </div>

                                {{-- Shipping --}}
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="fw-medium">Shipping</span>
                                    <span class="fw-medium price taka shipping-text text-end taka shipping-charge"
                                        data-shipping="0">৳0.00</span>
                                </div>

                                {{-- Promo Code --}}
                                <div class="pb-3 border-bottom">

                                    <button type="button" id="promoToggle"
                                        class="btn btn-link text-dark text-decoration-none p-0 d-flex align-items-center justify-content-between w-100"
                                        style="box-shadow: none;">

                                        <span class="fw-medium">Add promo code</span>

                                        <i id="promoIcon" class="fas fa-chevron-down small"></i>
                                    </button>


                                    {{-- Promo Code Box --}}
                                    <div id="promoBox" class="mt-3" style="display: none;">

                                        <div class="input-group" id="coupon-input-group">
                                            <input type="text" class="form-control" name="text"
                                                id="coupon_code_input" placeholder="Coupon code" aria-label="Coupon code"
                                                aria-describedby="subscribeButtonExample2" required="">
                                            <div class="input-group-append">
                                                <button type="button" id="submitCoupon" class="btn btn-dark px-3 py-1">
                                                    Apply
                                                </button>
                                            </div>
                                        </div>
                                        {{-- Coupon Applied Area (Default Hide) --}}
                                        <div id="coupon-applied-group" class="d-none">
                                            <div
                                                class="alert alert-success d-flex justify-content-between align-items-center p-2 mb-0">
                                                <span>Applied: <strong id="applied_code_text"></strong></span>
                                                <a href="javascript:void(0)" id="clearCouponBtn"
                                                    class="text-danger fw-bold">Remove</a>
                                            </div>
                                        </div>
                                        <small id="coupon_msg" class="text-danger d-none"></small>

                                        {{-- Hidden Fields for calculations --}}
                                        <input type="hidden" id="couponDiscountValue" value="0">
                                        <input type="hidden" id="isFreeDelivery" value="false">

                                    </div>

                                </div>


                                {{-- Total --}}
                                <div class="d-flex justify-content-between align-items-center mt-4 mb-4 px-4">
                                    <span class="fw-bold font-size-20">Total (BDT)</span>
                                    <span class="fw-bold fs-5 text-success price theme-color cart-total taka">৳0.00</span>
                                </div>

                                <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                    <!-- Basics Accordion -->
                                    <div id="basicsAccordion1">
                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingOne">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="stylishRadio1"
                                                        name="stylishRadio" checked="">
                                                    <label class="custom-control-label form-label" for="stylishRadio1"
                                                        data-toggle="collapse" data-target="#basicsCollapseOnee"
                                                        aria-expanded="true" aria-controls="basicsCollapseOnee">
                                                        Cash On Delivery
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseOnee"
                                                class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                                <div class="p-4">
                                                    Pay with cash upon delivery. <br>
                                                    Check your product before you pay.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->

                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingTwo">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="secondStylishRadio1" name="stylishRadio">
                                                    <label class="custom-control-label form-label"
                                                        for="secondStylishRadio1" data-toggle="collapse"
                                                        data-target="#basicsCollapseTwo" aria-expanded="false"
                                                        aria-controls="basicsCollapseTwo">
                                                        Bkash Pay
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseTwo"
                                                class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                                <div class="p-4">
                                                    Fast and secure payment via bKash. Enjoy instant confirmation.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Basics Accordion -->
                                </div>


                                {{-- Place Order --}}
                                <button type="submit" class="btn btn-primary-dark w-100 py-3 fw-bold rounded-2">
                                    Place Order
                                </button>

                            </div>



                        </div>
                    </div>
                </div>

                <!-- Card content here -->
            </div>
        </form>
    </div>
    </div>
    </div>

    <!-- Cart Section End -->



@endsection

@push('footer_script')
    <!-- Selectize JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script> --}}

    {{-- <script src="{{asset('frontend/temp')}}/js/components/hs.quantity-counter.js"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.js-quantity').forEach(function(quantityBox) {

                const input = quantityBox.querySelector('.js-result');
                const minusBtn = quantityBox.querySelector('.js-minus');
                const plusBtn = quantityBox.querySelector('.js-plus');

                // Plus
                plusBtn.addEventListener('click', function() {

                    let quantity = parseInt(input.value) || 1;

                    quantity++;

                    input.value = quantity;
                });


                // Minus
                minusBtn.addEventListener('click', function() {

                    let quantity = parseInt(input.value) || 1;

                    // Quantity কখনো 1 এর নিচে যাবে না
                    if (quantity > 1) {
                        quantity--;
                    }

                    input.value = quantity;
                });

            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const toggle = document.getElementById('promoToggle');
            const promoBox = document.getElementById('promoBox');
            const icon = document.getElementById('promoIcon');

            let isOpen = false;

            toggle.addEventListener('click', function() {

                if (!isOpen) {

                    // Show
                    promoBox.style.display = 'block';

                    const height = promoBox.scrollHeight;

                    promoBox.style.height = '0px';
                    promoBox.style.opacity = '0';

                    requestAnimationFrame(() => {
                        promoBox.style.transition =
                            'height 0.35s ease, opacity 0.25s ease';

                        promoBox.style.height = height + 'px';
                        promoBox.style.opacity = '1';
                    });

                    // Arrow Down -> Up
                    icon.style.transition = 'transform 0.3s ease';
                    icon.style.transform = 'rotate(180deg)';

                    isOpen = true;

                } else {

                    // Hide
                    promoBox.style.height = promoBox.scrollHeight + 'px';
                    promoBox.style.opacity = '1';

                    requestAnimationFrame(() => {
                        promoBox.style.transition =
                            'height 0.35s ease, opacity 0.25s ease';

                        promoBox.style.height = '0px';
                        promoBox.style.opacity = '0';
                    });

                    // Arrow Up -> Down
                    icon.style.transition = 'transform 0.3s ease';
                    icon.style.transform = 'rotate(0deg)';

                    setTimeout(() => {
                        promoBox.style.display = 'none';
                    }, 350);

                    isOpen = false;
                }

            });

        });
    </script>


    <script>
        // --- Helper Functions (Block er baire thaka bhalo) ---
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                let date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            let nameEQ = name + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function updateCouponUI(code, discount, isFree) {
            if (code) {
                $('#coupon-input-group').addClass('d-none');
                $('#coupon-applied-group').removeClass('d-none');
                $('#applied_code_text').text(code);
                $('#couponDiscountValue').val(discount);
                $('#isFreeDelivery').val(isFree);
                $('.coupon-discount-text').text('(-) ' + parseFloat(discount).toFixed(2));
            } else {
                $('#coupon-input-group').removeClass('d-none');
                $('#coupon-applied-group').addClass('d-none');
                $('#couponDiscountValue').val(0);
                $('#isFreeDelivery').val(false);
                $('.coupon-discount-text').text('(-) 0.00');
            }
            if (typeof updateCartSummary === 'function') updateCartSummary();
        }

        function initCoupon() {
            let savedCode = getCookie('applied_coupon_code');
            let savedDiscount = getCookie('coupon_discount') || 0;
            let savedFree = getCookie('free_delivery_active') === 'true';

            if (savedCode) {
                updateCouponUI(savedCode, savedDiscount, savedFree);
            }
        }

        $(document).ready(function() {
            // --- Selectize Initialization ---
            if ($('#search-select').length) {
                $('#search-select').selectize({
                    sortField: 'text',
                    placeholder: 'Select District',
                    onChange: function(id) {
                        if (!id) return;
                        var selectize = $('#search-select')[0].selectize;
                        var districtName = selectize.options[id].text;

                        let shippingCharge = 0;
                        let destination = "outside_dhaka";

                        if (districtName.trim().toLowerCase() === "dhaka") {
                            destination = "inside_dhaka";
                            shippingCharge = 70;
                        } else {
                            destination = "outside_dhaka";
                            shippingCharge = 120;
                        }

                        $('#destination').val(destination);
                        $('.shipping-charge').text(shippingCharge).attr('data-shipping',
                            shippingCharge);
                        updateCartSummary();
                    }
                });
            }

            // --- Coupon Initialization ---
            initCoupon();

            // --- Coupon Events ---
            $(document).on('click', '#submitCoupon', function() {
                let code = $('#coupon_code_input').val().trim();
                let subtotal = 0;
                $('.table-row').each(function() {
                    let price = parseFloat($(this).find('.price').data('price')) || 0;
                    let qty = parseInt($(this).find('.input-qty').val()) || 1;
                    subtotal += price * qty;
                });

                if (!code) {
                    alert('Please enter a coupon code.');
                    return;
                }

                $.ajax({
                    url: "{{ route('cart.applyCoupon') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        coupon_code: code,
                        subtotal: subtotal
                    },
                    success: function(res) {
                        if (res.success) {
                            // ১. কুকি সেট করা
                            setCookie('applied_coupon_code', code, 1);
                            setCookie('coupon_discount', res.discount, 1);
                            setCookie('free_delivery_active', res.free_delivery, 1);

                            // ২. ইনপুট ফিল্ডটি খালি (Fresh) করে দেয়া
                            $('#coupon_code_input').val('');

                            // ৩. UI আপডেট করা
                            updateCouponUI(code, res.discount, res.free_delivery);

                            // ৪. সাকসেস মেসেজ (অপশনাল)
                            showToast(res.message || 'Coupon applied successfully!', 'success');
                        } else {
                            showToast(res.error || 'Coupon invalid!', 'error');
                        }
                    }
                });
            });

            $(document).on('click', '#clearCouponBtn', function() {
                setCookie('applied_coupon_code', '', -1);
                setCookie('coupon_discount', '', -1);
                setCookie('free_delivery_active', '', -1);
                updateCouponUI(null, 0, false);
            });


            $('form[action="{{ route('placeOrder') }}"]').on('submit', function(e) {
                // Final sync before submission
                updateCartSummary();

                // Check if district is selected (basic validation)
                if (!$('#search-select').val()) {
                    e.preventDefault();
                    alert('Please select a district first.');
                    return false;
                }

                // Optional: Clear cookies only after the form is successfully submitted
                // Note: It's better to clear them in the Controller's success response, 
                // but you can do it here if you redirect immediately.
                setCookie('applied_coupon_code', '', -1);
                setCookie('coupon_discount', '', -1);
                setCookie('free_delivery_active', '', -1);
            });
        });
    </script>



    {{-- <script>
        function updateRowPrice(row) {
            let price = parseFloat(row.find('.price').data('price')) || 0;
            let qty = parseInt(row.find('.input-qty').val()) || 1;

            let total = price * qty;

            row.find('.productPrice').text(total);
        }

        function updateCartSummary() {
            let subtotal = 0;

            $('.table-row').each(function() {
                let price = parseFloat($(this).find('.price').data('price')) || 0;
                let qty = parseInt($(this).find('.input-qty').val()) || 1;
                subtotal += price * qty;
            });

            // --- Shipping Logic ---
            let shipping = parseFloat($('.shipping-charge').attr('data-shipping')) || 0;
            let isFreeDelivery = $('#isFreeDelivery').val() === 'true' || getCookie('free_delivery_active') === 'true';

            if (isFreeDelivery) {
                shipping = 0;
            }

            // --- Coupon Logic ---
            let couponDiscount = parseFloat($('#couponDiscountValue').val()) || 0;
            let appliedCode = getCookie('applied_coupon_code') || '';

            // Calculation
            let total = (subtotal - couponDiscount) + shipping;
            if (total < 0) total = 0;

            // --- UI Updates ---
            $('.cart-subtotal').text(subtotal.toFixed(2));
            $('.coupon-discount-text').text('(-) ' + couponDiscount.toFixed(2));
            $('.shipping-charge').text(shipping.toFixed(2));
            $('.cart-total').text(total.toFixed(2));

            // --- HIDDEN INPUT UPDATES (For Controller) ---
            $('#hidden_subtotal').val(subtotal.toFixed(2));
            $('#hidden_coupon_code').val(appliedCode);
            $('#hidden_coupon_discount').val(couponDiscount.toFixed(2));
            $('#hidden_shipping_charge').val(shipping.toFixed(2));
            $('#hidden_grand_total').val(total.toFixed(2));

            // Capture the destination since the select is disabled
            $('#hidden_destination').val($('#destination').val());
        }

        function checkEmptyCart() {
            if ($('.table-row').length === 0) {
                $('.empty-card').show();
            } else {
                $('.empty-card').hide();
            }
        }

        $(document).ready(function() {

            // ✅ initial load
            $('.table-row').each(function() {
                updateRowPrice($(this));
            });

            updateCartSummary();
            checkEmptyCart();

            // ✅ qty change (UI + trigger main layout AJAX)
            $(document).on('input', '.input-qty', function() {

                let row = $(this).closest('.table-row');

                updateRowPrice(row);
                updateCartSummary();

                // 👉 main layout detect করার জন্য
                row.addClass('cart-item');

                // 👉 change trigger কর (main layout AJAX call করবে)
                $(this).trigger('change');
            });

            // ✅ plus / minus click
            $(document).on('click', '.qty-btn-plus, .qty-btn-minus', function() {

                let row = $(this).closest('.table-row');
                let input = row.find('.input-qty');

                setTimeout(() => {
                    input.trigger('input');
                }, 100);
            });

            // ✅ remove item
            $(document).on('click', '.remove-row', function() {

                let row = $(this).closest('.table-row');

                let productId = row.data('product');
                let variationId = row.data('variation');

                $.ajax({
                    url: "{{ route('cart.remove') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        variation_id: variationId
                    },
                    success: function(res) {

                        if (res.status) {

                            row.fadeOut(300, function() {
                                $(this).remove();

                                updateCartSummary();
                                checkEmptyCart();
                            });

                            $('.cart-count').text(res.cart_count);
                            $('#cartCount_header').text(res.cart_count);
                        }
                    }
                });
            });

        });
    </script> --}}

    <script>
        let qtyUpdateTimeout = null;

        function updateRowPrice(row) {
            let price = parseFloat(row.find('.price').data('price')) || 0;
            let qty = parseInt(row.find('.input-qty').val()) || 1;

            let total = price * qty;

            row.find('.productPrice').text(total.toFixed(2));
        }

        function updateCartSummary() {
            let subtotal = 0;

            $('.table-row').each(function() {
                let price = parseFloat($(this).find('.price').data('price')) || 0;
                let qty = parseInt($(this).find('.input-qty').val()) || 1;
                subtotal += price * qty;
            });

            // --- Shipping Logic ---
            let shipping = parseFloat($('.shipping-charge').attr('data-shipping')) || 0;
            let isFreeDelivery = $('#isFreeDelivery').val() === 'true' || getCookie('free_delivery_active') === 'true';

            if (isFreeDelivery) {
                shipping = 0;
            }

            // --- Coupon Logic ---
            let couponDiscount = parseFloat($('#couponDiscountValue').val()) || 0;
            let appliedCode = getCookie('applied_coupon_code') || '';

            // Calculation
            let total = (subtotal - couponDiscount) + shipping;
            if (total < 0) total = 0;

            // --- UI Updates ---
            $('.cart-subtotal').text(subtotal.toFixed(2));
            $('.coupon-discount-text').text('(-) ' + couponDiscount.toFixed(2));
            $('.shipping-charge').text(shipping.toFixed(2));
            $('.cart-total').text(total.toFixed(2));

            // --- HIDDEN INPUT UPDATES ---
            $('#hidden_subtotal').val(subtotal.toFixed(2));
            $('#hidden_coupon_code').val(appliedCode);
            $('#hidden_coupon_discount').val(couponDiscount.toFixed(2));
            $('#hidden_shipping_charge').val(shipping.toFixed(2));
            $('#hidden_grand_total').val(total.toFixed(2));

            $('#hidden_destination').val($('#destination').val());
        }

        function checkEmptyCart() {
            if ($('.table-row').length === 0) {
                $('.empty-card').show();
            } else {
                $('.empty-card').hide();
            }
        }

        // ✅ DB-তে Quantity আপডেট করার ফাংশন (Debounce সহ)
        function updateCartQuantity(row) {
            let productId = row.data('product') || row.attr('data-product-id');
            let variationId = row.data('variation') || row.attr('data-variation-id') || '';
            let quantity = parseInt(row.find('.input-qty').val()) || 1;

            // ঘনঘন ক্লিক রুকতে আগের টাইমার বাতিল করা
            clearTimeout(qtyUpdateTimeout);

            // ৩০০ মিডিসেকোন্ড পর ১টি AJAX রিকোয়েস্ট পাঠানো
            qtyUpdateTimeout = setTimeout(function() {
                $.ajax({
                    url: "{{ route('cart.updateQuantity') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        variation_id: variationId,
                        quantity: quantity
                    },
                    success: function(res) {
                        if (res.status && res.cart_count !== undefined) {
                            $('.cart-count').text(res.cart_count);
                            $('#cartCount_header').text(res.cart_count);
                        }
                    },
                    error: function(err) {
                        console.error("Cart update error:", err);
                    }
                });
            }, 300);
        }

        $(document).ready(function() {

            // ✅ Initial Load
            $('.table-row').each(function() {
                updateRowPrice($(this));
            });

            updateCartSummary();
            checkEmptyCart();

            // ✅ Qty Input Event (UI Update + DB Update)
            $(document).on('input', '.input-qty', function() {
                let row = $(this).closest('.table-row');

                updateRowPrice(row);
                updateCartSummary();

                // 👉 DB-তে আপডেট কল করা হলো
                updateCartQuantity(row);

                row.addClass('cart-item');
                $(this).trigger('change');
            });

            // ✅ Plus / Minus Click Event
            $(document).on('click', '.qty-btn-plus, .qty-btn-minus', function() {
                let row = $(this).closest('.table-row');
                let input = row.find('.input-qty');

                setTimeout(() => {
                    input.trigger('input');
                }, 50);
            });

            // ✅ Remove Item Event
            $(document).on('click', '.remove-row', function() {
                let row = $(this).closest('.table-row');
                let productId = row.data('product');
                let variationId = row.data('variation');

                $.ajax({
                    url: "{{ route('cart.remove') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        variation_id: variationId
                    },
                    success: function(res) {
                        if (res.status) {
                            row.fadeOut(300, function() {
                                $(this).remove();
                                updateCartSummary();
                                checkEmptyCart();
                            });

                            $('.cart-count').text(res.cart_count);
                            $('#cartCount_header').text(res.cart_count);
                        }
                    }
                });
            });

        });
    </script>
@endpush
