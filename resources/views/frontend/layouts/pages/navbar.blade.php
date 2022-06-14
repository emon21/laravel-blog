<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
    <li><a href="{{ route('website') }}" class="{{ Route::is('website') ? 'active' : '' }}">Home</a></li>
    <li><a href="{{ route('website.blog') }}">Blog</a></li>
    <li><a href="{{ route('website.category') }}">Category</a></li>
    <li><a href="{{ route('about') }}">About US</a></li>
    @foreach ($categories as $category)
        <li><a href="{{ route('singleCategory', $category->slug) }}">{{ $category->category_name }}</a>
        </li>
    @endforeach

    <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
</ul>
