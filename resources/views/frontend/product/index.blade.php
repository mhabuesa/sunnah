@extends('frontend.layouts.app')
@section('title', 'Product Page')
@push('header_script')
@endpush
@section('content')

    <!-- Product Left Sidebar Start -->
    <section class="product-section section-t-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-10 col-xl-8 col-lg-7">
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
                                                    {{ shortNumber($orderCount) }}
                                                    {{ Str::plural('Customer', $orderCount) }} Ordered
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

                                    <div class="about-item-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>About Item :</h4>
                                        </div>

                                        <ul class="about-item-list">
                                            <li>Brand : <span>{{ $product->brand->name }}</span></li>
                                            <li>Category : <span>{{ $product->category->name }}</span></li>
                                        </ul>
                                    </div>


                                </div>

                                <div class="right-sidebar-box  d-lg-block">
                                    <div class="side-product-detail">
                                        <div class="qty-stock-box">
                                            <div class="qty-box h-100 qty-container quantity-box-2">
                                                <button class="btn qty-btn s-minus">
                                                    <i class="ri-subtract-line"></i>
                                                </button>
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

                                        <div class="button-group d-flex">
                                            <button onclick="location.href = 'checkout.html';"
                                                class="btn buy-btn theme-bg-color text-white w-50">Buy now</button>
                                            <button onclick="location.href = 'cart.html';"
                                                class="btn buy-btn-2 theme-border fw-500 w-50">
                                                <i class="ri-shopping-bag-line"></i> Add to bag</button>
                                        </div>

                                        <div class="seller-product">
                                            <h5>
                                                <a href="#!"><i class="ri-message-2-fill"></i> Chat Seller</a>
                                            </h5>
                                            <h5>
                                                <a href="#shareProductModal" data-bs-toggle="modal"><i
                                                        class="ri-share-fill"></i>
                                                    Share Product</a>
                                            </h5>
                                        </div>
                                    </div>

                                    {{-- <a href="shop-left-sidebar.html" class="banner-box">
                                        <img src="{{ asset('frontend') }}/assets/images/banner/44.jpg" class="img-fluid"
                                            alt="">
                                    </a> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block">
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
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->


    <!-- Nav Tab Section Start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="product-section-box m-0">
                <ul class="nav nav-tabs custom-nav" id="myTab">
                    <li class="nav-item">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button">Description</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button">Review</button>
                    </li>
                </ul>

                <div class="tab-content custom-tab" id="myTabContent">

                    <div class="tab-pane fade active show" id="description">
                        <div class="product-description">
                            <div class="nav-desh">
                                <p>There is the Dynamic Island on the display instead of a notch, which launched
                                    with the iPhone 14 Pro models. The pill-shaped cutout gives you better
                                    visibility of ongoing activities and alerts and new multi-tasking abilities.
                                    The standard iPhone 15 model inherits several features from last year's
                                    iPhone 14 Pro series, including an improved Dynamic Island, the A16 Bionic
                                    chip, and a 48MP main camera. There are additionally five colors to choose
                                    from in a textured matte finish: pink, yellow, blue, green and black
                                </p>
                            </div>

                            <div class="nav-desh">
                                <div class="desh-title">
                                    <h5>Display :</h5>
                                </div>
                                <p>Apple iPhone 15 Pro models could have a 6.7-inch ProMotion display (with
                                    Always-on mode) while the iPhone 15 and iPhone 15 Plus could have a 6.1-inch
                                    display.</p>
                            </div>

                            <div class="nav-desh">
                                <div class="desh-title">
                                    <h5>Cameras :</h5>
                                </div>
                                <p>While the vanilla variants could have similar camera specs as before, the
                                    Pro Max model could sport an almost 1-inch sensor and a periscope telephoto
                                    lens (with 5x/6x zoom).</p>
                            </div>

                            <div class="nav-desh">
                                <div class="desh-title">
                                    <h5>Processor :</h5>
                                </div>
                                <p>iPhone 15 and iPhone 15 Plus could come powered by last-gen A16 Bionic chip
                                    but the Pro models could have a newer 3nm A17 Bionic chipset along with 8GB
                                    of RAM.</p>
                            </div>

                            <div class="nav-desh">
                                <div class="desh-title">
                                    <h5>Battery :</h5>
                                </div>
                                <p>All iPhones could have bigger batteries viz. a 3,877mAh battery on the iPhone
                                    15, a 4,912mAh battery on the iPhone 15 Plus, a 3,650mAh battery on the
                                    iPhone 15 Pro, and a 4,852mAh battery on the iPhone 15 Pro Max. At least the
                                    Pro models are expected to feature 35W wired charging and Qi2 Magnate
                                    charging support</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="review">
                        <div class="review-box">
                            <div class="row g-xl-5 g-md-4 g-3">
                                <div class="col-xl-6 b-end">
                                    <div class="review-title">
                                        <h4>Customer reviews</h4>
                                    </div>

                                    <div class="customer-review-box">
                                        <h5>4.2 <span>/5</span></h5>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li class="theme-color">
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li class="theme-color">
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li class="theme-color">
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li class="theme-color">
                                                    <i class="ri-star-fill fill"></i>
                                                </li>
                                                <li>
                                                    <i class="ri-star-line"></i>
                                                </li>
                                            </ul>
                                            <h6>35K ratings</h6>
                                        </div>
                                    </div>

                                    <div class="rating-box">
                                        <ul>
                                            <li>
                                                <div class="rating-list">
                                                    <h5>5 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 68%">68%</div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="rating-list">
                                                    <h5>4 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 67%">67%</div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="rating-list">
                                                    <h5>3 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 42%">42%</div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="rating-list">
                                                    <h5>2 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 30%">30%</div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="rating-list">
                                                    <h5>1 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 24%">24%</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="review-title">
                                        <h4 class="fw-500">Add a review</h4>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                        <div class="col-md-6">
                                            <div class="review-form-box theme-form">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter your name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="review-form-box theme-form">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="review-form-box theme-form">
                                                <label class="form-label" for="floatingTextarea2">Write Your
                                                    Comment</label>
                                                <textarea class="form-control" id="floatingTextarea2" placeholder="Leave a comment here" style="height: 150px"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn theme-bg-color text-light">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-review-box">
                                <div class="review-title">
                                    <h4 class="fw-500">Customer Reviews</h4>
                                    <div class="sort-message">
                                        <span>Sort By :</span>
                                        <select class="form-select">
                                            <option selected="">Newest</option>
                                            <option value="1">Oldest</option>
                                            <option value="2">Top</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="review-people">
                                    <ul class="review-list">
                                        <li>
                                            <div class="people-box">
                                                <div>
                                                    <div class="people-image">
                                                        <img src="{{ asset('frontend') }}/assets/images/review/1.jpg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </div>

                                                <div class="people-comment">
                                                    <div class="name">
                                                        <a href="#!">Tracey</a>
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li>
                                                                    <i class="ri-star-fill fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-fill fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="date-time">
                                                        <h5 class="text-content h6">1 week ago</h5>
                                                    </div>

                                                    <div class="reply">
                                                        <p>Icing cookie carrot cake chocolate cake sugar
                                                            plum jelly-o danish. Dragée dragée shortbread
                                                            tootsie roll croissant muffin cake I love gummy
                                                            bears. Candy canes ice cream caramels tiramisu
                                                            marshmallow cake shortbread candy canes cookie.
                                                        </p>
                                                    </div>

                                                    <ul class="share-box">
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-heart-3-line"></i>
                                                                <span>Like</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-share-line"></i>
                                                                <span>Reply</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="people-box">
                                                <div>
                                                    <div class="people-image">
                                                        <img src="{{ asset('frontend') }}/assets/images/review/5.jpg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </div>

                                                <div class="people-comment">
                                                    <div class="name">
                                                        <a href="#!">Kianna Gulgowski</a>
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="date-time">
                                                        <h6 class="text-content">1 week ago</h6>
                                                    </div>

                                                    <div class="reply">
                                                        <p>Icing cookie carrot cake chocolate cake sugar
                                                            plum jelly-o danish. Dragée dragée shortbread
                                                            tootsie roll croissant muffin cake I love gummy
                                                            bears. Candy canes ice cream caramels tiramisu
                                                            marshmallow cake shortbread candy canes cookie.
                                                        </p>
                                                    </div>

                                                    <ul class="share-box">
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-heart-3-line"></i>
                                                                <span>Like</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-share-line"></i>
                                                                <span>Reply</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="people-box">
                                                <div>
                                                    <div class="people-image">
                                                        <img src="{{ asset('frontend') }}/assets/images/review/6.jpg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </div>

                                                <div class="people-comment">
                                                    <div class="name">
                                                        <a href="#!">Ariane Fritsch</a>
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li class="theme-color">
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="ri-star-line"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="date-time">
                                                        <h6 class="text-content">1 week ago</h6>
                                                    </div>

                                                    <div class="reply">
                                                        <p>Icing cookie carrot cake chocolate cake sugar
                                                            plum jelly-o danish. Dragée dragée shortbread
                                                            tootsie roll croissant muffin cake I love gummy
                                                            bears. Candy canes ice cream caramels tiramisu
                                                            marshmallow cake shortbread candy canes cookie.
                                                        </p>
                                                    </div>

                                                    <ul class="share-box">
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-heart-3-line"></i>
                                                                <span>Like</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">
                                                                <i class="ri-share-line"></i>
                                                                <span>Reply</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Nav Tab Section End -->



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
