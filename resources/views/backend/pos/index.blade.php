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
    </style>

    <style>
        .options-container {
            position: relative;
            overflow: hidden;
        }

        .options-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            opacity: 0;
            transition: opacity 0.25s ease-out;
        }

        .options-container:hover .options-overlay {
            opacity: 1;
        }

        /* Modal Variations Styling */
        .variation-item input[type="radio"] {
            display: none;
        }

        .variation-item label {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            margin: 4px;
            transition: 0.2s;
        }

        .variation-item input[type="radio"]:checked+label {
            background: #0665d0;
            color: #fff;
            border-color: #0665d0;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 m-auto mt-2">
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

    {{-- <script>
        $(document).ready(function() {

            // প্রথম load
            loadProducts();

            // ================= CATEGORY FILTER =================
            $('#category').on('change', function() {
                loadProducts();
            });

            // ================= SEARCH =================
            let typingTimer;
            $('input[name="query"]').on('keyup', function() {

                clearTimeout(typingTimer);

                typingTimer = setTimeout(function() {
                    loadProducts();
                }, 400); // debounce (fast typing issue fix)
            });

            // ================= PAGINATION CLICK =================
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');

                if (url) {
                    loadProducts(url);
                }
            });

        });


        // ================= LOAD PRODUCTS FUNCTION =================
        function loadProducts(url = "{{ route('admin.pos.products') }}") {

            $('#tableLoader').removeClass('d-none');

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    category: $('#category').val(),
                    search: $('input[name="query"]').val()
                },

                success: function(res) {

                    // product card update
                    $('#productContainer').html(res.html);

                    // pagination update
                    $('#paginationContainer').html(res.pagination);
                },

                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                },

                complete: function() {
                    $('#tableLoader').addClass('d-none');
                }
            });
        }
    </script> --}}

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
