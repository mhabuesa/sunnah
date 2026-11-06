@forelse ($products as $product)
    <li class="col-6 col-md-3 col-lg-2 product-item remove-divider">
        <div class="product-item__outer h-100 m-1">
            <div class="product-item__inner px-wd-3 p-2 p-md-3 border rounded bg-light">
                <div class="product-item__body">
                    <h5 class="mb-0 product-item__title">
                        <a href="{{ route('product', $product->slug) }}"
                            class="text-blue font-weight-bold text-center js-short-product-name">
                            {{ Str::limit($product->name, 20, '...') }}
                        </a>
                    </h5>
                    <div class="mb-2">
                        <a href="{{ route('product', $product->slug) }}" class="d-block text-center"><img
                                class="img-fluid" src="{{ asset($product->image) }}" alt="Image Description"></a>
                    </div>
                    <div class="prodcut-price">
                        <div class="text-gray-100">৳{{ productPrice($product->id) }}
                        </div>
                    </div>
                    <div class="mt-2">

                        <button type="button"
                            class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-1 ajax-add-to-cart"
                            data-product-id="{{ $product->id }}">
                            <i class="ec ec-add-to-cart"></i>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </li>
@empty
    <div class="col-12 w-100 text-center py-5">
        <div class="no-product-found mx-auto" style="max-width: 400px;">
            <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found" class="img-fluid mb-4"
                style="opacity: 0.6; max-height: 200px;">
            <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
            <p class="text-muted">Sorry, we couldn't find any products matching your current filters. Try adjusting your
                search or filters.</p>
            <button onclick="location.reload()" class="btn btn-info btn-sm mt-3 px-4 rounded-pill">
                <i class="ri-refresh-line"></i> Reset Filters
            </button>
        </div>
    </div>
@endforelse
