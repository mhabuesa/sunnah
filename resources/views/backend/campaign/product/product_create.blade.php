@extends('backend.layouts.app')
@section('title', 'Add Product')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/custom/css/product_page.css">
@endpush
@section('content')

    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                <img class="png_icon" src="{{ asset('assets/icon/png/product_cart2.png') }}" alt=""> Add New Product
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <form id="productForm" action="{{ route('admin.campaign.product.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-3 mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Product Thumbnail</h3>
                        </div>

                        <div class="block-content block-content-full">
                            <div class="border rounded p-3 text-center" style="background:#f8f9fa; min-height: 220px;">

                                <div class="thumbnail-box" id="thumbnailBox">
                                    <span id="thumbnailText">Upload Image</span>
                                    <img id="thumbnailPreview" src="" style="display:none;">
                                    <input type="file" id="thumbnailInput" name="image" accept=".jpg,.jpeg,.png"
                                        hidden>
                                </div>

                                <small class="text-muted mt-2 d-block">
                                    Supported: <b>.jpg .jpeg .png</b> (400x500px)
                                </small>

                                @error('image')
                                    <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 m-auto mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Name & Price</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-6 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Product name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Product Name.." value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title <small class="text-muted">(Optional)</small></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Title.." value="{{ old('title') }}" required>
                                    </div>
                                    @error('title')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6 m-auto">
                                    <div class="mb-5">
                                        <label class="form-label" for="old_price">Old Price <small
                                                class="text-muted">(Optional)</small>
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Enter the Old price of this product before discount. This helps customers see the price difference."></i>
                                        </label>
                                        <input type="number" class="form-control" id="old_price" name="old_price"
                                            placeholder="Enter Old price">
                                    </div>
                                    @error('old_price')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6 m-auto">
                                    <div class="mb-5">
                                        <label class="form-label" for="current_price">Current Price
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Enter the current selling price of this product."></i>
                                        </label>
                                        <input type="number" class="form-control" id="current_price" name="price"
                                            placeholder="Enter current price">
                                    </div>
                                    @error('price')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 m-auto">
                                    <div class="mt-4 text-end">
                                        <button type="button" id="resetFormBtn"
                                            class="btn btn-outline-secondary">Reset</button>
                                        <button class="btn btn-primary  mx-2" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/custom/js/product_add_page.js"></script>
@endpush
