@extends('backend.layouts.app')
@section('title', 'Coupons')
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
            <div class="col-lg-12 m-auto" id="addCouponField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Coupon
                        </h3>
                        <button id="closeCouponForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="coupon_type">Coupon type</label>
                                        <select name="coupon_type" id="coupon_type" class="form-control" required>
                                            <option value="" disabled>Select Coupon Type</option>
                                            <option value="discount_on_purchase">Discount on Purchase</option>
                                            <option value="free_delivery">Free Delivery</option>
                                        </select>
                                        @error('coupon_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="coupon_title">Coupon title</label>
                                        <input type="text" name="coupon_title" id="coupon_title" class="form-control"
                                            placeholder="Coupon Title">
                                        @error('coupon_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="coupon_code">Coupon code</label>
                                        <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                                            placeholder="Coupon code">
                                        @error('coupon_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="coupon_limit">Coupon Limit</label>
                                        <input type="number" name="coupon_limit" id="coupon_limit" class="form-control"
                                            placeholder="Coupon Limit">
                                        @error('coupon_limit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="discount_type">Discount Type</label>
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="" disabled>Select Discount Type</option>
                                            <option value="amount">Amount</option>
                                            <option value="percentage">Percentage (%)</option>
                                        </select>
                                        @error('discount_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="discount_amount">Discount Amount</label>
                                        <input type="text" name="discount_amount" id="discount_amount"
                                            class="form-control" placeholder="Coupon Amount FLAT or PERCENTAGE">
                                        @error('discount_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="minimum_purchase">Minimum Purchase</label>
                                        <input type="text" name="minimum_purchase" id="minimum_purchase"
                                            class="form-control" placeholder="Minimum Purchase">
                                        @error('minimum_purchase')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="expire_date">Expire date</label>
                                        <input type="date" name="expire_date" id="expire_date" class="form-control">
                                        @error('expire_date')
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
                        <h3 class="block-title">
                            Coupon List
                        </h3>
                        <button id="addCoupon" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Coupon</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="couponTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="">Coupon</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Limit</th>
                                    <th>Expire date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $key => $coupon)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <span>{{ $coupon->coupon_title }}</span>
                                            <span class="d-block">Code: <span
                                                    class="text-success fw-bold">{{ $coupon->coupon_code }}</span></span>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            {{ $coupon->coupon_type == 'discount_on_purchase' ? 'Discount on purchase' : 'Free Delivery' }}
                                        </td>
                                        <td class="fw-semibold fs-sm">{{ $coupon->coupon_limit }}</td>
                                        <td class="fw-semibold fs-sm">
                                            {{ $coupon->expire_date->format('d-m-Y') }}
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $coupon->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $coupon->id }}" data-status="{{ $coupon->status }}"
                                                    onchange="updateCouponStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editCouponBtn"
                                                data-id="{{ $coupon->id }}" data-title="{{ $coupon->coupon_title }}"
                                                data-code="{{ $coupon->coupon_code }}"
                                                data-type="{{ $coupon->coupon_type }}"
                                                data-discount_type="{{ $coupon->discount_type }}"
                                                data-discount_amount="{{ $coupon->discount_amount }}"
                                                data-minimum_purchase="{{ $coupon->minimum_purchase }}"
                                                data-coupon_limit="{{ $coupon->coupon_limit }}"
                                                data-expire="{{ $coupon->expire_date->format('Y-m-d') }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteCoupon(this)" data-id="{{ $coupon->id }}"><i
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

    <div class="modal fade" id="editCouponModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Coupon</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_coupon_id">

                    <div class="mb-3">
                        <label>Coupon Type</label>
                        <select id="edit_coupon_type" class="form-control">
                            <option value="discount_on_purchase">Discount on Purchase</option>
                            <option value="free_delivery">Free Delivery</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Coupon Title</label>
                        <input type="text" id="edit_coupon_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Coupon Code</label>
                        <input type="text" id="edit_coupon_code" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Coupon Limit</label>
                        <input type="text" id="edit_coupon_limit" class="form-control">
                    </div>



                    <div class="mb-3">
                        <label>Discount Type</label>
                        <select id="edit_discount_type" class="form-control">
                            <option value="amount">Amount</option>
                            <option value="percentage">Percentage</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Discount Amount</label>
                        <input type="text" id="edit_discount_amount" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Minimum Purchase</label>
                        <input type="text" id="edit_minimum_purchase" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Expire Date</label>
                        <input type="date" id="edit_expire_date" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateCouponBtn">Update</button>
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
        // ==============================
        // DATATABLE INIT
        // ==============================
        $('#couponTable').DataTable();


        // ==============================
        // ADD COUPON SHOW / HIDE
        // ==============================
        $('#addCoupon').click(function() {
            $('#addCouponField').slideDown(300);
            $(this).hide();
        });

        $('#closeCouponForm').click(function() {
            $('#addCouponField').slideUp(300);
            $('#addCoupon').show();
        });


        // ==============================
        // DELETE COUPON
        // ==============================
        function deleteCoupon(button) {
            const id = $(button).data('id');

            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    let url = "{{ route('admin.coupon.destroy', ':id') }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'POST', // 🔥 CHANGE
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE' // 🔥 IMPORTANT
                        },

                        success: function(data) {
                            if (data.success) {
                                showToast(data.message, "success");
                                $(button).closest('tr').remove();
                            }
                        },

                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        }


        // ==============================
        // UPDATE STATUS
        // ==============================
        function updateCouponStatus(element) {

            Swal.fire({
                title: "Are you sure?",
                text: "Update coupon status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes Update"
            }).then((result) => {

                if (result.isConfirmed) {
                    updateCouponStatusAjax(element);
                } else {
                    element.checked = !element.checked;
                }

            });
        }

        function updateCouponStatusAjax(element) {

            const id = $(element).data('id');

            let url = "{{ route('admin.coupon.status.update', ':id') }}";
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

                error: function() {
                    showToast('Something went wrong', "error");
                }
            });
        }


        // ==============================
        // EDIT BUTTON CLICK
        // ==============================
        $(document).on('click', '.editCouponBtn', function() {

            $('#edit_coupon_id').val($(this).data('id'));
            $('#edit_coupon_title').val($(this).data('title'));
            $('#edit_coupon_code').val($(this).data('code'));
            $('#edit_coupon_type').val($(this).data('type'));
            $('#edit_coupon_limit').val($(this).data('coupon_limit'));
            $('#edit_discount_type').val($(this).data('discount_type'));
            $('#edit_discount_amount').val($(this).data('discount_amount'));
            $('#edit_minimum_purchase').val($(this).data('minimum_purchase'));
            $('#edit_expire_date').val($(this).data('expire'));

            $('#editCouponModal').modal('show');
        });


        // ==============================
        // CLOSE MODAL
        // ==============================
        $(document).on('click', '#closeEditModal', function() {
            $('#editCouponModal').modal('hide');
        });


        // ==============================
        // UPDATE COUPON
        // ==============================
        $(document).on('click', '#updateCouponBtn', function() {

            let id = $('#edit_coupon_id').val();

            $.ajax({
                url: "{{ route('admin.coupon.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    coupon_title: $('#edit_coupon_title').val(),
                    coupon_code: $('#edit_coupon_code').val(),
                    coupon_type: $('#edit_coupon_type').val(),
                    coupon_limit: $('#edit_coupon_limit').val(),
                    discount_type: $('#edit_discount_type').val(),
                    discount_amount: $('#edit_discount_amount').val(),
                    minimum_purchase: $('#edit_minimum_purchase').val(),
                    expire_date: $('#edit_expire_date').val(),
                },

                beforeSend: function() {
                    $('#updateCouponBtn').prop('disabled', true).text('Updating...');
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
                    $('#updateCouponBtn').prop('disabled', false).text('Update');
                }
            });

        });


        // ==============================
        // VALIDATION ERROR → SHOW FORM
        // ==============================
        @if ($errors->any())
            $(document).ready(function() {
                $('#addCouponField').show();
                $('#addCoupon').hide();
            });
        @endif
    </script>

    <script>
        // ==============================
        // TOGGLE DISCOUNT FIELDS ON CREATE
        // ==============================
        function toggleDiscountFieldsCreate() {
            const type = $('#coupon_type').val();
            if (type === 'free_delivery') {
                $('#discount_type').closest('.col-lg-3').hide();
                $('#discount_amount').closest('.col-lg-3').hide();
            } else {
                $('#discount_type').closest('.col-lg-3').show();
                $('#discount_amount').closest('.col-lg-3').show();
            }
        }

        $('#coupon_type').on('change', toggleDiscountFieldsCreate);
        $(document).ready(toggleDiscountFieldsCreate);

        // ==============================
        // TOGGLE DISCOUNT FIELDS ON EDIT MODAL
        // ==============================
        function toggleDiscountFieldsEdit() {
            const type = $('#edit_coupon_type').val();
            if (type === 'free_delivery') {
                $('#edit_discount_type').closest('.mb-3').hide();
                $('#edit_discount_amount').closest('.mb-3').hide();
            } else {
                $('#edit_discount_type').closest('.mb-3').show();
                $('#edit_discount_amount').closest('.mb-3').show();
            }
        }

        $('#edit_coupon_type').on('change', toggleDiscountFieldsEdit);
        $(document).ready(toggleDiscountFieldsEdit);

        // Also call toggleDiscountFieldsEdit whenever edit modal is opened
        $(document).on('click', '.editCouponBtn', function() {
            toggleDiscountFieldsEdit();
        });

        // ==============================
        // CONDITIONAL FORM VALIDATION
        // ==============================
        $('form').on('submit', function(e) {
            const type = $('#coupon_type').val();
            if (type === 'discount_on_purchase') {
                const discountType = $('#discount_type').val();
                const discountAmount = $('#discount_amount').val().trim();

                let error = false;
                if (!discountType) {
                    alert('Please select a discount type.');
                    error = true;
                }
                if (!discountAmount) {
                    alert('Please enter a discount amount.');
                    error = true;
                }

                if (error) {
                    e.preventDefault(); // stop form submission
                    return false;
                }
            }
        });
    </script>
@endpush
