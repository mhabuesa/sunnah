<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ route('admin.dashboard') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">{{ config('app.name') }}</span>
        </a>
        <div class="d-flex align-items-center gap-1">
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-fw fa-moon" data-dark-mode-icon=""></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end smini-hide border-0"
                    aria-labelledby="sidebar-dark-mode-dropdown">
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_off" data-dark-mode="off">
                        <i class="far fa-sun fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Light</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_on" data-dark-mode="on">
                        <i class="far fa-moon fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">Dark</span>
                    </button>
                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout"
                        data-action="dark_mode_system" data-dark-mode="system">
                        <i class="fa fa-desktop fa-fw opacity-50"></i>
                        <span class="fs-sm fw-medium">System</span>
                    </button>
                </div>
            </div>
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.pos.*') ? 'active' : '' }}"
                        href="{{ route('admin.pos.index') }}">
                        <i class="nav-main-link-icon fa-solid fa-bag-shopping"></i>
                        <span class="nav-main-link-name">POS</span>
                    </a>
                </li>
                <li class="nav-main-heading">Order Management</li>
                <li
                    class="nav-main-item {{ request()->routeIs(['admin.orders.*', 'admin.deliver.details']) ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon fas fa-cart-arrow-down"></i>
                        <span class="nav-main-link-name">Orders</span>
                    </a>

                    <ul class="nav-main-submenu">
                        @php
                            $ordersMenu = [
                                ['route' => 'all', 'label' => 'All', 'badge' => 'info'],
                                ['route' => 'pending', 'label' => 'Pending', 'badge' => 'info'],
                                ['route' => 'on_review', 'label' => 'On Review', 'badge' => 'warning'],
                                ['route' => 'schedule', 'label' => 'Scheduled Delivery', 'badge' => 'warning'],
                                ['route' => 'confirmed', 'label' => 'Confirmed', 'badge' => 'info'],
                                ['route' => 'out_for_delivery', 'label' => 'Out for Delivery', 'badge' => 'warning'],
                                ['route' => 'delivered', 'label' => 'Delivered', 'badge' => 'info'],
                                ['route' => 'failed', 'label' => 'Failed to Delivered', 'badge' => 'danger'],
                                ['route' => 'canceled', 'label' => 'Canceled', 'badge' => 'danger'],
                                ['route' => 'returned', 'label' => 'Returned', 'badge' => 'danger'],
                            ];
                        @endphp

                        @foreach ($ordersMenu as $item)
                            @php
                                $isActive =
                                    request()->routeIs('admin.orders.list') &&
                                    request()->route('type') == $item['route'];
                            @endphp
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ $isActive ? 'active' : '' }}"
                                    href="{{ route('admin.orders.list', $item['route']) }}">
                                    <span class="nav-main-link-name">
                                        <i
                                            class="fas fa-circle fa-2xs text-{{ $isActive ? 'success' : 'muted' }} me-2"></i>
                                        {{ $item['label'] }}
                                    </span>
                                    <span
                                        class="badge badge-soft-{{ $item['badge'] }} badge-pill ml-1">{{ ordersCount($item['route']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.transactions') ? 'active' : '' }}"
                        href="{{ route('admin.transactions') }}">
                        <i class="nav-main-link-icon fa-solid fa-money-bill-wave"></i>
                        <span class="nav-main-link-name">Transactions</span>
                    </a>
                </li>
                <li class="nav-main-heading">Product Management</li>
                <li
                    class="nav-main-item {{ request()->routeIs('admin.category.*') ? 'open' : (request()->routeIs('admin.subcategory.*') ? 'open' : '') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>
                        <span class="nav-main-link-name">Category Setup</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                                href="{{ route('admin.category.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-layer-group me-2"></i>Categories
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.subcategory.*') ? 'active' : '' }}"
                                href="{{ route('admin.subcategory.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Sub Categories
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.brand.*') ? 'active' : '' }}"
                        href="{{ route('admin.brand.index') }}">
                        <span class="nav-main-link-name">
                            <i class="fas fa-tags me-2"></i>Brands
                        </span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.attribute.*') ? 'active' : '' }}"
                        href="{{ route('admin.attribute.index') }}">
                        <span class="nav-main-link-name">
                            <i class="fas fa-tags me-2"></i>Product Attribute Setup
                        </span>
                    </a>
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.product.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-file-invoice-dollar"></i>
                        <span class="nav-main-link-name">Products</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}"
                                href="{{ route('admin.product.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-layer-group me-2"></i>Product List
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.product.create') ? 'active' : '' }}"
                                href="{{ route('admin.product.create') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Add New Product
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.product.trash') ? 'active' : '' }}"
                                href="{{ route('admin.product.trash') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-trash me-2"></i> Trash Product
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Sunnah Shopping --}}
                <li class="nav-main-heading">
                    </i> Sunnah Shopping
                </li>

                <li class="nav-main-item {{ request()->routeIs('admin.sunnah.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-brands fa-square-web-awesome"></i>
                        <span class="nav-main-link-name">Sunnah Shopping</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.sunnah.category.index') ? 'active' : '' }}"
                                href="{{ route('admin.sunnah.category.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-layer-group me-2"></i> Category
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.sunnah.subcategory.index') ? 'active' : '' }}"
                                href="{{ route('admin.sunnah.subcategory.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Subcategory
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.sunnah.products.index') ? 'active' : '' }}"
                                href="{{ route('admin.sunnah.products.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Products
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">
                    </i> Promotion management
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}"
                        href="{{ route('admin.banner.index') }}">
                        <span class="nav-main-link-name">
                            <i class="fa-solid fa-panorama me-2"></i>
                            Banner Setup
                        </span>
                    </a>
                </li>
                <li
                    class="nav-main-item {{ request()->routeIs('admin.coupon.*') ? 'open' : (request()->routeIs('admin.todaysDeal.*') ? 'open' : (request()->routeIs('admin.offer.*') ? 'open' : (request()->routeIs('admin.featuredProduct.*') ? 'open' : ''))) }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-brands fa-square-web-awesome"></i>
                        <span class="nav-main-link-name">Offers & Deals</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.coupon.index') ? 'active' : '' }}"
                                href="{{ route('admin.coupon.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-file-invoice me-2"></i> Coupon
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.offer.*') ? 'active' : '' }}"
                                href="{{ route('admin.offer.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-file-invoice me-2"></i> Offers
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.todaysDeal.index') ? 'active' : '' }}"
                                href="{{ route('admin.todaysDeal.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-id-badge me-2"></i> Todays Deal
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.featuredProduct.index') ? 'active' : '' }}"
                                href="{{ route('admin.featuredProduct.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-id-badge me-2"></i> Featured Product
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item {{ request()->routeIs('admin.campaign.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-solid fa-rocket"></i>
                        <span class="nav-main-link-name">Campaign Setup</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.campaign.product') ? 'active' : '' }}"
                                href="{{ route('admin.campaign.product') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-cart-shopping me-2"></i> Product
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.campaign.index') ? 'active' : '' }}"
                                href="{{ route('admin.campaign.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fa-solid fa-fire me-2"></i> Campaign
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.sms.index') ? 'active' : '' }}"
                        href="{{ route('admin.sms.index') }}">
                        <span class="nav-main-link-name">
                            <i class="fa-solid fa-comment-sms me-2"></i>
                            SMS Campaign
                        </span>
                    </a>
                </li>


                <li class="nav-main-heading">
                    </i> Blog management
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.blog.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-brands fa-square-web-awesome"></i>
                        <span class="nav-main-link-name">Blog Management</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.blog.category') ? 'active' : '' }}"
                                href="{{ route('admin.blog.category') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-layer-group me-2"></i> Blog Categories
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.blog.index') ? 'active' : '' }}"
                                href="{{ route('admin.blog.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-blog me-2"></i> Blogs
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item {{ request()->routeIs('admin.campaign.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-solid fa-rocket"></i>
                        <span class="nav-main-link-name">Campaign Setup</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.campaign.product') ? 'active' : '' }}"
                                href="{{ route('admin.campaign.product') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-cart-shopping me-2"></i> Product
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.campaign.index') ? 'active' : '' }}"
                                href="{{ route('admin.campaign.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fa-solid fa-fire me-2"></i> Campaign
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.sms.index') ? 'active' : '' }}"
                        href="{{ route('admin.sms.index') }}">
                        <span class="nav-main-link-name">
                            <i class="fa-solid fa-comment-sms me-2"></i>
                            SMS Campaign
                        </span>
                    </a>
                </li>

                {{-- Charity --}}
                <li class="nav-main-heading">
                    </i> Charity Management
                </li>

                <li
                    class="nav-main-item {{ request()->routeIs('admin.charity.category.index') ? 'open' : (request()->routeIs('admin.charity.subcategory.index') ? 'open' : (request()->routeIs('admin.charity.content') ? 'open' : (request()->routeIs('admin.charity.content.create') ? 'open' : (request()->routeIs('admin.charity.content.edit') ? 'open' : '')))) }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa-brands fa-square-web-awesome"></i>
                        <span class="nav-main-link-name">Charity Management</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.charity.category.index') ? 'active' : '' }}"
                                href="{{ route('admin.charity.category.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-layer-group me-2"></i> Category
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.charity.subcategory.index') ? 'active' : '' }}"
                                href="{{ route('admin.charity.subcategory.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Subcategory
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.charity.content') ? 'active' : (request()->routeIs('admin.charity.content.create') ? 'active' : (request()->routeIs('admin.charity.content.edit') ? 'active' : '')) }}"
                                href="{{ route('admin.charity.content') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-folder-open me-2"></i> Content
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-main-item {{ request()->routeIs('admin.charity.donations') ? 'open' : (request()->routeIs('admin.charity.donors') ? 'open' : (request()->routeIs('admin.charity.donation.*') ? 'open' : (request()->routeIs('admin.charity.donors.*') ? 'open' : (request()->routeIs('admin.charity.donor.*') ? 'open' : '')))) }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-hand-holding-heart"></i>
                        <span class="nav-main-link-name">Charity</span>
                    </a>

                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.charity.donations') ? 'active' : (request()->routeIs('admin.charity.donation.*') ? 'active' : '') }}"
                                href="{{ route('admin.charity.donations') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-hand-holding-usd me-2"></i> Donations
                                </span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.charity.donors') ? 'active' : (request()->routeIs('admin.charity.donor.*') ? 'active' : '') }}"
                                href="{{ route('admin.charity.donors') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-users me-2"></i> Donors List
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">
                    </i> Users Management
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.customer.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-id-badge"></i>
                        <span class="nav-main-link-name">Customer</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.customer.index') ? 'active' : '' }}"
                                href="{{ route('admin.customer.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-file-invoice me-2"></i> Customer List
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.user.create') ? 'active' : '' }}"
                                href="{{ route('admin.user.create') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-id-badge me-2"></i> Customer Review
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.user.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-user-astronaut"></i>
                        <span class="nav-main-link-name">Users</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.user.index') ? 'active' : '' }}"
                                href="{{ route('admin.user.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-users me-2"></i> User List
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.user.create') ? 'active' : '' }}"
                                href="{{ route('admin.user.create') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> Add New User
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">
                    </i> Pages Management
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.pages.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-newspaper"></i>
                        <span class="nav-main-link-name">Pages</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.pages.footer.*') ? 'active' : '' }}"
                                href="{{ route('admin.pages.footer.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i>Footer Pages List
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-main-heading">
                    </i> System Settings
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.settings.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-newspaper"></i>
                        <span class="nav-main-link-name">Settings</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.settings.business') ? 'active' : '' }}"
                                href="{{ route('admin.settings.business') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> Business Settings
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.settings.app.*') ? 'active' : '' }}"
                                href="{{ route('admin.settings.app.core') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> App Settings
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> Meta Settings
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
