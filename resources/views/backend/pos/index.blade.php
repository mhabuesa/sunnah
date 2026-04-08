@extends('backend.layouts.app')
@section('title', 'POS')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @media (max-width: 768px) {
            .md_mt-2 {
                margin-top: 1rem !important;
            }
        }

        .variation-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        .variation-item input[type="radio"] {
            display: none;
        }

        .variation-item label {
            display: inline-block;
            padding: 6px 15px;
            border: 2px solid #dee2e6;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .variation-item input[type="radio"]:checked+label {
            border-color: #0d6efd;
            background: #f0f7ff;
            color: #0d6efd;
        }

        .variation-item label:hover {
            background: #f8f9fa;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .option-buttons li {
            display: inline-block;
        }

        .pay-btn {
            border: 1px solid #d1d5db;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            background: #fff;
            color: #000;
            transition: all 0.2s ease;
        }

        .pay-btn:hover {
            background: #f3f4f6;
        }

        .option-buttons input[type="radio"]:checked+.pay-btn {
            background: #374151;
            color: #fff;
            border-color: #374151;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- PRODUCT SECTION -->
            <div class="col-lg-8 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <h3 class="block-title text-capitalize">Product Section</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto pb-0">
                        <div class="mb-3 row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <select class="js-select2 form-select" id="category" style="width: 100%;">
                                        <option value="all">All Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 d-flex">
                                <input type="text" name="query" class="form-control"
                                    placeholder="Search by Name or SKU" style="height: 38px;">
                                <button class="btn btn-info btn-sm mx-2" id="refresh" style="height: 38px;">
                                    <i class="fa-solid fa-arrow-rotate-left"></i>
                                </button>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div id="tableLoader" class="position-absolute top-50 start-50 translate-middle d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>
                            <div class="row items-push" id="productContainer"></div>
                        </div>
                    </div>
                    <div class="block-content block-content-full py-0">
                        <div class="text-center mt-3" id="paginationContainer"></div>
                    </div>
                </div>
            </div>

            <!-- BILLING SECTION -->
            <div class="col-lg-4 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title text-capitalize">Billing Section</h3>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.pos.order.store') }}" method="POST">

                        <div class="block-content block-content-full overflow-x-auto">
                            @csrf

                            <!-- Customer -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <select id="customer_id" name="customer_id" class="form-control" required>
                                            <option value="">Select Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button class="btn btn-info addCustomerBtn btn-sm" type="button">Add New
                                            Customer</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Cart Table -->
                            <div class="mb-3 table-responsive">
                                <table class="table cart_table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th width="90">Qty</th>
                                            <th width="100">Price</th>
                                            <th width="50">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody id="cartBody">
                                        @forelse ($carts as $cart)
                                            <tr data-id="{{ $cart->id }}">
                                                <td>
                                                    <div class="cartItem d-flex gap-2">
                                                        <img src="{{ asset($cart->product->image) }}" width="40">
                                                        <div class="cartItem-body">
                                                            <h6 class="mb-0">{{ $cart->product->name }}</h6>
                                                            <small>{{ $cart->variation?->attributeValue->value }}</small>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <input type="number" class="form-control cart_qty"
                                                        value="{{ $cart->qty }}" data-id="{{ $cart->id }}"
                                                        data-price="{{ $cart->price }}" min="1">
                                                </td>

                                                <td class="cart_total">৳{{ $cart->total_price }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-sm text-danger removeCartBtn"
                                                        data-id="{{ $cart->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr id="emptyCart">
                                                <td colspan="4" class="text-center">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Summary -->
                            <div class="mb-3">
                                <div class="pt-4">
                                    <dl>

                                        <!-- Subtotal -->
                                        <div class="d-flex justify-content-between">
                                            <dt>Sub total :</dt>
                                            <dd id="subTotal">৳0.00</dd>
                                            <!-- Hidden Subtotal -->
                                            <input type="hidden" name="subtotal" id="subTotalInput">
                                        </div>

                                        <!-- Extra Discount -->
                                        <div class="d-flex justify-content-between">
                                            <dt>Extra Discount :</dt>
                                            <dd>
                                                <input type="number" id="extraDiscountInput" name="extra_discount"
                                                    class="form-control form-control-sm w-50 float-end" value="0">
                                            </dd>
                                        </div>

                                        <!-- Coupon Discount -->
                                        <div class="d-flex justify-content-between">
                                            <dt>Coupon Discount :</dt>
                                            <dd>
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <span id="coupon_amount" class="me-2">৳0.00</span>

                                                    <button type="button" id="applyCouponBtn"
                                                        class="btn btn-alt-primary btn-sm">
                                                        <i class="fa-solid fa-pen-clip"></i>
                                                    </button>

                                                    <button type="button" id="clearCouponBtn"
                                                        class="btn btn-alt-danger btn-sm d-none">
                                                        <i class="fa-solid fa-times"></i>
                                                </div>

                                                <input type="hidden" id="couponDiscountInput" name="coupon_discount"
                                                    value="0">
                                                <input type="hidden" id="couponCode" name="couponCode" value="">
                                            </dd>
                                        </div>
                                </div>

                                <!-- Shipping -->
                                <div class="d-flex justify-content-between">
                                    <dt>Shipping Cost :</dt>
                                    <dd>
                                        <input type="number" id="shippingCostInput" name="shipping_cost"
                                            class="form-control form-control-sm w-50 float-end" value="70" required>
                                    </dd>
                                </div>

                                <!-- TOTAL -->
                                <div class="d-flex border-top pt-2 justify-content-between">
                                    <dt class="fw-bold">Total :</dt>
                                    <dd class="fw-bold" id="grandTotal">৳0.00</dd>
                                </div>

                                </dl>

                                <!-- Hidden Total -->
                                <input type="hidden" name="amount" id="finalAmount">

                                <!-- Payment -->
                                <div class="pt-4 mb-4">
                                    <div class="mb-2">Paid By:</div>

                                    <ul class="list-unstyled option-buttons d-flex gap-2">


                                        <li>
                                            <input type="radio" id="cod" value="cod" name="type" hidden
                                                checked>
                                            <label for="cod" class="pay-btn">COD</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="cash" value="cash" name="type" hidden>
                                            <label for="cash" class="pay-btn">Cash</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="wallet" value="wallet" name="type" hidden>
                                            <label for="wallet" class="pay-btn">Wallet</label>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Error Message -->
                                <div id="formError" class="text-danger text-center mb-2 d-none"></div>

                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mb-3">
                            <div class="d-flex gap-2 justify-content-between">

                                <button type="button" id="clearCart" class="btn btn-danger w-50">
                                    Cancel Order
                                </button>

                                <button type="submit" class="btn btn-primary w-50">
                                    Place Order
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="addCustomerModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">New Customer</h5>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Customer Name <small class="text-danger">*</small></label>
                        <input type="text" id="edit_name" class="form-control" placeholder="Enter Customer Name">
                        <small class="text-danger d-none text-capitalize" id="nameError"></small>
                    </div>

                    <div class="mb-3">
                        <label>Phone <small class="text-danger">*</small></label>
                        <input type="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                        <small class="text-danger d-none text-capitalize" id="phoneError"></small>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Email Address">
                        <small class="text-danger d-none text-capitalize" id="emailError"></small>
                    </div>
                    <div class="mb-3">
                        <label>Address <small class="text-danger">*</small></label>
                        <input type="address" id="address" class="form-control" placeholder="Enter Address">
                        <small class="text-danger d-none text-capitalize" id="addressError"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateCustomerBtn">Create</button>
                </div>

            </div>
        </div>
    </div>

    <!-- PRODUCT MODAL -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Cart</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <!-- Coupon Modal -->
    <div class="modal fade" id="couponModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Apply Coupon</h5>
                </div>

                <div class="modal-body">
                    <input type="text" id="coupon_code_input" class="form-control" placeholder="Enter Coupon Code">
                    <small class="text-danger d-none" id="couponError"></small>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeCouponModal">Cancel</button>
                    <button class="btn btn-primary" id="submitCoupon">Apply</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
    <script>
        One.helpersOnLoad(['jq-select2']);
    </script>
    <script>
        $(document).ready(function() {
            // CSRF Token Setup for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ================= SELECT2 INIT =================
            $('#category').select2();
            $('#customer_id').select2({
                placeholder: "Select Customer",
                allowClear: true,
                minimumInputLength: 3,
                ajax: {
                    url: "{{ route('admin.customer.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: params => ({
                        search: params.term
                    }),
                    processResults: data => ({
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name + ' - ' + item.phone
                        }))
                    })
                }
            });

            // ================= COOKIE FUNCTIONS =================
            function setCookie(name, value, days = 7) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 86400000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + value + "; path=/" + expires;
            }

            function getCookie(name) {
                let nameEQ = name + "=";
                let ca = document.cookie.split(';');
                for (let c of ca) {
                    c = c.trim();
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
                }
                return null;
            }

            // Restore Customer from Cookie
            let customerCookie = getCookie('selected_customer');
            if (customerCookie) {
                try {
                    let customer = JSON.parse(customerCookie);
                    let option = new Option(customer.text, customer.id, true, true);
                    $('#customer_id').append(option).trigger('change');
                } catch (e) {
                    console.error("Cookie parse error");
                }
            }

            $('#customer_id').on('change', function() {
                let selected = $(this).select2('data')[0];
                if (selected) {
                    setCookie('selected_customer', JSON.stringify({
                        id: selected.id,
                        text: selected.text
                    }), 7);
                } else {
                    setCookie('selected_customer', '', -1);
                }
            });

            // ================= LOAD PRODUCTS =================
            function loadProducts(page = 1) {
                $('#tableLoader').removeClass('d-none');
                $.get("{{ route('admin.pos.products') }}", {
                    page: page,
                    category: $('#category').val(),
                    search: $('input[name="query"]').val()
                }, function(res) {
                    $('#productContainer').html(res.html);
                    $('#paginationContainer').html(res.pagination);
                }).always(() => $('#tableLoader').addClass('d-none'));
            }

            loadProducts();
            $('#category').on('change', () => loadProducts(1));
            $('input[name="query"]').on('keyup', () => loadProducts(1));
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                loadProducts($(this).attr('href').split('page=')[1]);
            });

            // ================= REFRESH BUTTON =================
            $(document).off('click', '#refresh').on('click', '#refresh', function(e) {
                e.preventDefault();

                // Reset category select
                $('#category').val('all').trigger('change');

                // Clear search input
                $('input[name="query"]').val('');

                // Reload all products
                loadProducts(1);
            });

            // ================= PRODUCT MODAL & ADD TO CART =================
            $(document).off('click', '.productCard').on('click', '.productCard', function() {
                let product_id = $(this).data('id');
                $.get(`/admin/pos/product/${product_id}`, function(res) {
                    $('#productModal .modal-body').html(res.html);
                    $('#addToCartBtn').attr('data-product-id', product_id).prop('disabled', false);
                    $('#productModal').modal('show');
                });
            });

            $(document).off('click', '#addToCartBtn').on('click', '#addToCartBtn', function(e) {
                e.preventDefault();
                let btn = $(this);
                let product_id = btn.attr('data-product-id');
                let variation_id = $('input[name="prod_variation"]:checked').val() || null;
                let qty = parseInt($('#qtyInput').val()) || 1;

                if (btn.prop('disabled')) return;
                if ($('input[name="prod_variation"]').length && !variation_id) {
                    alert('Please select variation');
                    return;
                }

                btn.prop('disabled', true).text('Adding...');

                $.post("{{ route('admin.pos.addToCart') }}", {
                    _token: "{{ csrf_token() }}",
                    product_id,
                    variation_id,
                    qty
                }, function(res) {
                    updateCartUI(res.carts);
                    calculateTotals();
                    $('#productModal').modal('hide');
                }).always(() => btn.prop('disabled', false).text('Add to Cart'));
            });

            // ================= UPDATE & CALCULATE CART =================
            function updateCartUI(carts) {
                let html = '';
                if (!carts || carts.length === 0) {
                    html = `<tr><td colspan="4" class="text-center">No Data Found</td></tr>`;
                } else {
                    carts.forEach(cart => {
                        html += `
                <tr data-id="${cart.id}">
                    <td>
                        <div class="cartItem d-flex gap-2">
                            <img src="/${cart.product.image}" width="40">
                            <div>
                                <h6 class="mb-0">${cart.product.name}</h6>
                                <small>${cart.variation ? cart.variation.attribute_value.value : ''}</small>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" class="form-control cart_qty" data-id="${cart.id}" data-price="${cart.price}" value="${cart.qty}" min="1"></td>
                    <td class="cart_total">৳${(cart.qty * cart.price).toFixed(2)}</td>
                    <td><button type="button" class="btn btn-sm text-danger removeCartBtn" data-id="${cart.id}"><i class="fa fa-trash"></i></button></td>
                </tr>`;
                    });
                }
                $('#cartBody').html(html);
                calculateTotals();
            }

            // ================= CLEAR FULL CART (FIXED) =================
            $(document).off('click', '#clearCart').on('click', '#clearCart', function(e) {
                e.preventDefault(); // ফর্ম সাবমিট হওয়া আটকাবে

                Swal.fire({
                    title: 'Clear all cart?',
                    text: "All products and applied coupons will be removed!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, clear it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let btn = $(this);
                        btn.prop('disabled', true);

                        $.post("{{ route('admin.pos.clearCart') }}", {
                            _token: "{{ csrf_token() }}"
                        }, function(res) {
                            // ১. কার্ট UI আপডেট
                            updateCartUI([]);

                            // ২. সব কুকি রিমুভ করা
                            setCookie('selected_customer', '', -1);
                            setCookie('coupon_discount', '', -1);
                            setCookie('applied_coupon_code', '', -1);
                            setCookie('free_delivery_active', '', -1);

                            // ৩. কুপন রিলেটেড UI রিসেট করা
                            $('#couponCode').val(""); // হিডেন ফিল্ড খালি করা
                            $('#couponDiscountInput').val(0); // ইনপুট ভ্যালু ০ করা
                            $('#coupon_amount').text('৳0.00'); // টেক্সট রিসেট

                            // কুপন বাটন UI আগের অবস্থায় আনা
                            $('#applyCouponBtn').removeClass('d-none');
                            $('#clearCouponBtn').addClass('d-none');

                            // ৪. অন্যান্য UI এলিমেন্ট রিসেট
                            $('#customer_id').val(null).trigger('change');
                            $('#shippingCostInput').val(70).prop('readonly',
                            false); // ডিফল্ট শিপিং এবং এডিট অপশন চালু
                            $('#extraDiscountInput').val(0);

                            // ৫. ক্যালকুলেশন কল করা
                            calculateTotals();

                            if (typeof showToast === "function") {
                                showToast('Cart and coupons have been cleared', 'success');
                            } else {
                                Swal.fire('Cleared!', 'Your cart and coupons are cleared.',
                                    'success');
                            }
                        }).fail(function() {
                            Swal.fire('Error!',
                                'Something went wrong while clearing the cart.', 'error'
                                );
                        }).always(function() {
                            btn.prop('disabled', false);
                        });
                    }
                });
            });


            function calculateTotals() {
                let subtotal = 0;

                $('.cart_qty').each(function() {
                    let qty = parseInt($(this).val()) || 0;
                    let price = parseFloat($(this).data('price')) || 0;
                    let total = qty * price;

                    // Update the row total in the table
                    $(this).closest('tr').find('.cart_total').text('৳' + total.toFixed(2));

                    subtotal += total;
                });

                let extra = parseFloat($('#extraDiscountInput').val()) || 0;
                let coupon = parseFloat($('#couponDiscountInput').val()) || 0;
                let shipping = parseFloat($('#shippingCostInput').val()) || 0;
                let grandTotal = subtotal - extra - coupon + shipping;

                $('#subTotal').text('৳' + subtotal.toFixed(2));
                $('#grandTotal').text('৳' + grandTotal.toFixed(2));
                $('#finalAmount').val(grandTotal.toFixed(2));
                $('#subTotalInput').val(subtotal.toFixed(2));
            }

            $(document).on('input', '.cart_qty', function() {
                let id = $(this).data('id');
                let qty = $(this).val();
                if (qty < 1) return;

                $.post("{{ route('admin.pos.updateCart') }}", {
                    _token: "{{ csrf_token() }}",
                    id,
                    qty
                }, function(res) {
                    // Optional: update UI from response if needed
                    calculateTotals();
                });
            });

            $(document).off('click', '.removeCartBtn').on('click', '.removeCartBtn', function(e) {
                e.preventDefault(); // Stop form submission
                let btn = $(this);
                let id = btn.data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then(result => {
                    if (result.isConfirmed) {
                        $.post("{{ route('admin.pos.deleteCart') }}", {
                            _token: "{{ csrf_token() }}",
                            id
                        }, function(res) {
                            updateCartUI(res.carts);
                            showToast('Product Removed!', 'success');
                        });
                    }
                });
            });

            // ================= BARCODE SCANNER =================
            let barcodeBuffer = '';
            let barcodeTimer;
            $(document).on('keypress', function(e) {
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

                if (e.which === 13) {
                    e.preventDefault();
                    if (barcodeBuffer.length > 0) {
                        $.post("{{ route('admin.pos.scanBarcode') }}", {
                            _token: "{{ csrf_token() }}",
                            sku: barcodeBuffer
                        }, function(res) {
                            if (res.success) {
                                updateCartUI(res.carts);
                                new Audio(
                                    "https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg"
                                ).play();
                            } else {
                                Swal.fire('Error', 'Product not found!', 'error');
                            }
                        });
                    }
                    barcodeBuffer = '';
                } else {
                    barcodeBuffer += String.fromCharCode(e.which);
                    clearTimeout(barcodeTimer);
                    barcodeTimer = setTimeout(() => {
                        barcodeBuffer = '';
                    }, 300);
                }
            });

            // ================= NEW CUSTOMER & OTHER UI =================
            $('#extraDiscountInput, #couponDiscountInput, #shippingCostInput').on('input', calculateTotals);


            // ================= OPEN CUSTOMER MODAL =================
            function clearCustomerForm() {
                $('#edit_name, #phone, #email, #address').val('');
            }

            $(document).on('click', '.addCustomerBtn', function(e) {
                e.preventDefault();
                clearCustomerForm();
                $('#addCustomerModal').modal('show');
            });

            // CLOSE MODAL
            $(document).on('click', '#closeEditModal', function(e) {
                e.preventDefault();
                // error clear
                $('#nameError, #phoneError, #emailError, #addressError')
                    .addClass('d-none')
                    .text('');
                $('#addCustomerModal').modal('hide');
            });

            // ================= FORM VALIDATION =================
            $('form').on('submit', function(e) {
                let error = '';

                let customer = $('#customer_id').val();
                let cartCount = $('#cartBody tr').length;

                // Empty cart check (No Data Found row ignore)
                let hasProduct = true;
                if (cartCount === 1 && $('#cartBody tr td').text().trim() === 'No Data Found') {
                    hasProduct = false;
                }

                if (!customer) {
                    error = 'Please select a customer';
                } else if (!hasProduct) {
                    error = 'Please add at least one product';
                }

                if (error !== '') {
                    e.preventDefault();
                    $('#formError').removeClass('d-none').text(error);
                    return false;
                }

                // clear error if everything ok
                $('#formError').addClass('d-none').text('');
            });


            // Form Submit 
            $(document).on('click', '#updateCustomerBtn', function(e) {
                e.preventDefault();

                let btn = $(this);

                // 🔥 error clear আগে
                $('#nameError, #phoneError, #emailError, #addressError')
                    .addClass('d-none')
                    .text('');

                let formData = new FormData();
                formData.append('name', $('#edit_name').val());
                formData.append('phone', $('#phone').val());
                formData.append('email', $('#email').val());
                formData.append('address', $('#address').val());

                btn.prop('disabled', true).text('Saving...');

                $.ajax({
                    url: "{{ route('admin.customer.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(res) {

                        // 🔥 VALIDATION ERROR HANDLE
                        if (res.errors) {

                            if (res.errors.name) {
                                $('#nameError').removeClass('d-none').text(res.errors.name[0]);
                            }
                            if (res.errors.phone) {
                                $('#phoneError').removeClass('d-none').text(res.errors.phone[
                                    0]);
                            }
                            if (res.errors.email) {
                                $('#emailError').removeClass('d-none').text(res.errors.email[
                                    0]);
                            }
                            if (res.errors.address) {
                                $('#addressError').removeClass('d-none').text(res.errors
                                    .address[0]);
                            }

                            return; // stop এখানেই
                        }

                        // ✅ SUCCESS
                        if (res.success) {
                            let option = new Option(
                                res.customer.name + ' - ' + res.customer.phone,
                                res.customer.id,
                                true,
                                true
                            );

                            $('#customer_id').append(option).trigger('change');
                            $('#addCustomerModal').modal('hide');
                        }
                    },

                    error: function(xhr) {
                        // 🔥 Laravel 422 error handle (better way)
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.name) {
                                $('#nameError').removeClass('d-none').text(errors.name[0]);
                            }
                            if (errors.phone) {
                                $('#phoneError').removeClass('d-none').text(errors.phone[0]);
                            }
                            if (errors.email) {
                                $('#emailError').removeClass('d-none').text(errors.email[0]);
                            }
                            if (errors.address) {
                                $('#addressError').removeClass('d-none').text(errors.address[
                                    0]);
                            }
                        }
                    },

                    complete: () => btn.prop('disabled', false).text('Create')
                });
            });

            calculateTotals();
        });
    </script>

    @if (session('clear_customer'))
        <script>
            // Select2 reset
            $('#customer_id').val(null).trigger('change');
            $('#customer_id').empty();

            // Cookie remove
            document.cookie = "selected_customer=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        </script>
    @endif

    <script>
        $(document).ready(function() {

            // ================= ১. মোডাল ওপেন করার লজিক =================
            $(document).on('click', '#applyCouponBtn', function() {
                $('#coupon_code_input').val('');
                $('#couponError').addClass('d-none');
                $('#couponModal').modal('show');
            });

            // --- ২. পেজ লোড হলে কুকি চেক করা ---
            function initCoupon() {
                let savedDiscount = getCookie('coupon_discount');
                let savedCode = getCookie('applied_coupon_code'); // কুপন কোড কুকি চেক
                let freeDeliveryActive = getCookie('free_delivery_active');

                let discountVal = parseFloat(savedDiscount) || 0;
                let isFreeDelivery = (freeDeliveryActive === 'true');

                // যদি ডিসকাউন্ট থাকে অথবা কুপন কোড থাকে
                if (discountVal > 0 || isFreeDelivery || savedCode) {
                    $('#couponCode').val(savedCode || ""); // হিডেন ইনপুটে কোড বসানো
                    showAppliedCouponUI(discountVal, isFreeDelivery);
                } else {
                    showDefaultCouponUI();
                }

                setTimeout(calculateTotals, 500);
            }

            initCoupon();

            // --- ৩. কুপন অ্যাপ্লাই UI ---
            function showAppliedCouponUI(discount, isFreeDelivery) {
                $('#applyCouponBtn').addClass('d-none');
                $('#clearCouponBtn').removeClass('d-none');

                $('#couponDiscountInput').val(discount);
                $('#coupon_amount').text('৳' + discount.toFixed(2));

                if (isFreeDelivery) {
                    $('#shippingCostInput').val(0).prop('readonly', true);
                }
            }

            // --- ৪. ডিফল্ট UI (রিসেট) ---
            function showDefaultCouponUI() {
                $('#applyCouponBtn').removeClass('d-none');
                $('#clearCouponBtn').addClass('d-none');

                $('#couponDiscountInput').val(0);
                $('#couponCode').val(""); // কুপন কোড হিডেন ফিল্ড খালি করা
                $('#coupon_amount').text('৳0.00');

                $('#shippingCostInput').prop('readonly', false);
            }

            // --- ৫. কুপন ক্লিয়ার বাটন লজিক ---
            $(document).on('click', '#clearCouponBtn', function() {
                // সব কুকি রিমুভ করা
                setCookie('coupon_discount', '', -1);
                setCookie('applied_coupon_code', '', -1); // কোড কুকি রিমুভ
                setCookie('free_delivery_active', '', -1);

                showDefaultCouponUI();

                $('#shippingCostInput').val(70);
                showToast('Coupon has been removed.', 'success');
                calculateTotals();
            });

            // --- ৬. কুপন অ্যাপ্লাই AJAX ---
            $(document).on('click', '#submitCoupon', function(e) {
                e.preventDefault();
                let code = $('#coupon_code_input').val().trim();
                let subtotal = parseFloat($('#subTotalInput').val()) || 0;

                if (!code) {
                    $('#couponError').removeClass('d-none').text('Please enter a coupon code.');
                    return;
                };

                let btn = $(this);
                btn.prop('disabled', true).text('Applying...');

                $.ajax({
                    url: "{{ route('admin.pos.applyCoupon') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        coupon_code: code,
                        subtotal: subtotal
                    },
                    success: function(res) {
                        btn.prop('disabled', false).text('Apply');
                        if (res.success) {
                            // কুকি সেট করা
                            setCookie('coupon_discount', res.discount, 1);
                            setCookie('applied_coupon_code', code, 1); // এখানে কোডটি সেভ হচ্ছে
                            setCookie('free_delivery_active', res.free_delivery, 1);

                            // হিডেন ইনপুটে কোড সেট করা (যাতে ফর্ম সাবমিটে ব্যাকএন্ডে যায়)
                            $('#couponCode').val(code);

                            showAppliedCouponUI(parseFloat(res.discount), res.free_delivery);
                            $('#couponModal').modal('hide');
                            showToast(res.message, 'success');
                            calculateTotals();
                        } else {
                            showToast(res.error, 'error');
                        }
                    },
                    error: function() {
                        btn.prop('disabled', false).text('Apply');
                        showToast('Server error. Please try again.', 'error');
                    }
                });
            });

            // --- হেল্পার ফাংশনসমূহ ---
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                let nameEQ = name + "=";
                let ca = document.cookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function calculateTotals() {
                let subtotal = parseFloat($('#subTotalInput').val()) || 0;
                let extraDiscount = parseFloat($('#extraDiscountInput').val()) || 0;
                let couponDiscount = parseFloat($('#couponDiscountInput').val()) || 0;
                let shippingCost = parseFloat($('#shippingCostInput').val()) || 0;

                if (getCookie('free_delivery_active') === 'true') {
                    shippingCost = 0;
                    $('#shippingCostInput').val(0);
                }

                let total = (subtotal - extraDiscount - couponDiscount) + shippingCost;
                $('#grandTotal').text('৳' + (total > 0 ? total : 0).toFixed(2));
                $('#finalAmount').val(total > 0 ? total.toFixed(2) : 0);
            }

            $(document).on('input', '#extraDiscountInput, #shippingCostInput', function() {
                calculateTotals();
            });
        });



        $(document).ready(function() {
            // আপনার আগের সব কোড এখানে থাকবে...

            // ফর্ম সাবমিট হওয়ার সময় কুকি ডিলিট করা
            $('form[action="{{ route('admin.pos.order.store') }}"]').on('submit', function() {
                // কুপন সংক্রান্ত সকল কুকি ডিলিট
                setCookie('coupon_discount', '', -1);
                setCookie('applied_coupon_code', '', -1);
                setCookie('free_delivery_active', '', -1);

                // যদি অন্য কোনো কার্ট রিলেটেড কুকি থাকে তাও এখানে দিতে পারেন
            });

            // হেল্পার ফাংশন (আগে থেকেই আপনার কোডে থাকার কথা)
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }
        });
    </script>


@endpush
