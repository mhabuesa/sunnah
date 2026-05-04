@extends('backend.layouts.app')

@section('title', 'Campaign')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush

@section('content')

    <div class="container-fluid">

        <form action="{{ route('admin.campaign.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ================= HERO ================= --}}
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Hero Section
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="site_name">Site Name</label>
                                <input type="text" class="form-control" id="site_name" name="site_name"
                                    placeholder="Enter Site name.." value="{{ old('site_name') ?? config('app.name') }}"
                                    required>
                                @error('site_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="campaign_name">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign_name" name="campaign_name"
                                    placeholder="Enter Campaign name.." value="{{ old('campaign_name') }}" required>
                                @error('campaign_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label">
                                    Campaign URL
                                    <span id="url-status"></span>
                                </label>

                                <input type="text" class="form-control" id="campaign_url" name="campaign_url"
                                    placeholder="Enter Campaign URL.." value="{{ old('campaign_url') }}" required>

                                @error('campaign_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="rating">Rating</label>
                                <input type="text" class="form-control" id="rating" name="rating"
                                    placeholder="Enter Rating.." value="{{ old('rating') }}" required>
                                @error('rating')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="review">Review</label>
                                <input type="text" class="form-control" id="review" name="review"
                                    placeholder="Enter Review.." value="{{ old('review') }}" required>
                                @error('review')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    placeholder="Enter Subtitle.." value="{{ old('subtitle') }}" required>
                                @error('subtitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter Title.." value="{{ old('title') }}" required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="shortText">Short Text</label>
                                <input type="text" class="form-control" id="shortText" name="shortText"
                                    placeholder="Enter Short Text..." value="{{ old('shortText') }}" required>
                                @error('shortText')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="featureButton">Feature Button Text</label>
                                <input type="text" class="form-control" id="featureButton" name="featureButton"
                                    placeholder="Enter Feature Button Text.." value="{{ old('featureButton') }}"
                                    required>
                                @error('featureButton')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto border p-3 rounded">
                            <div class="mb-4">
                                <label class="form-label" for="feature_1">First Feature & Text</label>
                                <input type="text" class="form-control" id="feature_1" name="feature_1"
                                    placeholder="Enter Feature .." value="{{ old('feature_1') }}" required>
                                @error('feature_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_1" name="text_1"
                                    placeholder="Enter Feature Text .." value="{{ old('text_1') }}" required>
                                @error('text_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto border p-3 rounded">
                            <div class="mb-4">
                                <label class="form-label" for="feature_2">Second Feature & Text</label>
                                <input type="text" class="form-control" id="feature_2" name="feature_2"
                                    placeholder="Enter Feature .." value="{{ old('feature_2') }}" required>
                                @error('feature_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_2" name="text_2"
                                    placeholder="Enter Feature Text .." value="{{ old('text_2') }}" required>
                                @error('text_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto border p-3 rounded">
                            <div class="mb-4">
                                <label class="form-label" for="feature_3">Third Feature & Text</label>
                                <input type="text" class="form-control" id="feature_3" name="feature_3"
                                    placeholder="Enter Feature .." value="{{ old('feature_3') }}" required>
                                @error('feature_3')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_3" name="text_3"
                                    placeholder="Enter Feature Text .." value="{{ old('text_3') }}" required>
                                @error('text_3')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ================= FEATURES ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Features Section</h3>
                </div>

                <div class="block-content">

                    <div id="features-wrapper">

                        <div class="row feature-item mb-3 align-items-end">

                            <div class="col-lg-6">
                                <label>Feature Main Title</label>
                                <input type="text" class="form-control" name="feature_title">
                            </div>
                            <div class="col-lg-6">
                                <label>Feature Main Description</label>
                                <input type="text" class="form-control" name="feature_description">
                            </div>
                            <div class="col-lg-3">
                                <label>Icon</label>
                                <select name="features[0][icon]" class="form-select">
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
                                <label>Title</label>
                                <input type="text" name="features[0][title]" class="form-control">
                            </div>

                            <div class="col-lg-4">
                                <label>Description</label>
                                <input type="text" name="features[0][description]" class="form-control">
                            </div>

                            <div class="col-lg-2 d-flex gap-2">
                                <button type="button" class="btn btn-success add-feature">+</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ================= Gallery ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Gallery Section</h3>
                </div>

                <div class="block-content">

                    <div id="gallery-wrapper">

                        <div class="row process-item mb-3 align-items-end">

                            <div class="col-lg-6">
                                <label>Gallery Title</label>
                                <input type="text" name="gallery_title" class="form-control"
                                    placeholder="Enter Gallery Title">
                            </div>
                            <div class="col-lg-6">
                                <label>Gallery Description</label>
                                <input type="text" name="gallery_description" class="form-control"
                                    placeholder="Enter Gallery Description">
                            </div>



                        </div>

                    </div>

                </div>
            </div>

            {{-- ================= PROCESS ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Process Section</h3>
                </div>

                <div class="block-content">

                    <div id="process-wrapper">

                        <div class="row process-item mb-3 align-items-end">

                            <div class="col-lg-4">
                                <label>Process Main Title</label>
                                <input type="text" class="form-control" name="processes_title">
                            </div>
                            <div class="col-lg-4">
                                <label>Process Main Description</label>
                                <input type="text" class="form-control" name="processes_description">
                            </div>
                            <div class="col-lg-4">
                                <label>Process Image Text</label>
                                <input type="text" class="form-control" name="processes_image_text">
                            </div>
                            <div class="col-lg-6">
                                <label>Process Main Image</label>
                                <input type="file" class="form-control" name="processes_main_image"
                                    onchange="previewImage(event, 'main_preview')">
                                <img id="main_preview"
                                    style="margin-top:10px; max-width:100%; height:150px; object-fit:cover;">
                            </div>

                            <div class="col-lg-6">
                                <label>Process Secondary Image</label>
                                <input type="file" class="form-control" name="processes_secondary_image"
                                    onchange="previewImage(event, 'secondary_preview')">
                                <img id="secondary_preview"
                                    style="margin-top:10px; max-width:100%; height:150px; object-fit:cover;">
                            </div>


                            <div class="col-12">
                                <div class="row align-items-end">
                                    <div class="col-lg-3">
                                        <label>Icon</label>
                                        <select name="processes[0][icon]" class="form-select">
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
                                        <label>Title</label>
                                        <input name="processes[0][title]" class="form-control">
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Description</label>
                                        <input name="processes[0][description]" class="form-control">
                                    </div>

                                    <div class="col-lg-2 d-flex gap-2">
                                        <button type="button" class="btn btn-success add-process">+</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ================= TESTIMONIAL ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Testimonials</h3>
                </div>

                <div class="block-content">

                    <div id="testimonial-wrapper">

                        <div class="row testimonial-item mb-3 align-items-end">

                            <div class="col-lg-2">
                                <label>Rating</label>
                                <input name="testimonials[0][rating]" class="form-control">
                            </div>

                            <div class="col-lg-3">
                                <label>Name</label>
                                <input name="testimonials[0][name]" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label>Text</label>
                                <input name="testimonials[0][text]" class="form-control">
                            </div>

                            <div class="col-lg-1 d-flex gap-2">
                                <button type="button" class="btn btn-success add-testimonial">+</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- ================= FAQ ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">FAQ</h3>
                </div>

                <div class="block-content">

                    <div id="faq-wrapper">

                        <div class="row faq-item mb-3 align-items-end">

                            <div class="col-lg-5">
                                <label>Question</label>
                                <input name="faqs[0][question]" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label>Answer</label>
                                <input name="faqs[0][answer]" class="form-control">
                            </div>

                            <div class="col-lg-1 d-flex gap-2">
                                <button type="button" class="btn btn-success add-faq">+</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            {{-- ================= Cart ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Cart Section</h3>
                </div>

                <div class="block-content">

                    <div id="cart-wrapper">

                        <div class="row mb-3 align-items-end">

                            <div class="col-lg-5">
                                <label>Cart Title</label>
                                <input name="cart_title" class="form-control">
                            </div>
                            <div class="col-lg-5">
                                <label>Cart Description</label>
                                <input name="cart_description" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- ================= Info ================= --}}
            <div class="block block-rounded mb-4">
                <div class="block-header">
                    <h3 class="block-title">Info Section</h3>
                </div>

                <div class="block-content">

                    <div id="cart-wrapper">

                        <div class="row mb-3 align-items-end">

                            <div class="col-lg-5">
                                <label>Facebook</label>
                                <input name="facebook" class="form-control">
                            </div>
                            <div class="col-lg-5">
                                <label>Whatsapp</label>
                                <input name="whatsapp" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary mb-3">Save Campaign</button>
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

    <script>
        $(document).ready(function() {

            let typingTimer;
            let doneTypingInterval = 500;

            $('#campaign_url').on('input', function() {

                clearTimeout(typingTimer);

                let url = $(this).val();

                if (url.length < 3) {
                    $('#url-status').html('');
                    return;
                }

                $('#url-status').html('<i class="fa fa-spinner fa-spin text-primary"></i>');

                typingTimer = setTimeout(function() {

                    $.ajax({
                        url: "{{ route('admin.campaign.checkUrl') }}",
                        type: "GET",
                        data: {
                            campaign_url: url
                        },
                        success: function(res) {

                            if (res.exists) {
                                $('#url-status').html(
                                    '<i class="fa fa-times text-danger"></i>');
                                $('#campaign_url')
                                    .removeClass('is-valid')
                                    .addClass('is-invalid');
                            } else {
                                $('#url-status').html(
                                    '<i class="fa fa-check text-success"></i>');
                                $('#campaign_url')
                                    .removeClass('is-invalid')
                                    .addClass('is-valid');
                            }

                        },
                        error: function() {
                            $('#url-status').html(
                                '<i class="fa fa-exclamation-triangle text-warning"></i>'
                                );
                        }
                    });

                }, doneTypingInterval);

            });

            // ✅ submit validation (OUTSIDE input event)
            $('form').on('submit', function(e) {
                if ($('#campaign_url').hasClass('is-invalid')) {
                    e.preventDefault();
                    alert('Campaign URL already exists!');
                }
            });

        });
    </script>
@endpush
