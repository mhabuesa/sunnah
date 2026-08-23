    <aside id="sidebarContent" class="u-sidebar" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                    <!-- Toggle Button -->
                    <div class="d-flex align-items-center pt-4 px-7">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <i class="ec ec-close-remove"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->

                    <!-- Content -->
                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">
                            <div class="js-validate">
                                <!-- Login -->
                                <form id="login" data-target-group="idForm">
                                    @csrf
                                    <!-- Title -->
                                    <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Welcome Back!</h2>
                                        <p>Login to manage your account.</p>
                                    </header>
                                    <!-- End Title -->

                                    <header class="text-center mb-7">
                                        <div id="loginError" class="alert alert-danger d-none"></div>
                                    </header>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="phoneLabel">Phone</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="phoneLabel">
                                                        <span class="fas fa-phone"></span>
                                                    </span>
                                                </div>
                                                <input type="phone" class="form-control" name="phone" id="phone"
                                                    placeholder="Phone" aria-label="Phone" aria-describedby="phoneLabel"
                                                    required data-msg="Please enter a valid phone number."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signinPassword">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password"
                                                    id="signinPassword" placeholder="Password" aria-label="Password"
                                                    aria-describedby="signinPasswordLabel" required
                                                    data-msg="Your password is invalid. Please try again."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <div class="js-form-message mb-3">
                                        <div class="custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="rememberCheckbox"
                                                name="remember" required="" data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                            <label class="custom-control-label form-label" for="rememberCheckbox">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mb-4">
                                        <a class="js-animation-link small link-muted" href="javascript:;"
                                            data-target="#forgotPassword" data-link-group="idForm"
                                            data-animation-in="slideInUp">Forgot Password?</a>
                                    </div>

                                    <div class="mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-sm btn-primary transition-3d-hover text-white">Login</button>
                                    </div>

                                    <div class="text-center mb-4">
                                        <span class="small text-muted">Do not have an account?</span>
                                        <a class="js-animation-link small" href="javascript:;" data-target="#signup"
                                            data-link-group="idForm" data-animation-in="slideInUp">Signup
                                        </a>
                                    </div>

                                    <div class="text-center">
                                        <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                    </div>

                                    <!-- Login Buttons -->
                                    <div class="d-flex">
                                        <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0"
                                            href="#">
                                            <span class="fab fa-google mr-1"></span>
                                            Google
                                        </a>
                                    </div>
                                    <!-- End Login Buttons -->
                                </form>

                                <!-- Signup -->
                                <form id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                    @csrf
                                    <!-- Title -->
                                    <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Welcome to Electro.</h2>
                                        <p>Fill out the form to get started.</p>
                                    </header>
                                    <!-- End Title -->
                                    <header class="text-center mb-7">
                                        <div id="signupError" class="alert alert-danger d-none"></div>
                                    </header>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupName">Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupNameLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="name"
                                                    id="signupName" placeholder="Name" aria-label="Name"
                                                    aria-describedby="signupNameLabel" required
                                                    data-msg="Please enter your name." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupEmail">Phone</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupEmailLabel">
                                                        <span class="fas fa-phone"></span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="phone"
                                                    id="signupPhone" placeholder="Phone" aria-label="Phone"
                                                    aria-describedby="signupPhoneLabel" required
                                                    data-msg="Please enter your phone number."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupEmail">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupEmailLabel">
                                                        <span class="fas fa-envelope"></span>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="email"
                                                    id="signupEmail" placeholder="Email" aria-label="Email"
                                                    aria-describedby="signupEmailLabel" required
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupPassword">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password"
                                                    id="signupPassword" placeholder="Password" aria-label="Password"
                                                    aria-describedby="signupPasswordLabel" required
                                                    data-msg="Your password is invalid. Please try again."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="password_confirmation">Confirm
                                                Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="password_confirmation">
                                                        <span class="fas fa-key"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control"
                                                    name="password_confirmation" id="password_confirmation"
                                                    placeholder="Confirm Password" aria-label="Confirm Password"
                                                    aria-describedby="password_confirmation" required
                                                    data-msg="Password does not match the confirm password."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <div class="mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-sm btn-primary transition-3d-hover text-white">Get
                                            Started</button>
                                    </div>

                                    <div class="text-center mb-4">
                                        <span class="small text-muted">Already have an account?</span>
                                        <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                            data-link-group="idForm" data-animation-in="slideInUp">Login
                                        </a>
                                    </div>

                                    <div class="text-center">
                                        <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                    </div>

                                    <!-- Login Buttons -->
                                    <div class="d-flex">
                                        <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0"
                                            href="#">
                                            <span class="fab fa-google mr-1"></span>
                                            Google
                                        </a>
                                    </div>
                                    <!-- End Login Buttons -->
                                </form>
                                <!-- End Signup -->

                                <!-- Forgot Password -->
                                <div id="forgotPassword" style="display: none; opacity: 0;"
                                    data-target-group="idForm">
                                    <!-- Title -->
                                    <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Recover Password.</h2>
                                        <p>Enter your email address and an email with instructions will be sent to you.
                                        </p>
                                    </header>
                                    <!-- End Title -->

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="recoverEmail">Your email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="recoverEmailLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="email"
                                                    id="recoverEmail" placeholder="Your email"
                                                    aria-label="Your email" aria-describedby="recoverEmailLabel"
                                                    required data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <div class="mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-sm btn-primary transition-3d-hover text-white">Recover
                                            Password</button>
                                    </div>

                                    <div class="text-center mb-4">
                                        <span class="small text-muted">Remember your password?</span>
                                        <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                            data-link-group="idForm" data-animation-in="slideInUp">Login
                                        </a>
                                    </div>
                                </div>
                                <!-- End Forgot Password -->
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </aside>
