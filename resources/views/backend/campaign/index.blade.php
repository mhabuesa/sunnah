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
            <div class="col-lg-12 m-auto mt-2">
                <div class="block block-rounded">
                    <div class="block-header block-header-default d-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="block-title">Campaign List</h3>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end">
                                <div class="block-options space-x-1 md_mt-2 p-0">
                                    <a href="{{ route('admin.campaign.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-plus"></i> New
                                        Campaign</a>
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
                                    @foreach ($campaigns as $key => $campaign)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $campaign->campaign_name }}</td>
                                            <td>{{ $campaign->campaign_url }}</td>
                                            <td>{{ count($campaign->product ?? []) }}</td>
                                            <td class="text-center">

                                                <a href="{{route('landing', $campaign->campaign_url)}}" target="_blank" class="border-0 btn btn-sm" title="Product">
                                                    <i class="fa-solid fa-globe text-success fa-xl"></i>
                                                </a>
                                                <a href="{{ route('admin.campaign.product.assign', $campaign->id) }}"
                                                    class="border-0 btn btn-sm" title="Add Product">
                                                    <i class="fa fa-cart-plus text-primary fa-xl"></i>
                                                </a>
                                                <a href="{{ route('admin.campaign.edit', $campaign->id) }}"
                                                    class="border-0 btn btn-sm">
                                                    <i class="fa fa-pencil text-info fa-xl"></i>
                                                </a>
                                                <button type="button" class="border-0 btn btn-sm"
                                                    onclick="deleteCampaign(this)" data-id="{{ $campaign->id }}"><i
                                                        class="fa fa-trash text-danger fa-xl"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
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
        function deleteCampaign(button) {
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
