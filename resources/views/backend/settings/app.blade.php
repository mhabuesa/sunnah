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
        <form id="productForm" action="{{ route('admin.settings.app.core.update') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7 m-auto mt-2">
                    <div class="block block-rounded pb-2">
                        @include('backend.settings.partials.tab_header')
                        <div class="block-content tab-content">
                            <div class="tab-pane active show" id="btabs-alt-static-home" role="tabpanel"
                                aria-labelledby="btabs-alt-static-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="app_name" class="form-label">App Name</label>
                                            <input type="text" id="app_name" class="form-control" name="app_name"
                                                value="{{old('app_name') ?? $data?->app_name}}" placeholder="App Name" required>
                                            @error('app_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="app_url" class="form-label">App URL</label>
                                            <input type="text" id="app_url" class="form-control" name="app_url"
                                                value="{{old('app_url') ?? $data?->app_url}}" placeholder="App Url" required>
                                            @error('app_url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="timezone" class="form-label">Time Zone</label>
                                            <select class="js-select2 form-select" id="timezone" name="timezone"
                                                style="width: 100%;" data-placeholder="Choose Time Zone..">
                                                @foreach ($timezones as $timezone)
                                                    <option {{old('timezone') == $timezone ?'selected':''}} {{ $data?->timezone == $timezone ?'selected':''}} value="{{ $timezone }}">{{ $timezone }}</option>
                                                @endforeach
                                            </select>
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
@endpush
