@extends('backend.layouts.app')
@section('title', 'Sunnah Subcategory')
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
            <div class="col-lg-4 m-auto" id="addSubcategoryField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add New Subcategory</h3>
                        <button id="closeSubcategoryForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.sunnah.subcategory.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label d-block" for="category">Select Category</label>
                                <select name="category" id="category" class="js-select2 form-select" required>
                                    <option value="" disabled selected>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="subcategory">Subcategory Name </label>
                                <input type="text" name="subcategory" id="subcategory" class="form-control"
                                    placeholder="Subcategory Name" value="{{ old('subcategory') }}" required>
                                @error('subcategory')
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
                        <h3 class="block-title">Subcategory List</h3>
                        <button id="addSubcategory" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Subcategory</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="subcategoryTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Subcategory</th>
                                    <th>Category</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $key => $subcategory)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $subcategory->subcategory }}</td>
                                        <td class="fw-semibold fs-sm text-success">{{ $subcategory->category->category }}</td>
                                        <td class="fs-sm">{{ $subcategory->priority }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $subcategory->status == 1 ? 'checked' : '' }}
                                                    data-id="{{ $subcategory->id }}"
                                                    onchange="updateSubcategoryStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center fs-xl">

                                            <button type="button" class="border-0 btn btn-sm editSubcategoryBtn"
                                                data-id="{{ $subcategory->id }}"
                                                data-category="{{ $subcategory->category_id }}"
                                                data-subcategory="{{ $subcategory->subcategory }}"
                                                data-priority="{{ $subcategory->priority }}"
                                                data-slug="{{ $subcategory->slug }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteSubcategory(this)" data-id="{{ $subcategory->id }}">
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

    <!-- Edit Subcategory Modal -->
    <div class="modal fade" id="editSubcategoryModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subcategory</h5>
                </div>
                <div class="modal-body">
                    <form id="editSubcategoryForm" enctype="multipart/form-data">
                        <input type="hidden" id="edit_subcategory_id">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label d-block" for="edit_category">Select Category</label>
                                <select name="category" id="edit_category" class="form-select" required>
                                    <option value="" disabled>Select category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Subcategory Name</label>
                                <input type="text" id="edit_subcategory" class="form-control">
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
                    <button class="btn btn-primary" id="updateSubcategoryBtn">Update</button>
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
        $('#subcategoryTable').DataTable();

        $('#addSubcategory').click(function() {
            $('#addSubcategoryField').slideDown(300);
            $(this).hide();
        });

        $('#closeSubcategoryForm').click(function() {
            $('#addSubcategoryField').slideUp(300);
            $('#addSubcategory').show();
        });

        function updateSubcategoryStatus(element) {
            const id = $(element).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Update Subcategory status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes Update"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.sunnah.subcategory.status.update', ':id') }}".replace(':id',
                            id),
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

        function deleteSubcategory(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "The Subcategory will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.sunnah.subcategory.destroy', ':id') }}".replace(':id', id),
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

        $(document).on('click', '.editSubcategoryBtn', function() {
            const data = $(this).data();

            $('#edit_subcategory_id').val(data.id);
            $('#edit_category').val(data.category);
            $('#edit_subcategory').val(data.subcategory);
            $('#edit_priority').val(data.priority);
            $('#edit_slug').val(data.slug);
            $('#editSubcategoryModal').modal('show');
        });

        function toggleEditFields() {
            const type = $('#edit_type').val();
            if (type === 'product') {
                $('#edit_coupon_div').hide();
            } else {
                $('#edit_product_div').hide();
                $('#edit_coupon_div').show();
            }
        }

        $('#edit_type').on('change', toggleEditFields);

        $('#closeEditModal').click(function() {
            $('#editSubcategoryModal').modal('hide');
        });

        function previewEditImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#editImagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#updateSubcategoryBtn').click(function() {
            let formData = new FormData($('#editSubcategoryForm')[0]);
            formData.append('id', $('#edit_subcategory_id').val());
            formData.append('category', $('#edit_category').val());
            formData.append('subcategory', $('#edit_subcategory').val());
            formData.append('priority', $('#edit_priority').val());
            formData.append('slug', $('#edit_slug').val());
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('admin.sunnah.subcategory.update', ['id' => '__ID__']) }}".replace('__ID__',
                    $(
                        '#edit_subcategory_id').val()),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#updateSubcategoryBtn').prop('disabled', true).text('Updating...');
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
                    $('#updateSubcategoryBtn').prop('disabled', false).text('Update');
                }
            });
        });
    </script>
@endpush
