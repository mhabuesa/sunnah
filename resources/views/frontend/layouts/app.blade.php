<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from transvelo.github.io/electro-html/2.0/html/home/home-v4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Sep 2023 09:21:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Title -->
    <title>@yield('title', 'App') | {{ config('app.name', 'Dev Hunter') }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Kartify">
    <meta name="keywords" content="Kartify">
    <meta name="author" content="Kartify">
    <link rel="icon" href="{{ asset(setting()->favicon) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset(setting()->favicon) }}">
    <meta name="title-color" content="#ff9900">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Kartify">
    <meta name="msapplication-TileImage" content="{{ asset(setting()->favicon) }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap"
        rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/css/font-electro.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet"
        href="{{ asset('frontend') }}/temp/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet"
        href="{{ asset('frontend') }}/temp/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS Electro Template -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/temp/css/theme.css">

    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    @stack('header_script')

    <style>
        .vertical-menu.v1 #basicsCollapseOne .card-body,
        .vertical-menu.v1 .navbar-nav.u-header__navbar-nav {
            max-height: 420px;
            /* আপনার পছন্দমতো height */
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* সুন্দর দেখানোর জন্য কাস্টম scrollbar (optional) */
        .vertical-menu.v1 .navbar-nav.u-header__navbar-nav::-webkit-scrollbar {
            width: 5px;
        }

        .vertical-menu.v1 .navbar-nav.u-header__navbar-nav::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        /* মেগা-মেনু প্যানেলকে সুন্দর bounded card বানানো */
        .vertical-menu .hs-mega-menu,
        .vertical-menu .hs-sub-menu {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 6px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            padding: 20px 24px;
            max-height: 420px;
            /* যতটুকু height চান */
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* কাস্টম স্লিম scrollbar (optional, সুন্দর দেখানোর জন্য) */
        .vertical-menu .hs-mega-menu::-webkit-scrollbar,
        .vertical-menu .hs-sub-menu::-webkit-scrollbar {
            width: 5px;
        }

        .vertical-menu .hs-mega-menu::-webkit-scrollbar-thumb,
        .vertical-menu .hs-sub-menu::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        /* মেগা-মেনুর ভেতরের ব্যাকগ্রাউন্ড ইমেজ (vmm-bg) যেন কলামের সাথে ওভারল্যাপ না করে */
        .vertical-menu .vmm-tfw {
            position: relative;
        }

        .vertical-menu .vmm-bg {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 35%;
            z-index: 0;
        }

        .vertical-menu .u-header__mega-menu-wrapper {
            position: relative;
            z-index: 1;
        }

        /* মূল ভার্টিকাল মেনু লিস্ট নিজে scroll পাবে (আগের সমস্যা) */
        #basicsCollapseOne .navbar-nav.u-header__navbar-nav {
            max-height: 420px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .vertical-menu {
            position: relative;
        }

        .vertical-menu .hs-mega-menu,
        .vertical-menu .hs-sub-menu {
            position: absolute;
            top: 0;
            left: 100%;
            /* ভার্টিকাল মেনুর ঠিক ডানপাশে বসবে */
            min-width: 500px;
        }
    </style>

</head>

<body>

    <!-- ========== HEADER ========== -->
    @include('frontend.layouts.partials.header')
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @yield('content')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    @include('frontend.layouts.partials.footer')
    <!-- ========== END FOOTER ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Account Sidebar Navigation -->
    @include('frontend.layouts.partials.account_sidebar')
    <!-- End Account Sidebar Navigation -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- Go to Top -->
    <a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
        data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
        <span class="fas fa-arrow-up u-go-to__inner"></span>
    </a>
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="{{ asset('frontend') }}/temp/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('frontend') }}/temp/vendor/appear.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script src="{{ asset('frontend') }}/temp/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/slick-carousel/slick/slick.js"></script>
    <script src="{{ asset('frontend') }}/temp/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- JS Electro -->
    <script src="{{ asset('frontend') }}/temp/js/hs.core.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.countdown.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.header.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.hamburgers.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.unfold.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.focus-state.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.malihu-scrollbar.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.validation.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.fancybox.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.onscroll-animation.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.slick-carousel.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.show-animation.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.go-to.js"></script>
    <script src="{{ asset('frontend') }}/temp/js/components/hs.selectpicker.js"></script>

    {{-- Notyf --}}
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // Ajax setup
        const csrf = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        // Notyf instance (global)
        const notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'bottom',
            }
        });

        // Toast function
        function showToast(text, type = 'success') {

            if (type === 'error') {
                notyf.error(text);
            } else {
                notyf.success(text);
            }
        }
    </script>

    @if (session('success'))
        <script>
            showToast("{{ session('success') }}", 'success');
        </script>
    @endif

    @if (session('error'))
        <script>
            showToast("{{ session('error') }}", 'error');
        </script>
    @endif

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
        $(document).ready(function() {
            // ✅ Signup Handling
            $('#signup').submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let data = form.serialize();
                let submitBtn = form.find('button[type="submit"]');
                let errorDiv = $('#signupError');

                // রিসেট এরর এবং বাটন ডিজেবল
                errorDiv.addClass('d-none').html('');
                submitBtn.prop('disabled', true).text('Creating Account...');

                $.ajax({
                    url: "{{ route('customer.register.submit') }}",
                    type: "POST",
                    data: data,
                    success: function(res) {
                        if (res.status) {
                            // সাকসেস হলে রিডাইরেক্ট করবে, সেখানে সেশন মেসেজ শো করবে
                            window.location.href = res.redirect;
                        }
                    },

                    error: function(xhr) {

                        submitBtn.prop('disabled', false).text('Get Started');

                        console.log('HTTP Status:', xhr.status);
                        console.log('Response:', xhr.responseText);
                        console.log('Response JSON:', xhr.responseJSON);

                        errorDiv.removeClass('d-none');

                        // Laravel Validation Error
                        if (xhr.status === 422 && xhr.responseJSON?.errors) {

                            let msg = '';

                            $.each(xhr.responseJSON.errors, function(key, value) {
                                msg += value[0] + '<br>';
                            });

                            errorDiv.html(msg);

                        }
                        // Laravel Exception / Server Error
                        else if (xhr.responseJSON?.message) {

                            errorDiv.html(xhr.responseJSON.message);

                        }
                        // Other Error
                        else {

                            errorDiv.html(
                                'Something went wrong. Please try again.'
                            );
                        }
                    }
                });
            });
        });
    </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll(
                '#basicsCollapseOne .hs-has-mega-menu, #basicsCollapseOne .hs-has-sub-menu');

            items.forEach(function(item) {
                const submenu = item.querySelector('.hs-mega-menu, .hs-sub-menu');
                if (!submenu) return;

                item.addEventListener('mouseenter', function() {
                    const rect = item.getBoundingClientRect();
                    submenu.style.position = 'fixed';
                    submenu.style.top = 200. top + 'px';
                    submenu.style.left = rect.right +
                        'px'; // ডানদিকে খুলবে (data-position="left" হলে left বদলে দিন)
                    submenu.style.display = 'block';
                    submenu.style.zIndex = 9999;
                });

                item.addEventListener('mouseleave', function() {
                    submenu.style.display = 'none';
                });
            });
        });
    </script>

    @stack('footer_script')
</body>

</html>
