<div class="row mb-8">

    <div class="col-md-6">

        <div class="mb-3">

            <h3 class="font-size-18 mb-6">
                Based on <span id="totalReviews">0</span> reviews
            </h3>

            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0" id="averageRating">
                0.0
            </h2>

            <div class="text-lh-1">
                overall
            </div>

        </div>

        <!-- Ratings -->
        <ul class="list-unstyled">

            @for ($star = 5; $star >= 1; $star--)

                <li class="py-1">

                    <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">

                        {{-- Stars --}}
                        <div class="col-auto mb-2 mb-md-0">

                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $star)
                                        <small class="fas fa-star"></small>
                                    @else
                                        <small class="far fa-star text-muted"></small>
                                    @endif
                                @endfor

                            </div>

                        </div>

                        {{-- Progress --}}
                        <div class="col-auto mb-2 mb-md-0">

                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">

                                <div class="progress-bar rating-progress" id="ratingProgress{{ $star }}"
                                    role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>

                            </div>

                        </div>

                        {{-- Count --}}
                        <div class="col-auto text-right">

                            <span id="ratingCount{{ $star }}" class="text-muted">
                                0
                            </span>

                        </div>

                    </a>

                </li>

            @endfor

        </ul>
        <!-- End Ratings -->

    </div>


    <div class="col-md-6">

        <!-- Form -->
        @if (auth('customer')->user())
            <h3 class="font-size-18 mb-5">
                Add a review
            </h3>

            <form class="js-validate" method="POST" action="{{ route('review.store') }}">

                @csrf

                <div class="row align-items-center mb-4">

                    <div class="col-md-4 col-lg-3">
                        <label for="rating" class="form-label mb-0">
                            Your Review
                        </label>
                    </div>

                    <div class="col-md-8 col-lg-9">

                        <input type="hidden" name="rating" id="rating" value="1">

                        <div class="review-stars text-warning text-ls-n2 font-size-16" id="reviewStars">

                            <small class="fa-star star fas" data-rating="1"></small>

                            <small class="far fa-star text-muted star" data-rating="2"></small>

                            <small class="far fa-star text-muted star" data-rating="3"></small>

                            <small class="far fa-star text-muted star" data-rating="4"></small>

                            <small class="far fa-star text-muted star" data-rating="5"></small>

                        </div>

                    </div>

                </div>


                <div class="js-form-message form-group mb-3 row">

                    <div class="col-md-4 col-lg-3">
                        <label for="descriptionTextarea" class="form-label">
                            Your Review
                        </label>
                    </div>

                    <div class="col-md-8 col-lg-9">

                        <textarea class="form-control" rows="3" id="descriptionTextarea" name="review" placeholder="Write your review..."
                            required data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>

                    </div>

                </div>


                <div class="js-form-message form-group mb-3 row">

                    <div class="col-md-4 col-lg-3">
                        <label class="form-label">
                            Name
                        </label>
                    </div>

                    <div class="col-md-8 col-lg-9">

                        <p class="form-label mb-0">
                            {{ auth('customer')->user()->name ?? 'Customer Name' }}
                        </p>

                    </div>

                </div>


                <div class="js-form-message form-group mb-3 row">

                    <div class="col-md-4 col-lg-3">

                        <label class="form-label">
                            Email
                        </label>

                    </div>

                    <div class="col-md-8 col-lg-9">

                        <p class="form-label mb-0">
                            {{ auth('customer')->user()->email ?? 'Customer Email' }}
                        </p>

                    </div>

                </div>


                <div class="row">

                    <div class="offset-md-4 offset-lg-3 col-auto">

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}">

                        <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">
                            Add Review
                        </button>

                    </div>

                </div>

            </form>
        @else
            <div class="d-flex justify-content-center">

                <div class="text-center">

                    <h3 class="font-size-18 mb-2">
                        Add a review
                    </h3>

                    <p class="text-danger">
                        Please
                        <a href="{{ route('customer.login') }}">
                            login
                        </a>
                        to add a review.
                    </p>

                </div>

            </div>
        @endif
        <!-- End Form -->

    </div>

</div>

<!-- Review List -->
<div id="reviewList">

    <!-- Reviews will load through AJAX -->

</div>

<!-- Load More -->
<div class="text-center mt-5" id="loadMoreWrapper" style="display: none;">

    <button type="button"
            id="loadMoreReviews"
            class="btn btn-primary-dark btn-wide">

        <span class="load-more-text">Load More</span>

        <span class="load-more-loading d-none">
            <span class="spinner-border spinner-border-sm mr-2"
                  role="status"
                  aria-hidden="true"></span>
            Loading...
        </span>

    </button>

</div>
<!-- End Review -->
