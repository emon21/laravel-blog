{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'User List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" id="exampleInputEmail1" placeholder="Enter Name">
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" id="exampleInputEmail1"
                                        placeholder="Enter Email">
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" id="exampleInputEmail1"
                                        placeholder="Enter Password ">
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="comment">Description:</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" rows="5" id="comment" name="desc"></textarea>
                                    @error('desc')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Create User</button>
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
                            <h3 class="card-title">All User</h3>
                        </div>
                        <!-- /.card-header -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>User Picture</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userlist as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ $user->image_url }}" alt="" width="180" height="120"></td>
                                        <td>{{ $user->description }}</td>
                                        <td>{{ $user->slug }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="text-success"
                                                    style="color:green;font-weight: bold;font-size:20px">Enable</span>
                                            @else
                                                <span style="color:red;font-weight: bold;font-size:20px">Disable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <a href="" class="btn btn-danger"
                                                    onclick="return confirm('Are You Sure You Want To Delete This Item Y/N')"><i
                                                        class="fas fa-trash"></i></a> --}}

                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>


                                            @if ($user->status == 1)
                                                <a href="{{ route('status', $user->id) }}" class="btn btn-dark"><i
                                                        class="fa fa-eye-slash text-danger" aria-hidden="true"></i></a>
                                            @else
                                                <a href="{{ route('status', $user->id) }}" class="btn btn-dark"> <i
                                                        class="fa fa-solid fa-eye text-success"></i></a>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                    <div class="text-center">
                        {{ $userlist->links() }}
                    </div>
                </div>

                <!-- /.row -->
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
