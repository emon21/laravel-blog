<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HeroBiz Bootstrap Template - Home 1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('frontend.layouts.pages.styles')
    @yield('style')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('frontend.layouts.pages.header')
    <!-- End Header -->

    
    @yield('hero')
    @yield('featured-services')
    <main id="main">


        @yield('content')

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('frontend.layouts.pages.footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('frontend.layouts.pages.scripts')
    @yield('scripts')

</body>

</html>
