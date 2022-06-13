@extends('frontend.layouts.master')
@section('title', 'Home page')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout-2">
                <div class="col-md-4">
                    @foreach ($firstpost as $post)
                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}"
                            class="h-entry mb-30 v-height gradient"
                            style="background-image: url('{{ $post->image_url }}');">
                            <div class="text">
                                <h2>{{ $post->title }}</h2>
                                <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-4">
                    @foreach ($middlepost as $post)
                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="h-entry img-5 h-100 gradient"
                            style="background-image: url('{{ $post->image_url }}');">

                            <div class="text">
                                <div class="post-categories mb-3">
                                    <span class="post-category bg-danger">{{ $post->category->category_name }}</span>
                                    {{-- <span class="post-category bg-primary">Food</span> --}}
                                </div>
                                <h2>T{{ $post->title }}</h2>
                                <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-4">
                    @foreach ($lastpost as $post)
                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}"
                            class="h-entry mb-30 v-height gradient"
                            style="background-image: url('{{ $post->image_url }}');">

                            <div class="text">
                                <h2>{{ $post->title }}</h2>
                                <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($recentpost as $recent)
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
                                        <img src="{{ asset($recent->user->image) }}" alt="Image" class="img-fluid">
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





            </div>
            <div class="row text-center pt-5 border-top">
                {{ $recentpost->links() }}
                {{-- <div class="col-md-12">
                   
                    <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Random Posts</h2>
                </div>
            </div>
            <div class="row align-items-stretch retro-layout">
                @foreach ($lastfooterpost as $footerpost)
                    <div class="col-md-5 order-md-2">
                        <a href="{{ route('website.post', ['slug' => $footerpost->slug]) }}"
                            class="hentry img-1 h-100 gradient"
                            style="background-image: url('{{ $footerpost->image_url }}');">
                            <span
                                class="post-category text-white bg-danger">{{ $footerpost->category->category_name }}</span>
                            <div class="text">
                                <h2>{{ $footerpost->title }}</h2>
                                <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="col-md-7">

                    @foreach ($fristfooterpost as $footerpost)
                        <a href="{{ route('website.post', ['slug' => $footerpost->slug]) }}"
                            class="hentry img-2 v-height mb30 gradient"
                            style="background-image: url('{{ $footerpost->image_url }}');">
                            <span
                                class="post-category text-white bg-success">{{ $footerpost->category->category_name }}</span>
                            <div class="text text-sm">
                                <h2>{{ $footerpost->title }}</h2>
                                <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach

                    <div class="two-col d-block d-md-flex justify-content-between">
                        @foreach ($middlefooterpost as $footerpost)
                            <a href="{{ route('website.post', ['slug' => $footerpost->slug]) }}"
                                class="hentry v-height img-2 gradient"
                                style="background-image: url('{{ $footerpost->image_url }}');">
                                <span
                                    class="post-category text-white bg-warning">{{ $footerpost->category->category_name }}</span>
                                <div class="text text-sm">
                                    <h2>{{ $footerpost->title }}</h2>
                                    <span>{{ $footerpost->created_at->format('M d, Y') }}</span>
                                </div>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                            nesciunt error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
