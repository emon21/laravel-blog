@extends('backend.layouts.master')
@section('title')
    Dashboard ~ Admin Page
@endsection
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title pt-2">All Roles List</h3>
                    <a href="{{ route('roles.create') }}" class="float-right btn btn-outline-success">
                        <i class="fas fa-plus"></i> &nbsp;
                        Create Role</a>
                </div>
                <!-- /.card-header -->

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $value)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="">
                                                <i class="fas fa-edit btn btn-success"></i></a>
                                            <form action="{{ route('roles.destroy', $value->id) }}" method="post"
                                                class="ml-2">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('are you sure')"><i
                                                        class="fas fa-trash "></i></button>
                                            </form>
                                        </div>
                                        {{-- <a href="{{ route('roles.destroy', $value->id) }}" class="btn btn-danger">
                                            <i class="fas fa-trash "></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Namw</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
