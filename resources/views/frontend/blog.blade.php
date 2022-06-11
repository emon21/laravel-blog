@extends('frontend.layouts.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li>Blog List</li>
                    </ol>
                </div>



            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <div class="row gy-4 posts-list">

                            @foreach ($postList as $post)
                                <div class="col-lg-6">
                                    <article class="d-flex flex-column">

                                        <div class="post-img">
                                            <img src="{{ $post->image_url }}" alt="" class="img-fluid">
                                        </div>

                                        <h2 class="title">
                                            <a href="blog-details.html">{{ $post->title }}</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $post->USER->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2022-01-01">{{ $post->created_at->format('M-d-Y') }}</time></a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                        href="blog-details.html">12 Comments</a></li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p class="text-justify">
                                                {!! $post->description !!}
                                            </p>
                                        </div>

                                        <div class=" btn btn-outline-dark mt-auto align-self-center">
                                            <a href="{{ url('singlePost', $post->id) }}">Read More</a>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endforeach


                        </div><!-- End blog posts list -->

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                {{ $postList->links() }}
                                {{-- <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li> --}}
                            </ul>
                        </div><!-- End blog pagination -->

                    </div>

                    <!-- sidebar start  -->
                    @include('frontend.layouts.pages.sidebar')
                    <!-- sidebar End  -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
