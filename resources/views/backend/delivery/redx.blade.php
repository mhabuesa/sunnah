@extends('backend.layouts.app')
@section('title', 'App Setting')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #main-container .content {
            padding-top: 0 !important
        }
    </style>
@endpush
@section('content')
    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <i class="fa-solid fa-truck-arrow-right"></i> Transfer to <span
                    class="text-capitalize">{{ $method }}</span>
            </h1>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10 m-auto mt-2">
                <form action="{{route('admin.deliver.redx.submit', $order->id)}}" method="POST">
                    @csrf
                    <div class="block block-rounded border">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Order Details</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <table class="table">
                                <tr>
                                    <th>Invoice ID</th>
                                    <td>
                                        <input type="text" class="form-control" name="invoice_id"
                                            value="{{ $order->invoice_no }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recipient Name <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ $order->customer->name }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recipient Phone <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            value="{{ $order->customer->phone }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delivery Area</th>
                                    <td>
                                        <select name="area_id" id="area_id" class="form-control js-select2" required>
                                            <option value="">Select Area</option>
                                        </select>

                                        <input type="hidden" name="area_name" id="area_name">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recipient Address <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $order->customer->address }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>COD Amount <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="cod"
                                            value="{{ $order->total }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Parcel Weight <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="weight"
                                            placeholder="Parcel Weight Ex: 500gm/1kg" value="200gm" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Important Note</th>
                                    <td>
                                        <input type="text" class="form-control" name="note" value=""
                                            placeholder="Ex: Handle With Care">
                                    </td>
                                </tr>
                            </table>
                            <div class="mb-2 text-center">
                                <button class="btn btn-primary w-25 mx-2" id="submitBtn" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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

    <script>
        $('form').on('submit', function(e) {

            // browser validation check
            if (!this.checkValidity()) {
                return;
            }


            var btn = $('#submitBtn');
            btn.prop('disabled', true);
            btn.html(`
            <span class="spinner-border spinner-border-sm" role="status"></span>
            Processing...
        `);
        });
    </script>
    <script>
        $(document).ready(function() {

            $.ajax({
                url: '{{ route('admin.deliver.redx.areas') }}',
                type: 'GET',
                beforeSend: function() {
                    $('#area_id').html('<option>Loading areas...</option>');
                },
                success: function(data) {
                    let options = '<option value="">Select Area</option>';

                    $.each(data, function(index, area) {
                        options += `<option value="${area.id}" data-name="${area.name}">
                                ${area.name}
                            </option>`;
                    });

                    $('#area_id').html(options);
                },
                error: function() {
                    $('#area_id').html('<option value="">Failed to load areas</option>');
                }
            });

            // set area name
            $('#area_id').on('change', function() {
                let name = $(this).find(':selected').data('name');
                $('#area_name').val(name);
            });

        });
    </script>
@endpush
