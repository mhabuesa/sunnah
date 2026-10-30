@extends('backend.layouts.app')
@section('title', 'Charity Category')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 m-auto" id="addCategoryField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add New Category</h3>
                        <button id="closeCategoryForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.charity.category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="category">Category Name </label>
                                        <input type="text" name="category" id="category" class="form-control"
                                            placeholder="Category Name" value="{{ old('category') }}" required>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control"
                                            placeholder="Description" value="{{ old('description') }}" required>
                                        @error('description')
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

            <div class="col-lg-12 m-auto mt-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Category List</h3>
                        <button id="addCategory" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Category</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="categoryTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $category->category }}</td>
                                        <td class="fw-semibold fs-sm">{{ $category->description }}</td>
                                        <td class="fs-sm">{{ $category->priority }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $category->status == 1 ? 'checked' : '' }}
                                                    data-id="{{ $category->id }}" onchange="updateCategoryStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center fs-xl">

                                           <button type="button" class="border-0 btn btn-sm editCategoryBtn"
                                                data-id="{{ $category->id }}" data-category="{{ $category->category }}" 
                                                data-description="{{ $category->description }}"
                                                data-priority="{{ $category->priority }}" data-slug="{{ $category->slug }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm" onclick="deleteCategory(this)"
                                                data-id="{{ $category->id }}">
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

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" enctype="multipart/form-data">
                        <input type="hidden" id="edit_category_id">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label>Category Name</label>
                                <input type="text" id="edit_category" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Description</label>
                                <input type="text" id="edit_description" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Priority</label>
                                <input type="number" id="edit_priority" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Slug</label>
                                <input type="text" id="edit_slug" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateCategoryBtn">Update</button>
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

    <script>
        $('#categoryTable').DataTable();

        $('#addCategory').click(function() {
            $('#addCategoryField').slideDown(300);
            $(this).hide();
        });

        $('#closeCategoryForm').click(function() {
            $('#addCategoryField').slideUp(300);
            $('#addCategory').show();
        });

        function updateCategoryStatus(element) {
            const id = $(element).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Update category status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes Update"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.charity.category.status.update', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            showToast(data.message, "success");
                        },
                        error: function() {
                            showToast('Something went wrong', "error");
                            element.checked = !element.checked;
                        }
                    });
                } else {
                    element.checked = !element.checked;
                }
            });
        }

        function deleteCategory(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "The category will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.charity.category.destroy', ':id') }}".replace(':id', id),
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

        $(document).on('click', '.editCategoryBtn', function() {
            const data = $(this).data();
            $('#edit_category_id').val(data.id);
            $('#edit_category').val(data.category);
            $('#edit_description').val(data.description);
            $('#edit_priority').val(data.priority);
            $('#edit_slug').val(data.slug);

            $('#editCategoryModal').modal('show');
        });

        $('#closeEditModal').click(function() {
            $('#editCategoryModal').modal('hide');
        });

        $('#updateCategoryBtn').click(function() {
            let formData = new FormData($('#editCategoryForm')[0]);
            formData.append('id', $('#edit_category_id').val());
            formData.append('category', $('#edit_category').val());
            formData.append('priority', $('#edit_priority').val());
            formData.append('slug', $('#edit_slug').val());
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('admin.charity.category.update', ['id' => '__ID__']) }}".replace('__ID__', $(
                    '#edit_category_id').val()),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#updateCategoryBtn').prop('disabled', true).text('Updating...');
                },
                success: function(res) {
                    if (res.success) {
                        showToast(res.message, "success");
                        location.reload();
                    } else {
                        showToast(res.message, "error");
                    }
                },
                error: function(xhr) {
                    showToast("Error: " + xhr.responseJSON.message, "error");
                },
                complete: function() {
                    $('#updateCategoryBtn').prop('disabled', false).text('Update');
                }
            });
        });
    </script>
@endpush
