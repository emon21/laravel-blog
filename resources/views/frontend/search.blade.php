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
                            <div class="card">
                                {{-- @if ($recent->image)
                              <img src="{{ $recent->image }}" alt="feature" class="img-fluid rounded">
                          @else
                              <img src="{{ $recent->image_url }}" alt="default" class="img-fluid rounded">
                          @endif --}}
                                <a href="{{ route('website.post', ['slug' => $recent->slug]) }}">
                                    <img src="@if ($recent->image_url) {{ asset($recent->image_url) }} @else
                                        {{ asset('backend/blog/default_image.png') }} @endif"
                                        alt="feature" class="img-fluid card-img-top">
                                </a>

                                <div class="card-body">
                                    <h4>
                                        <a
                                            href="{{ route('website.post', ['slug' => $recent->slug]) }}">{{ $recent->title }}</a>
                                    </h4>
                                    <span
                                        class="post-category text-white bg-secondary mb-3">{{ $recent->category->category_name }}</span>

                                    <p class="card-text text-justify">{{ Str::limit($recent->description, 100) }}</p>

                                    <div class="d-flex">

                                        <img src="@if ($recent->user->image) {{ asset($recent->user->image) }} @else
                                      {{ asset('backend/user/user.png') }} @endif"
                                            alt="Image" class="img-fluid rounded-circle"
                                            style="width: 50px;height:50px;">

                                        <span class="d-inline-block mt-2 ml-2">By <a
                                                href="{{ route('website.post', ['slug' => $recent->slug]) }}">{{ $recent->user->name }}</a></span>
                                        <span class="d-inline-block mt-2 ml-2">&nbsp;-&nbsp;
                                            {{ $recent->created_at->format('M d, Y') }}</span>
                                    </div>

                                    <a href="{{ route('website.post', ['slug' => $recent->slug]) }}"
                                        class="btn btn-outline-success justify-content-center mt-3">Read More</a>

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
