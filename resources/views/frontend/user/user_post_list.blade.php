@extends('frontend.user.user_master')
@section('title', 'User Profile')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.pages.left_sidebar')
            <div class="col-sm-10 bg-light">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Image</th>
                            <th>Post Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($userPosts->count() > 0)
                            @foreach ($userPosts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="@if ($post->image) {{ asset($post->image) }} @else {{ asset('frontend/images/default.png') }} @endif"
                                            class="img-fluid img-rounded" width="85" height="85" alt=""></td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="3" class="text-center text-danger" style="font-size: 22px;">
                                <span>Sorry This User No Post Here</span>
                            </td>
                        @endif
                    </tbody>
                </table>
                {{ $userPosts->links() }}
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
