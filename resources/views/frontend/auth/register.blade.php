@extends('frontend.layouts.app')
@section('title', 'Login')
@push('header_script')
@endpush
@section('content')


    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Login</h1>
        </div>
        <header class="text-center mb-7">
            <div id="loginError" class="alert alert-danger d-none"></div>
        </header>
        <div class="my-4 my-xl-8">
            <div class="row">
                <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                    <form id="login" class="js-validate" novalidate="novalidate" data-target-group="idForm">
                        @csrf
                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="form-label" for="phone">phone
                                <span class="text-danger">*</span>
                            </label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                placeholder="Your Phone Number" aria-label="Your Phone Number" required=""
                                data-msg="Please enter a valid phone Number." data-error-class="u-has-error"
                                data-success-class="u-has-success">
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" aria-label="Password" required=""
                                data-msg="Your password is invalid. Please try again." data-error-class="u-has-error"
                                data-success-class="u-has-success">
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <div class="js-form-message mb-3">
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="remember"
                                    required="" data-error-class="u-has-error" data-success-class="u-has-success">
                                <label class="custom-control-label form-label" for="rememberCheckbox">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="#">Lost your password?</a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                </div>

                
                <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Register</h3>
                    </div>
                    <p class="text-gray-90 mb-4">Create new account today to reap the benefits of a personalized shopping
                        experience.</p>
                    <!-- End Title -->
                    <!-- Form Group -->
                    <form class="js-validate" novalidate="novalidate">
                        <div class="js-form-message form-group mb-5">
                            <label class="form-label" for="RegisterSrEmailExample3">Email address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="RegisterSrEmailExample3"
                                placeholder="Email address" aria-label="Email address" required=""
                                data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                data-success-class="u-has-success">
                        </div>
                        <!-- End Form Group -->
                        <p class="text-gray-90 mb-4">Your personal data will be used to support your experience throughout
                            this website, to manage your account, and for other purposes described in our <a href="#"
                                class="text-blue">privacy policy.</a></p>
                        <!-- Button -->
                        <div class="mb-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Register</button>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    <h3 class="font-size-18 mb-3">Sign up today and you will be able to :</h3>
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Speed
                            your way through checkout</li>
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Track
                            your orders easily</li>
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Keep a
                            record of all your purchases</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('footer_script')
    <script>
        // কুকি সেট করার হেল্পার ফাংশন
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // কুকি পড়ার হেল্পার ফাংশন
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        $(document).ready(function() {
            // --- পেজ লোড হওয়ার সময় কুকি চেক করে ফিল্ড অটো-ফিল করা ---
            let rememberedPhone = getCookie("remember_phone");
            let rememberedPass = getCookie("remember_pass");

            if (rememberedPhone && rememberedPass) {
                $('input[name="phone"]').val(rememberedPhone);
                $('input[name="password"]').val(rememberedPass);
                $('input[name="remember"]').prop('checked', true);
            }

            // --- লগইন সাবমিট হ্যান্ডলিং ---
            $('#login').submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let data = form.serialize();
                let submitBtn = form.find('button[type="submit"]');

                // ফোন এবং পাসওয়ার্ড ভ্যালু সংগ্রহ (কুকি সেভ করার জন্য)
                let phoneVal = form.find('input[name="phone"]').val();
                let passVal = form.find('input[name="password"]').val();
                let isRememberChecked = form.find('input[name="remember"]').is(':checked');

                $('#loginError').addClass('d-none').html('');
                submitBtn.prop('disabled', true).text('Processing...');

                $.ajax({
                    url: "{{ route('customer.login.submit') }}",
                    type: "POST",
                    data: data,
                    success: function(res) {
                        if (res.status) {
                            // সাকসেস হলে কুকি ম্যানেজমেন্ট
                            if (isRememberChecked) {
                                setCookie("remember_phone", phoneVal, 30); // ৩০ দিন
                                setCookie("remember_pass", passVal, 30);
                            } else {
                                // চেক না করা থাকলে পুরনো কুকি মুছে ফেলবে
                                setCookie("remember_phone", "", -1);
                                setCookie("remember_pass", "", -1);
                            }

                            window.location.href = res.redirect;
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false).text('Log In');
                        let errors = xhr.responseJSON;

                        $('#loginError').removeClass('d-none');

                        if (errors && errors.errors) {
                            let msg = '';
                            $.each(errors.errors, function(key, value) {
                                msg += value[0] + '<br>';
                            });
                            $('#loginError').html(msg);
                        } else {
                            $('#loginError').html(errors.message || 'Something went wrong');
                        }
                    }
                });
            });
        });
    </script>
@endpush
