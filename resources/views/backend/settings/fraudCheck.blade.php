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
                                <form action="{{ route('admin.settings.app.fraudCheck.update') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="block block-rounded border">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title text-capitalize">BD Courier Fraud Checker Config</h3>
                                                @if (isset($fraudCheck['bdCourier']) && $fraudCheck['bdCourier']->exists)
                                                    <div class="form-check form-switch text-center">
                                                        <input class="form-check-input" id="status" type="checkbox"
                                                            {{ $fraudCheck['bdCourier']->status == '1' ? 'checked' : '' }}
                                                            name="status" onchange="updateBdCourierStatus(this)">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="block-content block-content-full overflow-x-auto">
                                                <div class="mb-3">
                                                    <label for="api_key" class="form-label">Api Key</label>
                                                    <input type="text" class="form-control" id="api_key"
                                                        name="api_key" placeholder="Enter Api Key"
                                                        value="{{ old('api_key') ?? $fraudCheck['bdCourier']->api_key }}">
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button class="btn btn-primary w-25 mx-2" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        function updateBdCourierStatus(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "Will update Steadfast status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update it!",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }).then(result => {
                if (!result.isConfirmed) {
                    element.checked = !element.checked;
                    return;
                }

                $.ajax({
                    url: "{{ route('admin.settings.app.fraudCheck.status') }}",
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: res => showToast(res.message, res.success ? "success" : "error"),
                    error: err => {
                        console.log(err.responseText);
                        showToast('Something went wrong', "error");
                    }
                });
            });
        }

        
    </script>
@endpush
