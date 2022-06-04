@extends('backend.layouts.master')
@section('title', 'Tag Edit')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tag List</li>
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
                            <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Edit Tag</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('UpdateTag', $tag->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{--  <input type="text" name="tagid" value="{{ $tag->id }}">  --}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tag Name</label>
                                    <input type="text" class="form-control @error('tag_name') is-invalid @enderror"
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

                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
