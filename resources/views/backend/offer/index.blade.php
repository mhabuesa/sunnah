@extends('backend.layouts.app')
@section('title', 'Offers')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Add Offer Form - Slide-in style (simulated with block for consistency with existing patterns) -->
            <div class="col-lg-12 m-auto" id="addOfferField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add New Offer</h3>
                        <button id="closeOfferForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.offer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="title">Offer Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Offer Title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="subtitle">Offer Subtitle</label>
                                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                                            placeholder="Offer Subtitle" value="{{ old('subtitle') }}">
                                        @error('subtitle')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="type">Offer Type</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" disabled selected>Select Offer Type</option>
                                            <option value="product" {{ old('type') == 'product' ? 'selected' : '' }}>Product
                                            </option>
                                            <option value="coupon_code"
                                                {{ old('type') == 'coupon_code' ? 'selected' : '' }}>Coupon Code</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4" id="product_selection_div" style="display:none;">
                                        <label class="form-label" for="product_id">Associated Product</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option value="">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }} ({{ $product->sku ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4" id="coupon_selection_div" style="display:none;">
                                        <label class="form-label" for="coupon_id">Associated Coupon</label>
                                        <select name="coupon_id" id="coupon_id" class="form-control">
                                            <option value="">Select Coupon</option>
                                            @foreach ($coupons as $coupon)
                                                <option value="{{ $coupon->id }}"
                                                    {{ old('coupon_id') == $coupon->id ? 'selected' : '' }}>
                                                    {{ $coupon->coupon_title }} ({{ $coupon->coupon_code }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('coupon_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="image">Offer Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            onchange="previewImage(this)">
                                        <div class="mt-2">
                                            <img id="imagePreview" src="#" alt="Preview"
                                                style="display:none; max-width: 100px; border-radius: 5px;">
                                        </div>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="validity_date">Validity Date</label>
                                        <input type="date" name="validity_date" id="validity_date" class="form-control"
                                            value="{{ old('validity_date') }}" required>
                                        @error('validity_date')
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

            <div class="col-lg-12 m-auto mt-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Offers List</h3>
                        <button id="addOffer" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Offer</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="offerTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Type</th>
                                    <th>Validity</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $key => $offer)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="text-center">
                                            @if ($offer->image)
                                                <img src="{{ asset($offer->image) }}" width="25" height="25"
                                                    style="object-fit: cover; border-radius: 4px;">
                                            @else
                                                <img src="{{ asset('placeholder1.png') }}" width="50" height="50"
                                                    style="object-fit: cover; border-radius: 4px;">
                                            @endif
                                        </td>
                                        <td class="fw-semibold fs-sm">{{ $offer->title }}</td>
                                        <td class="fs-sm">{{ $offer->subtitle }}</td>
                                        <td class="fs-sm">{{ $offer->type == 'product' ? 'Product' : 'Coupon Code' }}
                                        </td>

                                        <td class="fs-sm">{{ $offer->validity_date->format('d-m-Y') }}</td>
                                        <td class="fs-sm">{{ $offer->priority }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $offer->status == 1 ? 'checked' : '' }}
                                                    data-id="{{ $offer->id }}" onchange="updateOfferStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center fs-xl">

                                            @if ($offer->type == 'product')
                                                <a href="{{ route('admin.offer.product.assign', $offer->id) }}"
                                                    class="border-0 btn btn-sm">
                                                   <i class="fa fa-cart-plus text-primary fa-xl"></i>
                                                </a>
                                            @endif
                                                <button type="button" class="border-0 btn btn-sm editOfferBtn"
                                                    data-id="{{ $offer->id }}" data-title="{{ $offer->title }}"
                                                    data-subtitle="{{ $offer->subtitle }}"
                                                    data-type="{{ $offer->type }}"
                                                    data-product_id="{{ $offer->product_id }}"
                                                    data-coupon_id="{{ $offer->coupon_id }}"
                                                    data-validity="{{ $offer->validity_date->format('Y-m-d') }}"
                                                    data-priority="{{ $offer->priority }}"
                                                    data-slug="{{ $offer->slug }}"
                                                    data-image="{{ $offer->image ? asset($offer->image) : asset('placeholder1.png') }}">
                                                    <i class="fa fa-pencil text-secondary fa-xl"></i>
                                                </button>
                                                <button type="button" class="border-0 btn btn-sm"
                                                    onclick="deleteOffer(this)" data-id="{{ $offer->id }}">
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

    <!-- Edit Offer Modal -->
    <div class="modal fade" id="editOfferModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Offer</h5>
                </div>
                <div class="modal-body">
                    <form id="editOfferForm" enctype="multipart/form-data">
                        <input type="hidden" id="edit_offer_id">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label>Offer Title</label>
                                <input type="text" id="edit_title" class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Offer Subtitle</label>
                                <input type="text" id="edit_subtitle" class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Offer Type</label>
                                <select id="edit_type" class="form-control">
                                    <option value="product">Product</option>
                                    <option value="coupon_code">Coupon Code</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3" id="edit_product_div" style="display:none;">
                                <label>Associated Product</label>
                                <select id="edit_product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3" id="edit_coupon_div" style="display:none;">
                                <label>Associated Coupon</label>
                                <select id="edit_coupon_id" class="form-control">
                                    @foreach ($coupons as $coupon)
                                        <option value="{{ $coupon->id }}">{{ $coupon->coupon_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Validity Date</label>
                                <input type="date" id="edit_validity" class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Priority</label>
                                <input type="number" id="edit_priority" class="form-control">
                            </div>
                             <div class="col-lg-6 mb-3">
                                <label>Slug</label>
                                <input type="text" id="edit_slug" class="form-control">
                            </div>
                            <div class="col-lg-7 mb-3">
                                <label>Offer Image</label>
                                <input type="file" id="edit_image" class="form-control"
                                    onchange="previewEditImage(this)">
                                <div class="mt-2">
                                    <img id="editImagePreview" src="#" alt="Preview"
                                        style="display:none; max-width: 100px; border-radius: 5px;">
                                </div>
                            </div>
                           
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateOfferBtn">Update</button>
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

    <script>
        $('#offerTable').DataTable();

        $('#addOffer').click(function() {
            $('#addOfferField').slideDown(300);
            $(this).hide();
        });

        $('#closeOfferForm').click(function() {
            $('#addOfferField').slideUp(300);
            $('#addOffer').show();
        });

        $('#type').on('change', function() {
            const type = $(this).val();
            if (type === 'product') {
                $('#coupon_selection_div').hide();
                $('#coupon_id').val('');
            } else if (type === 'coupon_code') {
                $('#product_selection_div').hide();
                $('#coupon_selection_div').show();
                $('#product_id').val('');
            }
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateOfferStatus(element) {
            const id = $(element).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Update offer status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes Update"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.offer.status.update', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            showToast(data.message, "success");
                        },
                        error: function() {
                            showToast('Something went wrong', "error");
                            element.checked = !element.checked;
                        }
                    });
                } else {
                    element.checked = !element.checked;
                }
            });
        }

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
                        url: "{{ route('admin.offer.destroy', ':id') }}".replace(':id', id),
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

        $(document).on('click', '.editOfferBtn', function() {
            const data = $(this).data();
            $('#edit_offer_id').val(data.id);
            $('#edit_title').val(data.title);
            $('#edit_subtitle').val(data.subtitle);
            $('#edit_type').val(data.type);
            $('#edit_slug').val(data.slug);
            $('#edit_coupon_id').val(data.coupon_id);
            $('#edit_validity').val(data.validity);
            $('#edit_priority').val(data.priority);

            $('#editImagePreview').attr('src', data.image).show();

            toggleEditFields();
            $('#editOfferModal').modal('show');
        });

        function toggleEditFields() {
            const type = $('#edit_type').val();
            if (type === 'product') {
                $('#edit_coupon_div').hide();
            } else {
                $('#edit_product_div').hide();
                $('#edit_coupon_div').show();
            }
        }

        $('#edit_type').on('change', toggleEditFields);

        $('#closeEditModal').click(function() {
            $('#editOfferModal').modal('hide');
        });

        function previewEditImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#editImagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#updateOfferBtn').click(function() {
            let formData = new FormData($('#editOfferForm')[0]);
            formData.append('id', $('#edit_offer_id').val());
            formData.append('title', $('#edit_title').val());
            formData.append('subtitle', $('#edit_subtitle').val());
            formData.append('type', $('#edit_type').val());
            formData.append('slug', $('#edit_slug').val());
            formData.append('coupon_id', $('#edit_coupon_id').val());
            formData.append('validity_date', $('#edit_validity').val());
            formData.append('priority', $('#edit_priority').val());
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('admin.offer.update', ['id' => '__ID__']) }}".replace('__ID__', $('#edit_offer_id').val()),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#updateOfferBtn').prop('disabled', true).text('Updating...');
                },
                success: function(res) {
                    if (res.success) {
                        showToast(res.message, "success");
                        location.reload();
                    } else {
                        showToast(res.message, "error");
                    }
                },
                error: function(xhr) {
                    showToast("Error: " + xhr.responseJSON.message, "error");
                },
                complete: function() {
                    $('#updateOfferBtn').prop('disabled', false).text('Update');
                }
            });
        });
    </script>
@endpush
