@extends('backend.layouts.app')
@section('title', 'Steadfast Delivery')
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
                <form action="{{ route('admin.deliver.steadfast.submit') }}" method="POST">
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
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $order->customer->name }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recipient Phone <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $order->customer->phone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recipient Address <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $order->customer->address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>COD Amount <small class="text-danger">*</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="amount"
                                            value="{{ $order->total }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Important Note<small class="text-mute">(Optional)</small></th>
                                    <td>
                                        <input type="text" class="form-control" name="note"
                                            value="{{ $order->order_note }}">
                                    </td>
                                </tr>
                                <input type="hidden" name="order_id" value="{{$order->id}}">
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
@endpush
