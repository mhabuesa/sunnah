{{-- Search Drawer Overlay --}}
<div id="searchDrawerOverlay" class="search-drawer-overlay u-sidebar"></div>

{{-- Search Drawer --}}
<aside id="searchDrawer" class="search-drawer">

    <div class="search-drawer-header">
        <h5 class="mb-0">Search Products</h5>

        <button type="button" id="closeSearchDrawer" class="search-drawer-close">
            <i class="fas fa-times"></i>
        </button>
    </div>

    {{-- Search Form --}}

    {{-- Search Form --}}
    <form action="{{ route('search.product') }}" method="GET" class="search-drawer-form">

        <label for="searchDrawerInput" class="search-input-label">
            What are you looking for?
        </label>

        <div class="search-input-wrapper">

            <i class="fas fa-search search-input-icon"></i>

            <input type="text" name="q" id="searchDrawerInput" class="search-drawer-input"
                placeholder="Search products..." value="{{ request('q') }}" autocomplete="off" required>

            <button type="submit" class="search-submit-btn">
                Search
                <i class="fas fa-arrow-right"></i>
            </button>

        </div>

        <small class="search-input-hint">
            Find your favorite Sunnah products easily.
        </small>

    </form>


    {{-- Featured Products --}}
    <div class="search-drawer-content">

        <h6 class="search-section-title">Featured Products</h6>

        <div class="row g-3">

            @forelse(($featuredProducts->take(4) ?? collect()) as $product)
                <div class="col-4 p-1">
                    <a href="{{ route('product', $product->product->slug) }}"
                        class="search-featured-product border rounded p-1">

                        <div class="search-product-image">
                            <img src="{{ asset($product->product->image) }}" alt="{{ $product->product->name }}"
                                loading="lazy">
                        </div>

                        <div class="search-product-info">
                            <h6 class="text-center">{{ Str::limit($product->product->name, 15) }}</h6>

                            <strong class="px-2">
                                ৳{{ productPrice($product->product->id) }}
                            </strong>
                        </div>

                    </a>
                </div>

            @empty

                <div class="col-12 text-center py-4">
                    <p class="text-muted mb-0">
                        No featured products available.
                    </p>
                </div>
            @endforelse

        </div>
    </div>

</aside>
