@extends('backend.layouts.app')
@section('title', 'Profile')
@section('content')
    <main id="main-container">
        <div class="bg-image">
            <div class="bg-primary-dark-op">
                <div class="content content-full text-center">
                    <div class="my-3">
                        @if (auth()->user()->image == null)
                            <img class="img-avatar img-avatar-thumb" src="https://placehold.co/50" alt="">
                        @else
                            <img class="img-avatar img-avatar-thumb" src="{{ asset(auth()->user()->image) }}" alt="">
                        @endif
                    </div>
                    <h1 class="h2 text-white mb-0">Edit Account</h1>
                    <h2 class="h4 fw-normal text-white-75">
                        {{ auth()->user()->name }}
                    </h2>
                    <a class="btn btn-alt-secondary" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
        <div class="content content-boxed">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Profile</h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('admin.profile.update', auth()->user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row push">
                            <div class="col-lg-8 col-xl-5 m-auto">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-name">Name</label>
                                    <input type="text" class="form-control" id="one-profile-edit-name" name="name"
                                        placeholder="Enter your name.." value="{{ auth()->user()->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        placeholder="Enter your phone.." value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                    <input type="email" class="form-control" id="one-profile-edit-email" name="email"
                                        placeholder="Enter your email.." value="{{ auth()->user()->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="address" class="form-control" id="address" name="address"
                                        placeholder="Enter your address.." value="{{ auth()->user()->address }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="nid">NID</label>
                                    <input type="text" class="form-control" id="nid" name="nid"
                                        placeholder="Enter your nid.." value="{{ auth()->user()->nid }}">
                                    @error('nid')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Your Avatar</label>
                                    <div class="mb-4">
                                        @if (auth()->user()->image == null)
                                            <img class="img-avatar" id="image" src="https://placehold.co/50"
                                                alt="">
                                        @else
                                            <img class="img-avatar" id="image" src="{{ asset(auth()->user()->image) }}"
                                                alt="">
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Choose a new avatar</label>
                                        <input class="form-control" id="image" type="file" accept="image/*"
                                            name="image"
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Change Password</h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('admin.profile.password', auth()->user()) }}" method="POST">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-8 col-xl-5 m-auto">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-password">Current Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password"
                                        name="current_password">
                                    @error('current_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                                        <input type="password" class="form-control" id="one-profile-edit-password-new"
                                            name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New
                                            Password</label>
                                        <input type="password" class="form-control"
                                            id="one-profile-edit-password-new-confirm" name="password_confirmation">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
