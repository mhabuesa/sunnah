{{-- @extends('backend.layouts.app')
@section('title', 'POS')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <style>
        @media (max-width: 768px) {
            .md_mt-2 {
                margin-top: 1rem !important;
            }
        }
    </style>
    <style>
        /* Variation Style */
        .variation-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        .variation-item input[type="radio"] {
            display: none;
            /* Hide real radio */
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
            background-color: #f0f7ff;
            color: #0d6efd;
        }

        .variation-item label:hover {
            background-color: #f8f9fa;
        }

        /* Chrome, Safari, Edge */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
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

        /* hover effect */
        .pay-btn:hover {
            background: #f3f4f6;
        }

        /* active (checked) */
        .option-buttons input[type="radio"]:checked+.pay-btn {
            background: #374151;
            /* dark */
            color: #fff;
            border-color: #374151;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-7 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title text-capitalize">Product Section</h3>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto pb-0">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <select class="js-select2 form-select" id="category" name="category"
                                        style="width: 100%;" data-placeholder="Choose one.." required>
                                        <option value="all">All Category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 d-flex">
                                    <input type="text" name="query" class="form-control"
                                        placeholder="Search by Name or SKU">
                                    <button class="btn btn-info btn-sm mx-2" id="refresh">
                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                    </button>
                                </div>
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
                        <div class="text-center">
                            <nav aria-label="Page navigation">
                                <div class="text-center mt-3" id="paginationContainer"></div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title text-capitalize">Billing Section</h3>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8 ">
                                        <select name="customer" id="customer" class="form-control js-select2">
                                            <option value="">Select Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button class="btn btn-info">Add New Customer</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 table-responsive">
                                <table class="table cart_table">
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Delete</th>
                                    </tr>
                                    @forelse ($carts as $cart)
                                        <tr>
                                            <td class="name">
                                                <div class="cartItem">
                                                    <img src="{{ asset($cart->product->image) }}"
                                                        alt="{{ $cart->product->name }}">
                                                    <div class="cartItem-body">
                                                        <h5 class="">{{ $cart->product->name }}</h5>
                                                        <span>{{ $cart->variation?->attributeValue->value }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="qty">
                                                <input type="number" name="cart_qty" class="form-control cart_qty"
                                                    value="{{ $cart->qty }}" data-id="{{ $cart->id }}"
                                                    data-price="{{ $cart->price }}">
                                            </td>
                                            <td>{{ $cart->total_price }}</td>
                                            <td class="del">
                                                <button type="button" class="border-0 btn btn-sm"
                                                    onclick="deleteItem(this)" data-id="12">
                                                    <i class="fa fa-trash text-danger fa-xl"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="mb-3">
                                <div class="pt-4">
                                    <dl>
                                        <div class="d-flex gap-2 justify-content-between">
                                            <dt class="title-color text-capitalize font-weight-normal">Sub total : </dt>
                                            <dd>৳1,200.00</dd>
                                        </div>

                                        <div class="d-flex gap-2 justify-content-between">
                                            <dt class="title-color text-capitalize font-weight-normal">Product Discount :
                                            </dt>
                                            <dd>৳250.00</dd>
                                        </div>

                                        <div class="d-flex gap-2 justify-content-between">
                                            <dt class="title-color text-capitalize font-weight-normal">Extra Discount :
                                            </dt>
                                            <dd>
                                                <button id="extra_discount" class="btn btn-sm p-0" type="button"
                                                    data-toggle="modal" data-target="#add-discount">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                ৳0.00
                                            </dd>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <dt class="title-color gap-2 text-capitalize font-weight-normal">Coupon
                                                Discount :</dt>
                                            <dd>
                                                <button id="coupon_discount" class="btn btn-sm p-0" type="button"
                                                    data-toggle="modal" data-target="#add-coupon-discount">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                ৳0.00
                                            </dd>
                                        </div>

                                        <div class="d-flex gap-2 justify-content-between">
                                            <dt class="title-color text-capitalize font-weight-normal">Shipping Cost :
                                            </dt>
                                            <dd>
                                                <input type="number" id="shippingCostInput"
                                                    class="form-control w-25 float-end" name="shipping_cost"
                                                    min="0" value="70" required="">
                                            </dd>
                                        </div>

                                        <div class="d-flex gap-2 border-top justify-content-between pt-2">
                                            <dt class="title-color text-capitalize font-weight-bold title-color">Total :
                                            </dt>
                                            <dd class="font-weight-bold title-color" id="totalWithShipping">৳1020.00</dd>
                                        </div>
                                    </dl>

                                    <div class="form-group col-12">
                                        <input type="hidden" class="form-control" name="amount" min="0"
                                            step="0.01" value="950" readonly="">
                                    </div>

                                    <div class="pt-4 mb-4">
                                        <div class="title-color d-flex mb-2">Paid By:</div>
                                        <ul class="list-unstyled option-buttons d-flex gap-2">
                                            <li>
                                                <input type="radio" id="cash" value="cash" name="type"
                                                    hidden checked>
                                                <label for="cash" class="pay-btn">Cash</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="cod" value="cod" name="type"
                                                    hidden>
                                                <label for="cod" class="pay-btn">COD</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="wallet" value="wallet" name="type"
                                                    hidden>
                                                <label for="wallet" class="pay-btn">Wallet</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div
                                    class="d-flex gap-2 justify-content-between align-items-center pt-3 bottom-sticky-buttons">

                                    <span class="btn btn-danger btn-block action-empty-cart w-50">
                                        <i class="fa fa-times-circle"></i>
                                        Cancel Order
                                    </span>

                                    <button id="submit_order" type="button"
                                        class="btn btn-primary btn-block m-0 action-form-submit w-50" data-toggle="modal"
                                        data-target="#paymentModal">
                                        <i class="fa fa-shopping-bag"></i>
                                        Place Order
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        One.helpersOnLoad(['jq-select2']);
    </script>


    <script>
        $(document).ready(function() {

            loadProducts(); // initial load

            // category change
            $('#category').on('change', function() {
                loadProducts(1);
            });

            // search
            $('input[name="query"]').on('keyup', function() {
                loadProducts(1);
            });

            // pagination click
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                let page = url.split('page=')[1];
                loadProducts(page);
            });

            // refresh button
            $('#refresh').on('click', function() {
                $('#category').val('all').trigger('change'); // category all
                $('input[name="query"]').val(''); // search blank
                loadProducts(1); // reload page 1
            });

        });

        // ================= LOAD PRODUCTS =================
        function loadProducts(page = 1) {

            $('#tableLoader').removeClass('d-none');

            $.ajax({
                url: "{{ route('admin.pos.products') }}",
                data: {
                    page: page,
                    category: $('#category').val(),
                    search: $('input[name="query"]').val()
                },
                success: function(res) {
                    $('#productContainer').html(res.html);
                    $('#paginationContainer').html(res.pagination);
                },
                complete: function() {
                    $('#tableLoader').addClass('d-none');
                }
            });
        }
    </script>



    <script>
        // $(document).ready(function() {

        //     // ১. Add to Cart Button Click (Inside Modal)
        //     $('#addToCartSubmit').on('click', function() {
        //         let productId = $('.addToCart').data('id'); // অথবা hidden field theke nite paren
        //         let variationId = $('input[name="prod_variation"]:checked').val() || null;
        //         let qty = parseInt($('#qtyInput').val());

        //         // AJAX to save in Database (Backend)
        //         $.ajax({
        //             url: "{{ route('admin.pos.addToCart') }}", // Create this route
        //             method: "POST",
        //             data: {
        //                 _token: "{{ csrf_token() }}",
        //                 product_id: productId,
        //                 variation_id: variationId,
        //                 qty: qty
        //             },
        //             success: function(res) {
        //                 if (res.success) {
        //                     // কার্ট টেবিল রিফ্রেশ (পেজ লোড ছাড়া)
        //                     updateCartTable(res.cart_html);
        //                     calculateTotal();
        //                     $('#productModal').modal('hide');
        //                 }
        //             }
        //         });
        //     });

        //     // ২. ক্যালকুলেশন ফাংশন
        //     function calculateTotal() {
        //         let subtotal = 0;

        //         // প্রতিটি কার্ট আইটেমের প্রাইস যোগ করা
        //         $('.cart_qty').each(function() {
        //             let qty = parseInt($(this).val());
        //             let price = parseFloat($(this).data('price'));
        //             subtotal += (qty * price);
        //         });

        //         let extraDiscount = parseFloat($('#extra_discount_input').val()) || 0;
        //         let couponDiscount = parseFloat($('#coupon_discount_input').val()) || 0;
        //         let shippingCost = parseFloat($('#shippingCostInput').val()) || 0;

        //         let total = (subtotal + shippingCost) - (extraDiscount + couponDiscount);

        //         // UI আপডেট
        //         $('#sub_total').text('৳' + subtotal.toFixed(2));
        //         $('#sub_total_input').val(subtotal);
        //         $('#total_payable').text('৳' + total.toFixed(2));
        //     }

        //     // ৩. ইনপুট চেঞ্জ হলে অটো ক্যালকুলেট
        //     $(document).on('input', '#shippingCostInput, .cart_qty', function() {
        //         calculateTotal();
        //     });

        //     // কার্ট টেবিল আপডেট করার ফাংশন
        //     function updateCartTable(html) {
        //         $('.cart_table').find('tr:gt(0)').remove(); // Header বাদে সব ডিলিট
        //         $('.cart_table').append(html);
        //     }
        // });

        // // আইটেম ডিলিট ফাংশন
        // function deleteItem(btn) {
        //     let id = $(btn).data('id');
        //     if (confirm('Are you sure?')) {
        //         $.post("{{ route('admin.pos.deleteCart') }}", {
        //             id: id,
        //             _token: "{{ csrf_token() }}"
        //         }, function(res) {
        //             $(btn).closest('tr').remove();
        //             calculateTotal();
        //         });
        //     }
        // }



        $(document).on('click', '#addToCartBtn', function() {

            let product_id = $(this).data('product-id');
            let qty = parseInt($('#qtyInput').val()) || 1;

            let variation_id = $('input[name="prod_variation"]:checked').val() || null;

            $.ajax({
                url: "{{ route('admin.pos.addToCart') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    variation_id: variation_id,
                    qty: qty
                },
                success: function(res) {

                    updateCartUI(res.carts); // 👈 UI update
                    calculateTotals(); // 👈 total হিসাব

                    $('#productModal').modal('hide');
                }
            });
        });

        function updateCartUI(carts) {

            let html = '';

            if (carts.length === 0) {
                html = `<tr><td colspan="4" class="text-center">No Data Found</td></tr>`;
            } else {
                carts.forEach(cart => {

                    html += `
            <tr>
                <td>
                    <div class="cartItem">
                        <img src="/${cart.product.image}" width="40">
                        <div>
                            <h6>${cart.product.name}</h6>
                            <small>${cart.variation ? cart.variation.attribute_value.value : ''}</small>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="number" value="${cart.qty}" 
                        class="form-control cart_qty" 
                        data-price="${cart.price}">
                </td>

                <td>৳${cart.total_price}</td>

                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeCart(${cart.id})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            `;
                });
            }

            $('.cart_table').find('tr:gt(0)').remove();
            $('.cart_table').append(html);
        }
    </script>
@endpush --}}


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
            <div class="col-lg-7 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <h3 class="block-title text-capitalize">Product Section</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto pb-0">
                        <div class="mb-3 row">
                            <div class="col-6">
                                <select class="js-select2 form-select" id="category" style="width: 100%;">
                                    <option value="all">All Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 d-flex">
                                <input type="text" name="query" class="form-control"
                                    placeholder="Search by Name or SKU">
                                <button class="btn btn-info btn-sm mx-2" id="refresh">
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
            <div class="col-lg-5 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title text-capitalize">Billing Section</h3>
                            </div>
                        </div>
                    </div>

                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="javascript:void(0)">
                            @csrf

                            <!-- Customer -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="customer" id="customer" class="form-control js-select2">
                                            <option value="">Select Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button class="btn btn-info">Add New Customer</button>
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
                                        </div>

                                        <!-- Product Discount (optional static) -->
                                        <div class="d-flex justify-content-between">
                                            <dt>Product Discount :</dt>
                                            <dd id="productDiscount">৳0.00</dd>
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
                                                <input type="number" id="couponDiscountInput" name="coupon_discount"
                                                    class="form-control form-control-sm w-50 float-end" value="0">
                                            </dd>
                                        </div>

                                        <!-- Shipping -->
                                        <div class="d-flex justify-content-between">
                                            <dt>Shipping Cost :</dt>
                                            <dd>
                                                <input type="number" id="shippingCostInput" name="shipping_cost"
                                                    class="form-control form-control-sm w-50 float-end" value="0">
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
                                                <input type="radio" id="cash" value="cash" name="type"
                                                    hidden checked>
                                                <label for="cash" class="pay-btn">Cash</label>
                                            </li>

                                            <li>
                                                <input type="radio" id="cod" value="cod" name="type"
                                                    hidden>
                                                <label for="cod" class="pay-btn">COD</label>
                                            </li>

                                            <li>
                                                <input type="radio" id="wallet" value="wallet" name="type"
                                                    hidden>
                                                <label for="wallet" class="pay-btn">Wallet</label>
                                            </li>
                                        </ul>
                                    </div>

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

@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
    <script>
        One.helpersOnLoad(['jq-select2']);
    </script>

    <script>
        $(document).ready(function() {

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
                }).always(function() {
                    $('#tableLoader').addClass('d-none');
                });
            }

            loadProducts();

            $('#category').on('change', () => loadProducts(1));
            $('input[name="query"]').on('keyup', () => loadProducts(1));
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                loadProducts(page);
            });
            $('#refresh').on('click', function() {
                $('#category').val('all').trigger('change');
                $('input[name="query"]').val('');
                loadProducts(1);
            });

            // ================= PRODUCT MODAL =================
            $(document).on('click', '.productCard', function() {
                let product_id = $(this).data('id');

                $.get(`/admin/pos/product/${product_id}`, function(res) {
                    $('#productModal .modal-body').html(res.html);
                    $('#productModal').find('#addToCartBtn').attr('data-product-id', product_id);
                    $('#productModal').find('#qtyInput').val(1);
                    $('#productModal').find('input[name="prod_variation"]').prop('checked', false);
                    $('#productModal').modal('show');
                });
            });

            // ================= ADD TO CART (MODAL) =================
            $(document).on('click', '#addToCartBtn', function() {

                let product_id = $(this).attr('data-product-id');
                let variation_id = $('#productModal').find('input[name="prod_variation"]:checked').val() ||
                    null;
                let qty = parseInt($('#productModal').find('#qtyInput').val()) || 1;

                if (!product_id) {
                    alert('Product error!');
                    return;
                }

                let hasVariation = $('#productModal').find('input[name="prod_variation"]').length > 0;
                if (hasVariation && !variation_id) {
                    alert('Please select variation');
                    return;
                }

                $.post("{{ route('admin.pos.addToCart') }}", {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    variation_id: variation_id,
                    qty: qty
                }, function(res) {
                    updateCartUI(res.carts);
                    calculateTotals();
                    $('#productModal').modal('hide');
                });
            });

            // ================= UPDATE CART UI =================
            function updateCartUI(carts) {

                let html = '';

                if (carts.length === 0) {
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
                    <td>
                        <input type="number" class="form-control cart_qty" data-id="${cart.id}" data-price="${cart.price}" value="${cart.qty}" min="1">
                    </td>
                    <td class="cart_total">৳${cart.total_price}</td>
                    <td>
                        <button class="btn btn-sm text-danger removeCartBtn" data-id="${cart.id}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                `;
                    });
                }

                $('#cartBody').html(html);
            }

            // ================= CALCULATE TOTAL =================
            function calculateTotals() {

                let subtotal = 0;

                $('.cart_qty').each(function() {
                    let qty = parseInt($(this).val()) || 0;
                    let price = parseFloat($(this).data('price')) || 0;

                    let total = qty * price;
                    $(this).closest('tr').find('.cart_total').text('৳' + total.toFixed(2));

                    subtotal += total;
                });

                let extra = parseFloat($('#extraDiscountInput').val()) || 0;
                let coupon = parseFloat($('#couponDiscountInput').val()) || 0;
                let shipping = parseFloat($('#shippingCostInput').val()) || 0;

                let grandTotal = subtotal - extra - coupon + shipping;

                $('#subTotal').text('৳' + subtotal.toFixed(2));
                $('#grandTotal').text('৳' + grandTotal.toFixed(2));
                $('#finalAmount').val(grandTotal);
            }

            // ================= QUANTITY CHANGE =================
            $(document).on('input', '.cart_qty', function() {
                let id = $(this).data('id');
                let qty = parseInt($(this).val()) || 0;

                $.post("{{ route('admin.pos.updateCart') }}", {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    qty: qty
                });

                calculateTotals();
            });

            // ================= DELETE CART ITEM =================
            $(document).on('click', '.removeCartBtn', function() {

                let btn = $(this);
                let id = btn.data('id');

                if (btn.prop('disabled')) return;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This product will be removed from cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {

                    if (result.isConfirmed) {
                        btn.prop('disabled', true);

                        $.post("{{ route('admin.pos.deleteCart') }}", {
                            _token: "{{ csrf_token() }}",
                            id: id
                        }, function(res) {
                            updateCartUI(res.carts);
                            calculateTotals();
                            showToast('Product Removed From Cart!', 'success');
                        }).always(() => {
                            btn.prop('disabled', false);
                        });
                    }
                });

            });

            // ================= CLEAR CART =================
            $('#clearCart').on('click', function() {

                Swal.fire({
                    title: 'Clear all cart?',
                    text: "All products will be removed!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("{{ route('admin.pos.clearCart') }}", {
                            _token: "{{ csrf_token() }}"
                        }, function() {
                            updateCartUI([]);
                            calculateTotals();
                            showToast('Cart has been cleared', 'success');
                        });
                    }
                });
            });

            // ================= EXTRA/COUPON/SHIPPING CHANGE =================
            $('#extraDiscountInput, #couponDiscountInput, #shippingCostInput').on('input', function() {
                calculateTotals();
            });

            // ================= MODAL RESET =================
            $('#productModal').on('hidden.bs.modal', function() {
                $(this).find('.modal-body').html('');
            });

            // ================= GLOBAL BARCODE SCANNER =================
            let barcodeBuffer = '';
            let barcodeTimer = null;

            $(document).on('keypress', function(e) {

                if (e.which === 13) { // Enter
                    e.preventDefault();
                    let sku = barcodeBuffer.trim();

                    if (sku.length > 0) {
                        $.post("{{ route('admin.pos.scanBarcode') }}", {
                            _token: "{{ csrf_token() }}",
                            sku: sku
                        }, function(res) {

                            if (res.success) {
                                updateCartUI(res.carts);
                                calculateTotals();
                                playBeep();
                            } else {
                                Swal.fire('Not Found', 'Product not found!', 'error');
                            }

                        });
                    }

                    barcodeBuffer = '';
                    return;
                }

                barcodeBuffer += String.fromCharCode(e.which);

                clearTimeout(barcodeTimer);
                barcodeTimer = setTimeout(() => {
                    barcodeBuffer = '';
                }, 300);
            });

            function playBeep() {
                let audio = new Audio("https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg");
                audio.play();
            }

            // ================= INIT =================
            calculateTotals();

        });
    </script>
@endpush
