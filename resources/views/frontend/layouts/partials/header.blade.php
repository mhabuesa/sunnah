    <header class="header-style-1">


        <div class="main-dark-header border-b-color custom-container">
            <div class="left-header">
                <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                    <span class="navbar-toggler-icon title-color">
                        <i class="ri-menu-line"></i>
                    </span>
                </button>
                <a href="{{ route('index') }}" class="header-logo">
                    <img src="{{ asset(setting()->header_logo) }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="middle-header searchInput" id="searchOffcanvas">
                <div class="search-overlay" id="searchOverlay"></div>
                <form class="search-form">
                    <div class="input-group">
                        <div class="close-icon">
                            <i class="ri-close-fill" id="close-btn"></i>
                        </div>
                        <input id="searchInputBox" type="search" class="form-control border"
                            placeholder="I'm searching for...">
                        <button class="search-button btn search-light-color theme-bg-color text-light">
                            <i class="ri-search-line"></i>
                        </button>
                    </div>
                    <div class="result-box" id="resultBox">
                        <div class="search-result-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Popular Product</h4>
                            </div>
                            <ul class="result-list-box">
                                <li>
                                    <a href="product-color.html">iPhone 14</a>
                                </li>
                                <li>
                                    <a href="product-color.html">kitchen utensils</a>
                                </li>
                                <li>
                                    <a href="product-color.html">Realme 10 PRO</a>
                                </li>
                                <li>
                                    <a href="product-color.html">Sport & Outdoor</a>
                                </li>
                                <li>
                                    <a href="product-color.html">Samsung Gal. M14</a>
                                </li>
                                <li>
                                    <a href="product-color.html">Office Wear Perfume</a>
                                </li>
                                <li>
                                    <a href="product-color.html">Handmade table</a>
                                </li>
                                <li>
                                    <a href="product-color.html">mini projector</a>
                                </li>
                            </ul>
                        </div>
                        <div class="last-search-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Last Search</h4>
                                <a href="#!" class="text-danger">Remove all</a>
                            </div>
                            <ul class="search-list-box">
                                <li>
                                    <a href="shop-left-sidebar.html">iPhone 14</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.html">kitchen utensils</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.html">Realme 10 PRO</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.html">Samsung Galaxy M14</a>
                                </li>
                            </ul>
                        </div>
                        <div class="last-seen-search-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Recently Viewed</h4>
                            </div>
                            <ul class="search-list-box">
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/104.png"
                                            class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/58.png"
                                            class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/69.png"
                                            class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/42.jpg"
                                            class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/50.jpg"
                                            class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{ asset('frontend') }}/assets/images/product/5.png" class="img-fluid"
                                            alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="right-header">
                <ul class="header-icon">
                    <li>
                        <a href="#!" id="searchClick">
                            <i class="iconsax search-btn" data-icon-name="search-normal-2"></i>
                        </a>
                    </li>
                    <li class="contact-list">
                        <a href="tel:{{ setting()->phone }}">
                            <i class="iconsax" data-icon-name="phone-calling"></i>
                            <div>
                                <h5>Call us now</h5>
                                <h6>{{ setting()->phone }}</h6>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-box">
                        <a href="#!">
                            <i class="iconsax" data-icon-name="user-2"></i>
                        </a>
                        <ul class="dropdown-list user-dropdown">
                            <li>
                                <a href="#authenticationModal" class="btn login-btn" data-bs-toggle="modal">Log In</a>
                            </li>
                            <li>
                                <span>New customer?</span>
                                <button class="btn signup-btn" data-bs-toggle="modal"
                                    data-bs-target="#authenticationModal">Start here.</button>btn signup-btn">Start
                                here.
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-bs-toggle="offcanvas" href="#wishlistOffcanvas">
                            <i class="iconsax" data-icon-name="heart"></i>
                        </a>
                    </li>
                    <li>
                        <a data-bs-toggle="offcanvas" href="#cartOffcanvas">
                            <i class="iconsax" data-icon-name="basket-2"></i>
                            <span class="label">
                                <span>5</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div id="darkBtn" class="btn-sm btn px-2">
                             <i class="ri-moon-fill fs-5"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="nav-light-header border-b-color custom-container d-flex">
            <div class="category-header d-sm-flex d-none">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas" class="btn theme-bg-color rounded-0 text-light">
                    <i class="ri-menu-line"></i>
                    <span>Categories</span>
                </a>
            </div>

            <div class="header-nav-middle">
                <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                    <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                        <div class="offcanvas-header navbar-shadow">
                            <h5>Menu</h5>
                            <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas">
                                <i class="ri-close-fill"></i>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav navbar-nav-dark">
                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#!">Home</a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#!">Shop</a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#!">Product</a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#!">Sales</a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#!">Features</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#!">Pages</a>
                                </li>

                                <li class="nav-item dropdown new-nav-item">
                                    <a class="nav-link" href="#!">Seller</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#!">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-light-header d-sm-flex d-none">
                <ul class="product-viwer">
                    <li class="recent-product dropdown-box">
                        <a data-bs-toggle="offcanvas" href="#recentViwerModal"
                            class="product-link d-xxl-none d-sm-flex d-none">Recent Viewer</a>
                        <a href="#!" class="product-link d-xxl-flex d-none">Recent Viewer</a>
                        <div class="review-dropdown dropdown-list offcanvas" id="recentViwerModal">
                            <div class="dropdown-title">
                                <h4>Recent view</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>

                            <ul class="product-box-list">
                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.html" class="product-image">
                                            <img src="{{ asset('frontend') }}/assets/images/product/1.png"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.html">
                                                <h5 class="name title-color">Smart Watch Series X3</h5>
                                            </a>
                                            <h5 class="price">$239.00 <del>$250.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.html" class="product-image">
                                            <img src="{{ asset('frontend') }}/assets/images/product/2.png"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.html">
                                                <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                            </a>
                                            <h5 class="price">$700.00 <del>$720.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.html" class="product-image">
                                            <img src="{{ asset('frontend') }}/assets/images/product/3.png"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.html">
                                                <h5 class="name title-color">Portable Laptop Table</h5>
                                            </a>
                                            <h5 class="price">$199.00 <del>$200.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.html" class="product-image">
                                            <img src="{{ asset('frontend') }}/assets/images/product/2.png"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.html">
                                                <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                            </a>
                                            <h5 class="price">$700.00 <del>$720.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.html" class="product-image">
                                            <img src="{{ asset('frontend') }}/assets/images/product/3.png"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.html">
                                                <h5 class="name title-color">Portable Laptop Table</h5>
                                            </a>
                                            <h5 class="price">$199.00 <del>$200.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>

                            <div class="empty-message">
                                <svg>
                                    <use xlink:href="{{ asset('frontend') }}/assets/images/no-recent.svg#noRecent">
                                    </use>
                                </svg>
                                <h6>No products available</h6>
                            </div>
                        </div>
                    </li>
                    <li class="order-tracking d-xxl-inline-block d-none">
                        <a href="order-tracking.html" class="product-link">Order Tracking</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
