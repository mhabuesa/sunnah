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

        img {
            transition: 0.3s ease;
        }
    </style>
@endpush
@section('content')
    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <img class="png_icon" src="{{ asset('assets/icon/png/settings1.png') }}" alt=""> App Settings
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <form id="productForm" action="{{ route('admin.settings.app.invoice.update') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-8 m-auto mt-2">
                    <div class="block block-rounded pb-2">
                        @include('backend.settings.partials.tab_header')
                        <div class="block-content tab-content">
                            <div class="tab-pane active show" id="btabs-alt-static-home" role="tabpanel"
                                aria-labelledby="btabs-alt-static-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="invoice_type" class="form-label">Invoice Type</label>
                                            <select name="invoice_type" class="form-control" id="invoice_type">
                                                <option {{$data->invoice == 'thermal' ?'selected' :''}} value="thermal">Thermal Receipt</option>
                                                <option {{$data->invoice == 'invoice' ?'selected' :''}} value="invoice">Normal Paper Invoice</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 text-center">
                                            <label class="form-label d-block">Preview</label>

                                            <img id="thermal_img" src="{{ asset('assets/img/thermal.jpg') }}" height="150"
                                                alt="">
                                            <img id="invoice_img" src="{{ asset('assets/img/invoice.jpg') }}" height="150"
                                                alt="" style="display:none;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-primary w-25 mx-2" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
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
        const select = document.getElementById('invoice_type');
        const thermalImg = document.getElementById('thermal_img');
        const invoiceImg = document.getElementById('invoice_img');

        function updateImage() {
            if (select.value === 'thermal') {
                thermalImg.style.display = 'inline-block';
                invoiceImg.style.display = 'none';
            } else {
                thermalImg.style.display = 'none';
                invoiceImg.style.display = 'inline-block';
            }
        }

        // on change
        select.addEventListener('change', updateImage);

        // page load e default set
        updateImage();
    </script>
@endpush
