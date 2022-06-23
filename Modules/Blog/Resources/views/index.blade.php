@extends('backend.layouts.master')
@section('title', 'Post List')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Post List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <div class="container-fluid">
        <!-- Show Post Start -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> &nbsp; Post All</h3>

                    @if (session('success'))
                        @include('backend.layouts.success')
                    @elseif(session('status'))
                        @include('backend.layouts.success')
                    @else
                        @include('backend.layouts.error')
                    @endif

                    <a href="{{ route('addPost') }}" class="btn btn-primary text-light"><i class="fas fa-plus"></i>
                        &nbsp;Create
                        Post</a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postList as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td class="text-center">

                                    {{-- <img src="{{ asset('backend/blog/default.png') }}" class="img-fluid img-rounded"
                                        alt=""> --}}

                                    {{-- <img src="@if ($post->image_url) {{ $post->image_url }}
                                    @else
                                    {{ asset('backend/blog/default.png') }} @endif"
                                        alt=""> --}}

                                    <div style="max-width:70px;max-height:70px;overflow:hidden" class="m-auto">
                                        <img src="@if ($post->image_url) {{ $post->image_url }} @else
                                    {{ asset('backend/blog/default_image.png') }} @endif"
                                            class="img-fluid img-rounded" alt="">
                                    </div>
                                </td>
                                <td>{{ $post->category->category_name }}</td>
                                <td>

                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->tag_name }}</span>
                                    @endforeach

                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    @if ($post->status == 'publish')
                                        <span class="text-success text-bold">Published</span>
                                    @else
                                        <span class="text-danger text-bold">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('viewpost', $post->id) }}" class="btn btn-success"
                                        data-toggle="tooltip" title="View Post">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('editPost', $post->id) }}" class="btn btn-primary"
                                        data-toggle="tooltip" title="Edit Post" data-placement="bottom">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('deletepost', $post->id) }}" class="btn btn-danger"
                                        data-toggle="tooltip" title="Delete Post" data-placement="top"
                                        onclick="return confirm('Are You Sure Delete This Items Y/N')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl No</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- Show Post End -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>
    <script>
        //dropify image upload
        $('.dropify').dropify({
            messages: {
                'default': 'File Upload',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'

            }
        });
        //summernote editor
        $(function() {
            // Summernote
            //$('#summernote').summernote()
            $('#summernote').summernote({
                height: 200, //set editable area's height
                title: 'Enter Title',
                tabsize: 2,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });


        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
