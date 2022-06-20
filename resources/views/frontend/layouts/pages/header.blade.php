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

                <div class="flex">
                    <a class="navbar-brand" href="{{ route('website') }}">
                        <img src="{{ asset($setting->site_logo) }}" alt="" class="img-fluid rounded-circle"
                            style="width: 50px;
                            height: 50px;
                            margin-left: 12px;
                            margin-top: -18px;">
                        <h6 class="text-uppercase font-weight-bold pl-2"
                            style="margin-left: 60px;
                        margin-top: -36px;">
                            {{ $setting->site_name }}</h6>
                    </a>

                </div>
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
