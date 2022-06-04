@extends('user.layouts.user_master')

@section('sidebar')
    <!-- sidebar start -->
    @include('user.layouts.pages.left_sidebar')
    <!-- sidebar end -->
@endsection
@section('content')
    <div class="col-sm-9 mt-2">
        <div class="card-group" style="margin-left: -12px;margin-right: -12px;margin-bottom: -11px;">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <p class="card-text">
                        <i class="fas fa-users fa-3x"></i>
                    </p>
                    ( 10 + )</br>
                    <a href="" class="btn btn-warning mt-2">See Here</a>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <p class="card-text">
                        <i class="fas fa-users fa-3x"></i>
                    </p>
                    ( 10 + )</br>
                    <a href="" class="btn btn-warning mt-2">See Here</a>
                </div>
            </div>
            <div class="card bg-success">
                <div class="card-body text-center">
                    <p class="card-text">
                        <i class="fas fa-users fa-3x"></i>
                    </p>
                    ( 10 + )</br>
                    <a href="" class="btn btn-warning mt-2">See Here</a>
                </div>
            </div>
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <p class="card-text">
                        <i class="fas fa-users fa-3x"></i>
                    </p>
                    ( 10 + )</br>
                    <a href="" class="btn btn-warning mt-2">See Here</a>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-4" style="padding-top:38px;">Welcome To User Dashboard</h2>
    </div>
@endsection
