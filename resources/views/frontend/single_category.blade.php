@extends('frontend.layouts.master')

@section('title', 'Single Category')
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
                            <span>Category</span>
                            <h3>{{ $category->category_name }}</h3>
                            {{-- <span>{{ $category->count() }}</span> --}}
                            @if ($category->description)
                                <p>{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section bg-white">
                <div class="container">
                    <div class="row">


                        {{-- <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
                                <div class="excerpt">
                                    <span class="post-category text-white bg-success mb-3">Nature</span>

                                    <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg"
                                                alt="Image" class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                                        <span>&nbsp;-&nbsp; July 19, 2019</span>
                                    </div>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                        laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                        aliquid, dicta beatae quia porro id est.</p>
                                    <p><a href="#">Read More</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
                                <div class="excerpt">
                                    <span class="post-category text-white bg-danger mb-3">Sports</span>
                                    <span class="post-category text-white bg-secondary mb-3">Tech</span>

                                    <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg"
                                                alt="Image" class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                                        <span>&nbsp;-&nbsp; July 19, 2019</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                        laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                        aliquid, dicta beatae quia porro id est.</p>
                                    <p><a href="#">Read More</a></p>
                                </div>
                            </div>
                        </div> --}}
                        @if ($postlist->count() > 0)
                            @foreach ($postlist as $post)
                                <div class="col-lg-4 mb-4">
                                    <div class="entry2">
                                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img
                                                src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                                        <div class="excerpt">
                                            <span
                                                class="post-category text-white bg-danger mb-3">{{ $category->category_name }}</span>

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
                            <span class="text-center text-danger">This Category Data Not Found</span>
                        @endif
                    </div>
                    <div class="row text-center pt-5 border-top">
                        <div class="col-md-12">
                            {{ $postlist->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->
@endsection
