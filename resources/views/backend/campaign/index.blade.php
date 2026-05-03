@extends('backend.layouts.app')
@section('title', 'Campaign')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto" id="addCampaignField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Campaign
                        </h3>
                        <button id="closeCategoryForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="campaign_name">Campaign Name</label>
                                        <input type="text" class="form-control" id="campaign_name" name="campaign_name"
                                            placeholder="Enter Campaign name.." value="{{ old('campaign_name') }}" required>
                                        @error('campaign_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Enter Slug.." value="{{ old('slug') }}" required>
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="slug">Product</label>
                                        <div>
                                            @foreach ($products as $product)
                                                <span class="mx-2">
                                                    <input id="product_{{$product->id}}" type="checkbox" class="form-check-input me-2" name="product_id[]" value="{{$product->id}}">
                                                    <label for="product_{{$product->id}}">{{$product->name}}</label>
                                                </span>
                                            @endforeach
                                        </div>
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title">Campaign List</h3>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end">
                                <div class="block-options space-x-1 md_mt-2 p-0">
                                    <button id="addCampaign" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> New
                                        Campaign</button>
                                </div>
                            </div>
                        </div>
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
                                        <th>Campaign Name</th>
                                        <th>Slug</th>
                                        <th>Total Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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

    <script>
        // Add button → show form and hide button
        $('#addCampaign').click(function() {
            $('#addCampaignField').slideDown(300);
            $(this).hide();
        });

        // X button → hide form and show button
        $('#closeCategoryForm').click(function() {
            $('#addCampaignField').slideUp(300);
            $('#addCampaign').show();
        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addCampaignField').show();
                $('#addCampaign').hide();
            });
        </script>
    @endif
@endpush
