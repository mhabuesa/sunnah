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
        <div class="my-4 my-xl-6">
            <div class="row">
                <div class="col-md-4 mb-8 mb-md-0 m-auto">
                    <form id="login" class="js-validate" data-target-group="idForm">
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
                                <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Login</button>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <span class="small text-dark">Do not have an account?</span>
                            <a class="small btn btn-sm px-1" href="{{route('customer.register')}}">Signup
                            </a>
                        </div>
                        <!-- End Button -->
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
