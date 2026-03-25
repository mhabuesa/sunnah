@extends('backend.layouts.app')
@section('title', 'Order Details')
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
    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <img class="png_icon" src="{{ asset('assets/icon/png/product_cart2.png') }}" alt=""> Order Details
            </h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- PRODUCT SECTION -->
            <div class="col-lg-8 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header" style="align-items: normal" >
                        <div class="text-start">
                            <h3 class="block-title text-capitalize">Order ID #{{ $order->id }}</h3>
                            <h3 class="block-title text-capitalize">
                                <i class="fa-regular fa-calendar-days"></i> {{ $order->created_at->format('d-m-Y') }}
                                <i class="fa-regular fa-alarm-clock"></i> {{ $order->created_at->format('H:i') }}
                            </h3>
                        </div>
                        <div class="text-end">
                            <a href="" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Invoice Print</a>
                            <div class="mt-2">
                                <p class="mb-0">Status: <span class="badge bg-{{ $order->order_status == 'confirmed' ? 'success' : 'primary' }} text-capitalize">{{ $order->order_status }}</span></p>
                                <p class="mb-0">Payment Method: <span class="text-primary fw-bold text-capitalize">{{ $order->payment_method }}</span></p>
                                <p class="mb-0">Payment Status: <span class="text-primary text-capitalize text-{{ $order->payment_status == 'paid' ? 'success' : 'danger' }} fw-bold">{{ $order->payment_status }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto pb-0">

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

                    <div class="block-content block-content-full overflow-x-auto">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

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
                e.preventDefault(); // ফর্ম সাবমিট হওয়া আটকাবে

                Swal.fire({
                    title: 'Clear all cart?',
                    text: "All products will be removed from your cart!",
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
                            updateCartUI([]);
                            calculateTotals();
                            setCookie('selected_customer', '', -1);
                            $('#customer_id').val(null).trigger('change');
                            if (typeof showToast === "function") {
                                showToast('Cart has been cleared', 'success');
                            } else {
                                Swal.fire('Cleared!', 'Your cart is empty.', 'success');
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
                    subtotal += (qty * price);
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
@endpush
