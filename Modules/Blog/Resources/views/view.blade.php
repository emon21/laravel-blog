@extends('backend.layouts.master')
@section('title', 'Post View')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post View</h1>
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
        <!-- Create Post Start -->
        <div class="card">
            <div class="card-header">Post View</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Image</td>
                            <td>
                                <div style="max-width:300px;max-height:300px;overflow:hidden">
                                    <img src="{{ $post->image }}" alt="" class="img-fluid">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Post Name</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Category Name</td>
                            <td>{{ $post->category->category_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Post Tags</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->tag_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Status</td>
                            <td>
                                @if ($post->status == 'publish')
                                    <span class="text-success text-bold">Published</span>
                                @else
                                    <span class="text-danger text-bold">Unpublished</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Author Name</td>
                            <td>{{ $post->user->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Description</td>
                            <td>{!! $post->description !!}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="card-footer">Footer</div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>
    <script>
        //dropify image upload
        $('.dropify').dropify({
            messages: {
                'default': 'Add a File Upload',
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
                height: 150, //set editable area's height
                title: 'Enter Title',
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });


        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
