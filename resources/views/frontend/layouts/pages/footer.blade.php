<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4">About Us</h3>
                <p class="text-justify">{{ $setting->site_desc }}</p>
            </div>
            <div class="col-md-3 ml-auto">
                <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->

                <ul class="list-unstyled float-left mr-5">
                    <h3 class="footer-heading mb-4">Links</h3>
                    <li><a href="{{ route('website') }}">Home</a></li>
                    <li><a href="{{ route('website.blog') }}">Blog</a></li>
                    <li><a href="{{ route('website.category') }}">Category</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>

                </ul>
                <h3 class="footer-heading mb-4">Categories</h3>
                <ul class="list-unstyled float-left">
                    @foreach ($categories as $catlist)
                        <li><a
                                href="{{ route('singleCategory', $catlist->slug) }}">{{ $catlist->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4">
                <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
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
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>

                    {{ $setting->copy_right }} | This template is made with <i class="icon-heart text-danger"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

                </p>
                <p>Develop By Hasib on<a href=""> Laravel Blog Development</a></p>
            </div>
        </div>
    </div>
</div>
