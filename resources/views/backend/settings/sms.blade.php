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
                <img class="png_icon" src="{{ asset('assets/icon/png/settings1.png') }}" alt=""> App Settings
            </h1>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-7 m-auto mt-2">
                <div class="block block-rounded pb-2">
                    @include('backend.settings.partials.tab_header')
                    <div class="block-content tab-content">
                        <div class="tab-pane active show" id="btabs-alt-static-home" role="tabpanel"
                            aria-labelledby="btabs-alt-static-home-tab" tabindex="0">
                            <div class="row">
                                <form action="{{ route('admin.settings.app.sms.update') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="block block-rounded border">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title text-capitalize">Bulk SMS BD Config</h3>
                                            </div>
                                            <div class="block-content block-content-full overflow-x-auto">
                                                <div class="mb-3">
                                                    <label for="api_key" class="form-label">Api Key</label>
                                                    <input type="text" class="form-control" name="api_key" id="api_key"
                                                        placeholder="Enter Api Key"
                                                        value="{{ old('api_key') ?? $smsConfig?->api_key }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sender_id" class="form-label">Sender ID</label>
                                                    <input type="text" class="form-control" name="sender_id"
                                                        id="sender_id" placeholder="Enter Sender ID"
                                                        value="{{ old('sender_id') ?? $smsConfig?->sender_id }}">
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button class="btn btn-primary w-25 mx-2" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-lg-12">
                                    <div class="block block-rounded border">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title text-capitalize">SMS Service Config</h3>
                                        </div>

                                        <div class="block-content block-content-full overflow-x-auto">

                                            <!-- Account Create -->
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <label class="form-label mb-0">
                                                    Welcome SMS (Customer Create from POS)
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="account_create_sms"
                                                        {{ $smsConfig?->account_create_sms == 1 ? 'checked' : '' }}
                                                        onchange="updateSmsSetting('account_create_sms', this)">
                                                </div>
                                            </div>

                                            <!-- Order Placed -->
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <label class="form-label mb-0">
                                                    Order Confirmation SMS
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="order_placed_sms"
                                                        {{ $smsConfig?->order_placed_sms == 1 ? 'checked' : '' }}
                                                        onchange="updateSmsSetting('order_placed_sms', this)">
                                                </div>
                                            </div>

                                            <!-- Sent to Delivery -->
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <label class="form-label mb-0">
                                                    Order Send to Delivery SMS
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="sent_to_delivery_sms"
                                                        {{ $smsConfig?->sent_to_delivery_sms == 1 ? 'checked' : '' }}
                                                        onchange="updateSmsSetting('sent_to_delivery_sms', this)">
                                                </div>
                                            </div>

                                            <!-- Order Cancelled -->
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <label class="form-label mb-0">
                                                    Order Canceled SMS
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="order_canceled_sms"
                                                        {{ $smsConfig?->order_canceled_sms == 1 ? 'checked' : '' }}
                                                        onchange="updateSmsSetting('order_canceled_sms', this)">
                                                </div>
                                            </div>

                                            <!-- Order Cancelled -->
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <label class="form-label mb-0">
                                                    Delivery Success SMS
                                                </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="order_canceled_sms"
                                                        {{ $smsConfig?->delivery_success_sms == 1 ? 'checked' : '' }}
                                                        onchange="updateSmsSetting('delivery_success_sms', this)">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function updateSmsSetting(type, el) {

            let isChecked = el.checked;

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to change this SMS setting?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "Cancel"
            }).then((result) => {

                if (result.isConfirmed) {

                    let value = isChecked ? 1 : 0;

                    // disable toggle while loading
                    el.disabled = true;

                    fetch("{{ route('admin.settings.app.sms.config.update') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                type: type,
                                value: value
                            })
                        })
                        .then(res => res.json())
                        .then(data => {

                            el.disabled = false;

                            if (data.status) {
                                showToast('SMS setting updated successfully', 'success');
                            } else {
                                // revert toggle
                                el.checked = !isChecked;

                                Swal.fire("Error", "Failed to update", "error");
                            }

                        })
                        .catch(error => {

                            el.disabled = false;

                            // revert toggle
                            el.checked = !isChecked;

                            Swal.fire("Error", "Server error!", "error");
                        });

                } else {
                    // cancel করলে আগের state এ ফিরিয়ে দাও
                    el.checked = !isChecked;
                }

            });
        }
    </script>
@endpush
