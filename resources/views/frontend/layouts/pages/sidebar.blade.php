<div class="col-lg-4">
    <div class="sidebar">

        <div class="">
            @if (Auth::check())
                <h4 class="mt-3 text-center mb-4">User Profile</h4>
                {{-- <img src="{{ asset('frontend') }}/assets/img/blog/blog-author.jpg"
             class="img-fluid rounded-circle flex-shrink- w-50 justify-content-center d-block mx-auto"
             alt=""> --}}
                <img src="@if ($currentUser->image) {{ asset($currentUser->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                    class="img-fluid rounded-circle flex-shrink- w-50 justify-content-center d-block mx-auto"
                    alt="">
                <p class="text-center mt-2">Hi , {{ Auth::user()->name }}</p>
                {{-- <div class="btn btn-outline-dark mt-auto justify-content-center d-block mx-auto">
             <a href="">Read More</a>
         </div> --}}
            @else
                <h6 class="mt-3 text-center mb-4 text-danger">Sorry!! You Are NoT Login</h6>
            @endif



        </div>
        <hr>

        <div class="sidebar-box search-form">
            <h3 class="sidebar-title">Search</h3>
            <form action="{{ route('website.blog') }}" method="get">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" name="search" placeholder="Searching Your Post ...!!"
                        class="form-control  @error('search') is-invalid @enderror">
                </div>
            </form>
        </div>

        <!-- End sidebar search formn-->

        <div class="sidebar-item categories">
            <h3 class="sidebar-title">Categories</h3>
            <ul>
                @foreach ($categoryList as $list)
                    <li><a href="{{ route('singleCategory', $list->slug) }}">{{ $list->category_name }}
                            <span>( {{ $list->posts_count }} )</span></a></li>
                @endforeach

            </ul>
        </div><!-- End sidebar categories-->



        <div class="sidebar-box">
            <h3 class="heading">Recent Posts</h3>
            <div class="post-entry-sidebar">
                <ul>

                    @foreach ($postLists as $post)
                        <li>
                            <a href="{{ url('singlePost', $post->slug) }}">
                                <img src="{{ asset($post->image_url) }}" alt="Image placeholder" class="mr-4">
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
        <!-- End sidebar recent posts-->



        <div class="sidebar-item tags">
            <h3 class="sidebar-title">Tags</h3>

            <ul class="mt-3">
                @foreach ($tag as $tags)
                    <li><a href="{{ route('website.tag', $tags->slug) }}">{{ $tags->tag_name }}</a></li>
                @endforeach

            </ul>
        </div><!-- End sidebar tags-->

    </div><!-- End Blog Sidebar -->

</div>
