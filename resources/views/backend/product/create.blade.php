@extends('backend.layouts.app')
@section('title', 'Add Product')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/richtexteditor/rte_theme_default.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/custom/css/product_page.css">
    <script type="text/javascript" src="{{ asset('assets') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('assets') }}/richtexteditor/plugins/all_plugins.js'></script>
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
        <form id="productForm" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Name & Description</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="mb-3">
                                <label class="form-label" for="name">Product name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Product Name.." value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea id="description" name="description" required>
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">General setup</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Category<span
                                                class="text-danger">*</span></label>
                                        <select class="js-select2 form-select" id="category" name="category"
                                            style="width: 100%;" data-placeholder="Choose one.." required>
                                            <option></option>
                                            @foreach ($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="subcategory">Sub Category</label>
                                        <select class="js-select2 form-select" id="subcategory" name="subcategory"
                                            style="width: 100%;" data-placeholder="Choose Sub Category  ..">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="brand">Brand</label>
                                        <select class="js-select2 form-select" id="brand" name="brand"
                                            style="width: 100%;" data-placeholder="Choose brand..">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $key => $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="sku">SKU <i
                                                    class="fas fa-info-circle js-bs-tooltip-enabled"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Create a unique product code by clicking on the “Generate Code” button"></i></label>

                                            <a href="javascript:void(0)" id="generate_code" class="text-end">Generate
                                                Code</a>
                                        </div>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            placeholder="Enter Product SKU..">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Pricing & others</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-3 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Unit Price
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Set the selling price for each unit of this product. This Unit Price section won’t be applied if you set a variation wise price."></i>
                                        </label>
                                        <input type="number" class="form-control" id="unit_price" name="unit_price"
                                            placeholder="Unit Price..">
                                    </div>
                                </div>
                                <div class="col-lg-3 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="current_stock">Current stock qty
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Add the Stock Quantity of this product that will be visible to customers."></i>
                                        </label>
                                        <input type="number" class="form-control" id="current_stock"
                                            name="current_stock" value="0">
                                    </div>
                                </div>
                                <div class="col-lg-3 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="discount_type">Discount Type
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="If “Flat”  discount amount will be set as fixed amount. If “Percentage”  discount amount will be set as percentage."></i>
                                        </label>
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="flat">Flat</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 m-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="discount">Discount Amount
                                            <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Add the discount amount in percentage or a fixed value here."></i>
                                        </label>
                                        <input type="number" class="form-control" id="discount" name="discount"
                                            value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 m-auto mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <div class="d-flex">
                                <h3 class="block-title text-capitalize">Product Variation Setup</h3>
                                <div class="form-check form-switch text-center mx-3">
                                    <input class="form-check-input" id="status" type="checkbox">
                                </div>
                            </div>
                        </div>
                        <div id="variationBody" class="block-content block-content-full" style="display:none;">

                            <div id="variationContent">

                                <div id="variationContainer" class="d-flex flex-column gap-3">

                                    <div
                                        class="variationRow d-flex gap-3 overflow-auto py-2 align-items-end justify-content-center">

                                        <div class="flex-shrink-0" style="min-width: 150px;">
                                            <label class="form-label">Select Color</label>
                                            <select name="color[]" class="form-control">
                                                <option value="">Select Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="flex-shrink-0" style="min-width: 150px;">
                                            <label class="form-label">Select Attribute</label>
                                            <select name="attribute[]" class="form-control">
                                                <option value="">Select Attribute</option>
                                                @foreach ($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->attribute }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="flex-shrink-0" style="min-width: 150px;">
                                            <label class="form-label">Variation Wise Price</label>
                                            <input type="number" name="price_variation[]" class="form-control"
                                                placeholder="Price">
                                        </div>

                                        <div class="flex-shrink-0" style="min-width: 150px;">
                                            <label class="form-label">Variation Wise Stock</label>
                                            <input type="number" name="stock_variation[]" class="form-control"
                                                value="0">
                                        </div>

                                        <div class="flex-shrink-0 d-flex align-items-end" style="min-width: 50px;">
                                            <button type="button" class="btn btn-outline-danger removeRow">x</button>
                                        </div>

                                    </div>

                                </div>

                                <div class="addRowBtn text-center mt-3">
                                    <button type="button" class="btn btn-outline-success" id="addVariationRow">
                                        <i class="fa fa-plus"></i> Add Variation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        hidden required>
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


                <div class="col-9 mt-3">
                    <div class="block block-rounded additional-image-box">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Additional Product Images</h3>
                        </div>

                        <div class="block-content block-content-full h-100">
                            <div class="border rounded p-3 h-100" style="background:#f8f9fa">

                                <div id="imagePreviewContainer" class="d-flex flex-wrap gap-3"></div>

                                <small class="text-muted mt-2 d-block">
                                    Supported: <b>.jpg .jpeg .png</b>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Product video
                                <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Add the YouTube video link here. Only the YouTube-embedded link is supported."></i>
                            </h3>
                        </div>

                        <div class="block-content block-content-full h-100">
                            <label for="">Youtube video link <small class="text-info">(Optional please provide
                                    embed link not direct
                                    link.)</small></label>
                            <input type="text" name="video" class="form-control"
                                placeholder="Ex: https://www.youtube.com/embed/5R06LRdUCSE">
                        </div>
                    </div>
                </div>


                <div class="col-12 mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Seo section
                                <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Add meta titles descriptions and images for products, This will help more people to find them on search engines and see the right details while sharing on other social platforms"></i>
                            </h3>
                        </div>

                        <div class="block-content block-content-full h-100">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Meta Title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="6" placeholder="Meta Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Meta Image</label>
                                    <div class="metaImg-box mt-1" id="metaImgBox">
                                        <span id="metaImgText">Upload Image</span>
                                        <img id="metaImgPreview" src="" style="display:none;">
                                        <input type="file" id="metaImgInput" name="meta_image"
                                            accept=".jpg,.jpeg,.png" hidden>
                                    </div>

                                    @error('image')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="my-3 text-end">
                <button type="button" id="resetFormBtn" class="btn btn-outline-secondary">Reset</button>
                <button class="btn btn-primary  mx-2" type="submit">Submit</button>
            </div>
        </form>
    </div>


@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets') }}/custom/js/product_page.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const variationContainer = document.getElementById('variationContainer');
            const addBtn = document.getElementById('addVariationRow');

            // Function to create new variation row
            function createVariationRow() {
                const row = document.createElement('div');
                row.classList.add('variationRow', 'd-flex', 'gap-3', 'overflow-auto', 'py-2', 'align-items-end',
                    'justify-content-center');

                row.innerHTML = `
            <div class="flex-shrink-0" style="min-width: 150px;">
                <label class="form-label">Select Color</label>
                <select name="color[]" class="form-control">
                    <option value="">Select Color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-shrink-0" style="min-width: 150px;">
                <label class="form-label">Select Attribute</label>
                <select name="attribute[]" class="form-control">
                    <option value="">Select Attribute</option>
                    @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->attribute }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-shrink-0" style="min-width: 150px;">
                <label class="form-label">Variation Wise Price</label>
                <input type="number" name="price_variation[]" class="form-control" placeholder="Price">
            </div>
            <div class="flex-shrink-0" style="min-width: 150px;">
                <label class="form-label">Variation Wise Stock</label>
                <input type="number" name="stock_variation[]" class="form-control" value="0">
            </div>
            <div class="flex-shrink-0 d-flex align-items-end" style="min-width: 50px;">
                <button type="button" class="btn btn-outline-danger removeRow">x</button>
            </div>
        `;

                // Add remove button functionality
                row.querySelector('.removeRow').addEventListener('click', function() {
                    // Only remove if more than 1 row exists
                    if (variationContainer.querySelectorAll('.variationRow').length > 1) {
                        row.remove();
                    }
                });

                variationContainer.appendChild(row);
            }

            // Add new row on click
            addBtn.addEventListener('click', function() {
                createVariationRow();
            });

            // Remove button for initial row
            document.querySelectorAll('.removeRow').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const rows = variationContainer.querySelectorAll('.variationRow');
                    if (rows.length > 1) {
                        e.target.closest('.variationRow').remove();
                    }
                });
            });

        });
    </script>
@endpush
