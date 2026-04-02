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
                                <form action="{{ route('admin.settings.app.delivery.steadfast') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="block block-rounded border">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title text-capitalize">Steadfast Delivery Config</h3>
                                            </div>
                                            <div class="block-content block-content-full overflow-x-auto">
                                                <div class="mb-3">
                                                    <label for="base_url" class="form-label">Base URL</label>
                                                    <input type="text" class="form-control" id="base_url"
                                                        name="base_url" placeholder="Enter base Url"
                                                        value="{{ old('base_url') ?? ($delivery['steadfast']->config['base_url'] ?? '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="api_key" class="form-label">Api Key</label>
                                                    <input type="text" class="form-control" name="api_key" id="api_key"
                                                        placeholder="Enter api_key"
                                                        value="{{ old('api_key') ?? ($delivery['steadfast']->config['api_key'] ?? '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="secret_key" class="form-label">Secret Key</label>
                                                    <input type="text" class="form-control" name="secret_key"
                                                        id="secret_key" placeholder="Enter secretKey"
                                                        value="{{ old('secret_key') ?? ($delivery['steadfast']->config['secret_key'] ?? '') }}">
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button class="btn btn-primary w-25 mx-2" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('admin.settings.app.delivery.pathao') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="block block-rounded border">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title text-capitalize">Pathao Delivery Config</h3>
                                            </div>
                                            <div class="block-content block-content-full overflow-x-auto">
                                                <div class="mb-3">
                                                    <label for="base_url" class="form-label">Base URL</label>
                                                    <input type="text" class="form-control" id="baseUrl" name="base_url"
                                                        placeholder="Enter base Url" value="{{old('base_url') ?? ($delivery['pathao']->config['base_url'] ?? '') }}">
                                                    @error('base_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="store_id" class="form-label">Store ID</label>
                                                    <input type="text" class="form-control" id="store_id"
                                                        name="store_id" placeholder="Enter store_id" value="{{old('store_id') ?? ($delivery['pathao']->config['store_id'] ?? '')}}">
                                                    @error('store_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="client_id" class="form-label">Client ID</label>
                                                    <input type="text" class="form-control" name="client_id"
                                                        id="client_id" placeholder="Enter client_id" value="{{old('client_id') ?? ($delivery['pathao']->config['client_id'] ?? '')}}">
                                                    @error('client_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="client_secret" class="form-label">Client Secret</label>
                                                    <input type="text" class="form-control" name="client_secret"
                                                        id="client_secret" placeholder="Enter client_secret" value="{{old('client_secret') ?? ($delivery['pathao']->config['client_secret'] ?? '')}}">
                                                    @error('client_secret')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="Enter username" value="{{old('username') ?? ($delivery['pathao']->config['username'] ?? '')}}">
                                                    @error('username')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="text" class="form-control" name="password"
                                                        id="password" placeholder="Enter password" value="{{old('password') ?? ($delivery['pathao']->config['password'] ?? '')}}">
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button class="btn btn-primary w-25 mx-2"
                                                        type="submit">Update</button>
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
        // Select2
        One.helpersOnLoad(['jq-select2']);
    </script>
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
