@extends('backend.layouts.master')
@section('title', 'Team View')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Team View</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Team List</li>
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
                    <a href="{{ route('team.index') }}" class="btn btn-primary text-light">Go back Team List</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>
                            <td style="width: 250px;">Image</td>
                            <td>
                                <div style="max-width:130px;max-height:170px;overflow:hidden" class="">
                                    <img src="@if ($team->team_img) {{ asset($team->team_img) }} @else
                              {{ asset('backend/user/user.png') }} @endif"
                                        class="img-fluid img-rounded" alt="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 250px;">Team Name</td>
                            <td>{{ $team->team_name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Team Designation</td>
                            <td>{{ $team->designation }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Team Description</td>
                            <td>{{ $team->team_desc }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Social Link Facebook</td>
                            <td>{{ $team->team_facebook_link }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Social Link Twitter</td>
                            <td>{{ $team->team_twitter_link }}</td>
                        </tr>

                        <tr>
                            <td style="width: 250px;">Social Link Linkdn</td>
                            <td>{{ $team->team_linkdin_link }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            {{-- <div class="card-footer">Footer</div> --}}
        </div>

    </div>
@endsection
