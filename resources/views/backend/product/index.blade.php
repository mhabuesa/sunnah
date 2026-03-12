@extends('backend.layouts.app')
@section('title', 'Products List')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto" id="filterForm" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Filter Product
                        </h3>
                        <button id="closeFilterForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="brand">Brand</label>
                                        <select class="js-select2 form-select" id="brand" name="brand_id"
                                            style="width: 100%;" data-placeholder="Choose brand..">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $key => $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Category<span
                                                class="text-danger">*</span></label>
                                        <select class="js-select2 form-select" id="category" name="category"
                                            style="width: 100%;" data-placeholder="Choose Category.." required>
                                            <option></option>
                                            @foreach ($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="subcategory">Sub Category</label>
                                        <select class="js-select2 form-select" id="subcategory" name="subcategory"
                                            style="width: 100%;" data-placeholder="Choose Sub Category  ..">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0 text-end">
                                <button type="button" id="resetFilter" class="btn btn-warning mt-4">
                                    Reset
                                </button>

                                <button type="button" id="applyFilter" class="btn btn-primary mt-4">
                                    Show Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Product List</h3>
                        <div class="block-options space-x-1">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                                data-target="#one-dashboard-search-orders" data-class="d-none">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-sm btn-alt-secondary" id="filterBtn">
                                    <i class="fa fa-fw fa-flask"></i>
                                    Filters
                                </button>
                            </div>
                            <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary"> <i
                                    class="fas fa-plus"></i> Add Product</a>
                        </div>
                    </div>
                    <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                        <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                            <div class="push">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt" id="productSearch"
                                        name="one-ecom-orders-search" placeholder="Search all Products..">
                                    <span class="input-group-text bg-body border-0">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <div class="position-relative">

                            <div id="tableLoader" class="position-absolute top-50 start-50 translate-middle d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>

                            <table class="table table-bordered table-vcenter" id="productTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">sl</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Show as featured</th>
                                        <th>Active Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="tableBody"></tbody>

                            </table>

                        </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light p-2">
                        <div class="text-center">
                            <button id="loadMore" class="btn btn-primary">
                                <span class="btn-text">Load More</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->


@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);

        // Get Subcategories
        $('#category').on('change', function() {

            let categoryId = $(this).val();

            let subcategory = $('#subcategory');

            subcategory.html('<option value="">Loading...</option>');

            fetch('/admin/product/get-subcategories/' + categoryId)
                .then(response => response.json())
                .then(data => {

                    let options = '<option value="">Select Sub Category</option>';

                    data.forEach(function(item) {
                        options += `<option value="${item.id}">${item.name}</option>`;
                    });

                    subcategory.html(options).trigger('change');

                });

        });
    </script>


    <script>
        let currentPage = 1;
        let currentSearch = "";
        let filterBrand = "";
        let filterCategory = "";
        let filterSubcategory = "";

        function loadOrders(reset = false) {

            $("#tableLoader").removeClass("d-none");

            $.ajax({
                url: "{{ route('admin.product.getList.ajax') }}",
                data: {
                    page: currentPage,
                    search: currentSearch,
                    brand_id: filterBrand,
                    category_id: filterCategory,
                    subcategory_id: filterSubcategory
                },

                success: function(res) {

                    if (reset) {
                        $("#tableBody").html("");
                    }

                    $("#tableBody").append(res.data);

                    if (!res.hasMore) {
                        $("#loadMore").hide();
                    } else {
                        $("#loadMore").show();
                    }
                },

                complete: function() {
                    $("#tableLoader").addClass("d-none");
                }

            });
        }

        $("#applyFilter").click(function() {

            filterBrand = $("#brand").val();
            filterCategory = $("#category").val();
            filterSubcategory = $("#subcategory").val();

            currentPage = 1;

            loadOrders(true);
        });

        $("#resetFilter").click(function() {

            // form clear
            $("#brand").val('').trigger('change');
            $("#category").val('').trigger('change');
            $("#subcategory").html('<option value="">Select Sub Category</option>').trigger('change');

            // filter variable reset
            filterBrand = "";
            filterCategory = "";
            filterSubcategory = "";

            currentSearch = "";
            $("#productSearch").val("");

            // pagination reset
            currentPage = 1;

            // reload all data
            loadOrders(true);

        });

        // প্রথমবার লোড
        loadOrders(true);

        // Load More
        $("#loadMore").on("click", function() {
            currentPage++;
            loadOrders();
        });

        // ✅ Search input
        $("#productSearch").on("keyup", function() {
            currentSearch = $(this).val();
            currentPage = 1;
            loadOrders(true);
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#productSearch").on("keyup", function() {
                let value = $(this).val().toLowerCase();

                $("#productTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>


    <!-- Page specific script -->
    <script>
        function deleteProduct(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "This will move the item to trash.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f97316",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Move To Trash!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.product.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        success: function(data) {
                            if (data.success) {
                                showToast(data.message, "success");
                                $(button).closest('tr').remove();
                            } else {
                                showToast(data.message, "error");
                            }
                        },
                        error: function(xhr) {
                            showToast("An error occurred: " + xhr.responseJSON.message, "error");
                        }
                    });
                }
            });
        }

        function updateProductStatus(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "Will update Product status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateProductStatusAjax(element);
                } else {
                    element.checked = !element.checked;
                }
            })
        }

        function updateProductStatusAjax(element) {
            const id = $(element).data('id');
            let url = "{{ route('admin.product.status.update', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        showToast(data.message, "success");
                    } else {
                        showToast(data.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('xhr.responseText, status, error', xhr.responseText, status, error);
                    showToast('Something went wrong', "error");
                }
            });
        }


        function updateProductFeatured(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "Will update Product Featured status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateProductFeaturedAjax(element);
                } else {
                    element.checked = !element.checked;
                }
            })
        }

        function updateProductFeaturedAjax(element) {
            const id = $(element).data('id');
            let url = "{{ route('admin.product.featured.update', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        showToast(data.message, "success");
                    } else {
                        showToast(data.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('xhr.responseText, status, error', xhr.responseText, status, error);
                    showToast('Something went wrong', "error");
                }
            });
        }
    </script>

    <script>
        // Add button → show form and hide button
        $('#filterBtn').click(function() {
            $('#filterForm').slideDown(300);
            $(this).hide();
        });

        // X button → hide form and show button
        $('#closeFilterForm').click(function() {
            $('#filterForm').slideUp(300);
            $('#filterBtn').show();
        });
    </script>

@endpush
