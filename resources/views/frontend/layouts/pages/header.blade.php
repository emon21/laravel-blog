<header class="site-navbar" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-12 search-form-wrap js-search-form">
                <form method="get" action="#">
                    <input type="text" id="s" class="form-control" placeholder="Search...">
                    <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                </form>
            </div>

            <div class="col-4 site-logo">
                <a href="{{ route('website') }}" class="text-black h2 mb-0">Mini Blog</a>
            </div>

            <div class="col-8 text-right">
                <nav class="site-navigation" role="navigation">
                    @include('frontend.layouts.pages.navbar')
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>

    </div>
</header>
