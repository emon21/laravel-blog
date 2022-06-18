<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="@if (Auth::user()->image) {{ asset(Auth::user()->image) }} @else
        {{ asset('backend/user/user.png') }} @endif"
            alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="@if (Auth::user()->image) {{ asset(Auth::user()->image) }} @else
                {{ asset('backend/user/user.png') }} @endif"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hi , {{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ Route('category') }}" class="nav-link {{ Route::is('category') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('taglist') }}" class="nav-link {{ Route::is('taglist') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Tag</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postList') }}" class="nav-link {{ Route::is('postList') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-success"></i>
                        <p class="text">User</p>
                    </a>
                </li>
                <li class="nav-header">User Account</li>


                <li class="nav-item mt-auto">
                    <a href="{{ route('user/profile') }}"
                        class="nav-link {{ Route::is('user/profile') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-success"></i>
                        <p class="text"><i class="fa fa-user" aria-hidden="true"></i>User Profile</p>
                    </a>
                </li>

                <li class="nav-item mt-auto">
                    <a href="#"
                        class="nav-link {{ Route::is('admin/blog') || Route::is('category') ? 'active' : '' }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;User Profile
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="#"
                        class="nav-link btn btn-danger {{ Route::is('admin/blog') || Route::is('category') ? 'active' : '' }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout
                    </a>
                </li>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hi , {{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                {{-- <li
                    class="nav-item {{ Route::is('postList') || Route::is('category') || Route::is('taglist') ? 'active menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('postList') || request()->is('category') || Route::is('taglist') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('postList') }}"
                                class="nav-link {{ Route::is('postList') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('category') }}"
                                class="nav-link {{ Route::is('category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('taglist') }}"
                                class="nav-link {{ Route::is('taglist') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tag</p>
                            </a>
                        </li>


                    </ul>
                </li> --}}

                {{-- <li class="nav-item {{ Route::is('admin/blog') || Route::is('category') ? 'active menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('admin/blog') || Route::is('category') ? 'active' : '' }}">
                        <i class="fa fa-globe"></i>
                        <p>
                            City
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('category') }}"
                                class="nav-link {{ Route::is('category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}




                <li class="nav-item">
                    <a href="{{ Route('category') }}"
                        class="nav-link {{ Route::is('category') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('taglist') }}" class="nav-link {{ Route::is('taglist') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Tag</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postList') }}"
                        class="nav-link {{ Route::is('postList') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-success"></i>
                        <p class="text">User</p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('setting') }}" class="nav-link">
                        <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;website Setting
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('message') }}" class="nav-link">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;Contact
                    </a>
                </li>
                <h2 class="nav-header">Your Account</h2>


                {{-- <li class="nav-item mt-auto">
                    <a href="{{ route('user/profile') }}"
                        class="nav-link {{ Route::is('user/profile') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle text-success"></i>
                        <p class="text"><i class="fa fa-user" aria-hidden="true"></i>User Profile</p>
                    </a>
                </li> --}}

                <li class="nav-item mt-auto">
                    <a href="{{ route('user/profile') }}" class="nav-link">
                        <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;User Profile
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="#" class="nav-link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout
                    </a>
                </li>



            </ul>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
