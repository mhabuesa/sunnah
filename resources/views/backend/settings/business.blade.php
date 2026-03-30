@extends('backend.layouts.app')
@section('title', 'Business Setting')
@push('style')
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
                <img class="png_icon" src="{{ asset('assets/icon/png/settings1.png') }}" alt=""> Business Settings
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <form id="productForm" action="{{ route('admin.settings.business.update') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Company information</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Company Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Company Name.." value="{{ $data?->name }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Phone.." value="{{ $data?->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter Email.." value="{{ $data?->email }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="powered">Powered By</label>
                                        <input type="text" class="form-control" id="powered" name="powered"
                                            placeholder="powered by" value="{{ $data?->powered }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Company Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Enter Company address.." value="{{ $data?->address }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Header Logo -->
                <div class="col-lg-4 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Website Header Logo</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="mb-3 text-center">
                                <img id="header_logo_preview"
                                    src="{{ $data?->header_logo ? asset($data?->header_logo) : 'https://placehold.co/600x400' }}"
                                    height="100" alt="">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="header_logo"
                                    onchange="if(this.files[0]) document.getElementById('header_logo_preview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Logo -->
                <div class="col-lg-4 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Website Footer Logo</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="mb-3 text-center">
                                <img id="footer_logo_preview"
                                    src="{{ $data?->footer_logo ? asset($data?->footer_logo) : 'https://placehold.co/600x400' }}"
                                    height="100" alt="">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="footer_logo"
                                    onchange="if(this.files[0]) document.getElementById('footer_logo_preview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favicon -->
                <div class="col-lg-4 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Website Favicon</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="mb-3 text-center">
                                <img id="favicon_preview"
                                    src="{{ $data?->favicon ? asset($data?->favicon) : 'https://placehold.co/600x400' }}"
                                    height="100" alt="">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="favicon"
                                    onchange="if(this.files[0]) document.getElementById('favicon_preview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3 text-center">
                <button class="btn btn-primary w-25 mx-2" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
