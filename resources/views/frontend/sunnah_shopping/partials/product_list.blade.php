@forelse ($products as $item)
    @if ($item->product)
        <li class="col-6 col-md-3 col-lg-2 product-item remove-divider mt-2">

            <div class="product-item__outer h-100 m-1">

                <div class="product-item__inner p-2 p-md-3 border rounded bg-light h-100">

                    <div class="product-card-custom">

                        {{-- Product Image --}}
                        <div class="product-image-box rounded">
                            <a href="{{ route('product', $product->slug) }}">
                                <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    loading="lazy">
                            </a>
                        </div>

                        {{-- Product Name --}}
                        <h5 class="product-title-custom">
                            <a href="{{ route('product', $product->slug) }}" class="text-primary font-weight-bold ">
                                {{ $product->name }}
                            </a>
                        </h5>

                        {{-- Product Price --}}
                        <div class="product-price-custom text-black">
                            ৳ {{ productPrice($product->id) }}
                        </div>

                        {{-- Add to Cart --}}
                        <div class="product-cart-custom">
                            <button type="button"
                                class="btn btn-primary btn-sm text-white w-100 border-primary rounded transition-3d-hover py-2 ajax-add-to-cart"
                                data-product-id="{{ $product->id }}">

                                <i class="ec ec-add-to-cart"></i>
                                Add to Cart

                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </li>
    @endif
@empty
    <div class="col-12 w-100 text-center py-5">
        <div class="no-product-found mx-auto" style="max-width: 400px;">
            <img src="{{ asset('frontend/assets/images/emptyBox.png') }}" alt="No Product Found" class="img-fluid mb-4"
                style="opacity: 0.6; max-height: 200px;">
            <h3 class="fw-bold text-dark">Oops! No Products Found</h3>
            <p class="text-muted">Sorry, we couldn't find any products matching your selected subcategory.</p>
        </div>
    </div>
@endforelse
