@extends('frontend.layouts.app')
@section('title', 'All Blog Posts')
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="max-width-1100-wd">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-4">
                                <article class="card mb-13 border-0">

                                    <a href="{{ route('blog.detail', $blog->slug) }}" class="d-block"><img class="img-fluid"
                                            src="{{ asset($blog->image) }}"
                                            alt="Image Description"></a>
                                    <div class="card-body pt-5 pb-0 px-0">
                                        <h4 class="mb-3"><a
                                                href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <div class="mb-3 pb-3 border-bottom">
                                            <div
                                                class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                <a href="{{ route('blog.category', $blog->category->slug) }}" class="mx-0dot5 text-gray-5">{{ $blog->category->name }},</a>
                                                <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i
                                                        class="fas fa-circle"></i></span>
                                                <span class="mx-0dot5 text-gray-5">{{ $blog->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                        <p>{{ Str::limit($blog->description, 100) }}</p>
                                        <div class="flex-horizontal-center">
                                            <a href="{{ route('blog.detail', $blog->slug) }}"
                                                class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read
                                                More</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
               @include('frontend.blog.partials.search')
                <aside class="mb-7">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Categories</h3>
                    </div>
                    <div class="list-group">
                        @foreach ($categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}"
                                class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i
                                    class="mr-2 fas fa-angle-right"></i> {{ $category->name }}</a>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>

@endsection
