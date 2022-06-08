@extends('backend.layouts.master')
@section('title', 'Edit Category')

@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                <!-- left column -->
                <div class="col-md-4 justify-content-center d-block mx-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Update Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('UpdateCategory', $category->id) }}" method="post">
                            @csrf
                            @method('Put')
                            {{-- <input type="text" value="{{ $category->id }}"> --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                        name="category_name" id="exampleInputEmail1" placeholder="Enter Category Name"
                                        value="{{ $category->category_name }}">
                                    @error('category_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
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
                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
