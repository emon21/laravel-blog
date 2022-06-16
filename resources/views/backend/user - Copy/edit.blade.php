{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'User Profile')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> User Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"> User Profile</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">User Profile</h3>
                                <a href="{{ route('user/profile') }}" class="btn btn-primary">Go Back User Profile</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        @if (session('update'))
                            <div class="alert alert-success">
                                {{ session('update') }}
                            </div>
                        @endif
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <!-- form start -->
                                    <form action="{{ route('user.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="" id="" value="{{ $user->id }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">User Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ $user->name }}" id="exampleInputEmail1">
                                                        @error('name')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">User Email</label>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ $user->email }}"
                                                            id="exampleInputEmail1" placeholder="Enter Email">
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
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Picture</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile" name="user_picture">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>User Description</label>
                                                        <textarea class="form-control" rows="5" name="desc" placeholder="Write your profile description">{{ $user->description }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div style="width:202px;height:202px;overflow:hidden" class="m-auto">
                                                <img src="{{ asset($user->image) }}"
                                                    class="img-fluid rounded-circle img-rounded" alt="">
                                            </div>

                                            <div class="mt-1">
                                                <h4>{{ $user->name }}</h4>
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>
    <script>
        //dropify image upload
        $('.dropify').dropify({
            messages: {
                'default': 'Add a File Upload',
                'replace': 'Drag and drop or click to replace',
                'error': 'Ooops, something wrong happended.'

            }
        });
        //summernote editor
        $(function() {
            // Summernote
            //$('#summernote').summernote()
            $('#summernote').summernote({
                height: 150, //set editable area's height
                title: 'Enter Title',
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });


        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
