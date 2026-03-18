<div class="row">
    @forelse ($products as $product)
        <div class="col-md-4 col-xl-3 mb-4">
            <div class="block block-rounded h-100 mb-0 product_body shadow-sm border overflow-hidden">
                <div class="block-content p-0">
                    <div class="options-container position-relative addToCart" style="cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#productModal" data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}" data-image="{{ asset($product->image) }}"
                        data-price="{{ productPrice($product->id) }}" data-stock="{{ productStock($product->id) }}"
                        data-sku="{{ $product->sku }}" data-category="{{ $product->category->name ?? 'N/A' }}"
                        data-brand="{{ $product->brand->name ?? 'N/A' }}"
                        data-variations='[
        @foreach ($product->variations as $variation)
        {
            "id": "{{ $variation->id }}",
            "price": "{{ $variation->price }}",
            "stock": "{{ $variation->stock }}",
            "attr_value": "{{ $variation->attributeValue->value ?? ($variation->attributeValue->name ?? 'N/A') }}"
        }@if (!$loop->last),@endif @endforeach
]'>

                        <img class="img-fluid options-item w-100" src="{{ asset($product->image) }}" loading="lazy"
                            alt="{{ $product->name }}" style="height: 185px; object-fit: cover;">

                        <div class="options-overlay bg-black-50">
                            <div class="options-overlay-content">
                                <h3 class="h4 text-white mb-0">
                                    <i class="fa fa-plus-circle"></i>
                                </h3>
                                <span class="text-white fw-semibold">View Options</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product_card text-center px-0">
                    <div class="fw-bold mb-1 text-dark">{{ Str::limit($product->name, 20, '...') }}</div>
                    <div class="text-primary fw-bold h5 mb-1">৳{{ productPrice($product->id) }}</div>
                    <div class="small text-muted">Stock: {{ productStock($product->id) }}</div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center my-5">No Product Found</div>
    @endforelse
</div>

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel text-truncate">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <img id="modalImage" src="" class="img-fluid rounded border" alt="Product">
                    </div>
                    <div class="col-md-7">
                        <h4 id="modalName" class="mb-1"></h4>
                        <div class="mb-3">
                            <span class="h4 text-danger" id="modalPrice"></span>
                        </div>
                        <span class="fw-semibold" id="modalStock"></span>

                        <div id="modalVariations" class="mb-3"></div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Quantity:</label>
                            <div class="input-group" style="width: 130px;">
                                <button class="btn btn-outline-secondary qty-decrease" type="button">−</button>
                                <input type="number" id="qtyInput" class="form-control text-center" value="1"
                                    min="1">
                                <button class="btn btn-outline-secondary qty-increase" type="button">+</button>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 mb-0">Total: <span id="totalPrice" class="text-primary"></span></span>
                            <button class="btn btn-primary px-4 shadow">Confirm Add</button>
                        </div>

                        <div class="small text-muted">
                            <p class="mb-1"><strong>SKU:</strong> <span id="modalSKU"></span></p>
                            <p class="mb-1"><strong>Category:</strong> <span id="modalCategory"></span></p>
                            <p class="mb-1"><strong>Brand:</strong> <span id="modalBrand"></span></p>
                        </div>
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

            // Data Extraction
            let basePrice = parseFloat(button.data('price'));
            let variations = button.data('variations');
            let name = button.data('name');
            let mainStock = button.data('stock'); // Default product stock

            // Modal basic field filling
            $('#modalName').text(name);
            $('#modalImage').attr('src', button.data('image'));
            $('#modalSKU').text(button.data('sku'));
            $('#modalCategory').text(button.data('category'));
            $('#modalBrand').text(button.data('brand'));

            // Reset Quantity
            $('#qtyInput').val(1);

            // Render Variation Buttons
            if (variations && variations.length > 0) {
                let html =
                    '<label class="form-label fw-bold">Select Option:</label><div class="variation-wrapper d-flex flex-wrap gap-2">';
                variations.forEach((v, index) => {
                    let checked = (index === 0) ? 'checked' : '';
                    // Ekhane data-stock=${v.stock} add kora hoyeche
                    html += `
                    <div class="variation-item">
                        <input type="radio" name="prod_variation" id="v_${v.id}" 
                               value="${v.id}" data-price="${v.price}" data-stock="${v.stock}" ${checked}>
                        <label class="btn btn-outline-primary btn-sm" for="v_${v.id}">${v.attr_value}</label>
                    </div>
                `;
                });
                html += '</div>';
                $('#modalVariations').html(html);

                // Change event for radio buttons
                $('input[name="prod_variation"]').on('change', function() {
                    updateTotal();
                });
            } else {
                $('#modalVariations').html('');
            }

            // Calculation & Stock UI Update Function
            function updateTotal() {
                let qty = parseInt($('#qtyInput').val()) || 1;
                let currentUnitPrice = basePrice;
                let currentStock = mainStock;

                // Variation check
                let selectedVar = $('input[name="prod_variation"]:checked');
                if (selectedVar.length) {
                    currentUnitPrice = parseFloat(selectedVar.data('price'));
                    currentStock = parseInt(selectedVar.data('stock')); // Variation wise stock
                }

                // Stock Color Logic
                let stockElement = $('#modalStock');
                stockElement.removeClass('text-success text-warning text-danger');

                if (currentStock <= 0) {
                    stockElement.text('Out of Stock').addClass('text-danger');
                } else if (currentStock < 5) {
                    stockElement.text('Low Stock: ' + currentStock).addClass('text-warning');
                } else {
                    stockElement.text('In Stock: ' + currentStock).addClass('text-success');
                }

                // Price Update
                let total = currentUnitPrice * qty;
                $('#modalPrice').text('৳' + currentUnitPrice.toLocaleString());
                $('#totalPrice').text('৳' + total.toLocaleString());
            }

            // Initial Calculation
            updateTotal();

            // Quantity Buttons
            $('.qty-increase').off().on('click', function() {
                let val = parseInt($('#qtyInput').val());
                $('#qtyInput').val(val + 1);
                updateTotal();
            });

            $('.qty-decrease').off().on('click', function() {
                let val = parseInt($('#qtyInput').val());
                if (val > 1) {
                    $('#qtyInput').val(val - 1);
                    updateTotal();
                }
            });

            $('#qtyInput').on('input', updateTotal);
        });
    });
</script>
