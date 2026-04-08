    <header class="header-style-1">
        <div class="top-header custom-container theme-header">
            <div class="left-header">
                <div class="dropdown-box">
                    <ul>
                        <li>
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" id="select-language">
                                    <img src="{{asset('frontend')}}/assets/images/country/united-states.png" class="img-fluid" alt="">
                                    <span>Eng</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#!" id="english">
                                            <img src="{{asset('frontend')}}/assets/images/country/united-kingdom.png" class="img-fluid" alt="">
                                            <span>Eng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!" id="france">
                                            <img src="{{asset('frontend')}}/assets/images/country/germany.png" class="img-fluid" alt="">
                                            <span>Ger</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!" id="chinese">
                                            <img src="{{asset('frontend')}}/assets/images/country/turkish.png" class="img-fluid" alt="">
                                            <span>Tur</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" data-bs-toggle="dropdown" type="button" id="select-language1">
                                    <span>USD</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#!" id="english1">
                                            <span>AUD</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!" id="france1">
                                            <span>EUR</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!" id="chinese1">
                                            <span>CNY</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="social-box">
                    <ul class="social-list">
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
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="middle-header">
                <div class="middle-content">
                    <p>
                        <span class="slider-content">
                            <b class="theme-color">FREE RETURNS.</b> STANDARD SHIPPING ORDERS <b class="theme-color">$99+</b> <br>
                            <b class="theme-color">FREE RETURNS.</b> STANDARD SHIPPING ORDERS <b class="theme-color">$99+</b>
                        </span>
                    </p>
                </div>
            </div>

            <div class="right-header">
                <ul class="content-list">
                    <li>
                        <a href="user-dashboard.html">My Account</a>
                    </li>
                    <li>
                        <a href="contact-us.html">Contact Us</a>
                    </li>
                    <li>
                        <a href="blog-3-grid.html">Blog</a>
                    </li>
                    <li>
                        <a href="wishlist.html">Wishlist</a>
                    </li>
                    <li>
                        <a href="cart.html">Cart</a>
                    </li>
                    <li>
                        <a href="#authenticationModal" class="login-btn" data-bs-toggle="modal">Log In</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-dark-header border-b-color custom-container">
            <div class="left-header">
                <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                    <span class="navbar-toggler-icon title-color">
                        <i class="ri-menu-line"></i>
                    </span>
                </button>
                <a href="index.html" class="header-logo">
                    <img src="{{asset('frontend')}}/assets/images/logo/4.svg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="middle-header searchInput" id="searchOffcanvas">
                <div class="search-overlay" id="searchOverlay"></div>
                <form class="search-form">
                    <div class="input-group">
                        <div class="close-icon">
                            <i class="ri-close-fill" id="close-btn"></i>
                        </div>
                        <div class="input-group-text">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <span>All Category</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#!">Laptop</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Camera</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Device</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Watch</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Beauty</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Headphone</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Furniture</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Movie & TV</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Music</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input id="searchInputBox" type="search" class="form-control" placeholder="I'm searching for...">
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
                                        <img src="{{asset('frontend')}}/assets/images/product/104.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{asset('frontend')}}/assets/images/product/58.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{asset('frontend')}}/assets/images/product/69.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{asset('frontend')}}/assets/images/product/42.jpg" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{asset('frontend')}}/assets/images/product/50.jpg" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.html">
                                        <img src="{{asset('frontend')}}/assets/images/product/5.png" class="img-fluid" alt="">
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
                        <a href="tel:+19173768944">
                            <i class="iconsax" data-icon-name="phone-calling"></i>
                            <div>
                                <h5>Call us now</h5>
                                <h6>+1 917 376 8944</h6>
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
                                <button class="btn signup-btn" data-bs-toggle="modal" data-bs-target="#authenticationModal">Start here.</button>btn signup-btn">Start here.
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
                </ul>
            </div>
        </div>

        <div class="nav-light-header border-b-color custom-container d-flex">
            <div class="category-header d-sm-flex d-none">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas" class="btn theme-bg-color rounded-0 text-light">
                    <i class="ri-menu-line"></i>
                    <span>Shop By Categories</span>
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
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Home</a>
                                    <div class="dropdown-menu mega-menu">
                                        <ul class="demo-list">
                                            <li>
                                                <a href="index.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/1.jpg" class="img-fluid" alt="">
                                                    <h4>Gadget Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index-2.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/2.jpg" class="img-fluid" alt="">
                                                    <h4>MegaMart Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index-3.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/3.jpg" class="img-fluid" alt="">
                                                    <h4>Organic Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index-4.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/4.jpg" class="img-fluid" alt="">
                                                    <h4>StyleTech Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index-5.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/5.jpg" class="img-fluid" alt="">
                                                    <h4>Electro Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index-6.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/6.jpg" class="img-fluid" alt="">
                                                    <h4>BabyShop Store</h4>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="coming-soon.html">
                                                    <img src="{{asset('frontend')}}/assets/images/demos/coming-soon.jpg" class="img-fluid" alt="">
                                                    <h4>Coming Soon</h4>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-auto-close="outside" data-bs-toggle="dropdown">Shop</a>
                                    <ul class="dropdown-menu">
                                        <li class="sub-dropdown-hover">
                                            <a class="dropdown-item" href="#!">Shop grid</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-grid-5.html">Shop grid 5</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-4.html">Shop grid 4</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-3.html">Shop grid 3</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-2.html">Shop grid 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-dropdown-hover">
                                            <a class="dropdown-item" href="#!">Shop collection</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-collection-grid-5.html">Shop collection 5</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-4.html">Shop collection 4</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-3.html">Shop collection 3</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-2.html">Shop collection 2</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-list.html">Shop collection list</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-right-sidebar.html">Shop right
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-list-infinite.html">Shop List
                                                Infinite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-banner.html">Shop banner</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-category.html">Shop
                                                category</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-full-width.html">Shop full
                                                width</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-grid-infinite.html">shop
                                                grid infinite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-list.html">Shop List</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-recent-view.html">Shop
                                                recent view</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown" data-bs-auto-close="outside">Product</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row g-xl-4 g-3">
                                            <div class="col-xl-8">
                                                <div class="row gx-xl-4 gx-3 gy-0 row-cols-xxl-5 row-cols-xl-3">
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product page</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-sticky.html" class="dropdown-item">Product thumbnail</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-4-images.html" class="dropdown-item">Product image</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-slider.html" class="dropdown-item">Product slider</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-sticky.html" class="dropdown-item">Product sticky</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-full-width.html" class="dropdown-item">Product full width</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product variants</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-rectangle.html" class="dropdown-item">variants rectangle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-circle.html" class="dropdown-item">variants circle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-image-swatch.html" class="dropdown-item">variants image swatch</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.html" class="dropdown-item">variants color</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-radio-button.html" class="dropdown-item">variants radio</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-dropdown.html" class="dropdown-item">variants dropdown</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a class="dropdown-item" href="product-color.html">Product simple</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-sticky.html">Product classified</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-circle.html">size
                                                                    chart</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.html" class="dropdown-item">delivery & return</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-full-width.html" class="dropdown-item">Product review</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-dropdown.html">ask an expert</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-bundle.html" class="dropdown-item">Product bundle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-out-stock.html" class="dropdown-item">Out of stock</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-out-stock-2.html" class="dropdown-item">Out of stock 2</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-zoom.html" class="dropdown-item">Product zoom</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-zoom-gallery.html" class="dropdown-item">Product light zoom</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-sticky.html" class="dropdown-item">Product sticky checkout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a class="dropdown-item" href="product-circle.html">
                                                                    Sticky Checkout</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-circle.html" class="dropdown-item">Secure Checkout</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-4-images.html" class="dropdown-item">Social share</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.html" class="dropdown-item">Related products</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-slider.html">Wishlist & compare</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 d-xl-block d-none">
                                                <div class="menu-title">
                                                    <h4>Top Selling Product</h4>
                                                </div>
                                                <div class="swiper menu-product-slider">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/96.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Marth product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Cleansers Beauty Product</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$1300.00 <del>$1402.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/97.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Marth product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Fresh Apricot Scrub</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$210.00 <del>$289.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/98.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Apple Product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Apple iPhone 13 (128GB)</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$1820.00 <del>$2399.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/99.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Marth product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Cleansers Beauty Product</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$192.00 <del>$250.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/100.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Marth product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Kundan Studded Necklace</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$1998.00 <del>$2100.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/101.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Grocery</h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Vedaka Raw Peanuts</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$170.00 <del>$210.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box-4-main">
                                                                <div class="select-option-box">
                                                                    <div class="select-box">
                                                                        <div>
                                                                            <div class="color-box">
                                                                                <h4 class="h5">Colors</h4>
                                                                                <ul class="color-list">
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <div class="size-box">
                                                                                <h4 class="h5">Sizes</h4>
                                                                                <ul class="size-list">
                                                                                    <li>
                                                                                        <a href="#!">xs</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">s</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">m</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">l</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#!">xl</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <button class="btn add-cart-btn">add to
                                                                                cart</button>
                                                                            <button class="close-btn btn" onclick="closeSidebar()">
                                                                                <i class="ri-close-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="productMain product-box-4 rounded-0">
                                                                    <div class="product-image">
                                                                        <a href="product-color.html">
                                                                            <img src="{{asset('frontend')}}/assets/images/product/102.png" class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="quick-view-button-box">
                                                                            <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                View</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h5 class="sub-name productName">Marth product
                                                                        </h5>
                                                                        <a href="product-color.html" class="name">
                                                                            <h5>Office Wear Perfume</h5>
                                                                        </a>
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
                                                                                <i class="ri-star-fill"></i>
                                                                            </li>
                                                                        </ul>
                                                                        <h5 class="price">$123.00 <del>$150.00</del>
                                                                        </h5>
                                                                        <div class="option-box">
                                                                            <button class="btn select-btn">Select
                                                                                Options</button>
                                                                            <ul class="option-list">
                                                                                <li>
                                                                                    <a href="#!" class="wishlistProduct">
                                                                                        <i class="ri-heart-3-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#!">
                                                                                        <i class="ri-repeat-2-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Sales</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row g-xl-5">
                                            <div class="col-xl-3 border-right-color">
                                                <ul class="nav nav-tabs menu-nav-tabs" id="myTab3">
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn active" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile-tab-pane">
                                                            <i class="ri-smartphone-line"></i>
                                                            <span>Mobiles, Laptop</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="men-tab" data-bs-toggle="tab" data-bs-target="#men-tab-pane">
                                                            <i class="ri-men-line"></i>
                                                            <span>Perfume, Watch, Furniture</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="women-tab" data-bs-toggle="tab" data-bs-target="#women-tab-pane">
                                                            <i class="ri-women-line"></i>
                                                            <span>Headphone, Speaker</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="beauty-tab" data-bs-toggle="tab" data-bs-target="#beauty-tab-pane">
                                                            <i class="ri-empathize-line"></i>
                                                            <span>Beauty, Health, Grocery</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="baby-tab" data-bs-toggle="tab" data-bs-target="#baby-tab-pane">
                                                            <i class="ri-open-arm-line"></i>
                                                            <span>Toys, Baby Products, Kid's Fashion</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="consoles-tab" data-bs-toggle="tab" data-bs-target="#consoles-tab-pane">
                                                            <i class="ri-gamepad-line"></i>
                                                            <span>Kitchen items & Appliances</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="electronic-tab" data-bs-toggle="tab" data-bs-target="#electronic-tab-pane">
                                                            <i class="ri-plug-2-line"></i>
                                                            <span>TV, Appliances, Electronics</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-9 d-xl-block d-none">
                                                <div class="tab-content" id="myTabContent3">
                                                    <div class="tab-pane fade show active" id="mobile-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/4.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Smart Watch Series X3</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$239.00
                                                                                    <del>$250.00</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/13.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>One plus Nord CE</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$80.00
                                                                                    <del>$85.67</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/14.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Samsung Galaxy M14</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$83.25
                                                                                    <del>$92.15</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/15.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>iPhone 14 Pro</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$101.25
                                                                                    <del>$110.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/16.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Realme 10 PRO</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$48.45
                                                                                    <del>$52.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/22.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Apple iPhone 14 (128 GB) -
                                                                                        Purple</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$110.38
                                                                                    <del>$118.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/28.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Phone
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Apple iPhone 13 Mini (512GB) -
                                                                                        Starlight</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$120.38
                                                                                    <del>$354.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="men-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/97.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Marth
                                                                                    product</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Fresh Apricot Scrub</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price">$210.00
                                                                                    <del>$289.00</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/96.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Beauty
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Cleansers Beauty Product</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1300.00
                                                                                    <del>$1402.67</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/106.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Watch
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Brawn boys analog watch</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$68.42
                                                                                    <del>$85.15</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/1.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Watch
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Smart Watch Series X3</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$250.25
                                                                                    <del>$275.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/105.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Furniture</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Handmade table</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1010.25
                                                                                    <del>$1250.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/60.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Perfume
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Pluto SW250 Smart Watch</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$400.69
                                                                                    <del>$450.45</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="women-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/35-1.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Herschel Leather duffle bag in
                                                                                        brown color</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$670.00
                                                                                    <del>$900.00</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/6.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Smart Watch Series X3</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$572.36
                                                                                    <del>$856.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/59.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>dolby Atoms yellow headphone
                                                                                    </h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$258.78
                                                                                    <del>$546.58</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/103.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Wireless Black Headphone</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1300.67
                                                                                    <del>$1500.00</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/129.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Wireless in Ear Earphones with
                                                                                        Mic</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$711.98
                                                                                    <del>$750.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/131.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Samsung Galaxy Book3 Pro Intel
                                                                                        13th Gen i5</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$110.38
                                                                                    <del>$118.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/151.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    headphone</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Infinix Smart headphone</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1234.62
                                                                                    <del>$1804.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="beauty-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/7.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Beauty
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Combo Face Care cream</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$246.36
                                                                                    <del>$506.24</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/97.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Beauty
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Fresh Apricot Scrub</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$600.00
                                                                                    <del>$850.67</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/62.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Healthy
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Fresho Signature Garlic & Herb
                                                                                        Toast, 100 g</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$89.69
                                                                                    <del>$92.15</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/66.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Healthy
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Popped Potato Chips Healthy
                                                                                        Snack, Assorted</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$89.33
                                                                                    <del>$96.24</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/63.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Grocery
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Fresho Signature Garlic & Herb
                                                                                        Toast, 100 g</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$78.11
                                                                                    <del>$86.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/61.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Healthy
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Organic Himalayan Multiflower
                                                                                        Honey, 500 g</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$99.99
                                                                                    <del>$105.78</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/84.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Grocery
                                                                                </h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>kotaliya Brown flax seeds(Alsi)
                                                                                        Brown Flax Seeds</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$67.38
                                                                                    <del>$110.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="baby-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/177.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Toys</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Baby Pacifier</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$169.00
                                                                                    <del>$180.00</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/167.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Product</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>all-in-one pyjamas</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$139.00
                                                                                    <del>$150.67</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/170.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Product</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Baby skincare product</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$83.25
                                                                                    <del>$92.15</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/176.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Toys</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Baby little trolley</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$101.25
                                                                                    <del>$110.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/173.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Toys</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Cotton Baby Pillow</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$48.45
                                                                                    <del>$52.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/185.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    Toys</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Dusting Powder</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$78.38
                                                                                    <del>$95.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/182.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Baby's
                                                                                    product</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Natural Milk Powder</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$69.38
                                                                                    <del>$86.68</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="consoles-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/5.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Kitchen Accessories</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$587.31
                                                                                    <del>$896.45</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/8.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Kitchen Utensils</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$68.48
                                                                                    <del>$85.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/11.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>stainless dishware</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$48.25
                                                                                    <del>$56.15</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/12.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Wholesale Cheap Square</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$87.25
                                                                                    <del>$101.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/18.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>RoastRite Culinary Ovens</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1548.46
                                                                                    <del>$1850.69</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/20.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>BakeMaster Professional Ovens
                                                                                    </h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$1200.00
                                                                                    <del>$1500.20</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/21.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">Kitchen
                                                                                    Accessories</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>FridgeFrost Innovations</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$3698.36
                                                                                    <del>$4561.00</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="electronic-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/115.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Electronics</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Retro movie film cinema</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$6542.98
                                                                                    <del>$8632.99</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/41.jpg" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Electronics</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Samsung Galaxy Book3 Pro Intel
                                                                                        13th Gen i5</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$2548.12
                                                                                    <del>$3000.89</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/29.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Electronics</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Fujifilm Instax Mini 9 Instant
                                                                                        Camera</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$569.33
                                                                                    <del>$85.67</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/27.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Electronics</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Motorola Moto X4 32GB Unlocked
                                                                                        Smartphone</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price">$210.00
                                                                                    <del>$289.00</del></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/134.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Appliances</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Best Accessories SteelSeries
                                                                                        NIMBUS</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$369.58
                                                                                    <del>$523.14</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/112.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Appliances</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Mini Projector</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$2567.48
                                                                                    <del>$3524.36</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box-4-main">
                                                                        <div class="productMain product-box-4 rounded-0">
                                                                            <div class="product-image">
                                                                                <a href="product-color.html">
                                                                                    <img src="{{asset('frontend')}}/assets/images/product/108.png" class="img-fluid productImage" alt="">
                                                                                </a>
                                                                                <div class="quick-view-button-box">
                                                                                    <button class="btn view-btn" data-bs-target="#quickViewModal" data-bs-toggle="modal">Quick
                                                                                        View</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-content">
                                                                                <h6 class="sub-name productName">
                                                                                    Electronics</h6>
                                                                                <a href="product-color.html" class="name">
                                                                                    <h5>Apple Smart HD TV</h5>
                                                                                </a>
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
                                                                                        <i class="ri-star-fill"></i>
                                                                                    </li>
                                                                                </ul>
                                                                                <h5 class="price mb-0">$4523.25
                                                                                    <del>$5658.25</del>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Features</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row row-cols-xl-5 row-cols-1 g-md-4 g-2">
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Portfolio pages</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a class="dropdown-item" href="portfolio-2-grid.html">Portfolio
                                                            grid 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-3-grid.html" class="dropdown-item">Portfolio
                                                            grid 3</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="portfolio-4-grid.html">Portfolio
                                                            grid 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-2-grid-masonary.html" class="dropdown-item">Portfolio Masonary 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-3-grid-masonary.html" class="dropdown-item">Portfolio Masonary 3</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="portfolio-4-grid-masonary.html">Portfolio Masonary
                                                            4</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-full-width-masonary.html" class="dropdown-item">Portfolio Masonary full width</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Invoice pages</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="./../invoice/invoice-1.html" class="dropdown-item">Invoice 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../invoice/invoice-2.html" class="dropdown-item">Invoice 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../invoice/invoice-3.html" class="dropdown-item">Invoice 3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Email templates</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="./../email-templete/black-friday.html" class="dropdown-item">Black friday</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../email-templete/leave-feedback.html" class="dropdown-item">Leave feedback</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../email-templete/order-tracking.html" class="dropdown-item">Order tracking</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../email-templete/reset-password.html" class="dropdown-item">Reset password</a>
                                                    </li>
                                                    <li>
                                                        <a href="./../email-templete/welcome.html" class="dropdown-item">Welcome</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Cookie bar</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="index.html" class="dropdown-item">Cookie bar bottom
                                                            1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-2.html" class="dropdown-item">Cookie bar bottom
                                                            2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-3.html" class="dropdown-item">Cookie bar bottom
                                                            3</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-4.html" class="dropdown-item">Cookie bar Right
                                                            1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-5.html" class="dropdown-item">Cookie bar Right
                                                            2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-6.html" class="dropdown-item">Cookie bar Right
                                                            3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Modal</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a class="dropdown-item" href="#quickViewModal" data-bs-toggle="modal">Add to Cart</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item newsletter-btn" data-bs-toggle="modal" href="#newsletterModal">Newsletter</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item exit-modal-btn" data-bs-toggle="modal" href="#exitModal">Exit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 d-xl-block d-none w-100">
                                                <a href="shop-left-sidebar.html" class="menu-banner">
                                                    <img src="{{asset('frontend')}}/assets/images/banner/12.jpg" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="400.html">400</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="404.html">404</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="500.html">500</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="about-us.html">About us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="compare.html">Compare</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="contact-us.html">Contact us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="faq.html">FAQ's</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="maintenance.html">Maintenance</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="order-success.html">Order success</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="order-tracking.html">Order tracking</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="search.html">Search</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="user-dashboard.html">User dashboard</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown new-nav-item">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Seller</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="seller-become.html">Become a Seller</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-grid.html">Seller grid</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-grid-2.html">Seller grid 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-list.html">Seller list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-list-2.html">Seller list 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-details.html">Seller details</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-details-2.html">Seller details 2</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="blog-2-grid.html">Blog grid 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-3-grid.html">Blog grid 3</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-list.html">Blog list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-masonary.html">blog masonary</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-no-sidebar.html">Blog no sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-detail.html">Blog details</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-light-header d-sm-flex d-none">
                <ul class="product-viwer">
                    <li class="recent-product dropdown-box">
                        <a data-bs-toggle="offcanvas" href="#recentViwerModal" class="product-link d-xxl-none d-sm-flex d-none">Recent Viewer</a>
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
                                            <img src="{{asset('frontend')}}/assets/images/product/1.png" class="img-fluid" alt="">
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
                                            <img src="{{asset('frontend')}}/assets/images/product/2.png" class="img-fluid" alt="">
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
                                            <img src="{{asset('frontend')}}/assets/images/product/3.png" class="img-fluid" alt="">
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
                                            <img src="{{asset('frontend')}}/assets/images/product/2.png" class="img-fluid" alt="">
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
                                            <img src="{{asset('frontend')}}/assets/images/product/3.png" class="img-fluid" alt="">
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
                                    <use xlink:href="{{asset('frontend')}}/assets/images/no-recent.svg#noRecent"></use>
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