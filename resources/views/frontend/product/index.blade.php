@extends('frontend.layouts.app')
@section('title', 'Product Page')
@push('header_script')
@endpush
@section('content')

    <!-- Product Left Sidebar Start -->
    <section class="product-section section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7">
                    <div class="left-card">
                        <div class="row g-xxl-5 g-md-4 g-3">
                            <div class="col-xxl-6">
                                <div class="product-left-box">
                                    <div class="row g-sm-4 g-2">
                                        <div class="col-12">
                                            <div class="swiper product-original-slider product-original-box">
                                                <div class="swiper-wrapper">
                                                    @foreach ($product->galleries as $image)
                                                        <div class="swiper-slide">
                                                            <div class="slider-image">
                                                                <img src="{{ asset($image->image) }}" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="swiper thumbnail-product-slider product-thumbnail-box">
                                                <div class="swiper-wrapper">
                                                    @foreach ($product->galleries as $image)
                                                        <div class="swiper-slide">
                                                            <div class="sidebar-image">
                                                                <img src="{{ asset($image->image) }}" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 border-left-cls">
                                <div class="right-box-contain">
                                    <div class="product-count">
                                        <ul>
                                            <li>
                                                @php
                                                    $orderCount = $product->orderDetails()->count();
                                                @endphp
                                                <i class="ri-flashlight-line"></i>
                                                <h3 class="lang">
                                                    {{ $orderCount }} {{ Str::plural('Customer', $orderCount) }} Ordered
                                                </h3>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="name">{{ $product->name }}</h4>
                                    <h5 class="product-price">
                                        <small id="mobile_total_price">0</small>
                                    </h5>
                                    <div class="price-rating">
                                        <ul class="rating-review-sold-box">
                                            <li>
                                                <h3><i class="ri-star-fill"></i> 4.9 Ratings</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>2.3k+ Reviews</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>{{ $product->orderDetails->sum('qty') }} Sold</h3>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="product-package product-spacing">

                                        @foreach ($product->variations->groupBy('attribute_id') as $variations)
                                            <h4 class="mb-1">
                                                Choose : {{ $variations->first()?->attribute?->name }}
                                            </h4>

                                            <form class="select-package">

                                                @foreach ($variations as $key => $variation)
                                                    <div class="form-check">
                                                        <input class="form-check-input variation-radio" type="radio"
                                                            name="variation_{{ $variation->attribute_id }}"
                                                            {{ $key == 0 ? 'checked' : '' }} value="{{ $variation->id }}"
                                                            data-name="{{ $variation->attributeValue?->value }}"
                                                            data-price="{{ $variation->price }}"
                                                            data-stock="{{ $variation->stock }}"
                                                            id="var{{ $variation->id }}">

                                                        <label class="form-check-label" for="var{{ $variation->id }}">
                                                            {{ $variation->attributeValue?->value }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </form>
                                        @endforeach

                                    </div>


                                    @php
                                        if ($product->variations && $product->variations->count() > 0) {
                                            $stock = $product->variations->sum('stock');
                                        } else {
                                            $stock = $product->stock;
                                        }
                                        $maxStock = 100;
                                        $percentage = $maxStock > 0 ? ($stock / $maxStock) * 100 : 0;
                                        $percentage = min($percentage, 100);
                                    @endphp

                                    <div class="hurry-up-box">
                                        <h5>
                                            There are just
                                            <span class="theme-color">{{ $stock }}</span>
                                            left in stock, so please act immediately.
                                        </h5>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                style="width: {{ $percentage }}%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-md-start text-center">
                                        <div class="qty-box h-100 qty-container quantity-box-2">
                                            <button class="btn qty-btn m-minus">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            {{-- <input type="number" readonly name="qty"
                                                class="qty-input form-control input-qty" value="1"> --}}

                                            <input class="qty-input form-control" id="mobile_qty" value="1"
                                                min="1">
                                            <button class="btn qty-btn m-plus">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="button-group d-lg-none">
                                        <button onclick="location.href = 'checkout.html';"
                                            class="btn buy-btn theme-bg-color text-white">Buy now</button>
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn buy-btn-2 theme-border fw-500">
                                            <i class="ri-shopping-bag-line"></i> Add to bag</button>
                                    </div>

                                    <ul class="size-delivery-info">
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#deliveryModal">
                                                <i class="ri-truck-line"></i>
                                                <span>Delivery & Return</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#questionModal">
                                                <i class="ri-questionnaire-line"></i>
                                                <span>Ask a question</span>
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="about-item-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>About Item :</h4>
                                        </div>

                                        <ul class="about-item-list">
                                            <li>Brand : <span>Apple</span></li>
                                            <li>Category : <span>Electronic</span></li>
                                            <li>Condition : <span>Brand new</span></li>
                                            <li>Color : <span>Deep purple</span></li>
                                            <li>Material : <span>Model name</span></li>
                                            <li>Operating system : <span>iOS</span></li>
                                        </ul>
                                    </div>

                                    <div class="description-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>Description :</h4>
                                        </div>

                                        <ul class="description-list">
                                            <li>15.40 cm (6.1-inch) Super Retina XDR display</li>
                                            <li>Advanced camera system for better photos in any light</li>
                                            <li>Cinematic mode now in 4K Dolby Vision up to 30 fps</li>
                                            <li>Action mode for smooth, steady, handheld videos</li>
                                        </ul>
                                    </div>

                                    <div class="shipping-info-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>Shipping Information</h4>
                                        </div>
                                        <ul class="shipping-info-list">
                                            <li>Delivery: <span>Shipping from jakarta, indonesia</span></li>
                                            <li>Shipping: <span>Free international shipping</span></li>
                                            <li>Arrive: <span>Estimated arrival on 25 - 27 Oct 2025</span></li>
                                        </ul>
                                    </div>

                                    <div class="delivery-info product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>Delivery Details</h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <i class="ri-truck-line"></i>
                                                <span>Your order is likely to reach you within 5 to 10 days</span>
                                            </li>
                                            <li>
                                                <i class="ri-arrow-left-right-line"></i>
                                                <span>This product is non-returnable.</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="payment-option product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>Guaranteed Safe Checkout</h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#!">
                                                    <img src="{{ asset('frontend') }}/assets/images/payment/1.svg"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <img src="{{ asset('frontend') }}/assets/images/payment/2.svg"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <img src="{{ asset('frontend') }}/assets/images/payment/3.svg"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <img src="{{ asset('frontend') }}/assets/images/payment/4.svg"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <img src="{{ asset('frontend') }}/assets/images/payment/5.svg"
                                                        alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="social-option  product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>Share it</h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/" target="_blank">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/" target="_blank">
                                                    <i class="ri-twitter-x-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/" target="_blank">
                                                    <i class="ri-instagram-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://in.pinterest.com/" target="_blank">
                                                    <i class="ri-pinterest-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://web.whatsapp.com/" target="_blank">
                                                    <i class="ri-whatsapp-fill"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block">
                    <div class="right-sidebar-box">
                        <div class="side-product-detail">
                            <div class="side-title">
                                <h4>Assign Order</h4>
                            </div>

                            <div class="side-product-box">
                                <div class="product-image">
                                    <img class="lazy img-fluid" data-src="{{ asset($product->image) }}">
                                </div>
                                <div class="product-contain">
                                    <h4>Select option</h4>
                                    <h4 id="selected_option_text"></h4>
                                </div>
                            </div>

                            <div class="qty-stock-box">
                                <div class="qty-box h-100 qty-container quantity-box-2">
                                    <button class="btn qty-btn s-minus">
                                        <i class="ri-subtract-line"></i>
                                    </button>
                                    {{-- <input type="number" readonly="" name="qty"
                                        class="qty-input form-control input-qty" value="1" min="1"> --}}

                                    <input class="qty-input form-control" id="sidebar_qty" value="1"
                                        min="1">
                                    <button class="btn qty-btn s-plus">
                                        <i class="ri-add-line"></i>
                                    </button>
                                </div>
                                <div class="stock-box">
                                    <h5>stock: <span id="stock_value">0</span></h5>
                                </div>
                            </div>

                            <div class="total-price-box">
                                <h4><span>Total Price:</span><small id="total_price">0</small></h4>
                            </div>

                            <input type="hidden" name="selected_variations" id="selected_variations">

                            <div class="button-group">
                                <button onclick="location.href = 'checkout.html';"
                                    class="btn buy-btn theme-bg-color text-white">Buy now</button>
                                <button onclick="location.href = 'cart.html';" class="btn buy-btn theme-border fw-500">
                                    <i class="ri-shopping-bag-line"></i> Add to bag</button>
                            </div>

                            <div class="seller-product">
                                <h5>
                                    <a href="#!"><i class="ri-message-2-fill"></i> Chat Seller</a>
                                </h5>
                                <h5>
                                    <a href="#shareProductModal" data-bs-toggle="modal"><i class="ri-share-fill"></i>
                                        Share Product</a>
                                </h5>
                            </div>
                        </div>

                        <a href="shop-left-sidebar.html" class="banner-box">
                            <img src="{{ asset('frontend') }}/assets/images/banner/44.jpg" class="img-fluid"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->



@endsection

@push('footer_script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let selectedVariations = {};
            let basePrice = {{ $product->price ?? 0 }};
            let currentStock = {{ $product->stock ?? 0 }};

            const mobileQty = document.getElementById('mobile_qty');
            const sidebarQty = document.getElementById('sidebar_qty');

            // =========================
            // SAFE QTY
            // =========================
            function getQty(input) {
                let qty = parseInt(input?.value || 1);
                if (isNaN(qty) || qty < 1) qty = 1;
                if (qty > currentStock) qty = currentStock;
                return qty;
            }

            // =========================
            // SET QTY
            // =========================
            function setQty(input, value) {
                if (!input) return;

                value = parseInt(value);
                if (isNaN(value) || value < 1) value = 1;
                if (value > currentStock) value = currentStock;

                input.value = value;
            }

            // =========================
            // UPDATE PRICE (IMPORTANT FIX HERE)
            // =========================
            function updatePrice() {

                let mobileQtyVal = getQty(mobileQty);
                let sidebarQtyVal = getQty(sidebarQty);

                // 👉 BOTH update independently
                let mobileTotal = (basePrice * mobileQtyVal).toFixed(2);
                let sidebarTotal = (basePrice * sidebarQtyVal).toFixed(2);

                document.getElementById('mobile_total_price').innerText = '৳' + mobileTotal;
                document.getElementById('total_price').innerText = '৳' + sidebarTotal;

                document.getElementById('stock_value').innerText = currentStock;

                let names = Object.values(selectedVariations).map(v => v.name);
                document.getElementById('selected_option_text').innerText =
                    names.length ? names.join(', ') : "Default Product";

                document.getElementById('selected_variations').value =
                    JSON.stringify(selectedVariations);
            }

            // =========================
            // VARIATION CHANGE
            // =========================
            document.querySelectorAll('.variation-radio').forEach(radio => {

                radio.addEventListener('change', function() {

                    selectedVariations[this.name] = {
                        id: this.value,
                        name: this.dataset.name,
                        price: parseFloat(this.dataset.price),
                        stock: parseInt(this.dataset.stock)
                    };

                    basePrice = parseFloat(this.dataset.price);
                    currentStock = parseInt(this.dataset.stock);

                    setQty(mobileQty, 1);
                    setQty(sidebarQty, 1);

                    updatePrice();
                });
            });

            // =========================
            // MOBILE BUTTONS
            // =========================
            document.querySelectorAll('.m-plus, .m-minus').forEach(btn => {

                btn.addEventListener('click', function() {

                    let qty = getQty(mobileQty);

                    if (this.classList.contains('m-plus')) qty++;
                    if (this.classList.contains('m-minus')) qty--;

                    setQty(mobileQty, qty);
                    updatePrice();
                });
            });

            // =========================
            // SIDEBAR BUTTONS
            // =========================
            document.querySelectorAll('.s-plus, .s-minus').forEach(btn => {

                btn.addEventListener('click', function() {

                    let qty = getQty(sidebarQty);

                    if (this.classList.contains('s-plus')) qty++;
                    if (this.classList.contains('s-minus')) qty--;

                    setQty(sidebarQty, qty);
                    updatePrice();
                });
            });

            // =========================
            // INIT
            // =========================
            function init() {
                let first = document.querySelector('.variation-radio:checked');

                if (first) first.dispatchEvent(new Event('change'));
                else updatePrice();
            }

            init();

        });
    </script>
@endpush
