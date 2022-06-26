@extends('frontend.user.user_master')
@section('title', 'User Post Edit')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.pages.left_sidebar')
            <div class="col-sm-10 bg-light">
                <!-- Create Post Start -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post Edit</h3>
                            <a href="{{ route('postlist') }}" class="btn btn-primary text-light"><i class="fa fa-reply"
                                    aria-hidden="true"></i>&nbsp;ReturnGo back Post List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-9 justify-content-center mx-auto d-block">

                                    <!-- general form elements -->
                                    <div class="card card-primary">

                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form action="{{ route('postUpdate', $post->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Post Name</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title" value="{{ $post->title }}" id="exampleInputEmail1"
                                                        placeholder="Enter Your Title">
                                                    @error('title')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Description:</label>
                                                    <textarea name="post_desc" class="form-control @error('post_desc') is-invalid @enderror">{{ $post->description }}</textarea>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-7">
                                                        <label for="exampleInputFile">Picture</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile" name="post_picture">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-5">
                                                        <label for="sel1">Category List:</label>
                                                        <select
                                                            class="form-control  @error('category_list') is-invalid @enderror"
                                                            id="sel1" name="category_list">
                                                            <option style="display: none" selected
                                                                class="@error('category_list') is-invalid @enderror"> Select
                                                                Category </option>
                                                            @foreach ($categoryList as $category)
                                                                <option class="mt-4" value="{{ $category->id }}"
                                                                    @if ($post->category_id == $category->id) selected @endif>
                                                                    {{ $category->category_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Status Start -->
                                                <div class="form-group col-sm-4" style="margin-top:-2px">
                                                    <label for="custom-control-label">Status</label>
                                                    <div class="">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"
                                                                @if ($post->status == 'publish') checked @endif
                                                                class="custom-control-input @error('status') is-invalid @enderror"
                                                                id="customRadio" name="status" value="publish">
                                                            <label class="custom-control-label"
                                                                for="customRadio">Publish</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"
                                                                @if ($post->status == 'unpublish') checked @endif
                                                                class="custom-control-input custom-control-input-danger @error('status') is-invalid @enderror"
                                                                id="customRadio2" name="status" value="unpublish">
                                                            <label class="custom-control-label"
                                                                for="customRadio2">Unpublish</label>
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
                                                                    type="checkbox" name="tags[]"
                                                                    id="tag{{ $tag->id }}" value="{{ $tag->id }}"
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
                                <div class="col-sm-3">
                                    <div
                                        style="height: 209px;width: 308px;margin-left: 0px;margin-top: 1px;box-shadow: 0px 0px 5px 2px #0aa4e1;border-radius: 5px;">
                                        <img src="{{ asset($post->image) }}" width="292" height="192"
                                            class="mt-2 mb-2 ml-2 border-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
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
