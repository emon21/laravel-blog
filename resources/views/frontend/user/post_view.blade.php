@extends('frontend.user.user_master')
@section('title', 'User Profile')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.pages.left_sidebar')
            <div class="col-sm-10 bg-light">
                <!-- Create Post Start -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post View</h3>
                            <a href="{{ route('postlist') }}" class="btn btn-primary text-light">Go back Post List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 250px;">Image</td>
                                    <td>
                                        <div>
                                            <img src="@if ($post->image) {{ asset($post->image) }} @else {{ asset('backend/blog/default.png') }} @endif"
                                                class="img-fluid img-rounded" alt=""
                                                style="width:320px;height:220px">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Post Title</td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Post Description</td>
                                    <td>{{ $post->description }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 250px;">Category Name</td>
                                    <td>{{ $post->category->category_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Post Tags</td>
                                    <td>

                                        @if ($post->tags->count() > 0)
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-info p-2">{{ $tag->tag_name }}</span>
                                            @endforeach
                                        @else
                                            <p>No Tags Found</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Post Status</td>
                                    <td class="text-capitalize">{{ $post->status }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
