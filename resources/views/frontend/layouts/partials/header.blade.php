    <header id="header" class="u-header u-header-left-aligned-nav mb-0">
        <div class="u-header__section">
            <!-- Logo-Search-header-icons -->
            <div class="bg-">
                <div class="container">
                    <div class="row min-height-64 align-items-center position-relative">
                        <!-- Logo-offcanvas-menu -->
                        <div class="col-auto">
                            <!-- Nav -->
                            <nav class="navbar navbar-expand u-header__navbar py-0 max-width-200 min-width-200">
                                <!-- Logo -->
                                <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center mx-auto"
                                    href="{{ route('index') }}" aria-label="Electro">
                                    <img src="{{asset(setting()->header_logo)}}" alt="" style="height: 60px; width:160;">
                                </a>
                                <!-- End Logo -->

                                <!-- Fullscreen Toggle Button -->
                                <button id="sidebarHeaderInvokerMenu" type="button"
                                    class="navbar-toggler d-block d-xl-none btn u-hamburger mr-3 mr-xl-0"
                                    aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                    data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                    data-unfold-duration="500">
                                    <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                        <span class="u-hamburger__inner"></span>
                                    </span>
                                </button>
                                <!-- End Fullscreen Toggle Button -->
                            </nav>
                            <!-- End Nav -->

                            <!-- ========== HEADER SIDEBAR ========== -->
                            @include('frontend.layouts.partials.mobile_menu')
                            <!-- ========== END HEADER SIDEBAR ========== -->
                        </div>
                        <!-- End Logo-offcanvas-menu -->
                        <!-- Search Bar -->
                        <div class="col d-none d-xl-block">
                            <form class="js-focus-state">
                                <label class="sr-only" for="searchproduct">Search</label>
                                <div class="input-group">
                                    <input type="email"
                                        class="form-control py-2 pl-5 font-size-15 border-right-0 height-42 rounded-left-pill border-primary"
                                        name="email" id="searchproduct-item" placeholder="Search for Products"
                                        aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                    <div class="input-group-append">

                                        <!-- End Select -->
                                        <button class="btn btn-dark height-42 py-2 px-3 rounded-right-pill"
                                            type="button" id="searchProduct1">
                                            <span class="ec ec-search font-size-20"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Search Bar -->
                        <!-- Header Icons -->
                        <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                            <div class="d-inline-flex">
                                <ul class="d-flex list-unstyled mb-0 align-items-center">
                                    <!-- Search -->
                                    <li class="col d-xl-none px-2 px-sm-3 position-static">
                                        <a id="searchClassicInvoker"
                                            class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary"
                                            href="javascript:;" role="button" data-toggle="tooltip"
                                            data-placement="top" title="Search" aria-controls="searchClassic"
                                            aria-haspopup="true" aria-expanded="false"
                                            data-unfold-target="#searchClassic" data-unfold-type="css-animation"
                                            data-unfold-duration="300" data-unfold-delay="300"
                                            data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                            data-unfold-animation-out="fadeOut">
                                            <span class="ec ec-search"></span>
                                        </a>

                                        <!-- Input -->
                                        <div id="searchClassic"
                                            class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                            aria-labelledby="searchClassicInvoker">
                                            <form class="js-focus-state input-group px-3">
                                                <input class="form-control" type="search"
                                                    placeholder="Search Product">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary px-3" type="button"><i
                                                            class="font-size-18 ec ec-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Input -->
                                    </li>
                                    <!-- End Search -->
                                    <li class="col d-none d-xl-block"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html"
                                            class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                            title="Compare"><i class="font-size-22 ec ec-compare"></i></a></li>
                                    <li class="col d-none d-xl-block"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html"
                                            class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                            title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                    <li class="col d-xl-none px-2 px-sm-3"><a
                                            href="https://transvelo.github.io/electro-html/2.0/html/shop/my-account.html"
                                            class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                            title="My Account"><i class="font-size-22 ec ec-user"></i></a></li>
                                    <li class="col px-2 px-sm-3">
                                        <a href="{{ route('cart') }}" class="text-gray-90 position-relative d-flex "
                                            data-toggle="tooltip" data-placement="top" title="Cart">
                                            <i class="font-size-22 ec ec-shopping-bag"></i>
                                            <span
                                                class="width-22 height-22 bg-dark position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white">{{ $cartCount }}</span>
                                        </a>
                                    </li>

                                    @if (auth()->guard('customer')->check())
                                        <li class="col d-none d-xl-block  px-2 px-sm-3">
                                            <a id="sidebarNavToggler" href="{{ route('customer.dashboard') }}"
                                                class="u-header-topbar__nav-link target-of-invoker-has-unfolds text-black d-flex">
                                                <i class="font-size-22 ec ec-user mr-2"></i>
                                                Profile
                                            </a>
                                        </li>
                                    @else
                                        <li class="col d-none d-xl-block  px-2 px-sm-3">
                                            <a id="sidebarNavToggler" href="javascript:;" role="button"
                                                class="u-header-topbar__nav-link target-of-invoker-has-unfolds text-black"
                                                aria-controls="sidebarContent" aria-haspopup="true"
                                                aria-expanded="false" data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false"
                                                data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                                                data-unfold-animation-in="fadeInRight"
                                                data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                                <i class="font-size-22 ec ec-user"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- End Header Icons -->
                    </div>
                </div>
            </div>
            <!-- End Logo-Search-header-icons -->

            <!-- Vertical-and-secondary-menu -->
            <div class="box-shadow-1 d-none d-xl-block bg-primary">
                <div class="container">
                    <div class="row">
                        <!-- Vertical Menu -->
                        <div class="col-md-auto d-none d-xl-block align-self-center">
                            <div class="max-width-200 min-width-200">
                                <!-- Basics Accordion -->
                                <div id="basicsAccordion">
                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div class="card-header card-collapse border-0" id="basicsHeadingOne">
                                            <button type="button"
                                                class="btn-link btn-block d-flex card-btn pyc-10 text-lh-1 pl-0 pr-4 shadow-none btn-primary text-white bg-primary-btn border-0 font-weight-bold justify-content-center"
                                                data-toggle="collapse" data-target="#basicsCollapseOne"
                                                aria-expanded="true" aria-controls="basicsCollapseOne">
                                                <span class="text-light">All Categories</span>
                                                <span class="ml-2 text-light">
                                                    <span class="ec ec-arrow-down-search"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <div id="basicsCollapseOne" class="collapse vertical-menu v2"
                                            aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                            <div class="card-body p-0">
                                                <nav
                                                    class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                                    <div id="navBar"
                                                        class="collapse navbar-collapse u-header__navbar-collapse">
                                                        <ul class="navbar-nav u-header__navbar-nav border-top-primary">
                                                            @foreach ($categories as $category)
                                                                <li class="nav-item u-header__nav-item" data-event="hover"
                                                                    data-position="left">
                                                                    <a href="{{ route('category', $category->slug) }}"
                                                                        class="nav-link u-header__nav-link text-black">{{ $category->name }}</a>
                                                                </li>
                                                            @endforeach
                                                            
                                                            <!-- End Nav Item -->
                                                        </ul>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                <!-- End Basics Accordion -->
                            </div>
                        </div>
                        <!-- End Vertical Menu -->
                        <!-- Secondary Menu -->
                        <div class="col secondary-menu py-2">
                            <!-- Nav -->
                            <nav
                                class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                    <ul class="navbar-nav u-header__navbar-nav">
                                        <!-- Pages -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="click"
                                            data-animation-in="slideInUp" data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu"
                                                class="nav-link u-header__nav-link u-header__nav-link-toggle text-sale"
                                                href="javascript:;" aria-haspopup="true" aria-expanded="false">Super
                                                Deals</a>

                                            <!-- Home - Mega Menu -->
                                            <div class="hs-mega-menu w-50 u-header__sub-menu"
                                                aria-labelledby="homeMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Home & Static
                                                            Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="index.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v1</a></li>
                                                            <li><a href="home-v2.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v2</a></li>
                                                            <li><a href="home-v3.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v3</a></li>
                                                            <li><a href="home-v3-full-color-bg.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v3.1</a></li>
                                                            <li><a href="home-v4.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v4</a></li>
                                                            <li><a href="home-v5.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v5</a></li>
                                                            <li><a href="home-v6.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v6</a></li>
                                                            <li><a href="home-v7.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Home
                                                                    v7</a></li>
                                                            <li><a href="about.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">About</a>
                                                            </li>
                                                            <li><a href="contact-v1.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Contact
                                                                    v1</a></li>
                                                            <li><a href="contact-v2.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Contact
                                                                    v2</a></li>
                                                            <li><a href="faq.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">FAQ</a>
                                                            </li>
                                                            <li><a href="store-directory.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Store
                                                                    Directory</a></li>
                                                            <li><a href="terms-and-conditions.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">Terms
                                                                    and Conditions</a></li>
                                                            <li><a href="404.html"
                                                                    class="nav-link u-header__sub-menu-nav-link">404</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Home - Mega Menu -->
                                        </li>
                                        <!-- End Pages -->

                                        <!-- Featured Brands -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="#"
                                                aria-haspopup="true" aria-expanded="false"
                                                aria-labelledby="pagesSubMenu">Featured Brands</a>
                                        </li>
                                        <!-- End Featured Brands -->

                                        <!-- Trending Styles -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="#"
                                                aria-haspopup="true" aria-expanded="false"
                                                aria-labelledby="blogSubMenu">Trending Styles</a>
                                        </li>
                                        <!-- End Trending Styles -->

                                        <!-- Gift Cards -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="#"
                                                aria-haspopup="true" aria-expanded="false">Gift Cards</a>
                                        </li>
                                        <!-- End Gift Cards -->

                                        <!-- Button -->
                                        <li class="nav-item u-header__nav-last-item">
                                            <a class="" href="#" target="_blank">
                                                Free Shipping on Orders $50+
                                            </a>
                                        </li>
                                        <!-- End Button -->
                                    </ul>
                                </div>
                                <!-- End Navigation -->
                            </nav>
                            <!-- End Nav -->
                        </div>
                        <!-- End Secondary Menu -->
                    </div>
                </div>
            </div>
            <!-- End Vertical-and-secondary-menu -->
        </div>
    </header>
