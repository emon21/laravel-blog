{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Team Edit')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Team Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Team Edit</li>
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
                                <h3 class="card-title">Team Edit</h3>
                                <a href="{{ route('team.index') }}" class="btn btn-primary">Go Back Team list</a>
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
                                    <form action="{{ route('admin/profile/update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="team_name">Team Name</label>
                                                        <input type="text"
                                                            class="form-control @error('team_name') is-invalid @enderror"
                                                            name="team_name" value="{{ $team->team_name }}"
                                                            id="team_name">
                                                        @error('team_name')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="facebook">facebook</label>
                                                        <input type="text"
                                                            class="form-control @error('facebook') is-invalid @enderror"
                                                            name="text" value="{{ $team->email }}" id="facebook"
                                                            placeholder="Enter facebook">
                                                        @error('facebook')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input type="text"
                                                            class="form-control @error('twitter') is-invalid @enderror"
                                                            name="text" value="{{ old('twitter') }}" id="twitter"
                                                            placeholder="Enter Twitter ">
                                                        @error('twitter')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="linkdin">Linkdin</label>
                                                        <input type="text"
                                                            class="form-control @error('linkdin') is-invalid @enderror"
                                                            name="text" value="{{ old('password') }}" id="linkdin"
                                                            placeholder="Enter linkdin ">
                                                        @error('linkdin')
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
                                                        <label for="teamDescription">Team Description</label>
                                                        <textarea class="form-control" rows="5" name="desc" placeholder="Write your profile description"
                                                            id="teamDescription">{{ $team->team_desc }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Team</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mt-4 mr-4">
                                        <div class="card-body text-center">
                                            <div style="width:120px;height:130px;overflow:hidden" class="m-auto">
                                                <img src="{{ asset($team->team_img) }}"
                                                    class="img-fluid rounded-circle img-rounded" alt="">
                                            </div>

                                            <div class="mt-1">
                                                <h4>{{ $team->team_name }}</h4>
                                                <p>{{ $team->team_desc }}</p>
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
