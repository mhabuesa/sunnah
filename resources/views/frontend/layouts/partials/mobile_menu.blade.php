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
                            href="{{ route('index') }}" aria-label="Electro">
                            <img src="{{ asset(setting()->header_logo) }}" alt=""
                                style="height: 60px; width:160;">
                        </a>
                        <!-- End Logo -->

                        <!-- List -->
                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                            @foreach ($categories as $category)
                                @if ($category->subcategories->count() > 0)
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                            href="javascript:;" data-target="#{{ $category->id }}" role="button"
                                            data-toggle="collapse" aria-expanded="false"
                                            aria-controls="{{ $category->id }}">
                                            {{ $category->name }}
                                        </a>

                                        <div id="{{ $category->id }}" class="collapse"
                                            data-parent="#headerSidebarContent">
                                            <ul id="headerSidebarPagesMenu" class="u-header-collapse__nav-list">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <li><a class="u-header-collapse__submenu-nav-link"
                                                            href="{{ route('subcategory', $subcategory->slug) }}">
                                                            {{ $subcategory->name }}
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link"
                                            href="{{ route('category', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                                    <hr>
                            <li class="u-has-submenu u-header-collapse__submenu mt-2 font-weight-bold">
                                <a class="u-header-collapse__nav-link" href="{{ route('brands') }}">
                                    Brands
                                </a>
                            </li>
                            <li class="nav-item u-header__nav-last-item">
                                <a class="u-header-collapse__nav-link text-primary font-weight-bold"
                                    href="#" target="_blank">
                                    Charity <i class="fas fa-donate ml-1"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
