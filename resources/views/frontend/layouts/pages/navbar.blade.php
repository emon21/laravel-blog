<nav id="navbar" class="navbar float-right">
    <ul>

        <li><a class="nav-link {{ Route::is('home') ? 'active' : '' }}"
                href="{{ route('home') }}"><span>Home</span></a>
        </li>
        {{-- <li><a class="nav-link scrollto" href="index.html#about">About</a></li>
        <li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
        <li><a class="nav-link scrollto" href="index.html#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="index.html#team">Team</a></li> --}}
        <li><a href="{{ route('blog') }}" class="nav-link {{ Route::is('blog') ? 'active' : '' }}">Blog</a></li>
        {{-- <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li> --}}
    </ul>
    <i class="bi bi-list mobile-nav-toggle d-none"></i>
</nav>
