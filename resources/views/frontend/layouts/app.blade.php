<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'App') | {{ config('app.name', 'Dev Hunter') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Kartify">
    <meta name="keywords" content="Kartify">
    <meta name="author" content="Kartify">
    <link rel="icon" href="{{ asset(setting()->favicon) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset(setting()->favicon) }}">
    <meta name="title-color" content="#ff9900">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Kartify">
    <meta name="msapplication-TileImage" content="{{ asset(setting()->favicon) }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Manifest Link --}}
    <link rel="manifest" href="{{ url('/manifest.json') }}">

    <!-- Bootstrap Link -->
    <link rel="stylesheet" id="rtl-link" type="text/css"
        href="{{ asset('frontend') }}/assets/css/vendors/bootstrap.css">

    <!-- Iconsax Icon Link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/vendors/iconsax.css">

    <!-- Remix Icon Link -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/vendors/remixicon.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Swiper Link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/vendors/swiper.css">

    <!-- Style Link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/style.css">

    <!-- Custom Style Link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/custom/style.css">

    @stack('header_script')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


</head>

<body class="base-bg-color">
    <!-- Header Start -->
    @include('frontend.layouts.partials.header')
    <!-- Header End -->

    <!-- Mobile Menu Start -->
    @include('frontend.layouts.partials.mobile_menu')
    <!-- Mobile Menu End -->

    {{-- Home Content --}}
    @yield('content')
    {{-- Home Content End --}}


    <!-- Footer Section Start -->
    <footer class="footer-section">
        <div class="custom-container">
            <div class="main-footer">
                <div class="row g-sm-4 g-3">
                    <div class="col-xl-3 col-md-4 col-sm-7">
                        <div class="footer-title-2">
                            <h4>Contact Info</h4>
                        </div>
                        <ul class="footer-content-list">
                            <li>
                                <a href="tel:{{ setting()->phone }}" class="content-box">
                                    <div class="footer-content-icon">
                                        <i class="iconsax" data-icon-name="phone-calling"></i>
                                    </div>
                                    <h4 class="theme-color3">{{ setting()->phone }}</h4>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="content-box">
                                    <div class="footer-content-icon">
                                        <i class="iconsax" data-icon-name="location"></i>
                                    </div>
                                    <h5>{{ setting()->address }}</h5>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:pixelstrap@contact.com" class="content-box">
                                    <div class="footer-content-icon">
                                        <i class="iconsax" data-icon-name="mail"></i>
                                    </div>
                                    <h5>{{ setting()->email }}</h5>
                                </a>
                            </li>
                        </ul>
                        <div class="social-icon-box">
                            <h5 class="content-color">Stay Connected :</h5>
                            <ul class="social-icon-list">
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
                                    <a href="https://www.pinterest.ca/" target="_blank">
                                        <i class="ri-pinterest-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>Information</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Collection</a>
                            </li>
                            <li>
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li>
                                <a href="blog-3-grid.html">Blogs</a>
                            </li>
                            <li>
                                <a href="shop-banner.html">Offer</a>
                            </li>
                            <li>
                                <a href="search.html">Search</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ's</a>
                            </li>
                            <li>
                                <a href="contact-us.html">Contact us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>Our Services</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="shop-left-sidebar.html">Mobile Phones</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Television</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Washing Machine</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Women Fashion</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">Laptop</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-title">
                            <h4>My Account</h4>
                        </div>
                        <ul class="footer-list">
                            <li>
                                <a href="user-dashboard.html">My Account</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html">My Shop</a>
                            </li>
                            <li>
                                <a href="cart.html">My Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="wishlist.html">My Wishlist</a>
                            </li>
                            <li>
                                <a href="order-tracking.html">Tracking Order</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-4">
                        <div class="footer-title-2">
                            <h4>Get Shopping App</h4>
                        </div>
                        <ul class="footer-list-2">
                            <li>
                                <p>Quick & Direct ordering</p>
                            </li>
                            <li>
                                <p>Shop smarter, save time & Simply</p>
                            </li>
                            <li>
                                <p>Save more on app</p>
                            </li>
                        </ul>
                        <ul class="app-store-link">
                            <li>
                                <a href="https://play.google.com/store/apps" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/google-play.svg"
                                        class="img-fluid" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.apple.com/in/app-store/" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/app-store.svg" class="img-fluid"
                                        alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sub-footer">
                <a href="index.html" class="sub-footer-logo">
                    <img class="lazy img-fluid" data-src="{{ asset(setting()->footer_logo) }}">
                </a>
                <ul class="payment-list">
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/1.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/2.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/3.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/4.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/5.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/6.svg" class="img-fluid"
                            alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend') }}/assets/images/payment/7.svg" class="img-fluid"
                            alt="">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Cart Offcanvas Start -->
    <div class="offcanvas offcanvas-end cart-offcanvas" id="cartOffcanvas">
        <div class="offcanvas-header">
            <div class="title-offcanvas">
                <h4>Shopping Cart</h4>
                <button class="btn close-btn" data-bs-dismiss="offcanvas">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="cart-product-box">
                <ul class="product-box-list">
                    @foreach ($cartItems as $item)
                        @php
                            $product = $cartProducts[$item['product_id']] ?? null;
                            $variation = $cartVariations[$item['variation_id']] ?? null;

                            $price = $variation?->price ?? $product?->price;
                        @endphp
                        <li class="vertical-product-box cart-item" data-product="{{ $item['product_id'] }}"
                            data-variation="{{ $item['variation_id'] }}">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset($product?->image) }}" class="img-fluid" alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">{{ $product?->name }}</h5>
                                </a>
                                @if ($variation)
                                    <h5 class="name text-success">{{ $variation->attributeValue->value ?? '' }}</h5>
                                @endif
                                <h5 class="price">{{ $price }}</h5>
                                <div class="quantity-box qty-container">
                                    <button class="btn qty-btn-minus"
                                        style="display: {{ $item['qty'] == '1' ? 'none' : 'inline-block' }}">
                                        <i class=" ri-subtract-line"></i>
                                    </button>
                                    <button class="btn btn-trash"
                                        style="display: {{ $item['qty'] == '1' ? 'inline-block' : 'none' }};">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    <input type="number" name="qty" class="quantity form-control input-qty"
                                        value="{{ $item['qty'] }}">
                                    <button class="btn qty-btn-plus">
                                        <i class="ri-add-line"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn close-button"
                                style="display: {{ $item['qty'] == '1' ? 'none' : 'inline-block' }}">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </li>
                    @endforeach

                    <li class="empty-cart">
                        <img src="{{ asset('frontend') }}/assets/images/cartEmpty.png" alt="Empty Cart"
                            class="img-fluid mb-4" style="opacity: 0.7; max-height: 200px;">
                        <h4>Your cart is empty.</h4>
                    </li>
                </ul>

                <div class="total-price-box">
                    <h4 class="sub-total mb-3">Subtotal <span id="total-price"></span></h4>
                    <div class="cart-btn-group">
                        <a href="checkout.html" class="btn check-out-button">Check Out</a>
                        <a href="{{ route('cart') }}" class="btn cart-button">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Offcanvas End -->

    <!-- Wishlist Offcanvas Start -->
    <div class="offcanvas offcanvas-end wishlist-offcanvas cart-offcanvas" id="wishlistOffcanvas">
        <div class="offcanvas-header">
            <div class="title-offcanvas">
                <h4>Wishlist</h4>
                <button class="btn close-btn" data-bs-dismiss="offcanvas">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="cart-product-box">
                <ul class="product-box-list">
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/1.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Smart Watch Series X3</h5>
                                </a>
                                <h5 class="price">$239.00 <del>$250.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/2.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                </a>
                                <h5 class="price">$700.00 <del>$720.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/3.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Portable Laptop Table</h5>
                                </a>
                                <h5 class="price">$199.00 <del>$200.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/4.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Kitchen Accessories</h5>
                                </a>
                                <h5 class="price">$300.00 <del>$312.56</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>

                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/5.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">Rockerz 558 Bluetooth</h5>
                                </a>
                                <h5 class="price">$86.00 <del>$96.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/26.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">EvoFox Game Box 32 GB with Asphalt 8</h5>
                                </a>
                                <h5 class="price">$130.00 <del>$153.00</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="vertical-product-box">
                            <a href="product-color.html" class="product-image">
                                <img src="{{ asset('frontend') }}/assets/images/product/23.png" class="img-fluid"
                                    alt="">
                            </a>
                            <div class="product-content">
                                <a href="product-color.html">
                                    <h5 class="name title-color">BlackBerry Keyone BBB100-7 64gb unlocked gSM</h5>
                                </a>
                                <h5 class="price">$1920.36 <del>$2000.95</del></h5>
                                <button class="btn cart-btn" data-bs-target="#cartOffcanvas"
                                    data-bs-toggle="offcanvas">
                                    <span>Move to cart</span>
                                </button>
                            </div>
                            <button class="btn wishlist-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </li>
                </ul>

                <div class="total-price-box">
                    <p class="tax-text">Now that you have products in your wishlist, remember to put them in your cart
                        later.</p>
                    <div class="cart-btn-group">
                        <button onclick="location.href = 'wishlist.html';" class="btn check-out-button">View
                            Wishlist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Offcanvas End -->

    <!-- Authentication Modal Start -->
    <div class="modal authentication-modal fade" id="authenticationModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-fill"></i>
                    </button>
                    <div class="authentication-box login-box">
                        <div class="auth-title">
                            <h4>Log in</h4>
                            <p>Welcome! To access your account, please enter your username and password.</p>
                        </div>
                        <form class="auth-form">
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="forgot-box">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember for 30
                                        days</label>
                                </div>
                                <a href="#!" class="forgot-pass">Forgot Password</a>
                            </div>
                            <a href="index.html" class="btn btn-bg-theme mt-3 w-100">Log In</a>
                            <div class="divider">
                                <span>OR</span>
                            </div>
                            <div class="social-link">
                                <a href="https://www.google.com/" class="btn w-100" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/inner-page/google.png"
                                        class="img-fluid" alt="">
                                    <span>Sign in with google</span>
                                </a>
                                <a href="https://www.facebook.com/" class="btn w-100" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/inner-page/facebook.png"
                                        class="img-fluid" alt="">
                                    <span>Sign in with facebook</span>
                                </a>
                            </div>
                            <h5 class="sign-up-next">Don't have an account? <button class="next-button btn">Sign up
                                    now</button></h5>
                        </form>
                    </div>

                    <div class="authentication-box signup-box">
                        <div class="auth-title">
                            <h4>Sign Up</h4>
                            <p>Welcome! To access your account, please enter your username and password.</p>
                        </div>
                        <form class="auth-form">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter full name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Create your password">
                            </div>
                            <div class="forgot-box">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">I agree with all text in the
                                        agreement.</label>
                                </div>
                            </div>
                            <a href="index.html" class="btn btn-bg-theme mt-3 w-100">Sing up</a>
                            <div class="divider">
                                <span>OR</span>
                            </div>
                            <div class="social-link">
                                <a href="https://www.google.com/" class="btn w-100" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/inner-page/google.png"
                                        class="img-fluid" alt="">
                                    <span>Sign up with google</span>
                                </a>
                                <a href="https://www.facebook.com/" class="btn w-100" target="_blank">
                                    <img src="{{ asset('frontend') }}/assets/images/inner-page/facebook.png"
                                        class="img-fluid" alt="">
                                    <span>Sign up with facebook</span>
                                </a>
                            </div>
                            <h5 class="sign-up-next">I am already member. <button class="btn next-button2">Sign
                                    in</button>
                            </h5>
                        </form>
                    </div>

                    <div class="authentication-box forgot-password-box">
                        <div class="auth-title">
                            <h4>Reset Password</h4>
                            <p>Have you forgotten your password? Kindly provide your email address. An email with a link
                                to establish a new password will be sent to you.</p>
                        </div>
                        <form class="auth-form">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address">
                            <div class="d-flex flex-wrap-nowrap mt-3 gap-3">
                                <button class="btn btn-bg-theme w-100">Submit</button>
                                <a href="#!" class="btn btn-bg-theme w-100 cancel-btn">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Authentication Modal End -->

    <!-- Tap To Top Button Start -->
    <div class="tap-top-button">
        <button class="btn">
            <i class="iconsax" data-icon-name="arrow-up"></i>
        </button>
    </div>
    <!-- Tap To Top Button End -->


    {{-- <!-- Exit Modal Start -->
    <div class="modal fade exit-modal theme-modal" id="exitModal">
        <div class="modal-dialog modal-custom-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="exit-box">
                        <div class="row g-0">
                            <div class="col-sm-6 order-sm-1 order-2">
                                <div class="exit-left-box">
                                    <h3>HEY YOU</h3>
                                    <h4>Don't leave now!</h4>
                                    <h5>OFFER68</h5>
                                    <h6>Use this coupon code to get 68% off</h6>
                                    <ul class="clock-list">
                                        <li>
                                            <div class="digits minutes" id="minutes"></div>
                                        </li>
                                        <li class="dots">:</li>
                                        <li>
                                            <div class="digits seconds" id="seconds"></div>
                                        </li>
                                    </ul>
                                    <h6>This coupon code expires in</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 order-sm-2 order-1">
                                <div class="exit-right-box">
                                    <img src="{{ asset('frontend') }}/assets/images/exit-modal/4.jpg"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exit Modal End --> --}}

    <!-- Category Offcanvas Start -->
    <div class="category-fixed-box offcanvas offcanvas-start" id="categoryCanvas">
        <div class="category-header">
            <h5>Category</h5>
            <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas">
                <i class="ri-close-fill"></i>
            </button>
        </div>
        <div class="category-menu-list">
            <ul class="top-menu-list">
                @forelse ($categories as $category)
                    <li>
                        <a href="{{ route('category', $category->slug) }}" class="sub-category-box">
                            <img src="{{ asset($category->logo) }}" width="25" alt="">
                            <h5>{{ $category->name }}</h5>
                        </a>
                    </li>
                @empty
                    <li>
                        <span>No Category Found</span>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <!-- Category Offcanvas End -->

    <!-- Bg Overlay Start -->
    <div id="overlay" class="bg-overlay"></div>
    <!-- Bg Overlay End -->


    <script src="{{ asset('assets') }}/js/lib/jquery.min.js"></script>
    <!-- Page Load GSAP Js -->
    <script src='{{ asset('frontend') }}/assets/js/gsap/gsap.min.js'></script>
    <script src='{{ asset('frontend') }}/assets/js/gsap/split-type.js'></script>

    <!-- Bootstrap Js -->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap/bootstrap-tooltip.js"></script>

    <!-- Swiper Js -->
    <script src="{{ asset('frontend') }}/assets/js/swiper.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/custom-swiper.js"></script>

    <!-- Lazyload Js -->
    {{-- <script src="{{ asset('frontend') }}/assets/js/lazyload.js"></script> --}}

    <!-- Iconsax js -->
    <script src="{{ asset('frontend') }}/assets/js/iconsax.js"></script>

    <!-- Timer Js -->
    <script src="{{ asset('frontend') }}/assets/js/timer-2.js"></script>

    <!-- Quantity js -->
    <script src="{{ asset('frontend') }}/assets/js/qty.js"></script>

    <!-- Wishlist Notification Js -->
    <script src="{{ asset('frontend') }}/assets/js/wishlist-notify.js"></script>

    <!-- Cookie Js -->
    <script src="{{ asset('frontend') }}/assets/js/cookie.js"></script>

    <!-- Script js -->
    <script src="{{ asset('frontend') }}/assets/js/script.js"></script>

    <!-- Template Setting Js -->
    <script src="{{ asset('frontend') }}/assets/js/theme-setting.js"></script>

    {{-- Notyf --}}
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll("img.lazy");

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove("lazy");
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => observer.observe(img));
        });
    </script>

    <script>
        let debounceTimer;

        function handleSearchUI(query) {

            // কিছু না লিখলে
            if (query.length === 0) {
                $('#searchResult').html('');
                $('#searchLoading').hide();
                $('#searchMessage').show().html('🔍 Please type something to search...');
                return false;
            }

            return true;
        }

        // 👉 keyup event
        $('#searchInputBox').on('keyup', function() {
            let query = $(this).val();
            const baseUrl = "{{ asset('') }}";

            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {

                if (!handleSearchUI(query)) return;

                $('#searchLoading').show();
                $('#searchMessage').hide();
                $('#searchResult').html('');

                $.ajax({
                    url: "{{ route('search.product.ajax') }}",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {

                        $('#searchLoading').hide();

                        let html = '';

                        if (data.length > 0) {
                            data.forEach(function(product) {
                                html += `
                                    <li>
                                        <img src="${baseUrl}${product.image}" width="50">
                                        <a href="/product/${product.slug}">${product.name}</a>
                                    </li>
                                `;
                            });

                            $('#searchResult').html(html);
                            $('#searchMessage').hide();

                        } else {
                            $('#searchResult').html('');
                            // $('#searchMessage').show().html('❌ No product found');
                        }
                    },
                    error: function() {
                        $('#searchLoading').hide();
                        $('#searchMessage').show().html('⚠️ Something went wrong');
                    }
                });

            }, 400);
        });

        // 👉 focus event (NEW)
        $('#searchInputBox').on('focus', function() {
            let query = $(this).val();
            handleSearchUI(query);
        });
    </script>

    <script>
        $(document).ready(function() {

            // 🔄 qty change
            $(document).on('change', '.input-qty', function() {

                let parent = $(this).closest('.cart-item');

                let productId = parent.data('product');
                let variationId = parent.data('variation');

                let qty = parseInt($(this).val());

                if (qty < 1) return;

                updateCart(productId, variationId, qty, parent);
            });

            // ➕➖ trigger change (VERY IMPORTANT)
            $(document).on('click', '.qty-btn-plus, .qty-btn-minus', function() {

                let parent = $(this).closest('.cart-item');
                let input = parent.find('.input-qty');

                setTimeout(function() {
                    input.trigger('change');
                }, 100);
            });

            // 🗑️ remove
            $(document).on('click', '.btn-trash, .close-button', function() {

                let parent = $(this).closest('.cart-item');

                let productId = parent.data('product');
                let variationId = parent.data('variation');

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
                            parent.fadeOut(300, function() {
                                $(this).remove();
                            });

                            $('.cart-count').text(res.cart_count);
                            $('#cartCount_header').text(res.cart_count);
                        }
                    }
                });
            });

            let cartTimer;

            function updateCart(productId, variationId, qty, parent) {

                clearTimeout(cartTimer);

                cartTimer = setTimeout(() => {
                    $.ajax({
                        url: "{{ route('cart.update') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            product_id: productId,
                            variation_id: variationId,
                            qty: qty
                        },
                        success: function(res) {
                            if (res.status) {
                                $('.cart-count').text(res.cart_count);
                                $('#cartCount_header').text(res.cart_count);
                            }
                        }
                    });
                }, 300);
            }

        });
    </script>

    <script>
        $(document).on('click', '.add-cart-btn', function(e) {
            e.preventDefault();

            let parent = $(this).closest('.select-option-box');

            let productId = parent.data('product');
            let variationId = parent.find('.variation-option.active').data('id') ?? '';
            let qty = parent.find('.qty-input').val();

            // validation
            if (parent.find('.variation-option').length > 0 && !variationId) {
                showToast('Please select variation', 'error');
                return;
            }

            // 🔥 create form dynamically
            let form = $('<form>', {
                method: 'POST',
                action: "{{ route('addToCart') }}"
            });

            // CSRF
            form.append($('<input>', {
                type: 'hidden',
                name: '_token',
                value: "{{ csrf_token() }}"
            }));

            // product_id
            form.append($('<input>', {
                type: 'hidden',
                name: 'product_id',
                value: productId
            }));

            // variation
            form.append($('<input>', {
                type: 'hidden',
                name: 'variation',
                value: variationId
            }));

            // quantity
            form.append($('<input>', {
                type: 'hidden',
                name: 'quantity',
                value: qty
            }));

            // append & submit
            $('body').append(form);
            form.submit();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.qty-box').forEach(box => {

                let input = box.querySelector('.qty-input');

                box.querySelector('.qty-plus').addEventListener('click', () => {
                    input.value = parseInt(input.value) + 1;
                });

                box.querySelector('.qty-minus').addEventListener('click', () => {
                    if (input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });

            });

        });
    </script>

    <script>
        // Ajax setup
        const csrf = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        // Notyf instance (global)
        const notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'bottom',
            }
        });

        // Toast function
        function showToast(text, type = 'success') {

            if (type === 'error') {
                notyf.error(text);
            } else {
                notyf.success(text);
            }
        }
    </script>

    @if (session('success'))
        <script>
            showToast("{{ session('success') }}", 'success');
        </script>
    @endif

    @if (session('error'))
        <script>
            showToast("{{ session('error') }}", 'error');
        </script>
    @endif

    @stack('footer_script')
</body>

</html>
