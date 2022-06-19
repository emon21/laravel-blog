@extends('frontend.layouts.master')
@section('title', 'Single Post')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ $post->image_url }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->category_name }}</span>
                        <h1 class="mb-4"><a href="javascript:void()">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                    src="@if ($post->user->image) {{ asset($post->user->image) }} @else
                                    {{ asset('backend/user/user.png') }} @endif"
                                    alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp;{{ $post->created_at->format('M-d-Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        {!! $post->description !!}
                    </div>
                    <div class="pt-2">
                        <p>Categories:
                            <span class="badge badge-success p-2 ">
                                <a href="{{ route('singleCategory', $post->category->slug) }}"
                                    class="text-white">{{ $post->category->category_name }}</a></span>
                            @if ($post->tags->count() > 0)
                                Tags:
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1 ">
                                        <a href="{{ route('website.tag', ['slug' => $tag->slug]) }}"
                                            class="text-light">{{ $tag->tag_name }}</a>
                                    </span>
                                @endforeach
                            @endif
                        </p>
                    </div>

                    <section class="site-section py-lg">
                        <div class="container">

                            <div class="row blog-entries element-animate">

                                <div class="col-md-12 main-content">

                                    <div class="post-content-body">
                                        {!! $post->description !!}

                                        <div class="row mb-5 mt-5">
                                            <div class="col-md-12 mb-4">
                                                <img src="@if ($post->image_url) {{ asset($post->image_url) }} @else
                                                {{ asset('backend/blog/default.png') }} @endif"
                                                    alt="Image placeholder" class="img-fluid rounded w-100">
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <img src="@if ($post->image_url) {{ asset($post->image_url) }} @else
                                                {{ asset('backend/blog/default.png') }} @endif"
                                                    alt="Image placeholder" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <img src="@if ($post->image_url) {{ asset($post->image_url) }} @else
                                                {{ asset('backend/blog/default.png') }} @endif"
                                                    alt="Image placeholder" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        {!! $post->description !!}

                                    </div>


                                    <div class="pt-2">
                                        <p>Categories:

                                            <a
                                                href="{{ route('singleCategory', $post->category->slug) }}">{{ $post->category->category_name }}</a>
                                            @if ($post->tags->count() > 0)
                                                Tags:
                                                @foreach ($post->tags as $tag)
                                                    <a
                                                        href="{{ route('website.tag', ['slug' => $tag->slug]) }}">{{ $tag->tag_name }}</a>,
                                                @endforeach
                                            @endif

                                        </p>
                                    </div>

                                    <div id="disqus_thread"></div>

                                    <hr
                                        style="height:2px; width:50%; border-width:0; color:red; background-color:red;    margin-top: 40px;">
                                    <h2 class="text-center text-warning">OR</h2>

                                    <div class="pt-2">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="mb-5">{{ $post->comments_count }} Comments</h3>
                                            <h3 class="mb-5">{{ $post->comments_count }} share</h3>
                                        </div>
                                        @if ($post->comments->count() > 0)
                                            @foreach ($post->comments as $comment)
                                                <ul class="comment-list">
                                                    <li class="comment">
                                                        <div class="vcard">
                                                            <img src="@if ($comment->user->image) {{ asset($comment->user->image) }} @else
                                                            {{ asset('backend/user/user.png') }} @endif"
                                                                alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>{{ $comment->user->name }}</h3>
                                                            <h3>{{ $comment->comment }}</h3>
                                                            <div class="meta text-dark">
                                                                @if ($comment->created_at)
                                                                    {{ $comment->created_at->format('M d Y H:i:s A') }}
                                                                    {{ $comment->created_at->diffForHumans() }}
                                                                @endif
                                                                {{-- {{ $comment->created_at->format('M d ,Y') }} --}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                        @if (Auth::check())
                                            <ul class="comment-list">
                                                <li class="comment">
                                                    <div class="vcard">
                                                        <img src="@if ($post->user->image) {{ asset($post->user->image) }} @else
                                                      {{ asset('backend/user/user.png') }} @endif"
                                                            alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>{{ Auth::user()->name }}</h3>
                                                        <form action="{{ route('userComment') }}" method="post"
                                                            class="p-2 bg-light">
                                                            @csrf
                                                            <input type="hidden" name="post_id"
                                                                value="{{ $post->id }}">
                                                            <div class="form-group">
                                                                {{-- <label for="message">Message</label> --}}
                                                                <textarea name="comment" id="message" rows="5" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" value="Post Comment"
                                                                    class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        @else
                                            <div class="div d-block col-sm-8 justify-content-center mx-auto">
                                                <div class="card">
                                                    <div class="card-header text-danger"><i class="fa fa-sign-in "
                                                            aria-hidden="true"></i> Login Here</div>
                                                    <div class="card-body mt-2">
                                                        <span class="alert alert-danger text-dark">Sorry Do Not Comment
                                                            This Blog Please Login Here</span>
                                                        <a href="{{ route('login') }}" class="btn btn-success mt-4"><i
                                                                class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- END comment-list -->


                                    </div>

                                </div>

                                <!-- END main-content -->

                                <div class="col-md-12 col-lg-4 sidebar">
                                    <div class="sidebar-box search-form-wrap">
                                        <form action="#" class="search-form">
                                            <div class="form-group">
                                                <span class="icon fa fa-search"></span>
                                                <input type="text" class="form-control" id="s"
                                                    placeholder="Type a keyword and hit enter">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- END sidebar-box -->

                                </div>
                                <!-- END sidebar -->

                            </div>
                        </div>
                    </section>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s"
                                    placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="@if ($post->user->image) {{ asset($post->user->image) }} @else
                            {{ asset('backend/user/user.png') }} @endif"
                                alt="Image Placeholder" class="img-fluid mb-1">
                            <div class="bio-body">
                                <h2>{{ $post->user->name }}</h2>
                                <p class="mb-4">{{ $post->user->description }}</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                                <p class="social">
                                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>

                                @foreach ($posts as $post)
                                    <li>
                                        <a href="{{ route('website.post', ['slug' => $post->slug]) }}">
                                            <img src="{{ asset($post->image_url) }}" alt="Image placeholder"
                                                class="mr-4">
                                            <div class="text">
                                                <h4>{{ $post->title }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">
                                                        {{ $post->created_at->format('M d ,Y') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($category as $catlist)
                                <li><a href="{{ route('singleCategory', $catlist->slug) }}">{{ $catlist->category_name }}
                                        <span>(12)</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>

                        <ul class="tags">

                            @foreach ($tags as $tag)
                                <li><a href="{{ route('website.tag', $tag->slug) }}">{{ $tag->tag_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>More Related Posts</h2>
                </div>
            </div>
            <div class="row align-items-stretch retro-layout">
                @foreach ($lastrelatedpost as $relatedPost)
                    <div class="col-md-5 order-md-2">
                        <a href="{{ route('website.post', ['slug' => $relatedPost->slug]) }}"
                            class="hentry img-1 h-100 gradient"
                            style="background-image: url('{{ $relatedPost->image }}');">
                            <span
                                class="post-category text-white bg-danger">{{ $relatedPost->category->category_name }}</span>
                            <div class="text">
                                <h2>{{ $relatedPost->title }}</h2>
                                <span>{{ $relatedPost->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="col-md-7">

                    @foreach ($firstrelatedpost as $relatedPost)
                        <a href="{{ route('website.post', ['slug' => $relatedPost->slug]) }}"
                            class="hentry img-2 v-height mb30 gradient"
                            style="background-image: url('{{ $relatedPost->image }}');">
                            <span
                                class="post-category text-white bg-success">{{ $relatedPost->category->category_name }}</span>
                            <div class="text text-sm">
                                <h2>{{ $relatedPost->title }}</h2>
                                <span>{{ $relatedPost->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach

                    <div class="two-col d-block d-md-flex justify-content-between">
                        @foreach ($middlerelatedpost as $relatedPost)
                            <a href="{{ route('website.post', ['slug' => $relatedPost->slug]) }}"
                                class="hentry v-height img-2 gradient"
                                style="background-image: url('{{ $relatedPost->image }}');">
                                <span
                                    class="post-category text-white bg-warning">{{ $relatedPost->category->category_name }}</span>
                                <div class="text text-sm">
                                    <h2>{{ $relatedPost->title }}</h2>
                                    <span>{{ $relatedPost->created_at->format('M d, Y') }}</span>
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
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
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
@section('script')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://blog-laravel-afunfs7dwb.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
@endsection
