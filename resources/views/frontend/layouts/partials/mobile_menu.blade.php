    <div class="mobile-menu d-sm-none">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="ri-home-2-line"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas">
                    <i class="ri-menu-line"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#cartOffcanvas" class="search-box">
                    <i class="ri-shopping-cart-line"></i>
                    <span>Cart</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#wishlistOffcanvas" class="notifi-wishlist">
                    <i class="ri-heart-3-line"></i>
                    <span>Wishlist</span>
                </a>
            </li>

            <li>
                @if (auth()->guard('customer')->check())
                    <a href="{{route('customer.dashboard')}}">
                        <i class="ri-user-3-line"></i>
                        <span>Account</span>
                    </a>
                @else
                    <a href="#" data-bs-toggle="modal" data-bs-target="#authenticationModal">
                        <i class="ri-user-3-line"></i>
                        <span>Account</span>
                    </a>
                @endif
            </li>
        </ul>
    </div>
