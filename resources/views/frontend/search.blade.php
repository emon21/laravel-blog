@extends('frontend.layouts.master')
@section('title', 'Home page')
@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Searching Posts</h2>
                    Total Search : ( {{ $posts->count() }} )
                </div>
            </div>
            <div class="row">
                @if ($posts->count() > 0)
                    @foreach ($posts as $recent)
                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="{{ route('website.post', ['slug' => $recent->slug]) }}">

                                    @if ($recent->image)
                                        <img src="{{ $recent->image }}" alt="feature" class="img-fluid rounded">
                                    @else
                                        <img src="{{ $recent->image_url }}" alt="default" class="img-fluid rounded">
                                    @endif


                                </a>
                                <div class="excerpt">
                                    <span
                                        class="post-category text-white bg-secondary mb-3">{{ $recent->category->category_name }}</span>

                                    <h2><a
                                            href="{{ route('website.post', ['slug' => $recent->slug]) }}">{{ $recent->title }}</a>
                                    </h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left">
                                            <img src="@if ($recent->user->image) {{ asset($recent->user->image) }} @else
                                   {{ asset('backend/user/user.png') }} @endif"
                                                alt="Image" class="img-fluid">
                                        </figure>
                                        <span class="d-inline-block mt-1">By <a
                                                href="{{ route('website.post', ['slug' => $recent->slug]) }}">{{ $recent->user->name }}</a></span>
                                        <span>&nbsp;-&nbsp; {{ $recent->created_at->format('M d, Y') }}</span>
                                    </div>

                                    <p>{{ Str::limit($recent->description, 100) }}</p>
                                    <p><a href="{{ route('website.post', ['slug' => $recent->slug]) }}"
                                            class="btn btn-outline-success">Read More</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 d-flex justify-content-center">
                        <span class="alert alert-danger text-dark">No Data Found</span>
                    </div>
                @endif

            </div>

            <div class="row text-center pt-5 border-top">

            </div>
        </div>
    </div>


@endsection
