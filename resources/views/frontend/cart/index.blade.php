@extends('frontend.layouts.app')
@section('title', 'Cart Page')
@push('header_script')
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
            <div class="row g-sm-4 g-3 mb-3">
                <div class="col-xxl-9 col-xl-8 col-lg-7">
                    <div class="row">
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
                                                        <h3 class="price" data-price="{{ $price }}">
                                                            ৳{{ $price }}
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <div class="quantity-box qty-container quantity-box-2">
                                                            <button class="btn qty-btn-minus">
                                                                <i class="ri-subtract-line"></i>
                                                            </button>
                                                            <input type="number" name="qty"
                                                                class="quantity form-control input-qty"
                                                                value="{{ $item['qty'] }}" min="0">
                                                            <button class="btn qty-btn-plus">
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
                                                        <h4 class="h5 productPrice">৳000</h4>
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
                        <div class="col-12">
                            <div class="checkout-left-box">
                                <div class="billing-box checkbox-bg-color">
                                    <div class="checkout-title">
                                        <h4>Billing details</h4>
                                    </div>

                                    <form class="row g-sm-4 g-3 needs-validation theme-form" novalidate="">
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details1" class="form-label">First name <span>*</span></label>
                                            <input type="text" placeholder="Enter your first name" class="form-control"
                                                id="details1">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details2" class="form-label">Last name <span>*</span></label>
                                            <input type="text" class="form-control" id="details2"
                                                placeholder="Enter your first name">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details4" class="form-label">Email Address <span>*</span></label>
                                            <input type="email" class="form-control" id="details4"
                                                placeholder="Enter your Email address">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details5" class="form-label">Phone Number <span>*</span></label>
                                            <input type="number" class="form-control" id="details5"
                                                placeholder="Enter your number" oninput="limitLength(this)"
                                                required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details6" class="form-label">Street Address <span>*</span></label>
                                            <input type="text" class="form-control" id="details6"
                                                placeholder="Enter your street address">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details7" class="form-label">Apartment/Suite (Optional)
                                                <span>*</span></label>
                                            <input type="text" class="form-control" id="details7"
                                                placeholder="Enter your apartment/suite (optional)">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details8" class="form-label">City <span>*</span></label>
                                            <input type="text" class="form-control" id="details8"
                                                placeholder="Enter your city">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details9" class="form-label">State/Province/Region
                                                <span>*</span></label>
                                            <input type="text" class="form-control" id="details9"
                                                placeholder="Enter your state/province/region">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details10" class="form-label">ZIP/Postal Code
                                                <span>*</span></label>
                                            <input type="text" class="form-control" id="details10"
                                                placeholder="Enter your ZIP/postal code">
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-sm-6">
                                            <label for="details11" class="form-label">Country <span>*</span></label>
                                            <input type="text" class="form-control" id="details11"
                                                placeholder="Enter your country">
                                        </div>
                                        <div class="col-12">
                                            <label for="details12" class="form-label">Payment Method
                                                <span>*</span></label>
                                            <select class="form-select" id="details12">
                                                <option selected="" disabled="">Choose payment method</option>
                                                <option value="1">Credit/Debit Card</option>
                                                <option value="2">PayPal / Digital Wallet Options</option>
                                                <option value="3">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <ul class="checkout-list">
                                                <li class="form-check theme-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="list">
                                                    <label class="form-check-label" for="list">Create an
                                                        account?</label>
                                                </li>
                                                <li class="form-check theme-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="list1">
                                                    <label class="form-check-label" for="list1">Ship to a different
                                                        address?</label>
                                                </li>
                                                <li class="form-check theme-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="list2">
                                                    <label class="form-check-label" for="list2">Sign me up to receive
                                                        email
                                                        updates and news (optional)</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <label for="details14" class="form-label">Order Notes (Optional)
                                                <span>*</span></label>
                                            <textarea class="form-control" id="details14" rows="4" placeholder="Any special instructions for the order"></textarea>
                                        </div>
                                    </form>
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
                                        <h4 class="price cart-subtotal">৳0</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon Discount</h4>
                                        <h4 class="price">(-) 0.00</h4>
                                    </li>

                                    <li>
                                        <h4>Shipping</h4>
                                        <h4 class="price text-end">$6.90</h4>
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
                                                        <form>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Apply code">
                                                                <button class="input-group-text"
                                                                    id="basic-addon1">Apply</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h3 class="h4">Total (USD)</h3>
                                    <h4 class="price theme-color cart-total">৳0</h4>
                                </li>
                            </ul>


                            <div class="accordion checkout-payment-accordion section-t-space-2" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="accordion-header" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo">
                                        <div class="form-check">
                                            <input class="form-check-input" name="flexRadioDefault" type="radio"
                                                id="pay1" checked>
                                            <label class="form-check-label" for="pay1"><span class="circle"></span>
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
                                            <label class="form-check-label" for="pay2"><span class="circle"></span>
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

                            <button onclick="location.href = 'checkout.html';" class="btn proceed-btn">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->



@endsection

@push('footer_script')
    <script>
        function updateRowPrice(row) {
            let price = parseFloat(row.find('.price').data('price')) || 0;
            let qty = parseInt(row.find('.input-qty').val()) || 1;

            let total = price * qty;

            row.find('.productPrice').text('৳' + total);
        }

        function updateCartSummary() {

            let subtotal = 0;

            $('.table-row').each(function() {
                let price = parseFloat($(this).find('.price').data('price')) || 0;
                let qty = parseInt($(this).find('.input-qty').val()) || 1;

                subtotal += price * qty;
            });

            $('.cart-subtotal').text('৳' + subtotal);
            $('.cart-total').text('৳' + subtotal);
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
