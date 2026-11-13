@extends('backend.layouts.app')
@section('title', 'Add Blog Post')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="{{ asset('assets') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('assets') }}/richtexteditor/plugins/all_plugins.js'></script>
@endpush
@section('content')

    <div class="text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="m-3 h4 fw-bold mb-2">
                Edit {{$page->name}}
            </h1>
        </div>
    </div>

    <div class="container-fluid">
        <form id="productForm" action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-12 m-auto mt-2">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title text-capitalize">{{ $page->name }}</h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="content">Blog Content <span
                                                class="text-danger">*</span></label>
                                        <textarea id="content" name="content" required>
                                    {{ old('content') ?? $page->content }}
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
document.addEventListener("DOMContentLoaded", function () {

    const titleInput = document.getElementById("title");
    const descriptionInput = document.getElementById("description");

    const metaTitle = document.querySelector("input[name='meta_title']");
    const metaDescription = document.querySelector("textarea[name='meta_description']");
    const blogLink = document.getElementById("barcodeInput");


    // ==========================================
    // Title → Meta Title + Blog Link
    // ==========================================

    titleInput.addEventListener("input", function () {

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

    descriptionInput.addEventListener("input", function () {

        metaDescription.value = this.value;

    });

});
</script>
@endpush
