@extends('backend.layouts.app')
@section('title', 'Todays Deal')
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
    </style>
@endpush
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 m-auto" id="addTodaysDealField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add Todays Deal Product
                        </h3>
                        <button id="closeTodaysDealForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.todaysDeal.store') }}" method="POST">
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
                            TodaysDeal List
                        </h3>
                        <button id="addTodaysDeal" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            TodaysDeal</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="todaysDealTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todaysDeals as $key => $todaysDeal)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <img src="{{ asset($todaysDeal->product->image) }}" width="25"
                                                alt="">
                                            <span class="text-capitalize mx-2">{{ $todaysDeal->product->name }}</span>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $todaysDeal->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $todaysDeal->id }}"
                                                    data-status="{{ $todaysDeal->status }}"
                                                    onchange="updateTodaysDealStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteTodaysDeal(this)" data-id="{{ $todaysDeal->id }}"><i
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
            $('#todaysDealTable').DataTable();


            // ==============================
            // ADD FORM SHOW / HIDE
            // ==============================
            $('#addTodaysDeal').click(function() {
                $('#addTodaysDealField').slideDown(300);
                $(this).hide();
            });

            $('#closeTodaysDealForm').click(function() {
                $('#addTodaysDealField').slideUp(300);
                $('#addTodaysDeal').show();
            });


            // ==============================
            // DELETE BANNER
            // ==============================
            window.deleteTodaysDeal = function(button) {

                let id = $(button).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This Todays Deal Product will be deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {

                        let url = "{{ route('admin.todaysDeal.destroy', ':id') }}";
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
            window.updateTodaysDealStatus = function(el) {

                Swal.fire({
                    title: "Are you sure?",
                    text: "Change Todays Deal status?",
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

                let url = "{{ route('admin.todaysDeal.status.update', ':id') }}";
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
                    url: "{{ route('admin.todaysDeal.searchProduct') }}",
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
                $('#addTodaysDealField').show();
                $('#addTodaysDeal').hide();
            });
        </script>
    @endif
@endpush
