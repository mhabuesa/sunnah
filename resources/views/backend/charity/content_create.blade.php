@extends('backend.layouts.app')
@section('title', 'Charity Content')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="{{ asset('assets') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('assets') }}/richtexteditor/plugins/all_plugins.js'></script>
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Product Assignment</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.charity.content.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="title">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="category">Select Category <span
                                                class="text-danger">*</span></label>
                                        <select name="category" id="category" class="js-select2 form-select" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="subcategory">Select Subcategory <span
                                                class="text-danger">*</span></label>
                                        <select name="subcategory" id="subcategory" class="js-select2 form-select" required
                                            disabled>
                                            <option value="" selected>Select Subcategory</option>
                                        </select>
                                        @error('subcategory')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="content">Content <span
                                                class="text-danger">*</span></label>
                                        <textarea id="content" name="content" required>
                                    {{ old('content') }}
                                </textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                            </div>


                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);

        // Rich Text Editor
        var editor1 = new RichTextEditor("#content");
    </script>

<script>
        $('#category').on('change', function() {
            const categoryId = $(this).val();
            const $subcategory = $('#subcategory');

            // Reset subcategory options when the category changes.
            $subcategory
                .empty()
                .append(new Option('Loading subcategories...', '', true, true))
                .prop('disabled', true)
                .trigger('change');

            if (!categoryId) {
                $subcategory
                    .empty()
                    .append(new Option('Select Subcategory', '', true, true))
                    .trigger('change');

                return;
            }

            $.ajax({
                url: "{{ route('admin.charity.get.subcategories') }}",
                type: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(subcategories) {
                    $subcategory.empty();

                    $subcategory.append(
                        new Option('Select Subcategory', '', true, true)
                    );

                    if (subcategories.length === 0) {
                        $subcategory.append(
                            new Option('No subcategories found', '', false, false)
                        );
                    } else {
                        subcategories.forEach(function(item) {
                            $subcategory.append(
                                new Option(item.subcategory, item.id)
                            );
                        });
                    }

                    $subcategory
                        .prop('disabled', subcategories.length === 0)
                        .trigger('change');
                },
                error: function() {
                    $subcategory
                        .empty()
                        .append(new Option('Failed to load subcategories', '', true, true))
                        .prop('disabled', true)
                        .trigger('change');

                    showToast('Failed to load subcategories.', 'error');
                }
            });
        });
    </script>
@endpush
