{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Tag Edit')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tag Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tag Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- view data -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Tag Edit</h3>
                                <a href="{{ route('taglist') }}" class="btn btn-primary text-light">Go Back Tag List
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- left column -->
                            <div class="col-md-4 justify-content-center d-block mx-auto">


                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>&nbsp;Edit Tag</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('UpdateTag', $tag->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            {{-- <input type="text" name="tagid" value="{{ $tag->id }}"> --}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tag Name</label>
                                                <input type="text"
                                                    class="form-control @error('tag_name') is-invalid @enderror"
                                                    name="tag_name" value="{{ $tag->tag_name }}" id="exampleInputEmail1"
                                                    placeholder="Enter Tag Name">
                                                @error('tag_name')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success">Update Tag</button>
                                        </div>
                                        <!-- /.card-body -->
                                        {{-- <div class="card-footer">
           
                                       </div> --}}
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->

                </div>

                <!-- /.row -->
            </div>
        </div>
    </section>
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
