@extends('frontend.layouts.app')
@section('title', 'Product Page')
@push('header_script')
    <style>
        .product-short-description {
            width: 100%;
            position: relative;
        }

        .product-short-description .description-content {
            width: 100%;
            max-height: 560px;
            overflow: hidden !important;
            transition: max-height 0.35s ease-in-out;
        }

        .product-short-description .description-content p {
            margin-bottom: 16px;
        }

        .product-short-description .description-content p:last-child {
            margin-bottom: 0;
        }

        .product-short-description .description-toggle {
            display: none;
            margin-top: 10px;
            padding: 0;
            border: 0;
            background: transparent;
            color: #0b3d2e;
            font-size: 14px;
            font-weight: 600;
            line-height: 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .product-short-description .description-toggle:hover {
            color: #06281e;
            text-decoration: underline;
        }

        .product-short-description .description-toggle:focus {
            outline: none;
            box-shadow: none;
        }

        @media (min-width: 992px) {

            .product-short-description .description-content {
                max-height: 315px;
            }

        }

        @media (min-width: 768px) and (max-width: 991px) {

            .product-short-description .description-content {
                max-height: 165px;
            }

        }

        @media (max-width: 767px) {

            .product-short-description .description-content {
                max-height: 215px;
            }

        }

        @media (max-width: 480px) {

            .product-short-description .description-content {
                max-height: 215px;
            }

        }
    </style>
@endpush
@section('content')

    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('subcategory', $product->subcategory->slug) }}">{{ $product->subcategory->name }}</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-14">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">
                        @foreach ($product->galleries as $gallery)
                            <div class="js-slide">
                                <img class="img-fluid" src="{{ asset($gallery->image) }}" alt="Image Description">
                            </div>
                            
                        @endforeach
                    </div>

                    <div id="sliderSyncingThumb"
                        class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                        data-infinite="true" data-slides-show="5" data-is-thumbs="true" data-nav-for="#sliderSyncingNav">
                        @foreach ($product->galleries as $gallery)
                            <div class="js-slide" style="cursor: pointer;">
                                <img class="img-fluid" src="{{ asset($gallery->image) }}" alt="Image Description">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <h2 class="font-size-25 text-lh-1dot2">{{ $product->name }}</h2>
                        <div class="mb-2">
                            <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary font-size-13">(3 customer reviews)</span>
                            </a>
                        </div>

                        <div class="mb-2">
                            <ul class="font-size-14 ml-1 text-gray-110 list-unstyled">
                                <li><strong class="text-dark fw-5">Category :</strong> <a
                                        href="{{ route('category', $product->category->slug) }}"
                                        class="text-primary">{{ $product->category->name }}</a></li>
                                <li><strong class="text-dark fw-5">Brand :</strong> <a
                                        href="{{ route('brand', $product->brand->slug) }}"
                                        class="text-primary">{{ $product->brand->name }}</a></li>
                                <li><strong class="text-dark fw-5">SKU :</strong> {{ $product->sku }}</li>
                                <li><strong class="text-dark fw-5">Sold :</strong>
                                    {{ shortNumber($product->orderDetails->sum('qty')) }}</li>
                            </ul>
                        </div>

                        <div class="product-short-description">
                            <h5>Specification</h5>
                            <div id="productDescription" class="description-content">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae alias magnam hic, omnis
                                fugit quisquam reiciendis libero consectetur unde perferendis porro impedit! Fugit rerum
                                eveniet dignissimos quos porro dolorem quibusdam, possimus, odit, magni sit a ipsa eligendi.
                                Illum hic, sequi incidunt id in dignissimos ipsum nam ratione temporibus pariatur, molestiae
                                est consectetur iste nobis enim dicta rem! Ipsum, tempore repudiandae et optio inventore
                                modi dolore fuga delectus saepe minima facere velit itaque quas adipisci, atque alias quae
                                dolorem! Voluptates labore repellendus quos quia quasi vel dolor possimus reiciendis autem
                                nisi quisquam, eius, hic similique dolorum tempora nihil aliquid, cum culpa est! Molestias,
                                doloremque! Enim possimus eius dolore quae nihil fuga doloremque facilis delectus, tempora
                                dolor quia nemo itaque porro libero eum! Consectetur harum voluptate dignissimos nobis
                                suscipit. Maxime voluptatibus necessitatibus corrupti beatae animi possimus tempora
                                repellendus consequatur alias expedita provident libero, accusantium quia fugiat mollitia
                                nobis omnis labore! Pariatur, architecto? Repellat atque dolorum culpa reprehenderit itaque
                                ullam velit reiciendis animi voluptatem commodi tempore libero asperiores nihil cumque esse
                                exercitationem quam magnam cupiditate assumenda, iste saepe id explicabo. Quibusdam dolores,
                                cupiditate in adipisci soluta tempora consectetur non consequuntur omnis voluptate ducimus
                                commodi doloremque error a nulla, labore nesciunt dignissimos quo quas!
                            </div>

                            <a href="javascript:;" id="descriptionToggle" class="description-toggle">
                                See More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                    <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <div id="priceCard" class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
                                    Availability: <span class="text-green font-weight-bold" id="stock_value">0</span> in
                                    stock
                                </div>
                                <h5 class="product_price mt-3">
                                    <span id="product_price">
                                        ৳{{ number_format($product->price, 2) }}
                                    </span>
                                </h5>
                                <div class="mb-3">
                                    <h6 class="font-size-14">Quantity</h6>
                                    <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col">
                                                <input
                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="number" value="1" min="1" max="10" name="quantity"
                                                    readonly>
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @foreach ($product->variations->groupBy('attribute_id') as $variations)
                                        <h6 class="mb-1">
                                            {{ $variations->first()?->attribute?->name }}
                                        </h6>

                                        <select class="js-select selectpicker dropdown-select btn-block col-12 px-0"
                                            data-style="btn-sm bg-white font-weight-normal py-2 border"
                                            data-attribute-id="{{ $variations->first()->attribute_id }}"  name="variation">

                                            @foreach ($variations as $key => $variation)
                                                <option value="{{ $variation->id }}"
                                                    data-price="{{ $variation->price }}"
                                                    data-stock="{{ $variation->stock }}"
                                                    data-name="{{ $variation->attributeValue?->value }}"
                                                    {{ $key == 0 ? 'selected' : '' }}>

                                                    {{ $variation->attributeValue?->value }}

                                                </option>
                                            @endforeach

                                        </select>
                                    @endforeach
                                </div>

                                 <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">

                                <div class="mb-2 pb-0dot5">
                                    <button type="submit" class="btn btn-block btn-primary-dark"><i
                                            class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</button>
                                </div>
                                <div class="mb-3">
                                    <a href="#" class="btn btn-block btn-dark">Buy Now</a>
                                </div>
                                <div class="flex-content-center flex-wrap">
                                    <a href="#" class="text-gray-6 font-size-13 mr-2"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>

                        @error('quantity')
                            {{ $message }}
                        @enderror
                        @error('variation')
                            {{ $message }}
                        @enderror
                        @error('variation_id')
                            {{ $message }}
                        @enderror
                    </form>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
        <!-- Single Product Tab -->
        <div class="mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                    id="pills-tab-8" role="tablist">
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill"
                            href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                            aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill"
                            href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1"
                            aria-selected="false">Reviews</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="Jpills-two-example1" role="tabpanel"
                        aria-labelledby="Jpills-two-example1-tab">
                       <p>{!! $product->description !!}</p>
                    </div>
                    <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                        aria-labelledby="Jpills-four-example1-tab">
                        <div class="row mb-8">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
                                    <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                    <div class="text-lh-1">overall</div>
                                </div>

                                <!-- Ratings -->
                                <ul class="list-unstyled">
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">205</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 53%;"
                                                        aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">55</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%;"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">23</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-muted">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-2 mb-md-0">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 1%;"
                                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">4</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Ratings -->
                            </div>
                            <div class="col-md-6">
                                <h3 class="font-size-18 mb-5">Add a review</h3>
                                <!-- Form -->
                                <form class="js-validate">
                                    <div class="row align-items-center mb-4">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="rating" class="form-label mb-0">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <a href="#" class="d-block">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="descriptionTextarea" class="form-label">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea class="form-control" rows="3" id="descriptionTextarea" data-msg="Please enter your message."
                                                data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="inputName" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="name" id="inputName"
                                                aria-label="Alex Hecker" required=""
                                                data-msg="Please enter your name." data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="emailAddress" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" class="form-control" name="emailAddress"
                                                id="emailAddress" aria-label="alexhecker@pixeel.com" required=""
                                                data-msg="Please enter a valid email address."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                            <button type="submit"
                                                class="btn btn-primary-dark btn-wide transition-3d-hover">Add
                                                Review</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- Review -->
                        <div class="border-bottom border-color-1 pb-4 mb-4">
                            <!-- Review Rating -->
                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                            </div>
                            <!-- End Review Rating -->

                            <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,
                                enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut
                                mollis. Donec luctus condimentum ante et euismod.</p>

                            <!-- Reviewer -->
                            <div class="mb-2">
                                <strong>John Doe</strong>
                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                            </div>
                            <!-- End Reviewer -->
                        </div>
                        <!-- End Review -->
                        <!-- Review -->
                        <div class="border-bottom border-color-1 pb-4 mb-4">
                            <!-- Review Rating -->
                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                            </div>
                            <!-- End Review Rating -->

                            <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada
                                fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt
                                faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>

                            <!-- Reviewer -->
                            <div class="mb-2">
                                <strong>Anna Kowalsky</strong>
                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                            </div>
                            <!-- End Reviewer -->
                        </div>
                        <!-- End Review -->
                        <!-- Review -->
                        <div class="pb-4">
                            <!-- Review Rating -->
                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                            </div>
                            <!-- End Review Rating -->

                            <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec
                                ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>

                            <!-- Reviewer -->
                            <div class="mb-2">
                                <strong>Peter Wargner</strong>
                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                            </div>
                            <!-- End Reviewer -->
                        </div>
                        <!-- End Review -->
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Single Product Tab -->
        <!-- Related products -->
        <div class="mb-6">
            <div
                class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
            </div>
            <ul class="row list-unstyled products-group no-gutters">
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full
                                        base audio</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img1.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img2.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img3.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-md-lg">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img4.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-xl">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img5.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">$685,00</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-wd d-xl-none d-wd-block">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href="product-categories-7-column-full-width.html"
                                        class="font-size-12 text-gray-5">Speakers</a></div>
                                <h5 class="mb-1 product-item__title"><a href="single-product-fullwidth.html"
                                        class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                <div class="mb-2">
                                    <a href="single-product-fullwidth.html" class="d-block text-center"><img
                                            class="img-fluid" src="{{ asset('frontend/temp') }}/img/212X200/img2.jpg"
                                            alt="Image Description"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a href="single-product-fullwidth.html"
                                            class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item__footer">
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="compare.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                    <a href="wishlist.html" class="text-gray-6 font-size-13"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Related products -->
        <!-- Brand Carousel -->
        <div class="mb-8">
            <div class="py-2 border-top border-bottom">
                <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1"
                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                    data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                    data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                    data-responsive='[{
                        "breakpoint": 992,
                        "settings": {
                            "slidesToShow": 2
                        }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }]'>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img1.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img2.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img3.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img4.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img5.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50"
                                src="{{ asset('frontend/temp') }}/img/200X60/img6.png" alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
@endsection

@push('footer_script')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            let selectedVariations = {};
            let basePrice = {{ $product->price ?? 0 }};
            let currentStock = {{ $product->stock ?? 0 }};

            const mobileQty = document.getElementById('mobile_qty');
            const sidebarQty = document.getElementById('sidebar_qty');

            // =========================
            // SAFE QTY
            // =========================
            function getQty(input) {
                let qty = parseInt(input?.value || 1);
                if (isNaN(qty) || qty < 1) qty = 1;
                if (qty > currentStock) qty = currentStock;
                return qty;
            }

            // =========================
            // SET QTY
            // =========================
            function setQty(input, value) {
                if (!input) return;

                value = parseInt(value);
                if (isNaN(value) || value < 1) value = 1;
                if (value > currentStock) value = currentStock;

                input.value = value;
            }

            // =========================
            // UPDATE PRICE (IMPORTANT FIX HERE)
            // =========================
            function updatePrice() {

                let mobileQtyVal = getQty(mobileQty);
                let sidebarQtyVal = getQty(sidebarQty);

                // 👉 BOTH update independently
                let mobileTotal = (basePrice * mobileQtyVal).toFixed(2);
                let sidebarTotal = (basePrice * sidebarQtyVal).toFixed(2);

                document.getElementById('mobile_total_price').innerText = '৳' + mobileTotal;
                document.getElementById('total_price').innerText = '৳' + sidebarTotal;

                document.getElementById('stock_value').innerText = currentStock;

                let names = Object.values(selectedVariations).map(v => v.name);
                document.getElementById('selected_option_text').innerText =
                    names.length ? names.join(', ') : "Default Product";

                document.getElementById('selected_variations').value =
                    JSON.stringify(selectedVariations);
            }

            // =========================
            // VARIATION CHANGE
            // =========================
            document.querySelectorAll('.variation-radio').forEach(radio => {

                radio.addEventListener('change', function() {

                    selectedVariations[this.name] = {
                        id: this.value,
                        name: this.dataset.name,
                        price: parseFloat(this.dataset.price),
                        stock: parseInt(this.dataset.stock)
                    };

                    basePrice = parseFloat(this.dataset.price);
                    currentStock = parseInt(this.dataset.stock);

                    setQty(mobileQty, 1);
                    setQty(sidebarQty, 1);

                    updatePrice();
                });
            });

            // =========================
            // MOBILE BUTTONS
            // =========================
            document.querySelectorAll('.m-plus, .m-minus').forEach(btn => {

                btn.addEventListener('click', function() {

                    let qty = getQty(mobileQty);

                    if (this.classList.contains('m-plus')) qty++;
                    if (this.classList.contains('m-minus')) qty--;

                    setQty(mobileQty, qty);
                    updatePrice();
                });
            });

            // =========================
            // SIDEBAR BUTTONS
            // =========================
            document.querySelectorAll('.s-plus, .s-minus').forEach(btn => {

                btn.addEventListener('click', function() {

                    let qty = getQty(sidebarQty);

                    if (this.classList.contains('s-plus')) qty++;
                    if (this.classList.contains('s-minus')) qty--;

                    setQty(sidebarQty, qty);
                    updatePrice();
                });
            });

            // =========================
            // INIT
            // =========================
            function init() {
                let first = document.querySelector('.variation-radio:checked');

                if (first) first.dispatchEvent(new Event('change'));
                else updatePrice();
            }

            init();

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll('.qty-box').forEach(box => {

                let input = box.querySelector('.qty-input');
                let plusBtn = box.querySelector('.qty-plus');
                let minusBtn = box.querySelector('.qty-minus');

                if (plusBtn) {
                    plusBtn.addEventListener('click', () => {
                        input.value = parseInt(input.value || 1) + 1;
                    });
                }

                if (minusBtn) {
                    minusBtn.addEventListener('click', () => {
                        let current = parseInt(input.value || 1);
                        if (current > 1) {
                            input.value = current - 1;
                        }
                    });
                }

            });

        });
    </script> --}}




    <!-- JS Global Compulsory -->
    {{-- <script src="{{asset('frontend/temp')}}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{asset('frontend/temp')}}/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="{{asset('frontend/temp')}}/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{asset('frontend/temp')}}/vendor/bootstrap/bootstrap.min.js"></script> --}}

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('frontend/temp') }}/vendor/appear.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/svg-injector/dist/svg-injector.min.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script src="{{ asset('frontend/temp') }}/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/typed.js/lib/typed.min.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/slick-carousel/slick/slick.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/appear.js"></script>
    <script src="{{ asset('frontend/temp') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- JS Electro -->
    <script src="{{ asset('frontend/temp') }}/js/hs.core.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.countdown.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.header.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.hamburgers.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.unfold.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.focus-state.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.malihu-scrollbar.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.validation.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.fancybox.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.onscroll-animation.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.slick-carousel.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.quantity-counter.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.show-animation.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.svg-injector.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.scroll-nav.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.go-to.js"></script>
    <script src="{{ asset('frontend/temp') }}/js/components/hs.selectpicker.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'horizontal',
                pageContainer: $('.container'),
                breakpoint: 767.98,
                hideTimeOut: 0
            });
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of HSScrollNav component
            $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
                duration: 700
            });

            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');

            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthsElSelector: '.js-cd-months',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of forms
            $.HSCore.components.HSFocusState.init();

            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate', {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupPassword'
                    }
                }
            });

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // initialization of fancybox
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of hamburgers
            $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                beforeClose: function() {
                    $('#hamburgerTrigger').removeClass('is-active');
                },
                afterClose: function() {
                    $('#headerSidebarList .collapse.show').collapse('hide');
                }
            });

            $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
                e.preventDefault();

                var target = $(this).data('target');

                if ($(this).attr('aria-expanded') === "true") {
                    $(target).collapse('hide');
                } else {
                    $(target).collapse('show');
                }
            });

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of select picker
            $.HSCore.components.HSSelectPicker.init('.js-select');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const description = document.getElementById('productDescription');
            const toggle = document.getElementById('descriptionToggle');

            if (!description || !toggle) {
                return;
            }

            let isExpanded = false;


            /*
            |--------------------------------------------------------------------------
            | Check whether description is longer than the CSS max-height
            |--------------------------------------------------------------------------
            */

            function checkDescription() {

                /*
                 * Temporarily get the current visible height
                 */
                const visibleHeight = description.clientHeight;

                /*
                 * Get complete content height
                 */
                const fullHeight = description.scrollHeight;


                /*
                 * If content is longer than visible area,
                 * show See More button.
                 */
                if (fullHeight > visibleHeight + 5) {

                    toggle.style.display = 'inline-block';

                } else {

                    toggle.style.display = 'none';
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Initial check
            |--------------------------------------------------------------------------
            */

            checkDescription();


            /*
            |--------------------------------------------------------------------------
            | SEE MORE / SEE LESS
            |--------------------------------------------------------------------------
            */

            toggle.addEventListener('click', function(event) {

                event.preventDefault();


                if (!isExpanded) {

                    /*
                    |--------------------------------------------------------------------------
                    | SEE MORE
                    |--------------------------------------------------------------------------
                    */

                    description.style.maxHeight =
                        description.scrollHeight + 'px';

                    toggle.innerText = 'See Less';

                    isExpanded = true;


                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | SEE LESS
                    |--------------------------------------------------------------------------
                    */

                    /*
                     * Remove inline max-height.
                     *
                     * CSS-এর max-height আবার automatically apply হবে।
                     */
                    description.style.maxHeight = '';

                    toggle.innerText = 'See More';

                    isExpanded = false;


                    /*
                     * Optional:
                     * Collapse হওয়ার পর description-এর জায়গায়
                     * user-কে ফিরিয়ে আনা।
                     */
                    setTimeout(function() {

                        const top =
                            description.getBoundingClientRect().top +
                            window.pageYOffset -
                            100;

                        window.scrollTo({
                            top: top,
                            behavior: 'smooth'
                        });

                    }, 50);
                }

            });


            /*
            |--------------------------------------------------------------------------
            | Window Resize
            |--------------------------------------------------------------------------
            */

            let resizeTimer;

            window.addEventListener('resize', function() {

                clearTimeout(resizeTimer);

                resizeTimer = setTimeout(function() {

                    /*
                     * Expanded অবস্থায় resize করার সময়
                     * নতুন height calculate করবে।
                     */
                    if (isExpanded) {

                        description.style.maxHeight =
                            description.scrollHeight + 'px';

                    } else {

                        /*
                         * Collapsed অবস্থায় CSS max-height
                         * আবার apply হতে দাও।
                         */
                        description.style.maxHeight = '';

                        checkDescription();
                    }

                }, 150);

            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ==========================================
            // ELEMENTS
            // ==========================================
            const priceElement = document.getElementById('product_price');
            const stockElement = document.getElementById('stock_value');
            const quantityInput = document.getElementById('sidebar_qty');

            // ==========================================
            // INITIAL PRODUCT DATA
            // ==========================================
            let currentPrice = {{ $product->price ?? 0 }};
            let currentStock = {{ $product->stock ?? 0 }};


            // ==========================================
            // FORMAT PRICE
            // ==========================================
            function formatPrice(price) {

                return '৳' + Number(price).toLocaleString('en-BD', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

            }


            // ==========================================
            // UPDATE PRICE
            // ==========================================
            function updatePrice() {

                if (priceElement) {
                    priceElement.textContent = formatPrice(currentPrice);
                }

            }


            // ==========================================
            // UPDATE STOCK
            // ==========================================
            function updateStock() {

                if (stockElement) {
                    stockElement.textContent = currentStock;
                }

            }


            // ==========================================
            // RESET QUANTITY
            // ==========================================
            function resetQuantity() {

                if (quantityInput) {

                    if (currentStock > 0) {
                        quantityInput.value = 1;
                    } else {
                        quantityInput.value = 0;
                    }

                }

            }


            // ==========================================
            // VARIATION SELECT CHANGE
            // ==========================================
            document.querySelectorAll('.dropdown-select').forEach(function(select) {

                select.addEventListener('change', function() {

                    // Selected option
                    const selectedOption =
                        this.options[this.selectedIndex];

                    if (!selectedOption) {
                        return;
                    }

                    // Get price
                    currentPrice =
                        parseFloat(selectedOption.dataset.price) || 0;

                    // Get stock
                    currentStock =
                        parseInt(selectedOption.dataset.stock) || 0;

                    // Debug
                    console.log('Variation ID:', selectedOption.value);
                    console.log('Variation Name:', selectedOption.dataset.name);
                    console.log('Price:', currentPrice);
                    console.log('Stock:', currentStock);

                    // Update UI
                    updatePrice();
                    updateStock();

                    // Reset quantity
                    resetQuantity();

                });

            });


            // ==========================================
            // PLUS BUTTON
            // ==========================================
            document.querySelectorAll('.s-plus').forEach(function(button) {

                button.addEventListener('click', function() {

                    if (!quantityInput) {
                        return;
                    }

                    let quantity =
                        parseInt(quantityInput.value) || 1;

                    if (
                        currentStock > 0 &&
                        quantity < currentStock
                    ) {
                        quantity++;
                    }

                    quantityInput.value = quantity;

                });

            });


            // ==========================================
            // MINUS BUTTON
            // ==========================================
            document.querySelectorAll('.s-minus').forEach(function(button) {

                button.addEventListener('click', function() {

                    if (!quantityInput) {
                        return;
                    }

                    let quantity =
                        parseInt(quantityInput.value) || 1;

                    if (quantity > 1) {
                        quantity--;
                    }

                    quantityInput.value = quantity;

                });

            });


            // ==========================================
            // MANUAL QUANTITY INPUT
            // ==========================================
            if (quantityInput) {

                quantityInput.addEventListener('change', function() {

                    let quantity =
                        parseInt(this.value);

                    if (isNaN(quantity) || quantity < 1) {
                        quantity = 1;
                    }

                    if (
                        currentStock > 0 &&
                        quantity > currentStock
                    ) {
                        quantity = currentStock;
                    }

                    this.value = quantity;

                });

            }


            // ==========================================
            // INITIAL SELECTED VARIATION
            // ==========================================
            function initVariation() {

                const selects =
                    document.querySelectorAll('.dropdown-select');

                if (!selects.length) {

                    updatePrice();
                    updateStock();

                    return;
                }


                // প্রথমে সব select-এর selected option থেকে
                // price/stock নেওয়া হচ্ছে
                const firstSelect = selects[0];

                const selectedOption =
                    firstSelect.options[firstSelect.selectedIndex];

                if (selectedOption) {

                    currentPrice =
                        parseFloat(selectedOption.dataset.price) ||
                        currentPrice;

                    currentStock =
                        parseInt(selectedOption.dataset.stock) ||
                        currentStock;

                }


                updatePrice();
                updateStock();
                resetQuantity();

            }


            // ==========================================
            // INIT
            // ==========================================
            initVariation();

        });
    </script>
@endpush
