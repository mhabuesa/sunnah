<div class="d-lg-block position-sticky mb-3" style="top: 5px;">
    <div class="card border shadow-sm rounded-2">
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
                        <input type="text" class="form-control" name="text" id="coupon_code_input"
                            placeholder="Coupon code" aria-label="Coupon code"
                            aria-describedby="subscribeButtonExample2">
                        <div class="input-group-append">
                            <button type="button" id="submitCoupon" class="btn btn-dark px-3 py-1">
                                Apply
                            </button>
                        </div>
                    </div>
                    {{-- Coupon Applied Area (Default Hide) --}}
                    <div id="coupon-applied-group" class="d-none">
                        <div class="alert alert-success d-flex justify-content-between align-items-center p-2 mb-0">
                            <span>Applied: <strong id="applied_code_text"></strong></span>
                            <a href="javascript:void(0)" id="clearCouponBtn" class="text-danger fw-bold">Remove</a>
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
                <span class="fw-bold font-size-20 text-success price theme-color cart-total taka">৳0.00</span>
            </div>

            <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                <!-- Basics Accordion -->
                <div id="basicsAccordion1">
                    <!-- Card -->
                    <div class="border-bottom border-color-1 border-dotted-bottom">
                        <div class="p-3" id="basicsHeadingOne">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="stylishRadio1"
                                    name="payment_method" value="cod" checked="">
                                <label class="custom-control-label form-label" for="stylishRadio1"
                                    data-toggle="collapse" data-target="#basicsCollapseOnee" aria-expanded="true"
                                    aria-controls="basicsCollapseOnee">
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
                                <input type="radio" class="custom-control-input" id="bkash" name="payment_method"
                                    value="bkash">
                                <label class="custom-control-label form-label" for="bkash" data-toggle="collapse"
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

            <input type="hidden" name="subtotal" id="hidden_subtotal">
            <input type="hidden" name="coupon_code" id="hidden_coupon_code">
            <input type="hidden" name="coupon_discount" id="hidden_coupon_discount">
            <input type="hidden" name="shipping_charge" id="hidden_shipping_charge">
            <input type="hidden" name="grand_total" id="hidden_grand_total">

            <input type="hidden" name="shipping_destination" id="hidden_destination">


            {{-- Place Order --}}
            <button type="submit" class="btn btn-primary-dark w-100 py-3 fw-bold rounded-2">
                Place Order
            </button>

        </div>



    </div>
</div>
