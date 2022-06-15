@extends('frontend.layouts.master')
@section('title', 'About')

@section('content')


    <div class="py-5 bg-light">
        <div class="container">

            <div class="d-flex mt-4 justify-content-between">
                <div class="col-md-6">
                    <h4> {{ $user->name }}</h4>
                    <p class="text-justify"> {{ $user->description }}</p>
                </div>
                <div class="col-md-5 m-0">
                    <img src="@if ($user->image) {{ $user->image }} @else {{ asset('backend/user/user.png') }} @endif"
                        alt="Image placeholder" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
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
