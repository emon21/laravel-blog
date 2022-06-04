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

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
            <h2>Welcome to <span>HeroBiz</span></h2>
            <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i
                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
    </section>

    <main id="main">

      @yield('content')
    </main><!-- End #main -->

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
