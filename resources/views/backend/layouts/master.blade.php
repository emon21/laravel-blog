<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Role Admin')</title>
    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="resizeClock()">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend/assets') }}/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('backend.layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('header')
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('admin-content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('backend.layouts.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('backend.layouts.partials.scripts')
    @yield('script')

</body>

</html>
