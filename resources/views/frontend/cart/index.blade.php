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
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <h2>Shopping Cart</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



    <!-- Cart Section Start -->
    <section class="section-t-space cart-section checkout-section-new">
        <div class="custom-container">
            <form action="">
                <div class="row g-sm-4 g-3 mb-3">
                    <div class="col-xxl-9 col-xl-8 col-lg-7">
                        <div class="row">
                            {{-- Cart Section --}}
                            <div class="col-12 mb-3">
                                <div class="cart-table2">
                                    <div class="table-title">
                                        <h2>Cart <span>({{ $cartCount }})</span></h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table cart-table-box">
                                            <tbody>
                                                @foreach ($cartItems as $item)
                                                    @php
                                                        $product = $cartProducts[$item['product_id']] ?? null;
                                                        $variation = $cartVariations[$item['variation_id']] ?? null;

                                                        $price = $variation?->price ?? $product?->price;
                                                    @endphp


                                                    <tr class="table-row cart-item" data-product="{{ $item['product_id'] }}"
                                                        data-variation="{{ $item['variation_id'] }}">
                                                        <td>
                                                            <div class="cart-box">
                                                                <div class="cart-image">
                                                                    <a href="product-color.html">
                                                                        <img src="{{ asset($product?->image) }}"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                    <i class="ri-heart-3-line"></i>
                                                                    <i class="ri-heart-3-fill"></i>
                                                                </div>
                                                                <div class="cart-contain">
                                                                    <a href="product-color.html">
                                                                        <h3>{{ $product->name }}</h3>
                                                                    </a>
                                                                    @if ($variation)
                                                                        <span class="text-success">
                                                                            {{ $variation->attributeValue->value ?? '' }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h3 class="price taka d-inline"
                                                                data-price="{{ $price }}">
                                                                {{ $price }} </h3>
                                                        </td>
                                                        <td>
                                                            <div class="quantity-box qty-container quantity-box-2">
                                                                <button class="btn qty-btn-minus" type="button">
                                                                    <i class="ri-subtract-line"></i>
                                                                </button>
                                                                <input type="number" name="qty"
                                                                    class="quantity form-control input-qty"
                                                                    value="{{ $item['qty'] }}" min="0">
                                                                <button class="btn qty-btn-plus" type="button">
                                                                    <i class="ri-add-line"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="remove-row btn">
                                                                <i class="ri-delete-bin-7-line"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <h4 class="h5 productPrice taka">000</h4>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr class="empty-card">
                                                    <td colspan="5" class="text-center py-5">
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

                            {{-- Billing Section --}}
                            <div class="col-12">
                                <div class="checkout-left-box">
                                    <div class="billing-box checkbox-bg-color">
                                        <div class="checkout-title">
                                            <h4>Billing details</h4>
                                        </div>

                                        <div class="row g-sm-4 g-3 needs-validation theme-form" novalidate="">
                                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                                <label for="name" class="form-label">Full Name<span>*</span></label>
                                                <input type="text" placeholder="Enter your Full Name"
                                                    class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                <label for="email" class="form-label">Email Address <small
                                                        class="text-muted fs-small">(Optional)</small></label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter your Email address" name="email">
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-sm-6">
                                                <label for="phone" class="form-label">Phone Number <span>*</span></label>
                                                <input type="number" class="form-control" id="phone"
                                                    placeholder="Enter your number" oninput="limitLength(this)"
                                                    required="">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                                <label for="address" class="form-label">Full Address
                                                    <span>*</span></label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Enter your Full Address" name="address" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="destination" class="form-label">District
                                                    <span>*</span></label>
                                                <select id="search-select" name="district_id"
                                                    placeholder="Search District...">
                                                    <option value=""></option> {{-- Placeholder er jonno eta faka rakha lagbe --}}
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-6">
                                                <label for="destination" class="form-label">Shipping Destination
                                                    <span>*</span></label>
                                                <select class="form-select" id="destination" name="destination" disabled>
                                                    <option value="inside_dhaka">Inside Dhaka</option>
                                                    <option value="outside_dhaka">Outside Dhaka</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <ul class="checkout-list">
                                                    <li class="form-check theme-checkbox">
                                                        <input class="form-check-input" type="checkbox" id="list">
                                                        <label class="form-check-label" for="list">Create an
                                                            account?</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <label for="note" class="form-label">Order Notes (Optional)
                                                    <span>*</span></label>
                                                <textarea class="form-control" id="note" rows="4" placeholder="Any special instructions for the order"
                                                    name="order_note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-5">
                        <div class="right-summery-box">
                            <div class="summery-box">
                                <div class="summery-header">
                                    <h3>Cart Total</h3>
                                </div>

                                <div class="summery-contain">
                                    <ul>
                                        <li>
                                            <h4>Subtotal</h4>
                                            <h4 class="price cart-subtotal taka">0</h4>
                                        </li>

                                        <li>
                                            <h4>Coupon Discount</h4>
                                            <h4 class="price taka coupon-discount-text">(-) 0.00</h4>
                                        </li>

                                        <li>
                                            <h4>Shipping</h4>
                                            <h4 class="price text-end taka shipping-charge" data-shipping="0">0</h4>
                                        </li>
                                        <li>
                                            <div class="accordion promo-code-accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne">Add
                                                            promo code</button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            {{-- Coupon Input Area --}}
                                                            <div id="coupon-input-group" class="input-group">
                                                                <input type="text" id="coupon_code_input"
                                                                    class="form-control" placeholder="Apply code">
                                                                <button class="input-group-text bg-success text-white"
                                                                    type="button" id="submitCoupon">Apply</button>
                                                            </div>

                                                            {{-- Coupon Applied Area (Default Hide) --}}
                                                            <div id="coupon-applied-group" class="d-none">
                                                                <div
                                                                    class="alert alert-success d-flex justify-content-between align-items-center p-2 mb-0">
                                                                    <span>Applied: <strong
                                                                            id="applied_code_text"></strong></span>
                                                                    <a href="javascript:void(0)" id="clearCouponBtn"
                                                                        class="text-danger fw-bold">Remove</a>
                                                                </div>
                                                            </div>
                                                            <small id="coupon_msg" class="text-danger d-none"></small>
                                                        </div>

                                                        {{-- Hidden Fields for calculations --}}
                                                        <input type="hidden" id="couponDiscountValue" value="0">
                                                        <input type="hidden" id="isFreeDelivery" value="false">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="summery-total">
                                    <li class="list-total border-top-0">
                                        <h3 class="h4">Total (USD)</h3>
                                        <h4 class="price theme-color cart-total taka">0</h4>
                                    </li>
                                </ul>


                                <div class="accordion checkout-payment-accordion section-t-space-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="accordion-header" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo">
                                            <div class="form-check">
                                                <input class="form-check-input" name="flexRadioDefault" type="radio"
                                                    id="pay1" checked>
                                                <label class="form-check-label" for="pay1"><span
                                                        class="circle"></span>
                                                    Paypal
                                                    Express Checkout</label>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><i class="ri-check-line"></i> Enjoy <span>Buyer production</span> with
                                                    Klarna. See <span>Payment options</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree">
                                            <div class="form-check">
                                                <input class="form-check-input" name="flexRadioDefault" type="radio"
                                                    id="pay2">
                                                <label class="form-check-label" for="pay2"><span
                                                        class="circle"></span>
                                                    Amazon
                                                    Pay</label>
                                            </div>
                                        </div>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><i class="ri-check-line"></i> Enjoy <span>Buyer production</span> with
                                                    Klarna. See <span>Payment options</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn proceed-btn">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Cart Section End -->



@endsection

@push('footer_script')
    <!-- Selectize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>

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
        });
    </script>



    <script>
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

            // Calculation
            let total = (subtotal - couponDiscount) + shipping;

            // UI Updates
            $('.cart-subtotal').text(subtotal.toFixed(2));
            $('.coupon-discount-text').text('(-) ' + couponDiscount.toFixed(2)); // summary section e thaka dorkar
            $('.shipping-charge').text(shipping.toFixed(2));
            $('.cart-total').text(total < 0 ? 0 : total.toFixed(2));
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
    </script>
@endpush
