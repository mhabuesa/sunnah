<div class="mobile-bottom-nav d-xl-none">

    {{-- Home --}}
    <a href="{{ route('index') }}" class="mobile-nav-item">
        <i class="ec ec-home"></i>
        <span>Home</span>
    </a>

    {{-- Category: Open Existing Sidebar --}}
    <a href="javascript:;" class="mobile-nav-item" role="button" data-unfold-event="click"
        data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
        data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">

        <i class="ec ec-menu"></i>
        <span>Category</span>
    </a>

    {{-- Cart --}}
    <a href="{{ route('cart') }}" class="mobile-nav-item position-relative">
        <i class="ec ec-shopping-bag"></i>
        <span>Cart</span>

        @if ($cartCount > 0)
            <span class="mobile-cart-count">{{ $cartCount }}</span>
        @endif
    </a>

    {{-- Search --}}
    <a href="javascript:void(0)" id="mobileSearchInvoker" class="mobile-nav-item">
        <i class="ec ec-search"></i>
        <span>Search</span>
    </a>

    {{-- Account --}}
    @if (auth()->guard('customer')->check())
        <a href="{{ route('customer.dashboard') }}" class="mobile-nav-item">
        @else
            <a href="{{ route('customer.login') }}" class="mobile-nav-item">
    @endif
    <i class="ec ec-user"></i>
    <span>Account</span>
    </a>

</div>
