@extends('backend.layouts.app')
@section('title', 'Banner Setup')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">

    <style>
        #drop-area {
            transition: all 0.3s ease;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #drop-area:hover {
            background-color: #f0f7ff !important;
            border-color: #2980b9 !important;
        }

        .border-dashed {
            border-style: dashed !important;
        }
    </style>
@endpush
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto" id="addBannerField" style="display:none;">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Add New Banner
                        </h3>
                        <button id="closeBannerForm" class="btn btn-sm btn-danger">
                            <i class="fas fa-x"></i>
                        </button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="banner_type">Banner type</label>
                                        <select name="banner_type" id="banner_type" class="form-control" required>
                                            <option value="main"
                                                {{ $banners->where('type', 'main')->count() >= 3 ? 'disabled' : '' }}
                                                data-ratio="1996x920">Main
                                                Banner (Max 3)</option>
                                            <option value="home_middle"
                                                {{ $banners->where('type', 'home_middle')->count() >= 1 ? 'disabled' : '' }}
                                                data-ratio="6400x660">Home Middle Banner</option>
                                            <option value="home_bottom"
                                                {{ $banners->where('type', 'home_bottom')->count() >= 1 ? 'disabled' : '' }}
                                                data-ratio="6400x660">Home Bottom Banner</option>
                                            <option value="todays_deal"
                                                {{ $banners->where('type', 'todays_deal')->count() >= 1 ? 'disabled' : '' }}
                                                data-ratio="1600x2788">Todays Deal Banner</option>
                                        </select>
                                        @error('banner_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="banner_url">Banner Url</label>
                                        <input type="text" class="form-control" name="banner_url"
                                            value="{{ old('banner_url') }}" placeholder="Banner Url">
                                        @error('banner_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            Banner Image
                                            <small class="text-muted" id="bannerSizeText">(6400x660)</small>
                                        </label>
                                        <div id="drop-area"
                                            class="border-dashed border-2 rounded-3 pb-2 text-center bg-light position-relative"
                                            style="border: 2px dashed #3498db; cursor: pointer; min-height: 200px;">

                                            <input type="file" name="banner_image" id="fileElem" accept="image/*"
                                                class="d-none">

                                            <div id="upload-content">
                                                <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-primary"></i>
                                                <p class="mb-0 text-primary fw-bold">Drag and drop file or Browse file</p>
                                                <small class="text-muted">JPG, PNG or GIF (Max 2MB)</small>
                                            </div>

                                            <div id="gallery" class="d-none">
                                                <img id="img-preview" src="" class="img-fluid rounded shadow-sm"
                                                    style="max-height: 220px; border: 1px solid #ddd;">
                                            </div>
                                        </div>
                                    </div>
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                        <h3 class="block-title">
                            Banner List
                        </h3>
                        <button id="addBanner" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                            Banner</button>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="bannerTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Banner Type</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $key => $banner)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">
                                            <span class="text-capitalize">{{ $banner->type }}</span>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            {{ $banner->url }}
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <img src="{{ asset($banner->image) }}" width="50" alt="">
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" id="status" type="checkbox"
                                                    {{ $banner->status == '1' ? 'checked' : '' }} name="status"
                                                    data-id="{{ $banner->id }}" data-status="{{ $banner->status }}"
                                                    onchange="updateBannerStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="border-0 btn btn-sm editBannerBtn"
                                                data-id="{{ $banner->id }}" data-type="{{ $banner->type }}"
                                                data-url="{{ $banner->url }}" data-image="{{ asset($banner->image) }}">
                                                <i class="fa fa-pencil text-secondary fa-xl"></i>
                                            </button>
                                            <button type="button" class="border-0 btn btn-sm"
                                                onclick="deleteBanner(this)" data-id="{{ $banner->id }}"><i
                                                    class="fa fa-trash text-danger fa-xl"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->

    <div class="modal fade" id="editBannerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Banner</h5>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_banner_id">

                    {{-- TYPE --}}
                    <div class="mb-3">
                        <label>Banner Type</label>
                        <select id="edit_banner_type" class="form-control">
                            <option value="main" data-ratio="1996x920">Main Banner</option>
                            <option value="home_middle" data-ratio="6400x660">Home Middle Banner</option>
                            <option value="home_bottom" data-ratio="6400x660">Home Bottom Banner</option>
                            <option value="todays_deal" data-ratio="1600x2788">Todays Deal Banner</option>
                        </select>
                    </div>

                    {{-- URL --}}
                    <div class="mb-3">
                        <label>Banner URL</label>
                        <input type="text" id="edit_banner_url" class="form-control">
                    </div>

                    {{-- IMAGE --}}
                    <div class="mb-3">
                        <label>Banner Image <small id="editBannerSizeText">(6400x660)</small></label>

                        <input type="file" id="edit_banner_image" class="form-control mb-2">

                        <img id="edit_banner_preview" src="" class="img-fluid rounded"
                            style="max-height:150px;">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" id="closeEditModal">Cancel</button>
                    <button class="btn btn-primary" id="updateBannerBtn">Update</button>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('footer_scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/js/plugins/datatables/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/be_tables_datatables.min.js"></script>

    <script>
        $(document).ready(function() {

            // ==============================
            // DATATABLE INIT
            // ==============================
            $('#bannerTable').DataTable();


            // ==============================
            // ADD FORM SHOW / HIDE
            // ==============================
            $('#addBanner').click(function() {
                $('#addBannerField').slideDown(300);
                $(this).hide();
            });

            $('#closeBannerForm').click(function() {
                $('#addBannerField').slideUp(300);
                $('#addBanner').show();
            });


            // ==============================
            // DELETE BANNER
            // ==============================
            window.deleteBanner = function(button) {

                let id = $(button).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This banner will be deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {

                        let url = "{{ route('admin.banner.destroy', ':id') }}";
                        url = url.replace(':id', id);

                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                _method: 'DELETE'
                            },

                            success: function(res) {
                                if (res.success) {
                                    showToast(res.message, "success");
                                    $(button).closest('tr').remove();
                                } else {
                                    showToast(res.message, "error");
                                }
                            },

                            error: function() {
                                showToast("Delete failed", "error");
                            }
                        });

                    }
                });
            }


            // ==============================
            // STATUS UPDATE
            // ==============================
            window.updateBannerStatus = function(el) {

                Swal.fire({
                    title: "Are you sure?",
                    text: "Change banner status?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes Update"
                }).then((result) => {

                    if (result.isConfirmed) {
                        updateStatusAjax(el);
                    } else {
                        el.checked = !el.checked;
                    }

                });
            }

            function updateStatusAjax(el) {

                let id = $(el).data('id');

                let url = "{{ route('admin.banner.status.update', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(res) {
                        if (res.success) {
                            showToast(res.message, "success");
                        } else {
                            showToast(res.message, "error");
                        }
                    },

                    error: function() {
                        showToast("Status update failed", "error");
                    }
                });
            }


            // ==============================
            // EDIT MODAL OPEN
            // ==============================
            $(document).on('click', '.editBannerBtn', function() {

                $('#edit_banner_id').val($(this).data('id'));
                $('#edit_banner_type').val($(this).data('type'));
                $('#edit_banner_url').val($(this).data('url'));

                let image = $(this).data('image');
                $('#edit_banner_preview').attr('src', image);

                $('#editBannerModal').modal('show');
            });


            // ==============================
            // CLOSE MODAL
            // ==============================
            $('#closeEditModal').click(function() {
                $('#editBannerModal').modal('hide');
            });


            // ==============================
            // IMAGE PREVIEW (EDIT)
            // ==============================
            $('#edit_banner_image').on('change', function() {

                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit_banner_preview').attr('src', e.target.result);
                }

                if (this.files[0]) {
                    reader.readAsDataURL(this.files[0]);
                }
            });


            // ==============================
            // UPDATE BANNER
            // ==============================
            $('#updateBannerBtn').click(function() {

                let formData = new FormData();

                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#edit_banner_id').val());
                formData.append('banner_type', $('#edit_banner_type').val());
                formData.append('banner_url', $('#edit_banner_url').val());

                let image = $('#edit_banner_image')[0].files[0];
                if (image) {
                    formData.append('banner_image', image);
                }

                $.ajax({
                    url: "{{ route('admin.banner.update') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    beforeSend: function() {
                        $('#updateBannerBtn').prop('disabled', true).text('Updating...');
                    },

                    success: function(res) {
                        if (res.success) {
                            localStorage.setItem('success_message', res.message);
                            location.reload();
                        } else {
                            showToast(res.message, "error");
                        }
                    },

                    error: function() {
                        showToast("Update failed", "error");
                    },

                    complete: function() {
                        $('#updateBannerBtn').prop('disabled', false).text('Update');
                    }
                });

            });


        });

        $(document).ready(function() {

            let message = localStorage.getItem('success_message');

            if (message) {
                showToast(message, "success");
                localStorage.removeItem('success_message');
            }

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropArea = document.getElementById('drop-area');
            const fileElem = document.getElementById('fileElem');
            const gallery = document.getElementById('gallery');
            const preview = document.getElementById('img-preview');
            const uploadContent = document.getElementById('upload-content');

            dropArea.addEventListener('click', function() {
                fileElem.click();
            });

            fileElem.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        gallery.classList.remove('d-none');
                        uploadContent.classList.add('d-none');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        // Remove function
        function removeImage(event) {
            event.stopPropagation();

            const fileElem = document.getElementById('fileElem');
            const gallery = document.getElementById('gallery');
            const uploadContent = document.getElementById('upload-content');
            const preview = document.getElementById('img-preview');

            fileElem.value = "";
            preview.src = "";

            gallery.classList.add('d-none');
            uploadContent.classList.remove('d-none');
        }
    </script>
    <script>
        function updateBannerSizeText() {

            let selected = $('#banner_type option:selected');
            let ratio = selected.data('ratio');

            $('#bannerSizeText').text('(' + ratio + ')');
        }

        // on change
        $('#banner_type').on('change', function() {
            updateBannerSizeText();
        });

        // on page load
        $(document).ready(function() {
            updateBannerSizeText();
        });

        function updateEditBannerSizeText() {

            let selected = $('#edit_banner_type option:selected');
            let ratio = selected.data('ratio');

            $('#editBannerSizeText').text('(' + ratio + ')');
        }

        $('#edit_banner_type').on('change', function() {
            updateEditBannerSizeText();
        });

        $(document).on('click', '.editBannerBtn', function() {
            setTimeout(() => {
                updateEditBannerSizeText();
            }, 100);
        });
    </script>
@endpush
