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
                    <div class="mb-4">
                        @if ($postLists->count() > 0)
                            Total Posts : ( {{ $postLists->count() }} )
                        @endif
                    </div>
                    <div class="row gy-4 posts-list">
                        @if ($blogs->count() > 0)


                            @foreach ($blogs as $post)
                                <div class="col-lg-6 mb-4">
                                    <div class="entry2">
                                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img
                                                src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                                        <div class="excerpt">

                                            <h2><a
                                                    href="{{ route('singleCategory', $post->slug) }}">{{ $post->title }}</a>
                                            </h2>

                                            <h4>
                                                Categories <span class="post-category text-white bg-danger mb-3 p-2">
                                                    {{ $post->category->category_name }}
                                                </span>
                                            </h4>
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
                                            <p class="text-justify">{{ $post->description }}</p>
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
                        @else
                            <div class="col-12 d-flex justify-content-center bg-light p-4" style="margin-top: 30%">
                                <span
                                    style="font-size: 50px;font-weight:bold;font-size: 50px;font-weight: bold;text-transform: capitalize;color: #f23a2ec9;">No
                                    Data Found</span>
                            </div>

                        @endif

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            {{ $blogs->links() }}
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
