@extends('backend.layouts.app')
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
        /* input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        } */

        /* Firefox */
        /* input[type="number"] {
            -moz-appearance: textfield;
        } */

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
                            <div class="mb-3">
                                <table class="table cart_table">
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <td class="name">
                                            <div class="cartItem">
                                                <img src="http://127.0.0.1:8000/uploads/product/1773303736-K38EuZghN9.webp"
                                                    alt="">
                                                <div class="cartItem-body">
                                                    <h5 class="">Flag Re...</h5>
                                                    <span>XL</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="qty">
                                            <input type="number" class="form-control" value="1">
                                        </td>
                                        <td>1200</td>
                                        <td class="del">
                                            <button type="button" class="border-0 btn btn-sm" onclick="deleteItem(this)"
                                                data-id="12">
                                                <i class="fa fa-trash text-danger fa-xl"></i>
                                            </button>
                                        </td>
                                    </tr>
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
        $(document).ready(function() {
            $('.addToCart').click(function() {
                let button = $(this);

                // Data Extraction
                let basePrice = parseFloat(button.data('price'));
                let variations = button.data('variations');
                let name = button.data('name');
                let stock = button.data('stock');

                // Modal basic field filling
                $('#modalName').text(name);
                $('#modalImage').attr('src', button.data('image'));
                $('#modalSKU').text(button.data('sku'));
                $('#modalCategory').text(button.data('category'));
                $('#modalBrand').text(button.data('brand'));
                $('#modalStock').text(stock > 0 ? 'In Stock' : 'Out of Stock');

                // Reset Quantity
                $('#qtyInput').val(1);

                // Render Variation Buttons
                if (variations && variations.length > 0) {
                    let html =
                        '<label class="form-label fw-bold">Select Option:</label><div class="variation-wrapper">';
                    variations.forEach((v, index) => {
                        let checked = (index === 0) ? 'checked' : '';
                        html += `
                    <div class="variation-item">
                        <input type="radio" name="prod_variation" id="v_${v.id}" 
                               value="${v.id}" data-price="${v.price}" ${checked}>
                        <label for="v_${v.id}">${v.attr_value}</label>
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

                // Calculation Function
                function updateTotal() {
                    let qty = parseInt($('#qtyInput').val()) || 1;
                    let currentUnitPrice = basePrice;

                    // Variation select kora thakle tar price nibe
                    let selectedVar = $('input[name="prod_variation"]:checked');
                    if (selectedVar.length) {
                        currentUnitPrice = parseFloat(selectedVar.data('price'));
                    }

                    let total = currentUnitPrice * qty;
                    $('#modalPrice').text('৳' + currentUnitPrice.toLocaleString());
                    $('#totalPrice').text('৳' + total.toLocaleString());
                }

                // Initialize Price
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

                $('#qtyInput').on('input', function() {
                    updateTotal();
                });
            });
        });
    </script>
@endpush
