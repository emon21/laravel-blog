<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">

    {{-- {{ $currentUser->name }} --}}

    @if (Auth::check())
        @if ($currentUser->user_type == 0)
            <img src="@if ($currentUser->image) {{ asset($currentUser->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                class="img-fluid rounded-circle img-rounded" alt="" style="width:45px;height:45px;overflow:hidden">
            <li><a href="{{ route('user.dashboard') }}" class="">User Dashboard</a></li>
        @endif
    @else
        <li>
            <a href="{{ route('login') }}" class="btn btn-outline-dark p-2"><i class="fa fa-sign-in"
                    aria-hidden="true"></i> Login Here</a>
        </li>

    @endif

    <li><a href="{{ route('website') }}" class=" active {{ Route::is('website') ? 'active' : '' }}">Home</a></li>
    <li><a href="{{ route('website.blog') }}">Blog</a></li>
    <li><a href="{{ route('website.category') }}">Category</a></li>
    <li><a href="{{ route('about') }}">About US</a></li>
    <li><a href="{{ route('contact') }}">Contact US</a></li>
    @foreach ($categories as $category)
        <li><a href="{{ route('singleCategory', $category->slug) }}">{{ $category->category_name }}</a>
        </li>
    @endforeach

    <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span
                class="icon-search"></span></a>
    </li>
</ul>
