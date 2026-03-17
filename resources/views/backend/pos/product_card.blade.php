@forelse ($products as $product)
    <div class="col-md-4 col-xl-3">
        <div class="block block-rounded h-100 mb-0 product_body">
            <div class="block-content p-1">
                <div class="options-container">
                    <img class="img-fluid options-item" src="{{ asset($product->image) }}" alt="">
                    <div class="options-overlay bg-black-75">
                        <div class="options-overlay-content">
                            <button class="btn btn-sm btn-alt-secondary addToCart" data-bs-toggle="modal"
                                data-bs-target="#productModal" data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}" data-image="{{ asset($product->image) }}"
                                data-price="{{ productPrice($product->id) }}"
                                data-stock="{{ productStock($product->id) }}" data-sku="{{ $product->sku }}"
                                data-category="{{ $product->category->name ?? 'N/A' }}"
                                data-brand="{{ $product->brand->name ?? 'N/A' }}"
                                @if ($product->variations->count()) data-variations='@json($product->variations)' @endif>
                                <i class="fa fa-plus text-success me-1"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_card text-center">
                <div class="mb-2">{{ Str::limit($product->name, 20, '...') }}</div>
                <div class="text-primary">৳{{ productPrice($product->id) }}</div>
                <div>Total Stock: {{ productStock($product->id) }}</div>
            </div>
        </div>
    </div>
@empty
    <p class="text-center my-5">No Product Found</p>
@endforelse


<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="productModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img id="modalImage" src="" class="img-fluid mb-3" style="max-height:250px;">
                    </div>
                    <div class="col-md-7">
                        <h4 class="fw-bold" id="modalName"></h4>
                        <div class="mb-2">
                            <span class="badge bg-success" id="modalStock"></span>
                        </div>
                        <div class="mb-3 fs-5 text-primary" id="modalPrice"></div>
                        <div id="modalVariations" class="mb-3"></div>
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me-2 mb-0">Qty:</label>
                            <button class="btn btn-outline-secondary btn-sm me-1 qty-decrease">−</button>
                            <input type="text" class="form-control text-center p-1" value="1"
                                style="width:60px;" id="qtyInput">
                            <button class="btn btn-outline-secondary btn-sm ms-1 qty-increase">+</button>
                        </div>
                        <div class="mb-3">
                            <strong>Total Price: </strong> <span class="text-primary" id="totalPrice"></span>
                        </div>
                        <button class="btn btn-primary w-100" id="addToCartBtn">Add to Cart</button>
                        <ul class="list-unstyled mt-3 small text-muted">
                            <li><strong>SKU:</strong> <span id="modalSKU"></span></li>
                            <li><strong>Category:</strong> <span id="modalCategory"></span></li>
                            <li><strong>Brand:</strong> <span id="modalBrand"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS to update total price on variation/qty change -->
<script>
    $(document).ready(function() {
        $('.addToCart').click(function() {
            let button = $(this);
            let id = button.data('id');
            let name = button.data('name');
            let image = button.data('image');
            let price = button.data('price');
            let stock = button.data('stock');
            let sku = button.data('sku');
            let category = button.data('category');
            let brand = button.data('brand');
            let variations = button.data('variations');

            $('#productModalLabel').text(name);
            $('#modalName').text(name);
            $('#modalImage').attr('src', image);
            $('#modalPrice').text('৳' + price);
            $('#modalStock').text(stock > 0 ? 'In Stock' : 'Out of Stock');
            $('#modalSKU').text(sku);
            $('#modalCategory').text(category);
            $('#modalBrand').text(brand);
            $('#qtyInput').val(1);
            $('#totalPrice').text('৳' + price);

            if (variations) {
                let html =
                    '<label for="variationSelect" class="form-label">Select Variation</label><select id="variationSelect" class="form-select">';
                variations.forEach(v => {
                    html +=
                        `<option value="${v.id}" data-price="${v.price}">${v.attributeValue} - ৳${v.price}</option>`;
                });
                html += '</select>';
                $('#modalVariations').html(html);

                $('#variationSelect').change(function() {
                    let varPrice = parseFloat($(this).find(':selected').data('price'));
                    $('#totalPrice').text('৳' + varPrice);
                });
            } else {
                $('#modalVariations').html('');
            }

            function updateTotal() {
                let qty = parseInt($('#qtyInput').val());
                let price = $('#variationSelect').length ? parseFloat($(
                    '#variationSelect option:selected').data('price')) : parseFloat(price);
                $('#totalPrice').text('৳' + (price * qty).toFixed(2));
            }

            $('.qty-increase').off().click(function() {
                let qty = parseInt($('#qtyInput').val());
                $('#qtyInput').val(qty + 1);
                updateTotal();
            });

            $('.qty-decrease').off().click(function() {
                let qty = parseInt($('#qtyInput').val());
                if (qty > 1) {
                    $('#qtyInput').val(qty - 1);
                    updateTotal();
                }
            });
        });
    });
</script>
