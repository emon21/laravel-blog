@extends('backend.layouts.master')
@section('title')
    Dashboard ~ Admin Page
@endsection
@section('header')
    {{-- <i class="fa fa-tags" aria-hidden="true"></i>
    <i class="fa fa-clipboard" aria-hidden="true"></i>
    <i class="fa fa-th-list" aria-hidden="true"></i> --}}
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner pl-4">
                            <h3>{{ $postCount }}</h3>

                            <p>Post</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-pen-square"></i>
                        </div>
                        <a href="{{ route('postList') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner pl-4">
                            <h3>{{ $categoryCount }}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <a href="{{ route('category') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner pl-4">
                            <h3>{{ $tagCount }}</h3>

                            <p>Tag Count</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <a href="{{ route('taglist') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner pl-4">
                            <h3 class="">{{ $userCount }}</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>

                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- Left col -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-list"></i> &nbsp; Post List</h3>
                        <a href="{{ route('postList') }}" class="btn btn-primary">Post List</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td class="text-center">

                                        <img src="{{ $post->image_url }}" width="150" height="150" alt="">
                                    </td>
                                    <td>{{ $post->category->category_name }}</td>
                                    <td>

                                        @foreach ($post->tags as $tag)
                                            <span class="badge badge-info">{{ $tag->tag_name }}</span>
                                        @endforeach

                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        @if ($post->status == 'publish')
                                            <span class="text-success text-bold">Published</span>
                                        @else
                                            <span class="text-danger text-bold">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('viewpost', $post->id) }}" class="btn btn-success"
                                            data-toggle="tooltip" title="View Post">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('editPost', $post->id) }}" class="btn btn-primary"
                                            data-toggle="tooltip" title="Edit Post" data-placement="bottom">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('deletepost', $post->id) }}" class="btn btn-danger"
                                            data-toggle="tooltip" title="Delete Post" data-placement="top"
                                            onclick="return confirm('Are You Sure Delete This Items Y/N')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <!-- Show Comment Start -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fas fa-list"></i> &nbsp; Comment List</h3>
                            <a href="" class="btn btn-primary">Comment List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>User</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $post)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->post->title }}</td>
                                        <td>{{ $post->comment }}</td>
                                        <td class="text-center">
                                            <img src="{{ $post->post->image_url }}" width="150" height="150"
                                                alt="">
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No</th>
                                    <th>User</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $comments->links() }}
                    </div>
                </div>
                <!-- Show Comment End -->
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="connectedSortable">
                <div class="row">
                    <!-- Map card -->
                    <div class="card bg-gradient-primary col-sm-6">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Visitors
                            </h3>
                            <!-- card tools -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div id="sparkline-1"></div>
                                    <div class="text-white">Visitors</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-2"></div>
                                    <div class="text-white">Online</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-3"></div>
                                    <div class="text-white">Sales</div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>

                    </div>
                    <!-- /.card -->
                    <!-- Calendar -->
                    <div class="card bg-gradient-success col-sm-6">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </section>
            <!-- right col -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
