@extends('frontend.layouts.master')

@section('title', 'Tag List')
@section('content')
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts mt-4">

        <div class="container" data-aos="fade-up">

            {{-- <div class="section-header">
                <h2>Blog</h2>
                <p>Recent posts form our Blog</p>
            </div> --}}

            {{-- <div class="section-header">
                <h2>Category Of Post List : {{ $slug }}</h2>
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div> --}}


            <div class="py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Tag</span>
                            <h3>{{ $tag->tag_name }}</h3>
                            {{-- <span>{{ $category->count() }}</span> --}}
                            @if ($tag->description)
                                <p>{{ $tag->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section bg-white">
                <div class="container">
                    <div class="row">
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <div class="col-lg-4 mb-4">
                                    <div class="entry2">
                                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img
                                                src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                                        <div class="excerpt">


                                            <h2><a
                                                    href="{{ route('website.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                            </h2>
                                            <div class="post-meta align-items-center text-left clearfix">
                                                <figure class="author-figure mb-0 mr-3 float-left"><img
                                                        src="@if ($post->user->image) {{ asset($post->user->image) }} @else
                                                        {{ asset('backend/user/user.png') }} @endif"
                                                        alt="Image" class="img-fluid">
                                                </figure>
                                                <span class="d-inline-block mt-1">By <a
                                                        href="#">{{ $post->user->name }}</a></span>
                                                <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d , Y') }}</span>
                                            </div>

                                            <p>{{ $post->description }}</p>
                                            {{-- <p><a href="{{ route('website.post', ['slug' => $post->slug]) }}"
                                                    class="btn btn-success">Read
                                                    More</a>
                                            </p> --}}
                                            <div class=" btn btn-outline-dark mt-auto align-self-center">
                                                <a href="{{ route('website.post', ['slug' => $post->slug]) }}">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="text-center text-danger"> Sorry This Tag No Post Data !!</span>
                        @endif
                    </div>

                </div>
            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->
@endsection
