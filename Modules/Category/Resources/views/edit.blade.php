{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Category Edit')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
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
                                <h3 class="card-title">Category Edit</h3>
                                <a href="{{ route('category') }}" class="btn btn-primary text-light">Go Back Category List
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
                                                aria-hidden="true"></i>&nbsp;Category Edit</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('UpdateCategory', $category->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('Put')
                                        {{-- <input type="text" value="{{ $category->id }}"> --}}
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text"
                                                    class="form-control @error('category_name') is-invalid @enderror"
                                                    name="category_name" id="exampleInputEmail1"
                                                    placeholder="Enter Category Name"
                                                    value="{{ $category->category_name }}">
                                                @error('category_name')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Picture</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="exampleInputFile" name="post_picture">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" rows="5" name="desc" placeholder="Write your Category description"
                                                    id="description">{{ $category->description }}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success">Update Category</button>
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
    <script>
        //custom file
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
