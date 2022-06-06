@extends('backend.layouts.master')
@section('title', 'Blog List')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blog</h1>
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create Tag</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('addPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" id="exampleInputEmail1" placeholder="Enter Your Title">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="comment">Description:</label>
                                {{-- <textarea id="summernote" name="post_desc" class=" @error('post_desc') is-invalid @enderror"></textarea> --}}
                                <textarea class="form-control @error('post_desc') is-invalid @enderror" rows="5" name="post_desc" id="comment"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="sel1">Select Category List:</label>
                                <select class="form-control  @error('category_list') is-invalid @enderror" id="sel1"
                                    name="category_list">
                                    <option style="display: none" selected
                                        class="@error('category_list') is-invalid @enderror"> >> Select Category <<
                                            </option>
                                            @foreach ($categoryList as $category)
                                    <option class="mt-4" value="{{ $category->id }}">
                                        {{ $category->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="exampleInputFile">Picture</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="post_picture">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>
                            <!-- Status Start -->
                            <div class="form-group col-sm-3 ml-1">
                                <label for="exampleInputFile">Status</label>
                                <div class="mt-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio"
                                            class="custom-control-input @error('status') is-invalid @enderror"
                                            id="customRadio" name="status" value="publish">
                                        <label class="custom-control-label" for="customRadio">Publish</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio"
                                            class="custom-control-input custom-control-input-danger @error('status') is-invalid @enderror"
                                            id="customRadio2" name="status" value="unpublish">
                                        <label class="custom-control-label" for="customRadio2">Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Status End --->

                            <div class="form-group col-sm-2">
                                <label for="comment">Published Date:</label>
                                <input type="date" class="form-control @error('publish_date') is-invalid @enderror"
                                    name="publish_date">
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn btn-success w-50">Create Post</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- Create Post End -->

        <!-- Show Post Start -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> &nbsp; Post All</h3>
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
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category_id }}</td>
                                <td>
                                    @if ($post->status == 'publish')
                                        <span class="text-success text-bold">Published</span>
                                    @else
                                        <span class="text-danger text-bold">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="{{ route('deletepost', $post->id) }}" class="btn btn-danger">Delete</a>
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
        })
    </script>
@endsection
