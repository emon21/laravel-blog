@extends('frontend.layouts.master')
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
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset('frontend') }}/assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="pt-0 pt-lg-5">Neque officiis dolore maiores et exercitationem quae est seda lidera
                        pat claero</h3>

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Saepe fuga</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Voluptates</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a></li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab1">

                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos
                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo
                                suscipit voluptatem.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                            </div>
                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi
                                dolorum non eveniet magni quaerat nemo et.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Incidunt non veritatis illum ea ut nisi</h4>
                            </div>
                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta
                                tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at.
                                Dolorem quo tempora. Quia et perferendis.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                            </div>
                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam
                                officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam
                                odit enim quaerat. Vero error error voluptatem eum.</p>

                        </div><!-- End Tab 1 Content -->

                        <div class="tab-pane fade show" id="tab2">

                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos
                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo
                                suscipit voluptatem.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                            </div>
                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi
                                dolorum non eveniet magni quaerat nemo et.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Incidunt non veritatis illum ea ut nisi</h4>
                            </div>
                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta
                                tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at.
                                Dolorem quo tempora. Quia et perferendis.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                            </div>
                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam
                                officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam
                                odit enim quaerat. Vero error error voluptatem eum.</p>

                        </div><!-- End Tab 2 Content -->

                        <div class="tab-pane fade show" id="tab3">

                            <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos
                                doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo
                                suscipit voluptatem.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                            </div>
                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi
                                dolorum non eveniet magni quaerat nemo et.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Incidunt non veritatis illum ea ut nisi</h4>
                            </div>
                            <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta
                                tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at.
                                Dolorem quo tempora. Quia et perferendis.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                            </div>
                            <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam
                                officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam
                                odit enim quaerat. Vero error error voluptatem eum.</p>

                        </div><!-- End Tab 3 Content -->

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End About Section -->
@endsection
