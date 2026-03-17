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
@endpush
