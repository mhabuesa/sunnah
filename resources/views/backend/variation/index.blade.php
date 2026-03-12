@extends('backend.layouts.app')
@section('title', 'Attributes Setup')
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
            <div class="col-lg-6 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Color
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.attribute.color.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="category">Color </label>
                                <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}" placeholder="Color Name">
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Attribute
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.attribute.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="category">Attribute</label>
                                <input type="text" class="form-control" id="attribute" name="attribute" value="{{ old('attribute') }}" placeholder="Variant Value">
                                @error('attribute')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                            Color List
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered  table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $key => $color)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $color->color }}</td>

                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editColorBtn"
                                                data-id="{{ $color->id }}" data-color="{{ $color->color }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteColor(this)" data-id="{{ $color->id }}"><i
                                                    class="fa fa-trash text-danger fa-xl"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-auto mt-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Attribute List
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered  table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Attribute</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $key => $attribute)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $attribute->attribute }}</td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editAttributeBtn"
                                                data-id="{{ $attribute->id }}" data-attribute="{{ $attribute->attribute }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteAttribute(this)" data-id="{{ $attribute->id }}"><i
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

    <div class="modal fade" id="editColorModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Color</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_color_id">

                    <div class="mb-3">
                        <label>Color</label>
                        <input type="text" id="edit_color" class="form-control">
                        <small class="text-danger d-none" id="colorError"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateColorBtn">Update</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editAttributeModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Category</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_attribute_id">

                    <div class="mb-3">
                        <label>Attribute</label>
                        <input type="text" id="edit_attribute" class="form-control">
                        <small class="text-danger d-none" id="attributeError"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeAttributeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateAttributeBtn">Update</button>
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
        function deleteColor(button) {
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
                    let url = "{{ route('admin.attribute.color.destroy', ':id') }}";
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


        function deleteAttribute(button) {
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
                    let url = "{{ route('admin.attribute.destroy', ':id') }}";
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
        // 🔹 Edit Color button click
        $(document).on('click', '.editColorBtn', function() {

            $('#edit_color_id').val($(this).data('id'));
            $('#edit_color').val($(this).data('color'));

            resetErrors();
            $('#editColorModal').modal('show');
        });

        // 🔹 Cancel
        $('#closeEditModal').on('click', function() {
            $('#editColorModal').modal('hide');
        });

        // 🔹 Reset errors
        function resetErrors() {
            $('#colorError').addClass('d-none').text('');
            $('#colorError').removeClass('is-invalid');
        }

        // 🔹 Input change hide errors
        $('#colorError').on('input', function() {
            resetErrors();
        });

        // 🔹 Update Color
        $('#updateColorBtn').on('click', function() {

            let id = $('#edit_color_id').val();

            resetErrors();

            $.ajax({
                url: "{{ route('admin.attribute.color.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    color: $('#edit_color').val().trim(),
                },
                beforeSend: function() {
                    $('#updateColorBtn')
                        .prop('disabled', true)
                        .text('Updating...');
                },
                success: function(res) {

                    if (res.errors) {
                        if (res.errors.color) {
                            $('#colorError').removeClass('d-none').text(res.errors.color[0]);
                            $('#edit_color').addClass('is-invalid');
                        }
                        return;
                    }

                    if (res.success) {
                        location.reload(); // session toast will show
                    }
                },
                complete: function() {
                    $('#updateColorBtn')
                        .prop('disabled', false)
                        .text('Update');
                }
            });
        });
    </script>


    <script>
        // 🔹 Edit Attribute button click
        $(document).on('click', '.editAttributeBtn', function() {

            $('#edit_attribute_id').val($(this).data('id'));
            $('#edit_attribute').val($(this).data('attribute'));

            resetErrors();
            $('#editAttributeModal').modal('show');
        });

        // 🔹 Cancel
        $('#closeAttributeEditModal').on('click', function() {
            $('#editAttributeModal').modal('hide');
        });

        // 🔹 Reset errors
        function resetErrors() {
            $('#attributeError').addClass('d-none').text('');
            $('#attributeError').removeClass('is-invalid');
        }

        // 🔹 Input change hide errors
        $('#attributeError').on('input', function() {
            resetErrors();
        });

        // 🔹 Update Attribute
        $('#updateAttributeBtn').on('click', function() {

            let id = $('#edit_attribute_id').val();

            resetErrors();

            $.ajax({
                url: "{{ route('admin.attribute.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    attribute: $('#edit_attribute').val().trim(),
                },
                beforeSend: function() {
                    $('#updateAttributeBtn')
                        .prop('disabled', true)
                        .text('Updating...');
                },
                success: function(res) {

                    if (res.errors) {
                        if (res.errors.attribute) {
                            $('#attributeError').removeClass('d-none').text(res.errors.attribute[0]);
                            $('#edit_attribute').addClass('is-invalid');
                        }
                        return;
                    }

                    if (res.success) {
                        location.reload(); // session toast will show
                    }
                },
                complete: function() {
                    $('#updateAttributeBtn')
                        .prop('disabled', false)
                        .text('Update');
                }
            });
        });
    </script>

@endpush
