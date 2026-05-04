@extends('backend.layouts.app')
@section('title', 'Campaign Products')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title">Product List</h3>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end">
                                <div class="block-options space-x-1 md_mt-2 p-0">
                                    <a href="{{ route('admin.campaign.product.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> Add Product</a>
                                </div>
                            </div>
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
                                        <th class="text-center">SL</th>
                                        <th>Product Name</th>
                                        <th>Title</th>
                                        <th>Old Price</th>
                                        <th>Unit Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><small>{{ $product->title }}</small></td>
                                            <td>{{ $product->old_price }}/=</td>
                                            <td>{{ $product->price }}/=</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" width="50" alt="">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="border-0 btn btn-sm"
                                                    onclick="deleteProduct(this)" data-id="{{ $product->id }}"><i
                                                        class="fa fa-trash text-danger fa-xl"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>


@endsection
@push('footer_scripts')
    <script>
        function deleteProduct(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.campaign.product.destroy', ':id') }}";
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
