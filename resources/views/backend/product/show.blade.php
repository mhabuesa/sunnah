@extends('backend.layouts.app')
@section('title', 'Products Show')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/magnific-popup/magnific-popup.css">
@endpush
@section('content')

    <div class="d-xl-none push">
        <div class="row g-sm">
            <div class="col-6">
                <button type="button" class="btn btn-alt-secondary w-100 btn-sm" data-toggle="class-toggle"
                    data-target=".js-ecom-div-nav" data-class="d-none">
                    <i class="fa fa-fw fa-boxes text-muted me-1"></i> Product Variation
                </button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-alt-secondary w-100 btn-sm" data-toggle="class-toggle"
                    data-target=".js-ecom-div-cart" data-class="d-none">
                    <i class="fa fa-fw fa-chart-line text-muted me-1"></i> SEO Information
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 order-xl-1">
            <div class="block block-rounded js-ecom-div-nav d-none d-xl-block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-boxes text-muted me-1"></i> Product Variation
                    </h3>
                </div>
                <div class="block-content table-responsive">
                    <table class="table table-borderless table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Attribute</th>
                                <th>Price</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variations as $key => $variation)
                                <tr>
                                    <td>{{ $variation->color->color }}</td>
                                    <td>{{ $variation->attribute->attribute }}</td>
                                    <td>{{ $variation->price }}</td>
                                    <td>{{ $variation->stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="block block-rounded js-ecom-div-cart d-none d-xl-block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-chart-line text-muted me-1"></i> SEO Information
                    </h3>
                </div>
                <div class="block-content">
                    <p><span class="fw-semibold">Meta Title:</span> {{ $product->meta->meta_title }}</p>
                    <p><span class="fw-semibold d-block ">Meta Description:</span> {{ $product->meta->meta_description }}
                    </p>
                    <p><span class="fw-semibold d-block ">Meta Image:</span>
                        <img class="w-75" src="{{ asset($product->meta->meta_image) }}" alt="">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-0">
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-md-6">
                            <div class="row g-sm js-gallery img-fluid-100">
                                <div class="col-12 mb-3">
                                    <a class="img-link img-link-zoom-in img-lightbox" href="{{ asset($product->image) }}">
                                        <img class="img-fluid" src="{{ asset($product->image) }}" alt="">
                                    </a>
                                </div>
                                @foreach ($product->galleries as $gallery)
                                    <div class="col-4">
                                        <a class="img-link img-link-zoom-in img-lightbox"
                                            href="{{ asset($gallery->image) }}">
                                            <img class="img-fluid" src="{{ asset($gallery->image) }}  " alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>{{ $product->name }}</h4>
                                </div>
                            </div>
                            <div class="py-3">
                                <h5 class="fw-semibold mb-0">General Information</h5>
                            </div>
                            <table class="table table-borderless table-sm table-hover table-vcenter">
                                <tr>
                                    <th>Brand</th>
                                    <td>: {{ $product->brand->name }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>: {{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Subcategory</th>
                                    <td>: {{ $product->subcategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>: {{ $product->stock }}</td>
                                </tr>
                            </table>


                            <div class="py-3 mt-5">
                                <h5 class="fw-semibold mb-0">Price Information</h5>
                            </div>
                            <table class="table table-borderless table-sm table-hover table-vcenter">
                                <tr>
                                    <th>Unit Price</th>
                                    <td>: {{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <th>Discount Type</th>
                                    <td class="text-capitalize">: {{ $product->discount_type }}</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>: {{ $product->discount }}</td>
                                </tr>
                                <tr>
                                    <th>Product SKU</th>
                                    <td>: {{ $product->sku }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" id="ecom-product-info-tab"
                                    data-bs-toggle="tab" data-bs-target="#ecom-product-info" role="tab"
                                    aria-controls="ecom-product-reviews" aria-selected="true">Info</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" id="ecom-product-comments-tab" data-bs-toggle="tab"
                                    data-bs-target="#ecom-product-comments" role="tab"
                                    aria-controls="ecom-product-reviews" aria-selected="false">Comments</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" id="ecom-product-reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#ecom-product-reviews" role="tab"
                                    aria-controls="ecom-product-reviews" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane pull-x active" id="ecom-product-info" role="tabpanel"
                                aria-labelledby="ecom-product-info-tab" tabindex="0">
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div>
                            <div class="tab-pane pull-x fs-sm" id="ecom-product-comments" role="tabpanel"
                                aria-labelledby="ecom-product-comments-tab" tabindex="0">
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar3.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <a class="fw-semibold" href="javascript:void(0)">Amanda Powell</a>
                                        <mark class="fw-semibold text-danger">Purchased</mark>
                                        <p class="my-1">High quality, thanks so much for sharing!</p>
                                        <a class="me-1" href="javascript:void(0)">Like</a>
                                        <a class="me-1" href="javascript:void(0)">Reply</a>
                                        <span class="text-muted"><em>12 min ago</em></span>
                                        <div class="d-flex mt-3">
                                            <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                                <img class="img-avatar img-avatar32"
                                                    src="{{ asset('assets') }}/media/avatars/avatar2.jpg" alt="">
                                            </a>
                                            <div class="flex-grow-1">
                                                <a class="fw-semibold" href="javascript:void(0)">Emma Cooper</a>
                                                <mark class="fw-semibold text-success">Author</mark>
                                                <p class="my-1">Thanks so much!!</p>
                                                <a class="me-1" href="javascript:void(0)">Like</a>
                                                <a class="me-1" href="javascript:void(0)">Reply</a>
                                                <span class="text-muted"><em>20 min ago</em></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar12.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <a class="fw-semibold" href="javascript:void(0)">Carl Wells</a>
                                        <mark class="fw-semibold text-danger">Purchased</mark>
                                        <p class="my-1">Great work, thank you!</p>
                                        <a class="me-1" href="javascript:void(0)">Like</a>
                                        <a class="me-1" href="javascript:void(0)">Reply</a>
                                        <span class="text-muted"><em>30 min ago</em></span>
                                        <div class="d-flex mt-3">
                                            <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                                <img class="img-avatar img-avatar32"
                                                    src="{{ asset('assets') }}/media/avatars/avatar2.jpg" alt="">
                                            </a>
                                            <div class="flex-grow-1">
                                                <a class="fw-semibold" href="javascript:void(0)">Emma Cooper</a>
                                                <mark class="fw-semibold text-success">Author</mark>
                                                <p class="my-1">Thanks so much!!</p>
                                                <a class="me-1" href="javascript:void(0)">Like</a>
                                                <a class="me-1" href="javascript:void(0)">Reply</a>
                                                <span class="text-muted"><em>20 min ago</em></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar14.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <a class="fw-semibold" href="javascript:void(0)">Albert Ray</a>
                                        <p class="my-1">Really nice!</p>
                                        <a class="me-1" href="javascript:void(0)">Like</a>
                                        <a class="me-1" href="javascript:void(0)">Reply</a>
                                        <span class="text-muted"><em>42 min ago</em></span>
                                        <div class="d-flex mt-3">
                                            <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                                <img class="img-avatar img-avatar32"
                                                    src="{{ asset('assets') }}/media/avatars/avatar2.jpg" alt="">
                                            </a>
                                            <div class="flex-grow-1">
                                                <a class="fw-semibold" href="javascript:void(0)">Emma Cooper</a>
                                                <mark class="fw-semibold text-success">Author</mark>
                                                <p class="my-1">Thanks so much!!</p>
                                                <a class="me-1" href="javascript:void(0)">Like</a>
                                                <a class="me-1" href="javascript:void(0)">Reply</a>
                                                <span class="text-muted"><em>20 min ago</em></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane pull-x fs-sm" id="ecom-product-reviews" role="tabpanel"
                                aria-labelledby="ecom-product-reviews-tab" tabindex="0">
                                <div class="block block-rounded bg-body-light">
                                    <div class="block-content text-center">
                                        <p class="text-warning mb-2">
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                        </p>
                                        <p>
                                            <strong>5.0</strong>/5.0 out of <strong>5</strong> Ratings
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar11.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <a class="fw-semibold" href="javascript:void(0)">Ralph Murray</a>
                                        <p class="my-1">Awesome Quality!</p>
                                        <span class="text-muted"><em>2 hours ago</em></span>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar1.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <a class="fw-semibold" href="javascript:void(0)">Judy Ford</a>
                                        <p class="my-1">So cool badges!</p>
                                        <span class="text-muted"><em>5 hours ago</em></span>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar9.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <a class="fw-semibold" href="javascript:void(0)">Brian Cruz</a>
                                        <p class="my-1">They look great, thank you!</p>
                                        <span class="text-muted"><em>15 hours ago</em></span>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar12.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <a class="fw-semibold" href="javascript:void(0)">Albert Ray</a>
                                        <p class="my-1">Badges for life!</p>
                                        <span class="text-muted"><em>20 hours ago</em></span>
                                    </div>
                                </div>
                                <div class="d-flex push">
                                    <a class="flex-shrink-0 me-3" href="javascript:void(0)">
                                        <img class="img-avatar img-avatar32"
                                            src="{{ asset('assets') }}/media/avatars/avatar7.jpg" alt="">
                                    </a>
                                    <div class="flex-grow-1">
                                        <span class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <a class="fw-semibold" href="javascript:void(0)">Marie Duncan</a>
                                        <p class="my-1">So good, keep it up!</p>
                                        <span class="text-muted"><em>22 hours ago</em></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('footer_scripts')
    <script src="{{ asset('assets') }}/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script>
        One.helpersOnLoad(['jq-magnific-popup']);
    </script>
@endpush
