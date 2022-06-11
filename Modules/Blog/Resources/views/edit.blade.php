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
        <div class="row">
            <div class="col-md-8 justify-content-center mx-auto d-block">

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Edit Post</h3>
                        <a href="{{ route('postList') }}">
                            <h3 class="card-title float-right"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Return
                            </h3>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('updatePost', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Name</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ $post->title }}" id="exampleInputEmail1" placeholder="Enter Your Title">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="comment">Description:</label>
                                <textarea id="summernote" name="post_desc" class=" @error('post_desc') is-invalid @enderror">{{ $post->description }}</textarea>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-7">
                                    <label for="exampleInputFile">Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="post_picture">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="sel1">Category List:</label>
                                    <select class="form-control  @error('category_list') is-invalid @enderror" id="sel1"
                                        name="category_list">
                                        <option style="display: none" selected
                                            class="@error('category_list') is-invalid @enderror"> Select Category </option>
                                        @foreach ($categoryList as $category)
                                            <option class="mt-4" value="{{ $category->id }}"
                                                @if ($post->category_id == $category->id) selected @endif>
                                                {{ $category->category_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            {{-- <div class="form-group col-sm-6">
                            <label for="exampleInputFile">Picture</label>
                            <input type="file" class="dropify" name="post_picture" data-height="150"
                                data-default-file="{{ $post->image }}" />
                        </div> --}}

                            <!-- Status Start -->
                            <div class="form-group col-sm-4" style="margin-top:-2px">
                                <label for="custom-control-label">Status</label>
                                <div class="">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" @if ($post->status == 'publish') checked @endif
                                            class="custom-control-input @error('status') is-invalid @enderror"
                                            id="customRadio" name="status" value="publish">
                                        <label class="custom-control-label" for="customRadio">Publish</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" @if ($post->status == 'unpublish') checked @endif
                                            class="custom-control-input custom-control-input-danger @error('status') is-invalid @enderror"
                                            id="customRadio2" name="status" value="unpublish">
                                        <label class="custom-control-label" for="customRadio2">Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Status End --->

                            <!-- checkbox -->
                            <div class="form-group col-sm-12">
                                <label>Choose Tag List:</label>
                                <div class="d-flex flex-wrap">
                                    @foreach ($tags as $tag)
                                        <div class="custom-control custom-checkbox mr-2">
                                            <input
                                                class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                type="checkbox" name="tags[]" id="tag{{ $tag->id }}"
                                                value="{{ $tag->id }}"
                                                @foreach ($post->tags as $item) @if ($tag->id == $item->id) checked @endif
                                                @endforeach>
                                            <label for="tag{{ $tag->id }}"
                                                class="custom-control-label">{{ $tag->tag_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Button --->
                            <div class="form-group col-sm-4">
                                <button type="submit" class="btn btn-success w-50">Update Post</button>
                            </div>
                            <!-- Button --->

                        </div>
                        <!-- /.card-body -->
                    </form>

                </div>
                <!-- /.card -->

            </div>
            <div class="col-sm-4">
                <div
                    style="height: 209px;width: 308px;margin-left: 0px;margin-top: 1px;box-shadow: 0px 0px 5px 2px #0aa4e1;border-radius: 5px;">
                    <img src="{{ asset($post->image) }}" width="292" height="192" class="mt-2 mb-2 ml-2 border-2">
                </div>
            </div>
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
