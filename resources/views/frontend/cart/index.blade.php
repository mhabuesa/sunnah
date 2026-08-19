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

    <style>
        /* Common & Desktop Styles */
        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .cart-table thead th {
            border-bottom: 2px solid #edf2f7;
            color: #4a5568;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 10px;
            text-align: left;
        }

        .cart-table tbody td {
            padding: 16px 10px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        /* Column Widths & Alignments for Desktop */
        .cart-table .col-remove {
            width: 5%;
            text-align: center;
        }

        .cart-table .col-product {
            width: 45%;
        }

        .cart-table .col-price {
            width: 15%;
            text-align: left;
        }

        .cart-table .col-quantity {
            width: 20%;
            text-align: center;
        }

        .cart-table .col-total {
            width: 15%;
            text-align: right;
        }

        /* Quantity Box Alignment */
        .cart-qty-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 4px 10px;
            width: 110px;
            background: #fff;
        }

        .cart-qty-wrapper input {
            width: 35px;
            text-align: center;
            font-weight: 600;
            border: none;
            background: transparent;
            outline: none;
        }

        .qty-btn {
            width: 22px;
            height: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #718096;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .qty-btn:hover {
            background: #edf2f7;
            color: #2d3748;
        }

        .remove-btn {
            color: #a0aec0;
            font-size: 20px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .remove-btn:hover {
            color: #e53e3e;
        }

        /* Mobile Responsive Card Layout (< 768px) */
        @media (max-width: 767px) {
            .cart-table thead {
                display: none;
            }

            .cart-table,
            .cart-table tbody,
            .cart-table tr,
            .cart-table td {
                display: block;
                width: 100%;
            }

            .cart-table tr.table-row {
                position: relative;
                background: #fff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 15px;
                margin-bottom: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            }

            .cart-table td {
                padding: 4px 0 !important;
                border: none !important;
                text-align: left !important;
            }

            .cart-table td.col-remove {
                position: absolute;
                top: 8px;
                right: 12px;
                width: auto;
            }

            .cart-table td.col-product {
                padding-right: 35px !important;
            }

            /* Mobile Bottom Row for Price, Quantity & Total */
            .cart-mobile-footer {
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                margin-top: 12px;
                padding-top: 10px !important;
                border-top: 1px dashed #edf2f7 !important;
            }
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
                            <div class="mb-10">
                                <div class="card border shadow-sm rounded-2">
                                    <div class="card-header border-0">
                                        <strong class="font-size-18 mb-0">Your Cart</strong>
                                    </div>
                                    <div class="card-body mb-4 pt-0">
                                        <!-- Cart Markup -->
                                        <div class="table-responsive-md">
                                            <table class="table cart-table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="col-remove">&nbsp;</th>
                                                        <th class="col-product">Product</th>
                                                        <th class="col-price">Price</th>
                                                        <th class="col-quantity text-center">Quantity</th>
                                                        <th class="col-total text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cartItems as $item)
                                                        @php
                                                            $product = $cartProducts[$item['product_id']] ?? null;
                                                            $variation = $cartVariations[$item['variation_id']] ?? null;
                                                            $price = $variation?->price ?? $product?->price;
                                                        @endphp
                                                        <tr class="table-row cart-item"
                                                            data-product="{{ $item['product_id'] }}"
                                                            data-variation="{{ $item['variation_id'] }}">

                                                            <!-- Delete Icon -->
                                                            <td class="col-remove">
                                                                <a href="javascript:;" class="remove-row remove-btn">×</a>
                                                            </td>

                                                            <!-- Product Image & Meta -->
                                                            <td class="col-product">
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded border p-1 flex-shrink-0"
                                                                        width="60" height="60"
                                                                        src="{{ asset($product?->image) }}"
                                                                        alt="{{ $product?->name }}"
                                                                        style="object-fit: cover;">
                                                                    <div class="ml-3">
                                                                        <a href="{{ route('product', $product->slug) }}"
                                                                            class="font-weight-bold text-dark d-block mb-1 text-decoration-none">
                                                                            {{ $product?->name }}
                                                                        </a>
                                                                        @if ($variation)
                                                                            <span class="text-success font-size-13 d-block">
                                                                                {{ $variation->attribute->name ?? '' }}:
                                                                                {{ $variation->attributeValue->value ?? '' }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- Unit Price (Desktop View) -->
                                                            <td class="col-price d-none d-md-table-cell">
                                                                <span class="price taka font-weight-500"
                                                                    data-price="{{ $price }}">{{ $price }}</span>
                                                            </td>

                                                            <!-- Desktop Quantity Column -->
                                                            <td class="col-quantity d-none d-md-table-cell">
                                                                <div class="cart-qty-wrapper mx-auto">
                                                                    <input class="js-result quantity" type="text"
                                                                        value="{{ $item['qty'] }}"
                                                                        data-product-id="{{ $item['product_id'] }}"
                                                                        data-variation-id="{{ $item['variation_id'] ?? '' }}"
                                                                        readonly>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="js-minus qty-btn qty-btn-minus"
                                                                            href="javascript:;">
                                                                            <i class="fas fa-minus font-size-10"></i>
                                                                        </a>
                                                                        <a class="js-plus qty-btn qty-btn-plus ml-1"
                                                                            href="javascript:;">
                                                                            <i class="fas fa-plus font-size-10"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!-- Desktop Total Price Column -->
                                                            <td class="col-total d-none d-md-table-cell">
                                                                <span
                                                                    class="productPrice font-weight-bold text-dark font-size-16">{{ $item['qty'] * $price }}</span>
                                                            </td>

                                                            <!-- Mobile View Footer Container (Only visible on mobile) -->
                                                            <td class="cart-mobile-footer d-md-none">
                                                                <div>
                                                                    <span
                                                                        class="text-muted font-size-12 d-block">Price</span>
                                                                    <span class="price taka font-weight-500"
                                                                        data-price="{{ $price }}">{{ $price }}</span>
                                                                </div>

                                                                <!-- Quantity Selector -->
                                                                <div class="cart-qty-wrapper">
                                                                    <input class="js-result quantity" type="text"
                                                                        value="{{ $item['qty'] }}"
                                                                        data-product-id="{{ $item['product_id'] }}"
                                                                        data-variation-id="{{ $item['variation_id'] ?? '' }}"
                                                                        readonly>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="js-minus qty-btn qty-btn-minus"
                                                                            href="javascript:;">
                                                                            <i class="fas fa-minus font-size-10"></i>
                                                                        </a>
                                                                        <a class="js-plus qty-btn qty-btn-plus ml-1"
                                                                            href="javascript:;">
                                                                            <i class="fas fa-plus font-size-10"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>


                                                                <!-- Total Price -->
                                                                <div class="text-right">
                                                                    <span
                                                                        class="text-muted font-size-12 d-block">Total</span>
                                                                    <span
                                                                        class="productPrice font-weight-bold text-dark font-size-15">{{ $item['qty'] * $price }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <!-- Empty Cart Row -->
                                                    <tr class="empty-card" style="display: none;">
                                                        <td colspan="5" class="text-center py-5">
                                                            <div class="no-product-found mx-auto text-center" style="max-width: 400px;">
                                                                <img src="{{ asset('frontend') }}/assets/images/cartEmpty.png"
                                                                    alt="Empty Cart" class="img-fluid mb-4"
                                                                    style="opacity: 0.7; max-height: 180px;">
                                                                <h4 class="font-weight-bold mb-2">Your cart is currently
                                                                    empty</h4>
                                                                <p class="text-muted mb-0">
                                                                    Sorry, we couldn't find any items in your cart.
                                                                </p>
                                                                <a href="{{ url('/') }}"
                                                                    class="btn btn-success text-white mt-3 rounded-pill px-4">
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
                        </div>


                        {{-- Billing Section --}}
                        <div class="billing-section " style="display: none;">
                            @include('frontend.cart.partials.billing')
                        </div>
                    </div>
                </div>

                {{-- Cart Total Section --}}
                <div class="cart-total-section col-xxl-3 col-xl-3 col-lg-4" style="display: none;">
                    @include('frontend.cart.partials.cart_total')
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>

    <!-- Cart Section End -->



@endsection

@push('footer_script')
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
            $(document).ready(function() {

                function updateShippingByDistrict() {

                    let districtName = $('#district-select').val();

                    let destination = 'outside_dhaka';
                    let shippingCharge = 120;

                    if (
                        districtName &&
                        districtName.trim().toLowerCase() === 'dhaka'
                    ) {
                        destination = 'inside_dhaka';
                        shippingCharge = 70;
                    }

                    // Shipping Destination update
                    $('#destination').val(destination);

                    // Shipping Charge update
                    $('.shipping-charge')
                        .attr('data-shipping', shippingCharge)
                        .text(shippingCharge.toFixed(2));

                    // Cart total update
                    updateCartSummary();
                }


                // District change হলে
                $('#district-select').on('change', function() {
                    updateShippingByDistrict();
                });


                // Page load হওয়ার সময় selected district অনুযায়ী
                updateShippingByDistrict();

            });

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

                // Check cart items
                let cartItems = $('.table-row').length;

                // Prevent order if cart is empty
                if (cartItems === 0) {
                    e.preventDefault();

                    showToast('Your cart is empty. Please add a product first.', 'error');

                    checkEmptyCart();

                    return false;
                }

                // Final sync before submission
                updateCartSummary();

                // Clear coupon cookies only when cart has products
                setCookie('applied_coupon_code', '', -1);
                setCookie('coupon_discount', '', -1);
                setCookie('free_delivery_active', '', -1);
            });
        });
    </script>

    <script>
        let qtyUpdateTimeout = null;

        function updateRowPrice(row) {
            let price = parseFloat(row.find('.price').data('price')) || 0;
            let qty = parseInt(row.find('.quantity').val()) || 1;

            let total = price * qty;

            row.find('.productPrice').text(total.toFixed(2));
        }


        function updateCartSummary() {
            let subtotal = 0;

            $('.table-row').each(function() {
                let price = parseFloat($(this).find('.price').data('price')) || 0;
                let qty = parseInt($(this).find('.quantity').val()) || 1;

                subtotal += price * qty;
            });

            let shipping = parseFloat($('.shipping-charge').attr('data-shipping')) || 0;

            let isFreeDelivery =
                $('#isFreeDelivery').val() === 'true' ||
                getCookie('free_delivery_active') === 'true';

            if (isFreeDelivery) {
                shipping = 0;
            }

            let couponDiscount =
                parseFloat($('#couponDiscountValue').val()) || 0;

            let appliedCode =
                getCookie('applied_coupon_code') || '';

            let total = (subtotal - couponDiscount) + shipping;

            if (total < 0) {
                total = 0;
            }

            $('.cart-subtotal').text(subtotal.toFixed(2));
            $('.coupon-discount-text').text(
                '(-) ' + couponDiscount.toFixed(2)
            );
            $('.shipping-charge').text(shipping.toFixed(2));
            $('.cart-total').text(total.toFixed(2));

            $('#hidden_subtotal').val(subtotal.toFixed(2));
            $('#hidden_coupon_code').val(appliedCode);
            $('#hidden_coupon_discount').val(
                couponDiscount.toFixed(2)
            );
            $('#hidden_shipping_charge').val(
                shipping.toFixed(2)
            );
            $('#hidden_grand_total').val(
                total.toFixed(2)
            );

            $('#hidden_destination').val(
                $('#destination').val()
            );
        }


        function checkEmptyCart() {

            let cartItems = $('.table-row').length;

            if (cartItems === 0) {

                // Show empty cart message
                $('.empty-card').show();

                // Hide Billing Details
                $('.billing-section').hide();

                // Hide Cart Total
                $('.cart-total-section').hide();

            } else {

                // Hide empty cart message
                $('.empty-card').hide();

                // Show Billing Details
                $('.billing-section').show();

                // Show Cart Total
                $('.cart-total-section').show();
            }
        }


        // ============================
        // Update Quantity in Database
        // ============================
        function updateCartQuantity(row) {

            let productId = row.attr('data-product');
            let variationId = row.attr('data-variation') || '';

            let quantity =
                parseInt(row.find('.quantity').val()) || 1;


            clearTimeout(qtyUpdateTimeout);


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

                        if (res.status) {

                            if (res.cart_count !== undefined) {
                                $('.cart-count').text(res.cart_count);
                                $('#cartCount_header').text(res.cart_count);
                            }

                        }

                    },

                    error: function(xhr) {
                        console.error(
                            'Cart quantity update error:',
                            xhr.responseText
                        );
                    }
                });

            }, 300);
        }



        $(document).ready(function() {


            // ============================
            // Initial Load
            // ============================

            $('.table-row').each(function() {
                updateRowPrice($(this));
            });

            updateCartSummary();
            checkEmptyCart();



            // ============================
            // PLUS BUTTON
            // ============================

            $(document).on(
                'click',
                '.qty-btn-plus',
                function(e) {

                    e.preventDefault();

                    let row = $(this).closest('.table-row');

                    let input = row.find('.quantity');

                    let quantity =
                        parseInt(input.val()) || 1;

                    quantity++;

                    input.val(quantity);

                    updateRowPrice(row);
                    updateCartSummary();
                    updateCartQuantity(row);
                }
            );



            // ============================
            // MINUS BUTTON
            // ============================

            $(document).on(
                'click',
                '.qty-btn-minus',
                function(e) {

                    e.preventDefault();

                    let row = $(this).closest('.table-row');

                    let input = row.find('.quantity');

                    let quantity =
                        parseInt(input.val()) || 1;


                    // Minimum quantity = 1
                    if (quantity > 1) {

                        quantity--;

                        input.val(quantity);

                        updateRowPrice(row);
                        updateCartSummary();
                        updateCartQuantity(row);
                    }

                }
            );



            // ============================
            // REMOVE ITEM
            // ============================

            $(document).on(
                'click',
                '.remove-row',
                function(e) {

                    e.preventDefault();

                    let row =
                        $(this).closest('.table-row');

                    let productId =
                        row.attr('data-product');

                    let variationId =
                        row.attr('data-variation') || '';


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

                                row.fadeOut(
                                    300,
                                    function() {

                                        $(this).remove();

                                        updateCartSummary();
                                        checkEmptyCart();

                                    }
                                );


                                if (res.cart_count !== undefined) {

                                    $('.cart-count')
                                        .text(res.cart_count);

                                    $('#cartCount_header')
                                        .text(res.cart_count);

                                }

                            }

                        },

                        error: function(xhr) {

                            console.error(
                                'Cart remove error:',
                                xhr.responseText
                            );

                        }

                    });

                }
            );

        });
    </script>
@endpush
