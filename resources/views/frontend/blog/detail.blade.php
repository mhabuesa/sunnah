@extends('frontend.layouts.app')
@section('title', 'Blog Detail')
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="{{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-wd">
                <div class="min-width-1100-wd">
                    <article class="card mb-8 border-0">
                        <img class="img-fluid" src="{{ asset($blog->image) }}" alt="Image Description">
                        <div class="card-body pt-5 pb-0 px-0">
                            <div class="d-block d-md-flex flex-center-between mb-4 mb-md-0">
                                <h4 class="mb-md-3 mb-1">{{ $blog->title }}</h4>
                            </div>
                            <div class="mb-3 pb-3 border-bottom">
                                <div
                                    class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                    <a href="{{ route('blog.category', $blog->category->slug) }}"
                                        class="mx-0dot5 text-gray-5">{{ $blog->category->name }},</a>
                                    <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                    <span class="mx-0dot5 text-gray-5">{{ $blog->created_at->format('F j, Y') }}</span>
                                </div>
                            </div>
                            <p><strong>{{ $blog->description }}</strong></p>
                            <p>{!! $blog->content !!}</p>

                        </div>
                    </article>
                </div>
            </div>
            <div class="col-xl-3 col-wd">
                @include('frontend.blog.partials.search')
                @include('frontend.blog.partials.categories')
                @include('frontend.blog.partials.recent_posts')
            </div>
        </div>
    </div>

@endsection
