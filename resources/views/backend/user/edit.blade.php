{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Edit User')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">User List</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                                <h3 class="card-title">Edit User</h3>
                                <a href="{{ route('user.index') }}" class="btn btn-primary text-light">Go back User
                                    List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="col-md-8 justify-content-center d-block mx-auto mt-4 mb-4">
                            <!-- general form elements -->
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i>&nbsp;Edit User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('user.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- <input type="text" name="" id="" value="{{ $user->id }}"> --}}
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-8 mx-auto justify-content-center">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ $user->name }}" id="exampleInputEmail1">
                                                    @error('name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}" id="exampleInputEmail1"
                                                        placeholder="Enter Email">
                                                    @error('email')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Password <small
                                                            class="text-danger">( Enter
                                                            Password if you
                                                            Changed )</small></label>
                                                    <input type="text"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" value="{{ old('password') }}"
                                                        id="exampleInputEmail1" placeholder="Enter Password ">
                                                    @error('password')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Update
                                                        User</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
