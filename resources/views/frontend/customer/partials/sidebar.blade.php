<div class="col-lg-3 col-md-4">
    <div class="customer-sidebar position-sticky" style="top: 10px;">

        {{-- Profile --}}
        <div class="customer-profile">
            <div class="profile-info">
                <h4>{{ auth('customer')->user()->name ?? 'Customer Name' }}</h4>

                <p>
                    {{ auth('customer')->user()->email ?? 'customer@email.com' }}
                </p>
            </div>
        </div>

        {{-- Menu --}}
        <div class="customer-menu">
            <a href="{{ route('customer.dashboard') }}" class="customer-menu-item {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span>Dashboard</span>
            </a>


            <a href="{{ route('customer.orders') }}" class="customer-menu-item {{ request()->routeIs('customer.orders') ? 'active' : '' }} {{ request()->routeIs('customer.order.show') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-box"></i>
                </span>
                <span>Orders</span>
            </a>


            <a href="{{ route('customer.profile') }}" class="customer-menu-item {{ request()->routeIs('customer.profile') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <span>Profile</span>
            </a>


            <a href="#" class="customer-menu-item">
                <span class="menu-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </span>
                <span>Address</span>
            </a>


            <a href="#" class="customer-menu-item">
                <span class="menu-icon">
                    <i class="fa-solid fa-heart"></i>
                </span>
                <span>Wishlist</span>
            </a>


            <a href="#" class="customer-menu-item">
                <span class="menu-icon">
                    <i class="fa-solid fa-gear"></i>
                </span>
                <span>Settings</span>
            </a>


            <form action="{{ route('customer.logout') }}" method="get">
                @csrf
                <button type="submit" class="customer-menu-item logout-btn">
                    <span class="menu-icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
