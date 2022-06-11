<div class="col-lg-4">
    <div class="sidebar">

        <div class="">
            <img src="{{ asset('frontend') }}/assets/img/blog/blog-author.jpg"
                class="img-fluid rounded-circle flex-shrink- w-50 justify-content-center d-block mx-auto" alt="">
            <h4 class="mt-3 text-center">User Profile</h4>
            <p class="text-center">Hi , @if (Auth::user()->name)
                    {{ Auth::user()->name }}
                @else
                    no
                @endif
            </p>
            <div class="btn btn-outline-dark mt-auto justify-content-center d-block mx-auto">
                <a href="">Read More</a>
            </div>
        </div>
        <hr>

        <div class="sidebar-item search-form">
            <h3 class="sidebar-title">Search</h3>
            <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <div class="sidebar-item categories">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="mt-3">
                @foreach ($categoryList as $list)
                    <li><a href="#">{{ $list->category_name }} <span>(25)</span></a></li>
                @endforeach

            </ul>
        </div><!-- End sidebar categories-->

        <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Recent Posts</h3>

            <div class="mt-3">

                @foreach ($postList as $posts)
                    <div class="post-item mt-3">
                        <img src="{{ asset('frontend') }}/assets/img/blog/blog-recent-1.jpg" alt=""
                            class="flex-shrink-0">
                        <div>
                            <h4><a href="{{ url('singlePost', $posts->id) }}">{{ $posts->title }}</a></h4>
                            <time datetime="2020-01-01">{{ $posts->created_at->format('d-M-Y') }}</time>
                        </div>
                    </div><!-- End recent post item-->
                @endforeach


            </div>

        </div><!-- End sidebar recent posts-->

        <div class="sidebar-item tags">
            <h3 class="sidebar-title">Tags</h3>

            <ul class="mt-3">
                @foreach ($tag as $tags)
                    <li><a href="#">{{ $tags->tag_name }}</a></li>
                @endforeach

            </ul>
        </div><!-- End sidebar tags-->

    </div><!-- End Blog Sidebar -->

</div>
