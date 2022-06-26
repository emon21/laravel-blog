@extends('frontend.user.user_master')
@section('title', 'User Profile')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.pages.left_sidebar')
            <div class="col-sm-10 bg-light">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fa fa-list" aria-hidden="true"></i> Post List</h3>
                            <div class="card-title text-center text-danger text-bold"><i class="fa fa-life-ring"
                                    aria-hidden="true"></i>
                                User
                                Total
                                Post : ({{ $userpost->count() }})</div>
                            <a href="{{ route('postlist') }}" class="btn btn-primary">Go Back User List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        @if ($postList->count() > 0)
                                            @foreach ($postList as $post)
                                                <div class="col-sm-3 mb-4">
                                                    <div class="card bg-light" style="height: 400px;">
                                                        <div class="card-body">
                                                            <img src="@if ($post->image) {{ asset($post->image) }} @else {{ asset('backend/blog/default.png') }} @endif"
                                                                class="img-fluid img-rounded" alt=""
                                                                style="width:320px;height:190px">
                                                            <h4 class="card-title pt-2">{{ $post->title }}</h4>
                                                            <p class="card-text text-justify pb-2">
                                                                {{ substr($post->description, 0, 40) }}
                                                            </p>

                                                        </div>
                                                        <div class="card-footer text-center d-flex justify-content-center">
                                                            <a href="{{ route('postView', $post->id) }}"
                                                                class="btn btn-warning rounded mr-1"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="{{ route('postEdit', $post->id) }}"
                                                                class="btn btn-info rounded mr-1"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i></a>
                                                            <form action="{{ route('postDelete', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger rounded mr-1"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <td colspan="3" class="text-center text-danger" style="font-size: 22px;">
                                                <span>Sorry This User No Post Here</span>
                                            </td>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-center">{{ $postList->links() }}</div>
                                {{-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
