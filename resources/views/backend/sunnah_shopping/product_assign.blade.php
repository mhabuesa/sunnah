@extends('backend.layouts.app')
@section('title', 'Sunnah Product Assign')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Product Assignment</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.sunnah.product.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="category">Select Category</label>
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
                            <div class="mb-4">
                                <label class="form-label" for="subcategory">Select Subcategory</label>
                                <select name="subcategory" id="subcategory" class="js-select2 form-select" required
                                    disabled>
                                    <option value="" selected>Select Subcategory</option>
                                </select>
                                @error('subcategory')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="product">Select Product</label>
                                <select name="product" id="product" class="js-select2 form-select" required>
                                    <option value="" disabled selected>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('category') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Product List</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="productsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sunnahProducts as $key => $sunnahProduct)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $sunnahProduct->product->name }}</td>
                                        <td class="fw-semibold fs-sm text-success">{{ $sunnahProduct->category->category }}</td>
                                        <td class="fw-semibold fs-sm text-success">{{ $sunnahProduct->subcategory->subcategory }}</td>
                                        <td class="text-center fs-xl">
                                            <button type="button" class="border-0 btn btn-sm" onclick="deleteOffer(this)"
                                                data-id="{{ $sunnahProduct->id }}">
                                                <i class="fa fa-trash text-danger fa-xl"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/datatables/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // Select2
        One.helpersOnLoad(['jq-select2']);
    </script>
    <script>
        $('#productsTable').DataTable();

        function deleteOffer(button) {
            const id = $(button).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "The offer will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.sunnah.product.destroy', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE'
                        },
                        success: function(data) {
                            showToast(data.message, "success");
                            $(button).closest('tr').remove();
                        }
                    });
                }
            });
        }

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
                url: "{{ route('admin.sunnah.get.subcategories') }}",
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
