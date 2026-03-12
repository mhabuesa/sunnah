@extends('backend.layouts.app')
@section('title', 'Brands')
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
            <div class="col-lg-12 m-auto" id="addBrandField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Brand
                        </h3>
                        <button id="closeBrandForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="brand_name">Brand Name</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name"
                                            placeholder="Enter Brand name.." value="{{ old('brand_name') }}" required>
                                        @error('brand_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="logo">Brand Logo
                                            <small class="text-info">(500x500 px)</small></label>
                                        <input type="file" class="form-control" id="logo" name="logo"
                                            placeholder="Enter Brand name..">
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
                            Brand List
                        </h3>
                        <button id="addBrand" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Brand</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="brandTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="">Brand Image</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <img src="{{ asset($brand->logo) }}" width="50" alt="">
                                        </td>
                                        <td class="fw-semibold fs-sm">{{ $brand->name }}</td>
                                        <td class="fw-semibold fs-sm">{{ $brand->priority }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $brand->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $brand->id }}" data-status="{{ $brand->status }}"
                                                    onchange="updateBrandStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editBrandBtn"
                                                data-id="{{ $brand->id }}" data-name="{{ $brand->name }}"
                                                data-slug="{{ $brand->slug }}"
                                                data-priority="{{ $brand->priority }}"
                                                data-logo="{{ asset($brand->logo) }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteBrand(this)" data-id="{{ $brand->id }}"><i
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

    <div class="modal fade" id="editBrandModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Brand</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_brand_id">

                    <div class="mb-3">
                        <label>Brand Name</label>
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
                    <button class="btn btn-primary" id="updateBrandBtn">Update</button>
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
        $('#brandTable').DataTable();
    </script>

    <!-- Page specific script -->
    <script>
        // Add brand image preview
        $('#logo').on('change', function() {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#add_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });

        function deleteBrand(button) {
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
                    let url = "{{ route('admin.brand.destroy', ':id') }}";
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

        function updateBrandStatus(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "Will update Brand status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateBrandStatusAjax(element);
                } else {
                    element.checked = !element.checked;
                }
            })
        }

        function updateBrandStatusAjax(element) {
            const id = $(element).data('id');
            let url = "{{ route('admin.brand.status.update', ':id') }}";
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
        $(document).on('click', '.editBrandBtn', function() {

            $('#edit_brand_id').val($(this).data('id'));
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
            $('#editBrandModal').modal('show');
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
            $('#editBrandModal').modal('hide');
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

        // 🔹 Update Brand
        $(document).on('click', '#updateBrandBtn', function() {

            let id = $('#edit_brand_id').val();
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
                url: "{{ route('admin.brand.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $('#updateBrandBtn').prop('disabled', true).text('Updating...');
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
                    $('#updateBrandBtn').prop('disabled', false).text('Update');
                }
            });

        });
    </script>

    <script>
        // Add button → show form and hide button
        $('#addBrand').click(function() {
            $('#addBrandField').slideDown(300);
            $(this).hide();
        });

        // X button → hide form and show button
        $('#closeBrandForm').click(function() {
            $('#addBrandField').slideUp(300);
            $('#addBrand').show();
        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addBrandField').show();
                $('#addBrand').hide();
            });
        </script>
    @endif
@endpush
