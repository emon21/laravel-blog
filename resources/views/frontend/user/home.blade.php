@extends('frontend.user.user_master')
@section('title', 'User Dashboard')


@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.pages.left_sidebar')
            <div class="col-sm-10 bg-light">
                <h2 class="text-center pt-4 text-primary">
                    @if (Session('status'))
                        {{ Session('status') }}
                    @endif
                </h2>
                <h4 class="text-center pt-4 text-success">Well Come To User DashBoard</h4>
            </div>
        </div>
    </div>
@endsection
