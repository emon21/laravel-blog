@extends('backend.layouts.master')
@section('title', 'Comment View')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comment View</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Comment View</li>
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
                    <h3 class="card-title">User comment View</h3>
                    <a href="{{ route('comment') }}" class="btn btn-primary text-light">Go back Comment List</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>
                            <td style="width: 250px;">Post Image</td>
                            <td>
                                <div style="width:85px;height:85px;overflow:hidden">
                                    {{-- <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle img-rounded" alt=""> --}}

                                    <img src="@if ($singlecomment->post->image) {{ asset($singlecomment->post->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                                        class="img-fluid img-rounded" alt="{{ $singlecomment->post->title }}">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 250px;">User Name</td>
                            <td>{{ $singlecomment->user->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Post Name</td>
                            <td>{{ $singlecomment->post->title }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Post Comment</td>
                            <td>{{ $singlecomment->comment }}</td>
                        </tr>



                    </tbody>
                </table>
            </div>
            <div class="card-footer">Footer</div>
        </div>

    </div>
@endsection
