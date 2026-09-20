@forelse ($products as $product)
    <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
        <div class="product-item__outer h-100">
            <div class="product-item__inner px-xl-4 p-3">
                <div class="product-item__body pb-xl-2">
                    <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                            class="font-size-12 text-gray-5">{{ $product->category->name }}</a></div>
                    <h5 class="mb-1 product-item__title"><a href="{{ route('product', $product->slug) }}"
                            class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                    <div class="mb-2">
                        <a href="{{ route('product', $product->slug) }}" class="d-block text-center"><img class="img-fluid"
                                src="{{ asset($product->image) }}" alt="Image Description"></a>
                    </div>
                    <div class="flex-center-between mb-1">
                        <div class="prodcut-price">
                            <div class="text-gray-100">৳ {{ productPrice($product->id) }}</div>
                        </div>
                        <div class="d-none d-xl-block prodcut-add-cart">
                            <a href="{{ route('product', $product->slug) }}"
                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                    class="ec ec-add-to-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-item__footer">
                    <div class="border-top pt-2 flex-center-between flex-wrap">
                        <a href="compare.html" class="text-gray-6 font-size-13"><i
                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                        <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
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
