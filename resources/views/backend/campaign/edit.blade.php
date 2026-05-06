@extends('backend.layouts.app')

@section('title', 'Campaign Edit')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/select2/css/select2.min.css">
@endpush

@section('content')

    <div class="container-fluid">

        <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
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
                                    placeholder="Enter Site name.." value="{{ old('site_name') ?? $campaign->site_name }}"
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
                                    placeholder="Enter Campaign name.."
                                    value="{{ old('campaign_name') ?? $campaign->campaign_name }}" required>
                                @error('campaign_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-4">
                                <label class="form-label" for="campaign_url">Campaign URL</label>
                                <input type="text" class="form-control" id="campaign_url" name="campaign_url"
                                    placeholder="Enter Campaign name.."
                                    value="{{ old('campaign_url') ?? $campaign->campaign_url }}" required>
                                @error('campaign_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-4">
                                <label class="form-label" for="rating">Rating</label>
                                <input type="text" class="form-control" id="rating" name="rating"
                                    placeholder="Enter Rating.."
                                    value="{{ old('rating', $campaign->content['rating'] ?? '') }}" required>
                                @error('rating')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-4">
                                <label class="form-label" for="review">Review</label>
                                <input type="text" class="form-control" id="review" name="review"
                                    placeholder="Enter Review.."
                                    value="{{ old('review', $campaign->content['review'] ?? '') }}" required>
                                @error('review')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    placeholder="Enter Subtitle.."
                                    value="{{ old('subtitle', $campaign->content['subtitle'] ?? '') }}" required>
                                @error('subtitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter Title.."
                                    value="{{ old('title', $campaign->content['title'] ?? '') }}" required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="shortText">Short Text</label>
                                <input type="text" class="form-control" id="shortText" name="shortText"
                                    placeholder="Enter Short Text..."
                                    value="{{ old('shortText', $campaign->content['shortText'] ?? '') }}" required>
                                @error('shortText')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label class="form-label" for="featureButton">Feature Button Text</label>
                                <input type="text" class="form-control" id="featureButton" name="featureButton"
                                    placeholder="Enter Feature Button Text.."
                                    value="{{ old('featureButton', $campaign->content['featureButton'] ?? '') }}"
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
                                    placeholder="Enter Feature .."
                                    value="{{ old('feature_1', $campaign->content['feature_1'] ?? '') }}" required>
                                @error('feature_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_1" name="text_1"
                                    placeholder="Enter Feature Text .."
                                    value="{{ old('text_1', $campaign->content['text_1'] ?? '') }}" required>
                                @error('text_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto border p-3 rounded">
                            <div class="mb-4">
                                <label class="form-label" for="feature_2">Second Feature & Text</label>
                                <input type="text" class="form-control" id="feature_2" name="feature_2"
                                    placeholder="Enter Feature .."
                                    value="{{ old('feature_2', $campaign->content['feature_2'] ?? '') }}" required>
                                @error('feature_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_2" name="text_2"
                                    placeholder="Enter Feature Text .."
                                    value="{{ old('text_2', $campaign->content['text_2'] ?? '') }}" required>
                                @error('text_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto border p-3 rounded">
                            <div class="mb-4">
                                <label class="form-label" for="feature_3">Third Feature & Text</label>
                                <input type="text" class="form-control" id="feature_3" name="feature_3"
                                    placeholder="Enter Feature .."
                                    value="{{ old('feature_3', $campaign->content['feature_3'] ?? '') }}" required>
                                @error('feature_3')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="text" class="form-control mt-2" id="text_3" name="text_3"
                                    placeholder="Enter Feature Text .."
                                    value="{{ old('text_3', $campaign->content['text_3'] ?? '') }}" required>
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

                        <div class="row  mb-3 align-items-end">

                            <div class="col-lg-6 mb-3">
                                <label>Feature Main Title</label>
                                <input type="text" class="form-control" name="feature_title"
                                    value="{{ old('feature_title', $campaign->content['feature_title'] ?? '') }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Feature Main Description</label>
                                <input type="text" class="form-control" name="feature_description"
                                    value="{{ old('feature_description', $campaign->content['feature_description'] ?? '') }}">
                            </div>
                            @foreach ($campaign->content['features'] ?? [] as $i => $feature)
                                <div class="row feature-item mb-3 align-items-end"> {{-- 👈 THIS IS IMPORTANT --}}

                                    <div class="col-lg-3">
                                        <label>Icon</label>
                                        <select name="features[{{ $i }}][icon]" class="form-select">

                                            <option value="📦" {{ $feature['icon'] == '📦' ? 'selected' : '' }}>📦
                                                Product
                                                Box</option>
                                            <option value="🛍️" {{ $feature['icon'] == '🛍️' ? 'selected' : '' }}>🛍️
                                                Shopping Bag</option>
                                            <option value="🛒" {{ $feature['icon'] == '🛒' ? 'selected' : '' }}>🛒
                                                Shopping
                                                Cart</option>
                                            <option value="🏪" {{ $feature['icon'] == '🏪' ? 'selected' : '' }}>🏪
                                                Store
                                            </option>
                                            <option value="📢" {{ $feature['icon'] == '📢' ? 'selected' : '' }}>📢
                                                Campaign
                                            </option>
                                            <option value="📣" {{ $feature['icon'] == '📣' ? 'selected' : '' }}>📣
                                                Promotion
                                            </option>
                                            <option value="🔥" {{ $feature['icon'] == '🔥' ? 'selected' : '' }}>🔥 Hot
                                                Offer
                                            </option>
                                            <option value="🏷️" {{ $feature['icon'] == '🏷️' ? 'selected' : '' }}>🏷️
                                                Discount Tag</option>
                                            <option value="💸" {{ $feature['icon'] == '💸' ? 'selected' : '' }}>💸
                                                Offer
                                            </option>
                                            <option value="✔️" {{ $feature['icon'] == '✔️' ? 'selected' : '' }}>✔️
                                                Verified
                                            </option>
                                            <option value="🌟" {{ $feature['icon'] == '🌟' ? 'selected' : '' }}>🌟 Top
                                                Rated
                                            </option>
                                            <option value="👍" {{ $feature['icon'] == '👍' ? 'selected' : '' }}>👍
                                                Trusted
                                            </option>
                                            <option value="🏆" {{ $feature['icon'] == '🏆' ? 'selected' : '' }}>🏆
                                                Awarded
                                            </option>
                                            <option value="🔒" {{ $feature['icon'] == '🔒' ? 'selected' : '' }}>🔒
                                                Secure
                                            </option>
                                            <option value="🔐" {{ $feature['icon'] == '🔐' ? 'selected' : '' }}>🔐
                                                Locked
                                            </option>
                                            <option value="📜" {{ $feature['icon'] == '📜' ? 'selected' : '' }}>📜
                                                Certified
                                            </option>
                                            <option value="🚚" {{ $feature['icon'] == '🚚' ? 'selected' : '' }}>🚚
                                                Delivery
                                            </option>
                                            <option value="⏰" {{ $feature['icon'] == '⏰' ? 'selected' : '' }}>⏰ Time
                                            </option>
                                            <option value="🎧" {{ $feature['icon'] == '🎧' ? 'selected' : '' }}>🎧
                                                Support
                                            </option>
                                            <option value="💳" {{ $feature['icon'] == '💳' ? 'selected' : '' }}>💳
                                                Card
                                            </option>
                                            <option value="💵" {{ $feature['icon'] == '💵' ? 'selected' : '' }}>💵
                                                Cash
                                            </option>
                                            <option value="👤" {{ $feature['icon'] == '👤' ? 'selected' : '' }}>👤
                                                User
                                            </option>
                                            <option value="👥" {{ $feature['icon'] == '👥' ? 'selected' : '' }}>👥
                                                Users
                                            </option>
                                            <option value="🗨️" {{ $feature['icon'] == '🗨️' ? 'selected' : '' }}>🗨️
                                                Reviews
                                            </option>
                                            <option value="⭐" {{ $feature['icon'] == '⭐' ? 'selected' : '' }}>⭐
                                                Rating
                                            </option>
                                            <option value="📞" {{ $feature['icon'] == '📞' ? 'selected' : '' }}>📞
                                                Phone
                                            </option>
                                            <option value="📧" {{ $feature['icon'] == '📧' ? 'selected' : '' }}>📧
                                                Email
                                            </option>
                                            <option value="📍" {{ $feature['icon'] == '📍' ? 'selected' : '' }}>📍
                                                Location
                                            </option>
                                            <option value="📱" {{ $feature['icon'] == '📱' ? 'selected' : '' }}>📱
                                                WhatsApp
                                            </option>
                                            <option value="➡️" {{ $feature['icon'] == '➡️' ? 'selected' : '' }}>➡️
                                                Arrow
                                            </option>
                                            <option value="⏩" {{ $feature['icon'] == '⏩' ? 'selected' : '' }}>⏩ Next
                                            </option>
                                            <option value="➕" {{ $feature['icon'] == '➕' ? 'selected' : '' }}>➕ Add
                                            </option>
                                            <option value="📈" {{ $feature['icon'] == '📈' ? 'selected' : '' }}>📈
                                                Growth
                                            </option>
                                            <option value="🎁" {{ $feature['icon'] == '🎁' ? 'selected' : '' }}>🎁
                                                Gift
                                            </option>
                                            <option value="❤️" {{ $feature['icon'] == '❤️' ? 'selected' : '' }}>❤️
                                                Favorite
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Title</label>
                                        <input type="text" name="features[{{ $i }}][title]"
                                            class="form-control" value="{{ $feature['title'] }}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Description</label>
                                        <input type="text" name="features[{{ $i }}][description]"
                                            class="form-control" value="{{ $feature['description'] }}">
                                    </div>

                                    <div class="col-lg-2 d-flex gap-2">
                                        <button type="button" class="btn btn-danger remove-feature">-</button>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-12 text-end mb-3">
                        <button type="button" class="btn btn-success add-feature">+ Add Feature</button>
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
                                    placeholder="Enter Gallery Title"
                                    value="{{ old('gallery_title', $campaign->content['gallery_title'] ?? '') }}">
                            </div>
                            <div class="col-lg-6">
                                <label>Gallery Description</label>
                                <input type="text" name="gallery_description" class="form-control"
                                    placeholder="Enter Gallery Description"
                                    value="{{ old('gallery_title', $campaign->content['gallery_description'] ?? '') }}">
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
                                <input type="text" class="form-control" name="processes_title"
                                    value="{{ old('processes_title', $campaign->content['processes_title'] ?? '') }}">
                            </div>
                            <div class="col-lg-4">
                                <label>Process Main Description</label>
                                <input type="text" class="form-control" name="processes_description"
                                    value="{{ old('processes_description', $campaign->content['processes_description'] ?? '') }}">
                            </div>
                            <div class="col-lg-4">
                                <label>Process Image Text</label>
                                <input type="text" class="form-control" name="processes_image_text"
                                    value="{{ old('processes_image_text', $campaign->content['processes_image_text'] ?? '') }}">
                            </div>

                            <div class="col-lg-6">
                                <label>Process Main Image</label>
                                <input type="file" class="form-control" name="processes_main_image"
                                    onchange="previewImage(event, 'main_preview')">
                                <img id="main_preview"
                                    src="{{ asset($campaign->content['processes_main_image'] ?? '') }}"
                                    style="margin-top:10px; max-width:100%; height:150px; object-fit:cover;">
                            </div>
                            <div class="col-lg-6">
                                <label>Process Secondary Image</label>
                                <input type="file" class="form-control" name="processes_secondary_image"
                                    onchange="previewImage(event, 'secondary_preview')">
                                <img id="secondary_preview"
                                    src="{{ asset($campaign->content['processes_secondary_image'] ?? '') }}"
                                    style="margin-top:10px; max-width:100%; height:150px; object-fit:cover;">
                            </div>

                            @foreach ($campaign->content['processes'] ?? [] as $i => $process)
                                <div class="row process-item align-items-end">
                                    <div class="col-lg-3">
                                        <label>Icon</label>
                                        <select name="processes[{{ $i }}][icon]" class="form-select">
                                            <option value="📦" {{ $process['icon'] == '📦' ? 'selected' : '' }}>📦
                                                Product
                                                Box</option>
                                            <option value="🛍️" {{ $process['icon'] == '🛍️' ? 'selected' : '' }}>
                                                🛍️
                                                Shopping Bag</option>
                                            <option value="🛒" {{ $process['icon'] == '🛒' ? 'selected' : '' }}>🛒
                                                Shopping
                                                Cart</option>
                                            <option value="🏪" {{ $process['icon'] == '🏪' ? 'selected' : '' }}>🏪
                                                Store
                                            </option>
                                            <option value="📢" {{ $process['icon'] == '📢' ? 'selected' : '' }}>📢
                                                Campaign
                                            </option>
                                            <option value="📣" {{ $process['icon'] == '📣' ? 'selected' : '' }}>📣
                                                Promotion
                                            </option>
                                            <option value="🔥" {{ $process['icon'] == '🔥' ? 'selected' : '' }}>🔥
                                                Hot Offer
                                            </option>
                                            <option value="🏷️" {{ $process['icon'] == '🏷️' ? 'selected' : '' }}>
                                                🏷️
                                                Discount Tag</option>
                                            <option value="💸" {{ $process['icon'] == '💸' ? 'selected' : '' }}>💸
                                                Offer
                                            </option>
                                            <option value="✔️" {{ $process['icon'] == '✔️' ? 'selected' : '' }}>✔️
                                                Verified
                                            </option>
                                            <option value="🌟" {{ $process['icon'] == '🌟' ? 'selected' : '' }}>🌟
                                                Top Rated
                                            </option>
                                            <option value="👍" {{ $process['icon'] == '👍' ? 'selected' : '' }}>👍
                                                Trusted
                                            </option>
                                            <option value="🏆" {{ $process['icon'] == '🏆' ? 'selected' : '' }}>🏆
                                                Awarded
                                            </option>
                                            <option value="🔒" {{ $process['icon'] == '🔒' ? 'selected' : '' }}>🔒
                                                Secure
                                            </option>
                                            <option value="🔐" {{ $process['icon'] == '🔐' ? 'selected' : '' }}>🔐
                                                Locked
                                            </option>
                                            <option value="📜" {{ $process['icon'] == '📜' ? 'selected' : '' }}>📜
                                                Certified
                                            </option>
                                            <option value="🚚" {{ $process['icon'] == '🚚' ? 'selected' : '' }}>🚚
                                                Delivery
                                            </option>
                                            <option value="⏰" {{ $process['icon'] == '⏰' ? 'selected' : '' }}>⏰
                                                Time
                                            </option>
                                            <option value="🎧" {{ $process['icon'] == '🎧' ? 'selected' : '' }}>
                                                🎧 Support
                                            </option>
                                            <option value="💳" {{ $process['icon'] == '💳' ? 'selected' : '' }}>
                                                💳 Card
                                            </option>
                                            <option value="💵" {{ $process['icon'] == '💵' ? 'selected' : '' }}>
                                                💵 Cash
                                            </option>
                                            <option value="👤" {{ $process['icon'] == '👤' ? 'selected' : '' }}>
                                                👤 User
                                            </option>
                                            <option value="👥" {{ $process['icon'] == '👥' ? 'selected' : '' }}>
                                                👥 Users
                                            </option>
                                            <option value="🗨️" {{ $process['icon'] == '🗨️' ? 'selected' : '' }}>
                                                🗨️ Reviews
                                            </option>
                                            <option value="⭐" {{ $process['icon'] == '⭐' ? 'selected' : '' }}>⭐
                                                Rating
                                            </option>
                                            <option value="📞" {{ $process['icon'] == '📞' ? 'selected' : '' }}>
                                                📞 Phone
                                            </option>
                                            <option value="📧" {{ $process['icon'] == '📧' ? 'selected' : '' }}>
                                                📧 Email
                                            </option>
                                            <option value="📍" {{ $process['icon'] == '📍' ? 'selected' : '' }}>
                                                📍 Location
                                            </option>
                                            <option value="📱" {{ $process['icon'] == '📱' ? 'selected' : '' }}>
                                                📱 WhatsApp
                                            </option>
                                            <option value="➡️" {{ $process['icon'] == '➡️' ? 'selected' : '' }}>
                                                ➡️ Arrow
                                            </option>
                                            <option value="⏩" {{ $process['icon'] == '⏩' ? 'selected' : '' }}>⏩
                                                Next
                                            </option>
                                            <option value="➕" {{ $process['icon'] == '➕' ? 'selected' : '' }}>➕
                                                Add
                                            </option>
                                            <option value="📈" {{ $process['icon'] == '📈' ? 'selected' : '' }}>
                                                📈 Growth
                                            </option>
                                            <option value="🎁" {{ $process['icon'] == '🎁' ? 'selected' : '' }}>
                                                🎁 Gift
                                            </option>
                                            <option value="❤️" {{ $process['icon'] == '❤️' ? 'selected' : '' }}>
                                                ❤️ Favorite
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Title</label>
                                        <input name="processes[{{ $i }}][title]" class="form-control"
                                            value="{{ $process['title'] }}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Description</label>
                                        <input name="processes[{{ $i }}][description]" class="form-control"
                                            value="{{ $process['description'] }}">
                                    </div>


                                    <div class="col-lg-2 d-flex gap-2">
                                        <button type="button" class="btn btn-danger remove-process">-</button>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="col-12 text-end mb-3">
                        <button type="button" class="btn btn-success add-process">+ Add Process</button>
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

                        @foreach ($campaign->content['testimonials'] ?? [] as $i => $testimonial)
                            <div class="row testimonial-item mb-3 align-items-end">
                                <div class="col-lg-2">
                                    <label>Rating</label>
                                    <input name="testimonials[{{ $i }}][rating]" class="form-control"
                                        value="{{ $testimonial['rating'] }}">
                                </div>

                                <div class="col-lg-3">
                                    <label>Name</label>
                                    <input name="testimonials[{{ $i }}][name]" class="form-control"
                                        value="{{ $testimonial['name'] }}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Text</label>
                                    <input name="testimonials[{{ $i }}][text]" class="form-control"
                                        value="{{ $testimonial['text'] }}">
                                </div>

                                <div class="col-lg-1 d-flex gap-2">
                                    <button type="button" class="btn btn-danger remove-testimonial">-</button>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="col-12 text-end mb-3">
                        <button type="button" class="btn btn-success add-testimonial">+ Add Testimonial</button>
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

                        @foreach ($campaign->content['faqs'] ?? [] as $i => $faq)
                            <div class="row faq-item mb-3 align-items-end">

                                <div class="col-lg-5">
                                    <label>Question</label>
                                    <input name="faqs[{{ $i }}][question]" class="form-control"
                                        value="{{ $faq['question'] }}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Answer</label>
                                    <input name="faqs[{{ $i }}][answer]" class="form-control"
                                        value="{{ $faq['answer'] }}">
                                </div>

                                <div class="col-lg-1 d-flex gap-2">
                                    <button type="button" class="btn btn-danger remove-faq">-</button>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="col-12 text-end mb-3">
                        <button type="button" class="btn btn-success add-faq">+ Add FAQ</button>
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
                                <input name="cart_title" class="form-control"
                                    value="{{ $campaign->content['cart_title'] }}">
                            </div>
                            <div class="col-lg-5">
                                <label>Cart Description</label>
                                <input name="cart_description" class="form-control"
                                    value="{{ $campaign->content['cart_description'] }}">
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
                                <input name="facebook" class="form-control" value="{{ $campaign->facebook ?? '' }}">
                            </div>
                            <div class="col-lg-5">
                                <label>Whatsapp</label>
                                <input name="whatsapp" class="form-control" value="{{ $campaign->whatsapp ?? '' }}">
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary mb-3">Update Campaign</button>
            </div>

        </form>

    </div>
@endsection


@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/select2/js/select2.full.min.js"></script>

    <script>
        let f = {{ count($campaign->content['features'] ?? []) }};
        let p = {{ count($campaign->content['processes'] ?? []) }};
        let t = {{ count($campaign->content['testimonials'] ?? []) }};
        let q = {{ count($campaign->content['faqs'] ?? []) }};
    </script>

    <script>
        $('.form-select').select2();

        /* ================= FEATURES ================= */
        $(document).on('click', '.add-feature', function() {
            $('#features-wrapper').append(`

            <div class="row feature-item mb-3 align-items-end">
            <div class="col-lg-3">
                <label>Icon</label>
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
                <label>Title</label>
                <input type="text" name="features[${f}][title]" class="form-control">
            </div>

            <div class="col-lg-4">
                <label>Description</label>
                <input type="text" name="features[${f}][description]" class="form-control">
            </div>

            <div class="col-lg-2 d-flex gap-2">
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
