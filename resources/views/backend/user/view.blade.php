@extends('backend.layouts.master')
@section('title', 'User View')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User View</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <div class="container-fluid">
        <!-- Create Post Start -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">User View</h3>
                    <a href="{{ route('user.index') }}" class="btn btn-primary text-light">Go back User List</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 250px;">Image</td>
                            <td>
                                <div style="width:150px;height:150px;overflow:hidden" class="mt-2">
                                    <img src="@if ($user->image) {{ asset($user->image) }} @else
                           {{ asset('backend/user/user.png') }} @endif"
                                        class="img-rounded" alt="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 250px;">User Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">User Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Description</td>
                            <td>{!! $user->description !!}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="card-footer">Footer</div>
        </div>

    </div>
@endsection
