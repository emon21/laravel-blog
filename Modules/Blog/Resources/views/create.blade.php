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
        <!-- Create Post Start -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <!-- Create Post Start -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-12 justify-content-center mx-auto d-block">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('InsertPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Post Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" id="title" placeholder="Enter Your Title">
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="comment">Description:</label>
                                <textarea id="summernote" name="post_desc" class=" @error('post_desc') is-invalid @enderror"></textarea>
                                @error('post_desc')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputFile">Picture</label>
                                <input type="file" class="dropify" data-height="200" id="id_member_photo"
                                    name="post_picture" />

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="sel1">Category List:</label>
                                <select class="form-control  @error('category_list') is-invalid @enderror" id="sel1"
                                    name="category_list">
                                    <option style="display: none" selected
                                        class="@error('category_list') is-invalid @enderror"> Select Category </option>
                                    @foreach ($categoryList as $category)
                                        <option class="mt-4" value="{{ $category->id }}">
                                            {{ $category->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Start -->
                            <div class="form-group col-sm-3" style="margin-top:2px">
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

                            <!-- checkbox -->
                            <div class="form-group col-sm-6">
                                <label for="sel1">Choose Tag List:</label>
                                <div class="d-flex flex-wrap">
                                    @foreach ($tags as $tag)
                                        <div class="custom-control custom-checkbox mr-2">
                                            <input
                                                class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                type="checkbox" name="tags[]" id="tag{{ $tag->id }}"
                                                value="{{ $tag->id }}">
                                            <label for="tag{{ $tag->id }}"
                                                class="custom-control-label">{{ $tag->tag_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-4 d-flex mx-auto justify-content-center mt-2">
                            <button type="submit" class="btn btn-success">Create Post</button>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>

        <!-- Create Post End -->

        <!-- Create Post End -->

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
                height: 160, //set editable area's height
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
