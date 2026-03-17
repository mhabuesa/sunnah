@extends('backend.layouts.app')
@section('title', 'Products Show')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/magnific-popup/magnific-popup.css">
@endpush
@section('content')

    <div class="row">
        <div class="col-xl-8 order-xl-0 m-auto">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        User Information
                    </h3>
                </div>
                <div class="block-content">
                    <table class="table ">
                        <tr>
                            <th>Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <th>NID</th>
                            <td>{{$user->nid}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{asset($user->image)}}" width="50" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
