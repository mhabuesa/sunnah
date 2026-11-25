@extends('backend.layouts.app')
@section('title', 'Special Deal')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">

    <style>
        #drop-area {
            transition: all 0.3s ease;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #drop-area:hover {
            background-color: #f0f7ff !important;
            border-color: #2980b9 !important;
        }

        .border-dashed {
            border-style: dashed !important;
        }

        .select2-results__options li {
            color: #ffff !important;
        }
    </style>
@endpush
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 m-auto" id="addSpecialDealField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add Special Deal Product
                        </h3>
                        <button id="closeSpecialDealForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.specialDeal.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="product_id">Product</label>
                                        <select class="js-select2 form-select" id="product" name="product_id"
                                            style="width: 100%;" required>
                                        </select>
                                        @error('product_id')
                                            <span class="text-danger">The Product has already been taken.</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="validity">Validity Date</label>
                                        <input type="date" class="form-control" name="validity" required>
                                        @error('validity')
                                            <span class="text-danger">Please Enter a Valid Date</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="count">Validity Count</label>
                                        <input type="number" class="form-control" name="count"
                                            placeholder="Enter a Number" required>
                                        @error('count')
                                            <span class="text-danger">Please Enter a Valid Count</span>
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
                        <h3 class="block-title">
                            Special Deal List
                        </h3>
                        <button id="addSpecialDeal" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            SpecialDeal</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="specialDealTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Product</th>
                                    <th>Available</th>
                                    <th>Sold</th>
                                    <th>Validity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialDeals as $key => $specialDeal)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <img src="{{ asset($specialDeal->product->image) }}" width="25"
                                                alt="">
                                            <span class="text-capitalize mx-2">{{ $specialDeal->product->name }}</span>
                                        </td>
                                        <td class="text-center fs-sm">{{ $specialDeal->available }}</td>
                                        <td class="text-center fs-sm">{{ $specialDeal->sold }}</td>
                                        <td class="text-center fs-sm">{{ $specialDeal->validity->format('d-m-Y') }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $specialDeal->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $specialDeal->id }}"
                                                    data-status="{{ $specialDeal->status }}"
                                                    onchange="updateSpecialDealStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editOfferBtn"
                                                data-id="{{ $specialDeal->id }}"
                                                data-product_id="{{ $specialDeal->product_id }}"
                                                data-product_name="{{ $specialDeal->product->name }}"
                                                data-validity="{{ $specialDeal->validity->format('Y-m-d') }}"
                                                data-available="{{ $specialDeal->available }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteSpecialDeal(this)" data-id="{{ $specialDeal->id }}"><i
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


    <!-- Edit Special Deal Modal -->
    <div class="modal fade" id="editSpecialDealModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Special Deal</h5>
                    <button type="button" class="btn-close" id="closeEditModal"></button>
                </div>
                <div class="modal-body">
                    <form id="editSpecialDealForm">
                        @csrf
                        <input type="hidden" id="edit_deal_id" name="id">

                        <div class="mb-3">
                            <label class="form-label" for="edit_product_id">Product</label>
                            <select class="form-select" id="edit_product_id" name="product_id" style="width: 100%;"
                                required>
                                @if (!empty($products))
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit_validity">Validity Date</label>
                            <input type="date" id="edit_validity" name="validity" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit_available">Available / Count</label>
                            <input type="number" id="edit_available" name="count" class="form-control"
                                min="0" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelEditModal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="updateSpecialDealBtn">Update</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('footer_scripts')
    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);
    </script>

    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        $(document).ready(function() {

            // ==============================
            // DATATABLE INIT
            // ==============================
            $('#specialDealTable').DataTable();


            // ==============================
            // ADD FORM SHOW / HIDE
            // ==============================
            $('#addSpecialDeal').click(function() {
                $('#addSpecialDealField').slideDown(300);
                $(this).hide();
            });

            $('#closeSpecialDealForm').click(function() {
                $('#addSpecialDealField').slideUp(300);
                $('#addSpecialDeal').show();
            });


            // ==============================
            // DELETE BANNER
            // ==============================
            window.deleteSpecialDeal = function(button) {

                let id = $(button).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This Special Deal Product will be deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {

                        let url = "{{ route('admin.specialDeal.destroy', ':id') }}";
                        url = url.replace(':id', id);

                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                _method: 'DELETE'
                            },

                            success: function(res) {
                                if (res.success) {
                                    showToast(res.message, "success");
                                    $(button).closest('tr').remove();
                                } else {
                                    showToast(res.message, "error");
                                }
                            },

                            error: function() {
                                showToast("Delete failed", "error");
                            }
                        });

                    }
                });
            }


            // ==============================
            // STATUS UPDATE
            // ==============================
            window.updateSpecialDealStatus = function(el) {

                Swal.fire({
                    title: "Are you sure?",
                    text: "Change Special Deal status?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes Update"
                }).then((result) => {

                    if (result.isConfirmed) {
                        updateStatusAjax(el);
                    } else {
                        el.checked = !el.checked;
                    }

                });
            }

            function updateStatusAjax(el) {

                let id = $(el).data('id');

                let url = "{{ route('admin.specialDeal.status.update', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(res) {
                        if (res.success) {
                            showToast(res.message, "success");
                        } else {
                            showToast(res.message, "error");
                        }
                    },

                    error: function() {
                        showToast("Status update failed", "error");
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#product').select2({
                placeholder: "Select Product",
                minimumInputLength: 3,
                ajax: {
                    url: "{{ route('admin.specialDeal.searchProduct') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term // search text
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addSpecialDealField').show();
                $('#addSpecialDeal').hide();
            });
        </script>
    @endif



    <script>
        // ==============================
        // EDIT MODAL OPEN & POPULATE
        // ==============================
        $(document).on('click', '.editOfferBtn', function() {
            const data = $(this).data();

            $('#edit_deal_id').val(data.id);
            $('#edit_validity').val(data.validity);
            $('#edit_available').val(data.available);

            // Select option set করা
            if ($('#edit_product_id option[value="' + data.product_id + '"]').length === 0 && data.product_name) {
                $('#edit_product_id').append(new Option(data.product_name, data.product_id, true, true));
            }
            $('#edit_product_id').val(data.product_id).trigger('change');

            $('#editSpecialDealModal').modal('show');
        });

        // Close Modal
        $('#closeEditModal, #cancelEditModal').on('click', function() {
            $('#editSpecialDealModal').modal('hide');
        });

        // ==============================
        // AJAX UPDATE
        // ==============================
        $('#updateSpecialDealBtn').on('click', function() {
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('id', $('#edit_deal_id').val());
            formData.append('product_id', $('#edit_product_id').val());
            formData.append('validity', $('#edit_validity').val());
            formData.append('count', $('#edit_available').val());

            $.ajax({
                url: "{{ route('admin.specialDeal.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#updateSpecialDealBtn').prop('disabled', true).text('Updating...');
                },
                success: function(res) {
                    if (res.success) {
                        showToast(res.message || "Special deal updated successfully", "success");
                        $('#editSpecialDealModal').modal('hide');
                        location.reload();
                    } else {
                        showToast(res.message || "Update failed", "error");
                    }
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON?.message || "Something went wrong";
                    showToast(msg, "error");
                },
                complete: function() {
                    $('#updateSpecialDealBtn').prop('disabled', false).text('Update');
                }
            });
        });
    </script>
@endpush
