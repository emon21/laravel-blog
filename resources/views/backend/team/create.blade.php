{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Create Team')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Team List</a></li>
                        <li class="breadcrumb-item active">Create Team</li>
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
                                <h3 class="card-title">Create Team</h3>
                                <a href="{{ route('team.index') }}" class="btn btn-primary text-light">Go back Team
                                    List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="col-md-8 justify-content-center d-block mx-auto mt-4 mb-4">
                            <!-- general form elements -->
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create Team</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group col-sm-6">
                                                <label for="team_name">Team Name</label>
                                                <input type="text"
                                                    class="form-control @error('team_name') is-invalid @enderror"
                                                    name="team_name" value="{{ old('team_name') }}" id="team_name"
                                                    placeholder="Enter Team Name">
                                                @error('team_name')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="designation">Team Designation</label>
                                                <input type="text"
                                                    class="form-control @error('designation') is-invalid @enderror"
                                                    name="designation" value="{{ old('designation') }}" id="designation"
                                                    placeholder="Enter Team Designation">
                                                @error('designation')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="comment">Description:</label>
                                                <textarea class="form-control @error('team_description') is-invalid @enderror" rows="5" id="comment"
                                                    name="team_description" placeholder="Enter Team Description"></textarea>
                                                @error('team_description')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="team_facebook">Social Link Facebook</label>
                                                    <input type="text"
                                                        class="form-control @error('team_facebook') is-invalid @enderror"
                                                        name="team_facebook" value="{{ old('team_facebook') }}"
                                                        id="team_facebook" placeholder="Enter Team Social Link Facebook">
                                                    @error('team_facebook')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="team_twitter">Social Link Twitter</label>
                                                    <input type="text"
                                                        class="form-control @error('team_twitter') is-invalid @enderror"
                                                        name="team_twitter" value="{{ old('team_twitter') }}"
                                                        id="team_twitter" placeholder="Enter Team Social Link Twitter">
                                                    @error('team_twitter')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="team_linkdin">Social Link Linkedin</label>
                                                    <input type="text"
                                                        class="form-control @error('team_linkdin') is-invalid @enderror"
                                                        name="team_linkdin" value="{{ old('team_linkdin') }}"
                                                        id="team_linkdin" placeholder="Enter Team Social Link Linkedin">
                                                    @error('team_linkdin')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Picture</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                class="custom-file-input @error('team_picture') is-invalid @enderror"
                                                                id="exampleInputFile" name="team_picture">
                                                            @error('team_picture')
                                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex mx-auto justify-content-center mt-2">
                                            <button type="submit" class="btn btn-success">Create Team</button>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
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
