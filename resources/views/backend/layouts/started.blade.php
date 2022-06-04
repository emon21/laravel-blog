<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Role Admin')</title>
    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body class="hold-transition">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend/assets') }}/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

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
    </div>
    <!-- ./wrapper -->
    @include('backend.layouts.partials.scripts')
    @yield('script')

</body>

</html>
