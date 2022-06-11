@extends('frontend.layouts.master')
@section('title', 'Home page')
@section('hero')
    {{-- <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
            <h2>Welcome to <span>HeroBiz</span></h2>
            <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                        Video</span></a>
            </div>
        </div>
    </section> --}}
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero carousel  carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-1.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>Welcome to <span>HeroBiz</span></h2>
                        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-1.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>Welcome to HeroBiz</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-2.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>At vero eos et accusamus</h2>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                            maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                            Temporibus autem quibusdam et aut officiis debitis aut.</p>
                        <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ asset('frontend') }}/assets/img/hero-carousel/hero-carousel-3.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>Temporibus autem quibusdam</h2>
                        <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                            odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt
                            omnis iste natus error sit voluptatem accusantium.</p>
                        <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </section><!-- End Hero Section -->
@endsection
@section('featured-services')
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                        <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                        <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section><!-- End Featured Services Section -->
@endsection
@section('content')
    <!-- ======= Category Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Our Category</h2>
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>
            <div class="row g-5 posts-list">

                @if ($categoryList->count() > 0)
                    @foreach ($categoryList as $category)
                        <div class="col-lg-4">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->category_name }}"
                                        class="img-fluid">
                                </div>

                                <h2 class="title text-center">
                                    <a href="{{ url('SingleCategory') }}">{{ $category->category_name }}</a>
                                </h2>
                                <div class="read-more mt-2 align-self-center">
                                    <a href="{{ url('SingleCategory') }}">Read More</a>
                                </div>

                            </article>
                        </div>
                    @endforeach
                @else
                    <span class="text-danger text-center alert alert-danger">Sorry No Category Found!</span>
                @endif


            </div>

        </div>
    </section><!-- End category Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Recent Post</h2>
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>
            <div class="row g-5 posts-list">
                @foreach ($postList as $post)
                    <div class="col-lg-4">
                        <article class="d-flex flex-column">

                            <div class="post-img">
                                <img src="{{ asset('frontend') }}/assets/img/blog/blog-1.jpg" alt=""
                                    class="img-fluid">
                            </div>

                            <h2 class="title">
                                <a href="{{ url('singlePost') }}">{{ $post->title }}</a>
                            </h2>
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-details.html">{{ $post->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022 </time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="blog-details.html">12 Comments</a></li>
                                </ul>
                            </div>

                            <div class="content">
                                <p>
                                    {!! $post->description !!}
                                </p>
                            </div>

                            <div class="read-more mt-auto align-self-end">
                                <a href="{{ url('singlePost', $post->id) }}">Read More</a>
                            </div>

                        </article>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">

        <div class="container">

            <div class="section-header">
                <h2>Portfolio</h2>
                <p>Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug
                    dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta
                    consequatur quaerat</p>
            </div>

        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <ul class="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row g-0 portfolio-container">

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/app-1.jpg" title="App 1"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/product-1.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/product-1.jpg" title="Product 1"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/branding-1.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/branding-1.jpg" title="Branding 1"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-books">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/books-1.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Books 1</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/books-1.jpg" title="Branding 1"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/app-2.jpg" title="App 2"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/product-2.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Product 2</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/product-2.jpg" title="Product 2"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/branding-2.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Branding 2</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/branding-2.jpg" title="Branding 2"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-books">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/books-2.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Books 2</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/books-2.jpg" title="Branding 2"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/app-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/app-3.jpg" title="App 3"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/product-3.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Product 3</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/product-3.jpg" title="Product 3"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/branding-3.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Branding 3</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/branding-3.jpg" title="Branding 2"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-books">
                        <img src="{{ asset('frontend') }}/assets/img/portfolio/books-3.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Books 3</h4>
                            <a href="{{ asset('frontend') }}/assets/img/portfolio/books-3.jpg" title="Branding 3"
                                data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>
    </section><!-- End Portfolio Section -->
@endsection
