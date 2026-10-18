@extends('backend.layouts.app')
@section('title', 'Categories')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto" id="addCategoryField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Category
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
                                        <label class="form-label" for="category_name">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name"
                                            placeholder="Enter category name.." value="{{ old('category_name') }}" required>
                                        @error('category_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="logo">Category Logo
                                            <small class="text-info">(500x500 px)</small></label>
                                        <input type="file" class="form-control" id="logo" name="logo"
                                            placeholder="Enter category name..">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-auto">
                                    <div class="mb-4 text-center">
                                        <img src="https://placehold.co/500" width="150" id="add_preview" alt="">
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
                        <h3 class="block-title">
                            Category List
                        </h3>
                        <button id="addCategory" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Category</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="categoryTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="">Category Image</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th>Sub Categories</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <img src="{{ asset($category->logo) }}" width="50" alt="">
                                        </td>
                                        <td class="fw-semibold fs-sm">{{ $category->name }}</td>
                                        <td class="fw-semibold fs-sm">{{ $category->priority }}</td>
                                        <td class="fw-semibold fs-sm">
                                            {{ $category->subcategories->count() }}
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $category->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $category->id }}" data-status="{{ $category->status }}"
                                                    onchange="updateCategoryStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editCategoryBtn"
                                                data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                                data-slug="{{ $category->slug }}"
                                                data-priority="{{ $category->priority }}"
                                                data-logo="{{ asset($category->logo) }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteCategory(this)" data-id="{{ $category->id }}"><i
                                                    class="fa fa-trash text-danger fa-xl"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->

    <div class="modal fade" id="editCategoryModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_category_id">

                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" id="edit_name" class="form-control">
                        <small class="text-danger d-none" id="nameError"></small>
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" id="edit_slug" class="form-control">
                        <small class="text-danger d-none" id="slugError"></small>
                    </div>
                    <div class="mb-3">
                        <label>Logo</label>
                        <input type="file" id="edit_logo" class="form-control" accept="image/*">
                        <small class="text-danger d-none" id="logoError"></small>
                    </div>
                    <div class="mb-3 text-center">
                        <label class="d-block text-start">Preview</label>
                        <img src="" alt="Logo" id="edit_preview" width="150">
                    </div>

                    <div class="mb-3">
                        <label>Priority</label>
                        <input type="number" id="edit_priority" class="form-control">
                    </div>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/js/plugins/datatables/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/be_tables_datatables.min.js"></script>

    <script>
        $('#categoryTable').DataTable();
    </script>

    <!-- Page specific script -->
    <script>
        // Add category image preview
        $('#logo').on('change', function() {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#add_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });

        function deleteCategory(button) {
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
                    let url = "{{ route('admin.category.destroy', ':id') }}";
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

        function updateCategoryStatus(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "Will update category status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateCategoryStatusAjax(element);
                } else {
                    element.checked = !element.checked;
                }
            })
        }

        function updateCategoryStatusAjax(element) {
            const id = $(element).data('id');
            let url = "{{ route('admin.category.status.update', ':id') }}";
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
        // 🔹 Edit button click using event delegation
        $(document).on('click', '.editCategoryBtn', function() {

            $('#edit_category_id').val($(this).data('id'));
            $('#edit_name').val($(this).data('name'));
            $('#edit_slug').val($(this).data('slug'));
            $('#edit_priority').val($(this).data('priority'));

            let logo = $(this).data('logo');

            if (logo) {
                $('#edit_preview').attr('src', logo);
            } else {
                $('#edit_preview').attr('src', 'https://placehold.co/500');
            }

            resetErrors();
            $('#editCategoryModal').modal('show');
        });

        // 🔹 Edit logo
        $('#edit_logo').on('change', function() {

            let reader = new FileReader();

            reader.onload = function(e) {
                $('#edit_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

        // 🔹 Cancel button
        $(document).on('click', '#closeEditModal', function() {
            $('#editCategoryModal').modal('hide');
        });

        // 🔹 Reset errors
        function resetErrors() {
            $('#nameError, #slugError').addClass('d-none').text('');
            $('#edit_name, #edit_slug').removeClass('is-invalid');
        }

        // 🔹 If input change hide errors
        $(document).on('input', '#edit_name, #edit_slug', function() {
            resetErrors();
        });

        // 🔹 Update category
        $(document).on('click', '#updateCategoryBtn', function() {

            let id = $('#edit_category_id').val();
            let name = $('#edit_name').val().trim();
            let slug = $('#edit_slug').val().trim();
            let priority = $('#edit_priority').val();
            let logo = $('#edit_logo')[0].files[0];

            let formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('id', id);
            formData.append('name', name);
            formData.append('slug', slug);
            formData.append('priority', priority);

            if (logo) {
                formData.append('logo', logo);
            }

            resetErrors();

            $.ajax({
                url: "{{ route('admin.category.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $('#updateCategoryBtn').prop('disabled', true).text('Updating...');
                },

                success: function(res) {

                    if (res.errors) {

                        if (res.errors.name) {
                            $('#nameError').removeClass('d-none').text(res.errors.name[0]);
                            $('#edit_name').addClass('is-invalid');
                        }

                        if (res.errors.slug) {
                            $('#slugError').removeClass('d-none').text(res.errors.slug[0]);
                            $('#edit_slug').addClass('is-invalid');
                        }

                        if (res.errors.logo) {
                            $('#logoError').removeClass('d-none').text(res.errors.logo[0]);
                            $('#edit_logo').addClass('is-invalid');
                        }

                        return;
                    }

                    if (res.success) {
                        location.reload();
                    }
                },

                complete: function() {
                    $('#updateCategoryBtn').prop('disabled', false).text('Update');
                }
            });

        });
    </script>

    <script>
        // Add button → show form and hide button
        $('#addCategory').click(function() {
            $('#addCategoryField').slideDown(300);
            $(this).hide();
        });

        // X button → hide form and show button
        $('#closeCategoryForm').click(function() {
            $('#addCategoryField').slideUp(300);
            $('#addCategory').show();
        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addCategoryField').show();
                $('#addCategory').hide();
            });
        </script>
    @endif
@endpush
