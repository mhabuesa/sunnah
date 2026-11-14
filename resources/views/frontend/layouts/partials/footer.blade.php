<footer>
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center text-white justify-content-md-between justify-content-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40"></i>
                            <h2 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message" action="{{ route('newsletter.subscribe') }}"
                        method="POST">
                        @csrf
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control border-0 height-40" name="email"
                                id="subscribeSrEmail" placeholder="Email address" aria-label="Email address"
                                aria-describedby="subscribeButton" required
                                data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-dark btn-sm-wide height-40 py-2"
                                    id="subscribeButton">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-5 text-center">
                    <div class="mb-6">
                        <a href="#" class="d-inline-block">
                            <img src="{{ asset(setting()->footer_logo) }}" alt=""
                                style="height: 60px; width:160;">
                        </a>
                        <span class="d-block">ব্যবসা নয়, <br> সুন্নত পালনে সহযোগিতা করাই আমাদের লক্ষ্য!</span>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters d-flex justify-content-center">
                            <i class="ec ec-support text-primary font-size-56"></i>
                            <div class="pl-3">
                                <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                <a href="tel:{{ setting()->phone }}"
                                    class="font-size-20 text-gray-90">{{ setting()->phone }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold">Contact info</h6>
                        <address class="">
                            {{ setting()->address }}
                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-10 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-10 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-instagram btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-10 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-x btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-10 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-youtube btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-10 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                    href="#">
                                    <span class="fab fa-tiktok btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">

                        {{-- Information --}}
                        <div class="col-6 col-lg mb-4 mb-lg-0">
                            <h6 class="mb-3 font-weight-bold">প্রয়োজনীয় তথ্য</h6>

                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="{{ route('about') }}">আমাদের
                                        সম্পর্কে</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{ route('contact') }}">যোগাযোগ করুন</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{ route('company.information') }}">প্রতিষ্ঠান পরিচিতি</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{ route('terms.and.conditions') }}">শর্তাবলি</a></li>
                                <li><a class="list-group-item list-group-item-action"
                                        href="{{ route('privacy') }}">গোপনীয়তা নীতিমালা</a>
                                </li>
                            </ul>
                        </div>

                        @php
                            $firstCategories = $categories->count() > 6 ? $categories->take(5) : $categories;
                        @endphp

                        {{-- Shop By --}}
                        <div class="col-6 col-lg mb-4 mb-lg-0">
                            <h6 class="mb-3 font-weight-bold">বিভাগ অনুযায়ী কেনাকাটা</h6>

                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                @foreach ($firstCategories as $category)
                                    <li>
                                        <a class="list-group-item list-group-item-action"
                                            href="{{ route('category', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>



                        {{-- Support --}}
                        <div class="col-6 col-lg mb-4 mb-lg-0">
                            <h6 class="mb-3 font-weight-bold">গ্রাহক সহায়তা</h6>

                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('support.center') }}">
                                        গ্রাহক সহায়তা কেন্দ্র
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('how.to.order') }}">
                                        অর্ডার করার নিয়ম
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('order.tracking') }}">
                                        অর্ডারের অবস্থা জানুন
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action" href="{{ route('payment') }}">
                                        মূল্য পরিশোধ পদ্ধতি
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action" href="{{ route('shipping') }}">
                                        ডেলিভারি সংক্রান্ত তথ্য
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action" href="{{ route('faq') }}">
                                        সচরাচর জিজ্ঞাসা
                                    </a>
                                </li>

                            </ul>
                        </div>

                        {{-- Consumer Policy --}}
                        <div class="col-6 col-lg mb-4 mb-lg-0">
                            <h6 class="mb-3 font-weight-bold">ক্রেতা সেবা নীতিমালা</h6>

                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('happy.return') }}">
                                        সহজ পণ্য ফেরত
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('refund.policy') }}">
                                        অর্থ ফেরত নীতিমালা
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action" href="{{ route('exchange') }}">
                                        পণ্য পরিবর্তন
                                    </a>
                                </li>

                                <li>
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ route('cancellation') }}">
                                        অর্ডার বাতিল
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
    <!-- Footer-copy-right -->
    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0">© <a href="#"
                        class="font-weight-bold text-gray-90">{{ setting()->name }}</a> -
                    All rights Reserved</div>
                <div class="text-md-right">
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{ asset('frontend') }}/assets/img/100X60/img1.jpg"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{ asset('frontend') }}/assets/img/100X60/img2.jpg"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{ asset('frontend') }}/assets/img/100X60/img3.png"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{ asset('frontend') }}/assets/img/100X60/img4.png"
                            alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{ asset('frontend') }}/assets/img/100X60/img5.png"
                            alt="Image Description">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>
