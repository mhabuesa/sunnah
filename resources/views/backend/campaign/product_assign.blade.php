@extends('backend.layouts.app')

@section('title', 'Product Assign')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush

@section('content')

    <div class="container-fluid">

        <form action="{{ route('admin.campaign.product.assigned', $campaign->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Product Assign to Campaign
                            </h3>
                        </div>
                        <div class="block-content block-content-full overflow-x-auto">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">Campaign Name</label>
                                        <h4 class="text-success">{{ $campaign->campaign_name }}</h4>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="slug">Product</label>
                                        @foreach ($products as $product)
                                            <div>
                                                <span class="mx-2">
                                                    <input id="product_{{ $product->id }}" type="checkbox"
                                                        class="form-check-input me-2" name="product_id[]"
                                                        value="{{ $product->id }}"
                                                        {{ in_array($product->id, $campaign->product ?? []) ? 'checked' : '' }}>

                                                    <label class="h4 mb-2" for="product_{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </label>
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Assigned</button>
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
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $('.form-select').select2();

        let f = 1,
            p = 1,
            t = 1,
            q = 1;

        /* ================= FEATURES ================= */
        $(document).on('click', '.add-feature', function() {
            $('#features-wrapper').append(`
<div class="row feature-item mb-3">
    <div class="col-lg-3">
        <select name="features[${f}][icon]" class="form-select">
           <option value="📦">📦 Product Box</option>
                                    <option value="🛍️">🛍️ Shopping Bag</option>
                                    <option value="🛒">🛒 Shopping Cart</option>
                                    <option value="🏪">🏪 Store</option>
                                    <option value="📢">📢 Campaign</option>
                                    <option value="📣">📣 Promotion</option>
                                    <option value="🔥">🔥 Hot Offer</option>
                                    <option value="🏷️">🏷️ Discount Tag</option>
                                    <option value="💸">💸 Percentage Offer</option>
                                    <option value="✔️">✔️ Verified</option>
                                    <option value="🌟">🌟 Top Rated</option>
                                    <option value="👍">👍 Trusted</option>
                                    <option value="🏆">🏆 Awarded</option>
                                    <option value="🔒">🔒 Secure</option>
                                    <option value="🔐">🔐 Locked</option>
                                    <option value="📜">📜 Certified</option>
                                    <option value="🚚">🚚 Fast Delivery</option>
                                    <option value="⏰">⏰ On Time</option>
                                    <option value="🎧">🎧 Support</option>
                                    <option value="💳">💳 Card Payment</option>
                                    <option value="💵">💵 Cash Payment</option>
                                    <option value="👤">👤 Single User</option>
                                    <option value="👥">👥 Multiple Users</option>
                                    <option value="🗨️">🗨️ Reviews</option>
                                    <option value="⭐">⭐ Rating</option>
                                    <option value="📞">📞 Phone</option>
                                    <option value="📧">📧 Email</option>
                                    <option value="📍">📍 Location</option>
                                    <option value="📱">📱 WhatsApp</option>
                                    <option value="➡️">➡️ Arrow Right</option>
                                    <option value="⏩">⏩ Next Step</option>
                                    <option value="➕">➕ Add More</option>
                                    <option value="📈">📈 Growth</option>
                                    <option value="🎁">🎁 Gift Offer</option>
                                    <option value="❤️">❤️ Favorite</option>
        </select>
    </div>
    <div class="col-lg-3">
        <input name="features[${f}][title]" class="form-control">
    </div>
    <div class="col-lg-4">
        <input name="features[${f}][description]" class="form-control">
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-danger remove-feature">-</button>
    </div>
</div>`);
            f++;
        });

        $(document).on('click', '.remove-feature', function() {
            $(this).closest('.feature-item').remove();
        });


        /* ================= PROCESS ================= */
        $(document).on('click', '.add-process', function() {
            $('#process-wrapper').append(`
<div class="row process-item mb-3">
    <div class="col-lg-3">
        <select name="processes[${p}][icon]" class="form-select">
            <option value="📦">📦 Product Box</option>
            <option value="🛍️">🛍️ Shopping Bag</option>
            <option value="🛒">🛒 Shopping Cart</option>
            <option value="🏪">🏪 Store</option>
            <option value="📢">📢 Campaign</option>
            <option value="📣">📣 Promotion</option>
            <option value="🔥">🔥 Hot Offer</option>
            <option value="🏷️">🏷️ Discount Tag</option>
            <option value="💸">💸 Percentage Offer</option>
            <option value="✔️">✔️ Verified</option>
            <option value="🌟">🌟 Top Rated</option>
            <option value="👍">👍 Trusted</option>
            <option value="🏆">🏆 Awarded</option>
            <option value="🔒">🔒 Secure</option>
            <option value="🔐">🔐 Locked</option>
            <option value="📜">📜 Certified</option>
            <option value="🚚">🚚 Fast Delivery</option>
            <option value="⏰">⏰ On Time</option>
            <option value="🎧">🎧 Support</option>
            <option value="💳">💳 Card Payment</option>
            <option value="💵">💵 Cash Payment</option>
            <option value="👤">👤 Single User</option>
            <option value="👥">👥 Multiple Users</option>
            <option value="🗨️">🗨️ Reviews</option>
            <option value="⭐">⭐ Rating</option>
            <option value="📞">📞 Phone</option>
            <option value="📧">📧 Email</option>
            <option value="📍">📍 Location</option>
            <option value="📱">📱 WhatsApp</option>
            <option value="➡️">➡️ Arrow Right</option>
            <option value="⏩">⏩ Next Step</option>
            <option value="➕">➕ Add More</option>
            <option value="📈">📈 Growth</option>
            <option value="🎁">🎁 Gift Offer</option>
            <option value="❤️">❤️ Favorite</option>
        </select>
    </div>
    <div class="col-lg-3">
        <input name="processes[${p}][title]" class="form-control">
    </div>
    <div class="col-lg-4">
        <input name="processes[${p}][description]" class="form-control">
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-danger remove-process">-</button>
    </div>
</div>`);
            p++;
        });

        $(document).on('click', '.remove-process', function() {
            $(this).closest('.process-item').remove();
        });


        /* ================= TESTIMONIAL ================= */
        $(document).on('click', '.add-testimonial', function() {
            $('#testimonial-wrapper').append(`
<div class="row testimonial-item mb-3">
    <div class="col-lg-2"><input name="testimonials[${t}][rating]" class="form-control"></div>
    <div class="col-lg-3"><input name="testimonials[${t}][name]" class="form-control"></div>
    <div class="col-lg-6"><input name="testimonials[${t}][text]" class="form-control"></div>
    <div class="col-lg-1"><button type="button" class="btn btn-danger remove-testimonial">-</button></div>
</div>`);
            t++;
        });

        $(document).on('click', '.remove-testimonial', function() {
            $(this).closest('.testimonial-item').remove();
        });


        /* ================= FAQ ================= */
        $(document).on('click', '.add-faq', function() {
            $('#faq-wrapper').append(`
<div class="row faq-item mb-3">
    <div class="col-lg-5"><input name="faqs[${q}][question]" class="form-control"></div>
    <div class="col-lg-6"><input name="faqs[${q}][answer]" class="form-control"></div>
    <div class="col-lg-1"><button type="button" class="btn btn-danger remove-faq">-</button></div>
</div>`);
            q++;
        });

        $(document).on('click', '.remove-faq', function() {
            $(this).closest('.faq-item').remove();
        });
    </script>

    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
