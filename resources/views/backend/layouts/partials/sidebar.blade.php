{{-- <nav id="sidebar" aria-label="Main Navigation">
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
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                    data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="default">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/amethyst.min-5.12.css">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/city.min-5.12.css">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/flat.min-5.12.css">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/modern.min-5.12.css">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </button>
                    <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/smooth.min-5.12.css">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </button>
                    <div class="dropdown-divider d-dark-none"></div>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                        data-action="sidebar_style_light" href="javascript:void(0)">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="sidebar_style_dark"
                        href="javascript:void(0)">
                        <span>Sidebar Dark</span>
                    </a>
                    <div class="dropdown-divider d-dark-none"></div>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="header_style_light"
                        href="javascript:void(0)">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout" data-action="header_style_dark"
                        href="javascript:void(0)">
                        <span>Header Dark</span>
                    </a>
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
                <li
                    class="nav-main-item {{ request()->routeIs('admin.product.*') ? 'open' : '' }}">
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
                    </ul>
                </li>
                <li class="nav-main-heading">
                    </i> Post Management
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-newspaper"></i>
                        <span class="nav-main-link-name">Posts</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> Add New Post
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link " href="#">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-file-invoice me-2"></i> Post List
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

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
                        <i class="nav-main-link-icon fa fa-cart-arrow-down"></i>
                        <span class="nav-main-link-name">POS</span>
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
                <li class="nav-main-heading">
                    </i> Users Management
                </li>
                <li class="nav-main-item {{ request()->routeIs('admin.user.*') ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-id-badge"></i>
                        <span class="nav-main-link-name">Customer</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('admin.user.index') ? 'active' : '' }}"
                                href="{{ route('admin.user.index') }}">
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
                    </i> Post Management
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">

                        <i class="nav-main-link-icon fas fa-newspaper"></i>
                        <span class="nav-main-link-name">Posts</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-circle-plus me-2"></i> Add New Post
                                </span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link " href="#">
                                <span class="nav-main-link-name">
                                    <i class="fas fa-file-invoice me-2"></i> Post List
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
