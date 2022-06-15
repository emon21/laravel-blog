@extends('frontend.layouts.master')
@section('title', 'Blog')
@section('script')
    .breadcrumb {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    list-style: none;
    background-color: none!important;
    border-radius: 0.25rem;
    }
@endsection
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0">Blog</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Blog</li>
                        <li class="breadcrumb-item active">Blog List</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        @foreach ($postList as $post)
                            <div class="col-lg-6 mb-4">
                                <div class="entry2">
                                    <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img
                                            src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                                    <div class="excerpt">

                                        <h2><a href="{{ route('singleCategory', $post->slug) }}">{{ $post->title }}</a>
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
                            <!-- End post list item -->
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
@endsection
