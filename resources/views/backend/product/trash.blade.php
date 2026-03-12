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
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Product List</h3>
                        <div class="block-options space-x-1">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                                data-target="#one-dashboard-search-orders" data-class="d-none">
                                <i class="fa fa-search"></i>
                            </button>
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

                                <tbody>
                                    @forelse ($products as $key => $product)
                                        <tr>
                                            <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                            <td class="fw-semibold fs-sm"><img src="{{ asset($product->image) }}"
                                                    class="productNameImage" alt=""> {{ $product->name }}</td>
                                            <td class="fw-semibold fs-sm">{{ $product->price }}</td>
                                            <td class="fw-semibold fs-sm text-capitalize">
                                                <div class="badge bg-{{ $product->is_featured == 'active' ? 'success' : 'danger' }}">
                                                    {{ $product->is_featured ?? 'NA' }}
                                                </div>
                                            </td>
                                            <td class="fw-semibold fs-sm text-capitalize">
                                                <div class="badge bg-{{ $product->status == 'active' ? 'success' : 'danger' }}">
                                                    {{ $product->status }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex">
                                                    <button type="button" class="border-0 btn btn-sm"
                                                        onclick="restoreProduct(this)" data-id="{{ $product->id }}"><i
                                                            class="fa fa-recycle text-danger fa-xl"></i></button>

                                                    <button type="button" class="border-0 btn btn-sm"
                                                        onclick="deleteProduct(this)" data-id="{{ $product->id }}"><i
                                                            class="fa fa-trash text-danger fa-xl"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Product Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>

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
                text: "This will Delete Permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f97316",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete Permanently!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.product.destroy.permanently', ':id') }}";
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

        function restoreProduct(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "This will Remove To Trash.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#22c55e",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Restore To Trash!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.product.restore', ':id') }}";
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
        
    </script>
@endpush
