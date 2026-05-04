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
                        <i class="nav-main-link-icon fa fa-bag-shopping"></i>
                        <span class="nav-main-link-name">POS</span>
                    </a>
                </li>
                <li class="nav-main-heading">Order Management</li>
                <li
                    class="nav-main-item {{ request()->routeIs('admin.orders.*') ? 'open' : (request()->routeIs('admin.deliver.details') ? 'open' : '') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon fas fa-cart-arrow-down"></i>
                        <span class="nav-main-link-name">Orders</span>
                    </a>

                    <ul class="nav-main-submenu">

                        <!-- All -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'all' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'all') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'all' ? 'success' : 'muted' }} me-2"></i>
                                    All
                                </span>
                                <span class="badge badge-soft-info badge-pill ml-1">{{ ordersCount('all') }}</span>
                            </a>
                        </li>

                        <!-- Pending -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'pending' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'pending') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'pending' ? 'success' : 'muted' }} me-2"></i>
                                    Pending
                                </span>
                                <span class="badge badge-soft-info badge-pill ml-1">{{ ordersCount('pending') }}</span>
                            </a>
                        </li>

                        <!-- On Review -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'on_review' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'on_review') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'on_review' ? 'success' : 'muted' }} me-2"></i>
                                    On Review
                                </span>
                                <span
                                    class="badge badge-soft-warning badge-pill ml-1">{{ ordersCount('on_review') }}</span>
                            </a>
                        </li>

                        <!-- Scheduled -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'schedule' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'schedule') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'schedule' ? 'success' : 'muted' }} me-2"></i>
                                    Scheduled Delivery
                                </span>
                                <span
                                    class="badge badge-soft-warning badge-pill ml-1">{{ ordersCount('schedule') }}</span>
                            </a>
                        </li>

                        <!-- Confirmed -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'confirmed' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'confirmed') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'confirmed' ? 'success' : 'muted' }} me-2"></i>
                                    Confirmed
                                </span>
                                <span
                                    class="badge badge-soft-info badge-pill ml-1">{{ ordersCount('confirmed') }}</span>
                            </a>
                        </li>

                        <!-- Out for Delivery -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'out_for_delivery' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'out_for_delivery') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'out_for_delivery' ? 'success' : 'muted' }} me-2"></i>
                                    Out for Delivery
                                </span>
                                <span
                                    class="badge badge-soft-warning badge-pill ml-1">{{ ordersCount('out_for_delivery') }}</span>
                            </a>
                        </li>

                        <!-- Delivered -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'delivered' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'delivered') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'delivered' ? 'success' : 'muted' }} me-2"></i>
                                    Delivered
                                </span>
                                <span
                                    class="badge badge-soft-info badge-pill ml-1">{{ ordersCount('delivered') }}</span>
                            </a>
                        </li>

                        <!-- Failed -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'failed' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'failed') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'failed' ? 'success' : 'muted' }} me-2"></i>
                                    Failed to Delivered
                                </span>
                                <span
                                    class="badge badge-soft-danger badge-pill ml-1">{{ ordersCount('failed') }}</span>
                            </a>
                        </li>

                        <!-- Canceled -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'canceled' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'canceled') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'canceled' ? 'success' : 'muted' }} me-2"></i>
                                    Canceled
                                </span>
                                <span
                                    class="badge badge-soft-danger badge-pill ml-1">{{ ordersCount('canceled') }}</span>
                            </a>
                        </li>

                        <!-- Returned -->
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.orders.list') && request()->route('type') == 'returned' ? 'active' : '' }}"
                                href="{{ route('admin.orders.list', 'returned') }}">
                                <span class="nav-main-link-name">
                                    <i
                                        class="fas fa-circle fa-2xs text-{{ request()->routeIs('admin.orders.list') && request()->route('type') == 'returned' ? 'success' : 'muted' }} me-2"></i>
                                    Returned
                                </span>
                                <span
                                    class="badge badge-soft-danger badge-pill ml-1">{{ ordersCount('returned') }}</span>
                            </a>
                        </li>

                    </ul>
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
                <li class="nav-main-item {{ request()->routeIs('admin.coupon.*') ? 'open' : '' }}">
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
                            <a class="nav-main-link {{ request()->routeIs('admin.todaysDeal.index') ? 'active' : '' }}"
                                href="{{ route('admin.todaysDeal.index') }}">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-id-badge me-2"></i> Todays Deal
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.user.create') ? 'active' : '' }}"
                                href="{{ route('admin.user.create') }}">
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
                            <a class="nav-main-link"
                                href="#">
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
