<aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset pb-0">
                <!-- Toggle Button -->
                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                    <button type="button" class="close ml-auto" aria-controls="sidebarHeader" aria-haspopup="true"
                        aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                        data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                        data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                        data-unfold-duration="500">
                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                        <!-- Logo -->
                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical mb-3"
                            href="index.html" aria-label="Electro">
                            <img src="{{ asset(setting()->header_logo) }}" alt=""
                                style="height: 60px; width:160;">
                        </a>
                        <!-- End Logo -->

                        <!-- List -->
                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                            <!-- Home Section -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link"
                                    href="#">
                                    Supper Deals
                                </a>
                            </li>
                            <!-- End Home Section -->

                            <!-- Shop Pages -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebarPagesCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebarPagesCollapse">
                                    Shop Pages
                                </a>

                                <div id="headerSidebarPagesCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarPagesMenu" class="u-header-collapse__nav-list">
                                        <!-- Shop Grid -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-grid.html">Shop
                                                Grid</a></li>
                                        <!-- End Shop Grid -->

                                        <!-- Shop Grid Extended -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-grid-extended.html">Shop
                                                Grid Extended</a></li>
                                        <!-- End Shop Grid Extended -->

                                        <!-- Shop List View -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-list-view.html">Shop
                                                List View</a></li>
                                        <!-- End Shop List View -->

                                        <!-- Shop List View Small -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-list-view-small.html">Shop
                                                List View Small</a></li>
                                        <!-- End Shop List View Small -->

                                        <!-- Shop Left Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-left-sidebar.html">Shop
                                                Left Sidebar</a></li>
                                        <!-- End Shop Left Sidebar -->

                                        <!-- Shop Full width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-full-width.html">Shop
                                                Full width</a></li>
                                        <!-- End Shop Full width -->

                                        <!-- Shop Right Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-right-sidebar.html">Shop
                                                Right Sidebar</a></li>
                                        <!-- End Shop Right Sidebar -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Shop Pages -->

                            <!-- Product Categories -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebarBlogCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebarBlogCollapse">
                                    Product Categories
                                </a>

                                <div id="headerSidebarBlogCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarBlogMenu" class="u-header-collapse__nav-list">
                                        <!-- 4 Column Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-4-column-sidebar.html">4
                                                Column Sidebar</a></li>
                                        <!-- End 4 Column Sidebar -->

                                        <!-- 5 Column Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-5-column-sidebar.html">5
                                                Column Sidebar</a></li>
                                        <!-- End 5 Column Sidebar -->

                                        <!-- 6 Column Full width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-6-column-full-width.html">6
                                                Column Full width</a></li>
                                        <!-- End 6 Column Full width -->

                                        <!-- 7 Column Full width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/product-categories-7-column-full-width.html">7
                                                Column Full width</a></li>
                                        <!-- End 7 Column Full width -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Product Categories -->

                            <!-- Single Product Pages -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebarShopCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebarShopCollapse">
                                    Single Product Pages
                                </a>

                                <div id="headerSidebarShopCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarShopMenu" class="u-header-collapse__nav-list">
                                        <!-- Single Product Extended -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-extended.html">Single
                                                Product Extended</a></li>
                                        <!-- End Single Product Extended -->

                                        <!-- Single Product Fullwidth -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-fullwidth.html">Single
                                                Product Fullwidth</a></li>
                                        <!-- End Single Product Fullwidth -->

                                        <!-- Single Product Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/single-product-sidebar.html">Single
                                                Product Sidebar</a></li>
                                        <!-- End Single Product Sidebar -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Single Product Pages -->

                            <!-- Ecommerce Pages -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebarDemosCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebarDemosCollapse">
                                    Ecommerce Pages
                                </a>

                                <div id="headerSidebarDemosCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarDemosMenu" class="u-header-collapse__nav-list">
                                        <!-- Shop -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop.html">Shop</a>
                                        </li>
                                        <!-- End Shop -->

                                        <!-- Cart -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/cart.html">Cart</a>
                                        </li>
                                        <!-- End Cart -->

                                        <!-- Checkout -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/checkout.html">Checkout</a>
                                        </li>
                                        <!-- End Checkout -->

                                        <!-- My Account -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/my-account.html">My
                                                Account</a></li>
                                        <!-- End My Account -->

                                        <!-- Track your Order -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/track-your-order.html">Track
                                                your Order</a></li>
                                        <!-- End Track your Order -->

                                        <!-- Compare -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/compare.html">Compare</a>
                                        </li>
                                        <!-- End Compare -->

                                        <!-- wishlist -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/wishlist.html">wishlist</a>
                                        </li>
                                        <!-- End wishlist -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Ecommerce Pages -->

                            <!-- Shop Columns -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebardocsCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebardocsCollapse">
                                    Shop Columns
                                </a>

                                <div id="headerSidebardocsCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebardocsMenu" class="u-header-collapse__nav-list">
                                        <!-- 7 Column Full width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-7-columns-full-width.html">7
                                                Column Full width</a></li>
                                        <!-- End 7 Column Full width -->

                                        <!-- 6 Column Full width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-6-columns-full-width.html">6
                                                Column Full width</a></li>
                                        <!-- End 6 Column Full width -->

                                        <!-- 5 Column Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-5-columns-sidebar.html">5
                                                Column Sidebar</a></li>
                                        <!-- End 5 Column Sidebar -->

                                        <!-- 4 Column Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-4-columns-sidebar.html">4
                                                Column Sidebar</a></li>
                                        <!-- End 4 Column Sidebar -->

                                        <!-- 3 Column Sidebar -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/shop/shop-3-columns-sidebar.html">3
                                                Column Sidebar</a></li>
                                        <!-- End 3 Column Sidebar -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Shop Columns -->

                            <!-- Blog Pages -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                    href="javascript:;" data-target="#headerSidebarblogsCollapse" role="button"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="headerSidebarblogsCollapse">
                                    Blog Pages
                                </a>

                                <div id="headerSidebarblogsCollapse" class="collapse"
                                    data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarblogsMenu" class="u-header-collapse__nav-list">
                                        <!-- Blog v1 -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/blog/blog-v1.html">Blog
                                                v1</a></li>
                                        <!-- End Blog v1 -->

                                        <!-- Blog v2 -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/blog/blog-v2.html">Blog
                                                v2</a></li>
                                        <!-- End Blog v2 -->

                                        <!-- Blog v3 -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/blog/blog-v3.html">Blog
                                                v3</a></li>
                                        <!-- End Blog v3 -->

                                        <!-- Blog Full Width -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/blog/blog-full-width.html">Blog
                                                Full Width</a></li>
                                        <!-- End Blog Full Width -->

                                        <!-- Single Blog Post -->
                                        <li><a class="u-header-collapse__submenu-nav-link"
                                                href="https://transvelo.github.io/electro-html/2.0/html/blog/single-blog-post.html">Single
                                                Blog Post</a></li>
                                        <!-- End Single Blog Post -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Blog Pages -->
                        </ul>
                        <!-- End List -->
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
