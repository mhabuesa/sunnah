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
                                    <img src="{{ asset(setting()->header_logo) }}" alt=""
                                        style="height: 60px; width:160;">
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
                            <form class="js-focus-state" action="{{ route('search.product') }}" method="GET">
                                <label class="sr-only" for="searchproduct">Search</label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control py-2 pl-5 font-size-15 border-right-0 height-42 rounded-left-pill border-primary"
                                        name="q" id="searchproduct-item" placeholder="Search for Products"
                                        aria-label="Search for Products" aria-describedby="searchProduct1" required
                                        value="{{ request()->input('q') }}">
                                    <div class="input-group-append">

                                        <!-- End Select -->
                                        <button class="btn btn-dark height-42 py-2 px-3 rounded-right-pill"
                                            type="submit" id="searchProduct1">
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
                                                <input class="form-control" type="search" placeholder="Search Product">
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
                                    <li class="col px-2 px-sm-3">
                                        <a href="{{ route('cart') }}" class="text-gray-90 position-relative d-flex "
                                            data-toggle="tooltip" data-placement="top" title="Cart">
                                            <i class="font-size-22 ec ec-shopping-bag"></i>
                                            <span
                                                class="width-22 height-22 bg-dark position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white">{{ $cartCount }}</span>
                                        </a>
                                    </li>

                                    @if (auth()->guard('customer')->check())
                                        <li class="col d-xl-none pl-3 px-sm-3"><a
                                                href="{{ route('customer.dashboard') }}" class="text-gray-90"
                                                data-toggle="tooltip" data-placement="top" title="My Account"><i
                                                    class="font-size-22 ec ec-user"></i></a></li>
                                    @else
                                        <li class="col d-xl-none pl-3 px-sm-3"><a href="{{ route('customer.login') }}"
                                                class="text-gray-90" data-toggle="tooltip" data-placement="top"
                                                title="Login"><i class="font-size-22 ec ec-user"></i></a></li>
                                    @endif


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

                                        <div id="basicsCollapseOne" class="collapse vertical-menu v1"
                                            aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                            <div class="card-body p-0">
                                                <nav
                                                    class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized scrollbar">
                                                    <div id="navBar"
                                                        class="collapse navbar-collapse u-header__navbar-collapse">
                                                        <ul
                                                            class="navbar-nav u-header__navbar-nav border-primary border-top-0">

                                                            @foreach ($categories as $category)
                                                                @if ($category->subcategories->count() > 0)
                                                                    <!-- Nav Item MegaMenu -->
                                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                                        data-event="hover" data-animation-in="left"
                                                                        data-animation-out="fadeOut"
                                                                        data-position="left">
                                                                        <a id="basicMegaMenu"
                                                                            class="nav-link u-header__nav-link text-black u-header__nav-link-toggle font-weight-bold"
                                                                            href="{{ route('category', $category->slug) }}"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false">{{ $category->name }}</a>

                                                                        <!-- Nav Item - Mega Menu -->
                                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu"
                                                                            aria-labelledby="basicMegaMenu">
                                                                            <div
                                                                                class="row u-header__mega-menu-wrapper p-0">
                                                                                @foreach ($category->subcategories as $subcategory)
                                                                                    <div
                                                                                        class="col-6 u-header__sub-menu-nav-group mb-3 pl-4">
                                                                                        <a class="nav-link u-header__sub-menu-nav-link font-weight-bold"
                                                                                            href="{{ route('subcategory', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Nav Item - Mega Menu -->
                                                                    </li>
                                                                    <!-- End Nav Item MegaMenu-->
                                                                @else
                                                                    <li class="nav-item u-header__nav-item"
                                                                        data-event="hover" data-position="left">
                                                                        <a href="#"
                                                                            class="nav-link u-header__nav-link text-black font-weight-bold">{{ $category->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach

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
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                            <a class="nav-link u-header__nav-link text-sale"
                                                href="{{ route('supper.deals') }}">Super
                                                Deals</a>
                                        </li>
                                        <!-- End Pages -->

                                        <!-- Featured Brands -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="{{ route('brands') }}"
                                                aria-haspopup="true" aria-expanded="false"
                                                aria-labelledby="pagesSubMenu">Brands</a>
                                        </li>
                                        <!-- End Featured Brands -->

                                        <!-- Blog Styles -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="{{ route('blog') }}"
                                                aria-haspopup="true" aria-expanded="false"
                                                aria-labelledby="blogSubMenu">Blogs</a>
                                        </li>
                                        <!-- End Blog Styles -->

                                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover"
                                            data-animation-in="slideInUp" data-animation-out="fadeOut">

                                            <a id="sunnahShoppingMegaMenu"
                                                class="nav-link u-header__nav-link u-header__nav-link-toggle"
                                                href="javascript:;" aria-haspopup="true" aria-expanded="false">
                                                SUNNAH SHOPPING / সুন্নাহ শপিং
                                            </a>

                                            <div class="hs-mega-menu w-100 u-header__sub-menu animated fadeOut"
                                                aria-labelledby="sunnahShoppingMegaMenu" style="display: none;">

                                                <div class="row u-header__mega-menu-wrapper">

                                                    <!-- COLUMN 1 -->
                                                    <div class="col-md-3">

                                                        <span class="u-header__sub-menu-title">
                                                            Clothing & Bedding / পোশাক ও বিছানাপত্র
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Leather Zaynamaz / চামড়ার জায়নামাজ
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Palm Leaf Zaynamaz / খেজুর পাতার জায়নামাজ
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Jute Zaynamaz / পাটের জায়নামাজ
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Velvet Zaynamaz / ভেলভেট জায়নামাজ
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Fabric Zaynamaz / কাপড়ের জায়নামাজ
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Palm Leaf Mat / খেজুর পাতার চাটাই
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Woolen Shawl / গায়ের চাদর (শাল)
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Casual Shawl / গায়ের চাদর
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Jute Bed / পাটের বিছানা
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">
                                                                    Leather Bed / চামড়ার বিছানা
                                                                </a>
                                                            </li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Men's Wear / পুরুষদের পোশাক
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Jubba / সুন্নতী জুব্বা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Kurta / সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Lungi / সুন্নতী লুঙ্গি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Pagri / সুন্নতী পাগড়ি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Tupi / সুন্নতী টুপি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Rumal White / সুন্নতী রুমাল (সাদা)</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Kashmiri Shawl / শীতের কাশ্মীরি শাল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Sunnati Kurta / শীতের সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Chadar Local / স্থানীয় শীতের চাদর</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hand
                                                                    Socks / হাত মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Towel
                                                                    / তোয়ালে</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Gamsa
                                                                    / গামছা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Foot
                                                                    Towel / পা মোছার তোয়ালে</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hajj
                                                                    Travel Bag / হজ্ব ট্রাভেল ব্যাগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hajj
                                                                    Package / হজ্ব প্যাকেজ 📦</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Men's Footwear / পুরুষদের পাদুকা
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Nalain/Cross Belt Sandal / সুন্নতী নালাইন / ক্রস
                                                                    বেল্ট স্যান্ডেল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Leather Socks/Muja / সুন্নতী চামড়ার মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Cross
                                                                    Belt Chappal / ক্রস বেল্ট চপ্পল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Room
                                                                    Chappal / রুম চপ্পল</a></li>

                                                        </ul>

                                                    </div>


                                                    <!-- COLUMN 2 -->
                                                    <div class="col-md-3">

                                                        <span class="u-header__sub-menu-title">
                                                            Men's Bags / পুরুষদের ব্যাগ
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Wallet / চামড়ার ওয়ালেট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Travel Bag / চামড়ার ট্রাভেল ব্যাগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hajj
                                                                    Body Wallet / হজ্ব বডি ওয়ালেট</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Women's Wear / মহিলাদের পোশাক
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Kurta / সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Three Piece / সুন্নতী থ্রি পিস</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">White-Black
                                                                    Three Piece / সাদা-কালো থ্রি পিস</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sharee
                                                                    / শাড়ি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Burka
                                                                    / বোরকা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Khimar
                                                                    / খিমার</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hijab
                                                                    / হিজাব</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Scarf
                                                                    / স্কার্ফ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Orna /
                                                                    ওড়না</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Head
                                                                    Cover / মাথা ঢাকনী</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hand
                                                                    Socks / হাত মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Soft
                                                                    Leather Zaynamaz / নরম চামড়ার জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Soft
                                                                    Zaynamaz / নরম জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Cotton
                                                                    Zaynamaz / সুতি জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Others
                                                                    & Varieties / অন্যান্য ও বিবিধ</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Women's Footwear / মহিলাদের পাদুকা
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Nalain / Cross Belt Sandal / সুন্নতী নালাইন / ক্রস
                                                                    বেল্ট স্যান্ডেল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Leather Socks / সুন্নতী চামড়ার মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Foot
                                                                    Socks / পা মোজা</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Women's Bags & Others / মহিলাদের ব্যাগ ও অন্যান্য সামগ্রী
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Ladies
                                                                    Hand Bag / মেয়েদের হাত ব্যাগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Hand Bag / চামড়ার হাত ব্যাগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Wallet / চামড়ার ওয়ালেট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Purse / চামড়ার পার্স</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Ornament
                                                                    Box / গহনার বাক্স</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">First
                                                                    Aid Kit Box / প্রাথমিক চিকিৎসা সামগ্রী বাক্স</a>
                                                            </li>

                                                        </ul>

                                                    </div>


                                                    <!-- COLUMN 3 -->
                                                    <div class="col-md-3">

                                                        <span class="u-header__sub-menu-title">
                                                            Boys Wear (6+ Years) / ছেলেদের পোশাক (৬+ বছর)
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Jubba / সুন্নতী জুব্বা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Kurta / সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Lungi / সুন্নতী লুঙ্গি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Salwar/Pajama
                                                                    / সালোয়ার / পায়জামা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Pagri / সুন্নতী পাগড়ি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Tupi / সুন্নতী টুপি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Rumal White / সুন্নতী রুমাল (সাদা)</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Kashmiri Shawl / শীতের কাশ্মীরি শাল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Sunnati Kurta / শীতের সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Chadar Local / স্থানীয় শীতের চাদর</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hand
                                                                    Socks / হাত মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Towel
                                                                    / তোয়ালে</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Gamsa
                                                                    / গামছা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Foot
                                                                    Towel / পা মোছার তোয়ালে</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Girls Wear (6+ Years) / মেয়েদের পোশাক (৬+ বছর)
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Kurta / সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Three Piece / সুন্নতী থ্রি পিস</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">White-Black
                                                                    Three Piece / সাদা-কালো থ্রি পিস</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Frock
                                                                    / ফ্রক</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Lehenga
                                                                    / লেহেঙ্গা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Burka
                                                                    / বোরকা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Khimar
                                                                    / খিমার</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hijab
                                                                    / হিজাব</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Scarf
                                                                    / স্কার্ফ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Orna /
                                                                    ওড়না</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Head
                                                                    Cover / মাথার ঢাকনী</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hand
                                                                    Socks / হাত মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Soft
                                                                    Leather Zaynamaz / নরম চামড়ার জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Soft
                                                                    Zaynamaz / নরম জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Cotton
                                                                    Zaynamaz / সুতি জায়নামাজ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Others
                                                                    & Varieties / অন্যান্য ও বিবিধ</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Kids Collection (1-5 Years) / শিশু সংগ্রহ (১-৫ বছর)
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Sunnati Jubba / শিশুদের সুন্নতী জুব্বা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Sunnati Kurta / শিশুদের সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Salwar / ছোটদের সালোয়ার</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Sunnati Tupi & Pagri / শিশুদের সুন্নতী টুপি ও
                                                                    পাগড়ি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Soft Winter Shawl / শিশুদের নরম শীতের শাল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Sweater and Warm Jubba / ছোটদের সোয়েটার ও গরম
                                                                    জুব্বা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Soft Leather Sandals / শিশুদের নরম চামড়ার
                                                                    স্যান্ডেল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Foot Socks / শিশুদের পা মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Leather Socks / ছোটদের চামড়ার মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Kids
                                                                    Miswak & Natural Toothpaste / ছোটদের মিসওয়াক ও
                                                                    প্রাকৃতিক টুথপেস্ট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Rumal White / সুন্নতী রুমাল (সাদা)</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Warm Jubba / শীতের গরম জুব্বা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Sunnati Kurta / শীতের সুন্নতী কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Winter
                                                                    Ear Cap (Kan Tupi) / শীতের কান টুপি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Hand
                                                                    Socks / হাত মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Towel
                                                                    / তোয়ালে</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Gamsa
                                                                    / গামছা</a></li>

                                                        </ul>

                                                    </div>


                                                    <!-- COLUMN 4 -->
                                                    <div class="col-md-3">

                                                        <span class="u-header__sub-menu-title">
                                                            New Babies (0-1 Year) / নবজাতক সংগ্রহ (০-১ বছর)
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">New
                                                                    Born Sunnati Soft Kurta / নবজাতকদের সুন্নতী নরম
                                                                    কুর্তা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Pure
                                                                    Cotton Baby Wrapper / সুতি বেবি র‌্যাপার বা
                                                                    কম্বল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Organic
                                                                    Cotton Baby Bed Sheet / অর্গানিক সুতি বেবি বেড
                                                                    শিট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Baby
                                                                    Soft Pillow / বেবি নরম বালিশ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">New
                                                                    Born Cap & Mittens / নবজাতকের টুপি ও হাত-পায়ের
                                                                    মোজা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Extra
                                                                    Virgin Olive Oil for Baby / শিশুদের জন্য এক্সট্রা
                                                                    ভার্জিন অলিভ অয়েল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Black
                                                                    Cumin Baby Massage Oil / কালোজিরা বেবি ম্যাসাজ
                                                                    অয়েল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Organic
                                                                    Milk & Honey Baby Soap / অর্গানিক মধু ও দুধের বেবি
                                                                    সাবান</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Natural
                                                                    Sea Sponge / প্রাকৃতিক নরম স্পঞ্জ (গোসলের জন্য)</a>
                                                            </li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Zamzam
                                                                    Water Bottle / জমজমের পানির বোতল</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Bedding / বিছানাপত্র
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Bed
                                                                    Sheet / বেড শিট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Bed
                                                                    Cover / বেড কভার</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Bed Sheet / চামড়ার বেড শিট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Palm
                                                                    Leaf Mat / খেজুর পাতার চাটাই</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Blanket
                                                                    / কম্বল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Comforter
                                                                    / কমফোর্টার</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Sunnati
                                                                    Leather Pillow / সুন্নতী চামড়ার বালিশ</a></li>

                                                        </ul>


                                                        <span class="u-header__sub-menu-title">
                                                            Sunnati Utensils / সুন্নতী তৈজসপত্র
                                                        </span>

                                                        <ul class="u-header__sub-menu-nav-group mb-3">

                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Plate / সুন্নতী কাঠের পেয়ালা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Drinking Cup / সুন্নতী কাঠের পানপাত্র</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Bowl / কাঠের বোল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Curry Bowl / কাঠের তরকারির বাটি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Salt Cellar / কাঠের লবণদানি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Dinner Set / কাঠের ডিনার সেট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Water Skin (Mashak) / সুন্নতী চামড়ার পানির মশক</a>
                                                            </li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Dastarkhana / সুন্নতী চামড়ার দস্তরখানা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Wooden
                                                                    Spoon / কাঠের চামচ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Leather
                                                                    Floor Mat (Faras) / সুন্নতী চামড়ার ফরাস (বসার
                                                                    বিছানা)</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Water Pitcher / মাটির পানির কলস</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Plate / মাটির পেয়ালা</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Drinking Cup / মাটির পানপাত্র</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Curry Bowl / মাটির তরকারির বাটি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Pot / মাটির পাতিল</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Water Jug / মাটির পানির জগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Dinner Set / মাটির ডিনার সেট</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Pitha Mold / মাটির পিঠার সাচ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Salt Cellar / মাটির লবণদানি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Tea Cup / মাটির চায়ের কাপ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Mug / মাটির মগ</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Flower Tub / মাটির ফুলের টব</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Vase / মাটির ফুলদানি</a></li>
                                                            <li><a href="#"
                                                                    class="nav-link u-header__sub-menu-nav-link">Earthen
                                                                    Pumice Stone (Jhama) / মাটির ঝামা পাথর</a></li>

                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>
                                        </li>


                                        <!-- Button -->
                                        <li class="nav-item u-header__nav-last-item">
                                            <a class="nav-link u-header__nav-link text-black text-uppercase bg-warning u-header__nav-item-border rounded text-primary font-weight-bold"
                                                href="#" target="_blank">
                                                Charity <i class="fas fa-donate ml-1"></i>
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
