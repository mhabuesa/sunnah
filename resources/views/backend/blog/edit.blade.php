@extends('backend.layouts.app')
@section('title', 'Edit Blog Post')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="{{ asset('assets') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('assets') }}/richtexteditor/plugins/all_plugins.js'></script>

    <style>
        /* ================================
                                                                   Thumbnail Upload
                                                                ================================ */

        .thumbnail-upload-wrapper {
            width: 100%;
        }

        .thumbnail-box {
            position: relative;
            width: 100%;

            /* 1500 x 730 ratio */
            aspect-ratio: 1500 / 730;

            min-height: 140px;

            border: 2px dashed #cfd4da;
            border-radius: 10px;

            background: #f8f9fa;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            cursor: pointer;

            transition:
                border-color 0.2s ease,
                background-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        /* Hover */

        .thumbnail-box:hover {
            border-color: #6c757d;
            background: #f1f3f5;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }


        /* ================================
                                                                   Placeholder
                                                                ================================ */

        .thumbnail-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            text-align: center;

            color: #6c757d;

            pointer-events: none;
        }

        .thumbnail-placeholder i {
            font-size: 28px;
            margin-bottom: 8px;
            color: #6c757d;
        }

        .thumbnail-placeholder span {
            font-size: 15px;
            font-weight: 500;
            color: #343a40;
        }

        .thumbnail-placeholder small {
            margin-top: 4px;
            font-size: 12px;
            color: #8a9299;
        }


        /* ================================
                                                                   Preview Image
                                                                ================================ */

        .thumbnail-preview {
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            /* Important */
            object-fit: cover;

            object-position: center;

            display: none;

            border-radius: 8px;
        }


        /* ================================
                                                                   Image Information
                                                                ================================ */

        .thumbnail-info {
            text-align: center;
            margin-top: 10px;
        }

        .thumbnail-info small {
            font-size: 12px;
            line-height: 1.6;
        }


        /* ================================
                                                                   Responsive
                                                                ================================ */

        @media (max-width: 991.98px) {

            .thumbnail-box {
                aspect-ratio: 1500 / 730;
            }

        }

        @media (max-width: 575.98px) {

            .thumbnail-box {
                min-height: 120px;
            }

            .thumbnail-placeholder i {
                font-size: 24px;
            }

            .thumbnail-placeholder span {
                font-size: 14px;
            }

        }





        .metaImg-box {
            /* width: 200px; */
            height: 240px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #fff;
            position: relative;
            margin: 0 auto;
            /* সেন্টার করার জন্য */
        }

        .metaImg-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .variationRow {
                justify-content: flex-start !important;
                /* Center sorale content ba-dik theke shuru hobe */
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .md_mt-2 {
                margin-top: 2rem !important;
            }
        }
    </style>
@endpush
@section('content')

    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                Add New Blog
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <form id="productForm" action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Title & Description</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Blog Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter Blog Title.." value="{{ old('title') ?? $blog->title }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Category<span
                                                class="text-danger">*</span></label>
                                        <select class="js-select2 form-select" id="category" name="category"
                                            style="width: 100%;" data-placeholder="Choose one.." required>
                                            <option></option>
                                            @foreach ($categories as $key => $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') ?? $blog->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="barcodeInput">Blog Link <i
                                                    class="fas fa-info-circle js-bs-tooltip-enabled"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Create the blog link"></i></label>

                                        </div>
                                        <input type="text" class="form-control barcode_input" id="barcodeInput"
                                            name="blog_link" autocomplete="off" placeholder="Create Blog Link.."
                                            value="{{ old('blog_link') ?? $blog->slug }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" rows="10" id="description" name="description">{{ old('description') ?? $blog->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="content">Blog Content <span
                                                class="text-danger">*</span></label>
                                        <textarea id="content" name="content" required>
                                    {{ old('content') ?? $blog->content }}
                                </textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 mt-3 m-auto">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Blog Thumbnail</h3>
                        </div>

                        <div class="block-content block-content-full">
                            <div class="thumbnail-upload-wrapper">

                                <div class="thumbnail-box" id="thumbnailBox">

                                    @if (!$blog->image)
                                        <div class="thumbnail-placeholder" id="thumbnailPlaceholder">
                                            <i class="fa fa-cloud-upload-alt"></i>
                                            <span>Upload Image</span>
                                            <small>Click to select image</small>
                                        </div>
                                    @endif


                                    <img id="thumbnailPreview" alt="Thumbnail Preview" class="thumbnail-preview"
                                        src="{{ asset($blog->image) }}" style="display: block;">

                                    <input type="file" id="thumbnailInput" name="image" accept=".jpg,.jpeg,.png" hidden>
                                </div>

                                <div class="thumbnail-info">
                                    <small class="text-muted">
                                        Recommended size:
                                        <strong>1500 × 730px</strong>
                                    </small>

                                    <small class="text-muted d-block">
                                        Supported:
                                        <strong>.jpg .jpeg .png</strong>
                                    </small>
                                </div>

                                @error('image')
                                    <small class="text-danger mt-2 d-block">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">Seo section
                                <i class="fas fa-info-circle js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Add meta titles descriptions and images for Blog, This will help more people to find them on search engines and see the right details while sharing on other social platforms"></i>
                            </h3>
                        </div>

                        <div class="block-content block-content-full h-100">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Meta Title" value="{{ old('meta_title') ?? $blog->meta_title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="6" placeholder="Meta Description">{{ old('meta_description') ?? $blog->meta_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Meta Image</label>
                                    <div class="metaImg-box mt-1" id="metaImgBox">
                                        @if (!$blog->meta_image)
                                            <span id="metaImgText">Upload Image</span>
                                        @endif
                                        <img id="metaImgPreview" src="{{ asset($blog->meta_image) }}" alt="Meta Image"
                                            style="display: block;">
                                        <input type="file" id="metaImgInput" name="meta_image"
                                            accept=".jpg,.jpeg,.png" hidden>
                                    </div>

                                    @error('meta_image')
                                        <small class="text-danger mt-2 d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="my-3 text-end">
                <button class="btn btn-primary  mx-2" type="submit">Submit</button>
            </div>
        </form>
    </div>


@endsection

@push('footer_scripts')
    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);


        // Rich Text Editor
        var editor1 = new RichTextEditor("#content");
    </script>

    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const thumbnailBox = document.getElementById('thumbnailBox');
            const thumbnailInput = document.getElementById('thumbnailInput');
            const thumbnailPreview = document.getElementById('thumbnailPreview');
            const thumbnailPlaceholder = document.getElementById('thumbnailPlaceholder');

            // Open file selector
            thumbnailBox.addEventListener('click', function() {
                thumbnailInput.click();
            });

            // Preview selected image
            thumbnailInput.addEventListener('change', function(event) {

                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                // Check image type
                if (!file.type.match('image/jpeg') &&
                    !file.type.match('image/png')) {

                    alert('Please select a JPG, JPEG or PNG image.');

                    thumbnailInput.value = '';
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {

                    thumbnailPreview.src = e.target.result;

                    thumbnailPreview.style.display = 'block';

                    thumbnailPlaceholder.style.display = 'none';
                };

                reader.readAsDataURL(file);
            });

        });
    </script>

    <script>
        // Meta Image Upload
        document.addEventListener("DOMContentLoaded", function() {
            const metaImgBox = document.getElementById("metaImgBox");
            const metaImgInput = document.getElementById("metaImgInput");
            const metaImgPreview = document.getElementById("metaImgPreview");
            const metaImgText = document.getElementById("metaImgText");

            metaImgBox.onclick = () => metaImgInput.click();
            metaImgInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        metaImgPreview.src = e.target.result;
                        metaImgPreview.style.display = "block";
                        metaImgText.style.display = "none";
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const titleInput = document.getElementById("title");
            const descriptionInput = document.getElementById("description");

            const metaTitle = document.querySelector("input[name='meta_title']");
            const metaDescription = document.querySelector("textarea[name='meta_description']");
            const blogLink = document.getElementById("barcodeInput");


            // ==========================================
            // Title → Meta Title + Blog Link
            // ==========================================

            titleInput.addEventListener("input", function() {

                const title = this.value;

                // Meta Title
                metaTitle.value = title;


                // Create Blog Slug
                let slug = title
                    .normalize("NFC")
                    .toLowerCase()
                    .trim()

                    // Space → underscore
                    .replace(/\s+/g, '_')

                    // Keep letters, numbers, combining marks and underscore
                    .replace(/[^\p{L}\p{N}\p{M}_]/gu, '')

                    // Remove multiple underscores
                    .replace(/_+/g, '_')

                    // Remove underscore from beginning/end
                    .replace(/^_+|_+$/g, '');


                // Set Blog Link
                blogLink.value = slug;
            });


            // ==========================================
            // Description → Meta Description
            // ==========================================

            descriptionInput.addEventListener("input", function() {

                metaDescription.value = this.value;

            });

        });
    </script>
@endpush
