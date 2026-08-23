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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-1">
            <h1 class="text-center">Register</h1>
        </div>
        <div class="mb-4 mb-xl-8">
            <div class="row">

                <div class="col-md-4 mb-8 mb-md-0 m-auto">
                    <!-- Title -->
                    <p class="text-gray-90 mb-4 font-size-12 text-center">Create new account today to reap the benefits of a
                        personalized shopping
                        experience.</p>
                    <!-- End Title -->
                    <!-- Form Group -->
                    <form id="signup" class="js-validate" novalidate="novalidate" data-target-group="idForm">
                                    @csrf
                        <div class="js-form-message form-group mb-3">
                            <label class="form-label" for="name">Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="js-form-message js-focus-state">
                                <label class="sr-only" for="signupName">Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="signupNameLabel">
                                            <span class="fas fa-user"></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="name" id="signupName"
                                        placeholder="Name" aria-label="Name" aria-describedby="signupNameLabel" required
                                        data-msg="Please enter your name." data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="js-form-message form-group mb-3">
                            <label class="form-label" for="phone">Phone
                                <span class="text-danger">*</span>
                            </label>
                            <div class="js-form-message js-focus-state">
                                <label class="sr-only" for="signupEmail">Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="signupEmailLabel">
                                            <span class="fas fa-phone"></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="phone" id="signupPhone"
                                        placeholder="Phone" aria-label="Phone" aria-describedby="signupPhoneLabel" required
                                        data-msg="Please enter your phone number." data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="js-form-message form-group mb-3">
                            <label class="form-label" for="RegisterSrEmailExample3">Email address
                                <span class="text-danger">*</span>
                            </label>
                            <div class="js-form-message js-focus-state">
                                <label class="sr-only" for="signupEmail">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="signupEmailLabel">
                                            <span class="fas fa-envelope"></span>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="signupEmail"
                                        placeholder="Email" aria-label="Email" aria-describedby="signupEmailLabel" required
                                        data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="js-form-message form-group mb-3">
                            <label class="form-label" for="password">Password
                                <span class="text-danger">*</span>
                            </label>
                            <div class="js-form-message js-focus-state">
                                <label class="sr-only" for="signupPassword">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="signupPasswordLabel">
                                            <span class="fas fa-lock"></span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="signupPassword"
                                        placeholder="Password" aria-label="Password"
                                        aria-describedby="signupPasswordLabel" required
                                        data-msg="Your password is invalid. Please try again."
                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="js-form-message form-group mb-3">
                            <label class="form-label" for="RegisterSrEmailExample3">Confirm Password
                                <span class="text-danger">*</span>
                            </label>
                            <div class="js-form-message js-focus-state">
                                <label class="sr-only" for="password_confirmation">Confirm
                                    Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password_confirmation">
                                            <span class="fas fa-key"></span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Confirm Password"
                                        aria-label="Confirm Password" aria-describedby="password_confirmation" required
                                        data-msg="Password does not match the confirm password."
                                        data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>


                        <!-- End Form Group -->
                        <!-- Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Register</button>
                            <div class="text-center">
                                <span class="small text-dark">Already have an account?</span>
                                <a class="small btn btn-sm px-1" href="{{ route('customer.login') }}">Login
                                </a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    <h3 class="font-size-18 my-3">Sign up today and you will be able to :</h3>
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
