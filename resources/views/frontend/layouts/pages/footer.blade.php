<footer class="site-footer page-footer font-small unique-color-dark">

    {{-- <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Get connected with us on social networks!</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">

                <!-- Facebook -->
                <a class="fb-ic">
                    <i class="fab fa-facebook-f white-text mr-4"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                    <i class="fab fa-twitter white-text mr-4"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic">
                    <i class="fab fa-google-plus-g white-text mr-4"> </i>
                </a>
                <!--Linkedin -->
                <a class="li-ic">
                    <i class="fab fa-linkedin-in white-text mr-4"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
                    <i class="fab fa-instagram white-text"> </i>
                </a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div> --}}

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <div class="row" style="margin-top: -14px;">
                    <img src="{{ asset($setting->site_logo) }}" alt="" class="img-fluid rounded-circle"
                        style="width: 50px;
                    height: 50px;
                    margin-left: 12px;">
                    <h6 class="text-uppercase font-weight-bold pl-2 pt-3">{{ $setting->site_name }}</h6>

                    <p class="pl-2 pt-2">{{ $setting->site_desc }}</p>
                </div>
                <div>
                    <h3 class="footer-heading mb-4 text-light">Connect With Us</h3>
                    <p>
                        @if ($setting->facebook)
                            <a target="_blank" href="{{ $setting->facebook }}"><span
                                    class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        @endif
                        @if ($setting->twitter)
                            <a target="_blank" href="{{ $setting->twitter }}"><span
                                    class="icon-twitter p-2"></span></a>
                        @endif
                        @if ($setting->instagram)
                            <a target="_blank" href="{{ $setting->instagram }}"><span
                                    class="icon-instagram p-2"></span></a>
                        @endif
                        @if ($setting->rss)
                            <a target="_blank" href="{{ $setting->rss }}"><span class="icon-rss p-2"></span></a>
                        @endif
                        @if ($setting->email)
                            <a target="_blank" href="{{ $setting->email }}"><span
                                    class="icon-envelope p-2"></span></a>
                        @endif
                    </p>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Categories</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;border-color: #070cf994;">

                @foreach ($categories as $catlist)
                    <li><a href="{{ route('singleCategory', $catlist->slug) }}">{{ $catlist->category_name }}</a>
                    </li>
                @endforeach
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;border-color: #070cf994;">
                <li><a href="{{ route('website') }}">Home</a></li>
                <li><a href="{{ route('website.blog') }}">Blog</a></li>
                <li><a href="{{ route('website.category') }}">Category</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                {{-- <p>
                   <a href="#!">Help</a>
               </p> --}}

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;border-color: #070cf994;">
                <p>
                    <i class="fas fa-home mr-3"></i>{{ $setting->address }}
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> {{ $setting->phone_no }}
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i>{{ $setting->phone_no }}
                </p>
                <p>
                    <i class="fas fa-print mr-3"></i>{{ $setting->phone_no }}
                </p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <p>

            {{ $setting->copy_right }} | This template is made with <i class="icon-heart text-danger"
                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

        </p>
        <p>Develop By Hasib on<a href=""> Laravel Blog Development</a></p>
    </div>
    <!-- Copyright -->

</footer>
