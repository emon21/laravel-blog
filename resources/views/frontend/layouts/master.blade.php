<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Mini Blog')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('frontend.layouts.pages.styles')
    @yield('styles')
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <!-- Header start -->
        @include('frontend.layouts.pages.header')
        <!-- Header End -->
        @yield('user_menu')

        @yield('content')

        @include('frontend.layouts.pages.footer')

    </div>

    @include('frontend.layouts.pages.scripts')
    @yield('script')

</body>

</html>
