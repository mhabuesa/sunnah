@forelse ($products as $product)
    <div class="col">
        <div class="product-box-4-main">
            <div class="product-box-4 productMain pro-bg-white">
                <div class="product-image">
                    <a href="{{ route('product', $product->slug) }}">
                        <img class="lazy img-fluid productImage loaded" src="{{ asset($product->image) }}">
                    </a>
                </div>
                <div class="product-content">
                    <h5 class="sub-name productName">{{ $product->category->name }}</h5>
                    <a href="{{ route('product', $product->slug) }}" class="name">
                        <h5>{{ Str::limit($product->name, '20', '...') }}</h5>
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
                            <i class="ri-star-fill fill"></i>
                        </li>
                    </ul>
                    <h5 class="price">৳{{ $product->price }}</h5>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 w-100 text-center py-5">
        <div class="no-product-found mx-auto" style="max-width: 400px;">
            <img src="{{ asset('frontend/assets/images/no-product.png') }}" alt="No Product Found"
                class="img-fluid mb-4" style="opacity: 0.6; max-height: 200px;">
            <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
            <p class="text-muted">Sorry, we couldn't find any products matching your current filters. Try adjusting your
                search or filters.</p>
            <button onclick="location.reload()" class="btn btn-info btn-sm mt-3 px-4 rounded-pill">
                <i class="ri-refresh-line"></i> Reset Filters
            </button>
        </div>
    </div>
@endforelse
