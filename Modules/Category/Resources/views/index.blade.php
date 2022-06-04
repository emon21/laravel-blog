{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Category List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
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
                            <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('create') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                        name="category_name" id="exampleInputEmail1" placeholder="Enter Category Name">
                                    @error('category_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Create Category</button>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">

                            </div> --}}
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- view data -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">All Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value->category_name }}</td>
                                        <td>
                                            @if ($value->status == 1)
                                                <span class="text-success"
                                                    style="color:green;font-weight: bold;font-size:20px">Enable</span>
                                            @else
                                                <span style="color:red;font-weight: bold;font-size:20px">Disable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit', $value->id) }}" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete', $value->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are You Sure You Want To Delete This Item Y/N')"><i
                                                    class="fas fa-trash"></i></a>
                                            <a href="{{ route('status', $value->id) }}" class="btn btn-warning"><i
                                                    class="fa fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                    <div class="text-center">
                        {{ $category->links() }}
                    </div>
                </div>

                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
