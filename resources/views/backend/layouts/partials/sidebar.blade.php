<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
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
                    <a href="{{ route('setting') }}" class="nav-link {{ Route::is('setting') ? 'active' : '' }}">
                        <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;website Setting
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('comment') }}" class="nav-link {{ Route::is('comment') ? 'active' : '' }}">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp;All Comments
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('message') }}" class="nav-link {{ Route::is('message') ? 'active' : '' }}">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;Contact
                    </a>
                </li>

                <li class="nav-item mt-auto">
                    <a href="{{ route('team.index') }}"
                        class="nav-link {{ Route::is('team.index') ? 'active' : '' }}">
                        <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Team List
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('admin.subscribe') }}"
                        class="nav-link {{ Route::is('admin.subscribe') ? 'active' : '' }}">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp;&nbsp;Subscribe List
                    </a>
                </li>

                <li class="nav-header">User Account</li>
                <li class="nav-item mt-auto">
                    <a href="{{ route('admin/profile') }}"
                        class="nav-link {{ Route::is('admin/profile') ? 'active' : '' }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; User Profile
                    </a>
                </li>
                {{-- <li class="nav-item mt-auto">
                    <a href="#" class="nav-link btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout
                    </a>
                </li> --}}
            </ul>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
