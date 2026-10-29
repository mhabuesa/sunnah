@extends('backend.layouts.app')
@section('title', 'Charity Content')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Content List</h3>
                        <a href="{{route('admin.charity.content.create')}}" id="addCategory" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Category</a>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="productsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($charityContents as $key => $content)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $content->title }}</td>
                                        <td class="fw-semibold fs-sm text-success">{{ $content->category->category }}</td>
                                        <td class="fw-semibold fs-sm text-success">{{ $content->subcategory->subcategory }}</td>
                                        <td class="fw-semibold fs-sm">{{ $content->priority }}</td>
                                        <td class="text-center fs-xl">
                                            <a href="{{route('admin.charity.content.edit', $content->id)}}" class="border-0 btn btn-sm">
                                                <i class="fa fa-pencil text-info fa-xl"></i>
                                            </a>
                                            <button type="button" class="border-0 btn btn-sm" onclick="deleteOffer(this)"
                                                data-id="{{ $content->id }}">
                                                <i class="fa fa-trash text-danger fa-xl"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/datatables/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);
    </script>
    <script>
        $('#productsTable').DataTable();

        function deleteOffer(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "The Content will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.charity.content.destroy', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE'
                        },
                        success: function(data) {
                            showToast(data.message, "success");
                            $(button).closest('tr').remove();
                        }
                    });
                }
            });
        }

        $('#category').on('change', function() {
            const categoryId = $(this).val();
            const $subcategory = $('#subcategory');

            // Reset subcategory options when the category changes.
            $subcategory
                .empty()
                .append(new Option('Loading subcategories...', '', true, true))
                .prop('disabled', true)
                .trigger('change');

            if (!categoryId) {
                $subcategory
                    .empty()
                    .append(new Option('Select Subcategory', '', true, true))
                    .trigger('change');

                return;
            }

            $.ajax({
                url: "{{ route('admin.charity.get.subcategories') }}",
                type: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(subcategories) {
                    $subcategory.empty();

                    $subcategory.append(
                        new Option('Select Subcategory', '', true, true)
                    );

                    if (subcategories.length === 0) {
                        $subcategory.append(
                            new Option('No subcategories found', '', false, false)
                        );
                    } else {
                        subcategories.forEach(function(item) {
                            $subcategory.append(
                                new Option(item.subcategory, item.id)
                            );
                        });
                    }

                    $subcategory
                        .prop('disabled', subcategories.length === 0)
                        .trigger('change');
                },
                error: function() {
                    $subcategory
                        .empty()
                        .append(new Option('Failed to load subcategories', '', true, true))
                        .prop('disabled', true)
                        .trigger('change');

                    showToast('Failed to load subcategories.', 'error');
                }
            });
        });
    </script>
@endpush
