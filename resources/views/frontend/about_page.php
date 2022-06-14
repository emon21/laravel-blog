@extends('frontend.layouts.master')
@section('title', 'About')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ asset('frontend/images/img_4.jpg') }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">

                        <h1 class="mb-4"><a href="#">About US</a></h1>
                        <span class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sed
                            ipsum voluptatum
                            autem eveniet? Maiores deserunt quidem dicta obcaecati, omnis necessitatibus animi adipisci eum
                            excepturi, dolore officia facilis ea recusandae.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="d-flex mt-4 justify-content-between">
                <div class="col-md-6">
                    <h4>Learn From US</h4>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam
                        quas
                        inventore, ut iure
                        iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius,
                        non unde ut aut sunt eveniet rerum repellendus porro.</p>
                    <ul style="list-style-type:circle;">
                        <li>Onsectetur adipisicing elit</li>
                        <li>Iste modi eos adipisci</li>
                        <li>Minima eius. Nam eius</li>
                    </ul>
                </div>
                <div class="col-md-5 mb-4 m-0">
                    <img src="{{ asset('frontend/images/img_1.jpg') }}" alt="Image placeholder" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
    <section class="site-section">
        <div class="container">
            <!-- Team Start -->
            /*<div class="col-sm-12 d-flex  text-center justify-content-center">
                <div class="col-sm-8">
                    <h2>Meet the Team</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur
                        adipisicing
                        elit.
                        Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate
                        nulla.Quibusdam autem, quas molestias recusandae aperiam molestiae modi qui ipsam vel. Placeat
                        tenetur veritatis tempore quos impedit dicta, error autem, quae sint inventore ipsa quidem.</p>
                </div>
            </div>
            <div class="d-flex mt-4 justify-content-between">
                <div class="col-sm-4">
                    <div class="bio text-center">
                        <img src="{{ asset('frontend/images/person_2.jpg') }}" alt="Image Placeholder"
                            class="img-fluid rounded-circle img-rounded mb-2 mt-4"
                            style="width: 222px;height:180px;overflow:hidden;">
                        <div class="bio-body">
                            <h2>Craig David</h2>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate
                                nulla
                                quo veniam fuga sit molestias minus.</p>
                            <p>
                                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="#"><span class="icon-twitter p-2"></span></a>
                                <a href="#"><span class="icon-instagram p-2"></span></a>
                                <a href="#"><span class="icon-rss p-2"></span></a>
                                <a href="#"><span class="icon-envelope p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="bio text-center">
                        <img src="{{ asset('frontend/images/img_4.jpg') }}" alt="Image Placeholder"
                            class="img-fluid rounded-circle img-rounded mb-2 mt-4"
                            style="width: 222px;height:180px;overflow:hidden;">
                        <div class="bio-body">
                            <h2>Craig David</h2>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate
                                nulla
                                quo veniam fuga sit molestias minus.</p>
                            <p>
                                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="#"><span class="icon-twitter p-2"></span></a>
                                <a href="#"><span class="icon-instagram p-2"></span></a>
                                <a href="#"><span class="icon-rss p-2"></span></a>
                                <a href="#"><span class="icon-envelope p-2"></span></a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="bio text-center">
                        <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image Placeholder"
                            class="img-fluid rounded-circle img-rounded mb-2 mt-4"
                            style="width: 222px;height:180px;overflow:hidden;">
                        <div class="bio-body">
                            <h2>Craig David</h2>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate
                                nulla
                                quo veniam fuga sit molestias minus.</p>
                            <p>
                                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="#"><span class="icon-twitter p-2"></span></a>
                                <a href="#"><span class="icon-instagram p-2"></span></a>
                                <a href="#"><span class="icon-rss p-2"></span></a>
                                <a href="#"><span class="icon-envelope p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div> */
            <!-- Team End -->
        </div>
        </div>
    </section>

    /*<div class="py-5 bg-light">
        <div class="container">
            <div class="d-flex mt-4 justify-content-between">
                <div class="col-md-5 mb-4 m-0">
                    <img src="{{ asset('frontend/images/img_2.jpg') }}" alt="Image placeholder" class="img-fluid rounded">
                </div>

                <div class="col-md-6 justify-content-end">
                    <h4>Learn From US</h4>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas
                        inventore, ut iure
                        iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius,
                        non unde ut aut sunt eveniet rerum repellendus porro.</p>
                    <ul style="list-style-type:circle;">
                        <li>Onsectetur adipisicing elit</li>
                        <li>Iste modi eos adipisci</li>
                        <li>Minima eius. Nam eius</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>*/

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
