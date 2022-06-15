{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Edit Setting')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Edit Setting</li>
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
                                <h3 class="card-title">Edit Site Setting</h3>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        @if (session('update'))
                            <div class="alert alert-success">
                                {{ session('update') }}
                            </div>
                        @endif
                        <div class="card-body p-0">

                            <div class="col-md-8 mt-4 mb-4 justify-content-center d-block mx-auto">

                                <!-- form start -->
                                {{-- <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf --}}

                                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                            name="site_name" value="{{ $setting->site_name }}">
                                        @error('site_name')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label for="site_logo">Site Logo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                                        name="site_logo">
                                                    <label class="custom-file-label" for="site_logo">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div
                                                    style="max-width:100px;max-height:100px;overflow:hidden;margin-left:auto;">
                                                    <img src="{{ asset($setting->site_logo) }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="text"
                                                    class="form-control @error('facebook') is-invalid @enderror"
                                                    name="facebook" value="{{ $setting->facebook }}"
                                                    placeholder="Facebook URL">
                                                @error('facebook')
                                                    <div class="alert alert-danger mt-2">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="text"
                                                    class="form-control @error('twitter') is-invalid @enderror"
                                                    name="twitter" value="{{ $setting->twitter }}"
                                                    placeholder="Twitter URL">
                                                @error('twitter')
                                                    <div class="alert alert-danger mt-2">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="text"
                                                    class="form-control @error('instagram') is-invalid @enderror"
                                                    name="instagram" value="{{ $setting->facebook }}"
                                                    placeholder="instagram URL">
                                                @error('instagram')
                                                    <div class="alert alert-danger mt-2">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="rss">RSS</label>
                                                <input type="text" class="form-control @error('rss') is-invalid @enderror"
                                                    name="rss" value="{{ $setting->rss }}" placeholder="rss URL">
                                                @error('rss')
                                                    <div class="alert alert-danger mt-2">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email"> Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ $setting->email }}" placeholder="Enter Email">
                                                @error('email')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="copy_right">Copy Right</label>
                                                <input type="text" class="form-control" name="copy_right"
                                                    value="{{ $setting->copy_right }}" placeholder="Enter Copy Right">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone_no">Phone No</label>
                                                <input type="text" class="form-control" name="phone_no"
                                                    value="{{ $setting->phone_no }}" placeholder="Enter Phone No">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address">Location :</label>
                                                <textarea class="form-control" rows="1" name="address" placeholder="Write your Address">{{ $setting->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Description</label>
                                        <textarea class="form-control" rows="5" name="site_desc" placeholder="Write your Site description">{{ $setting->site_desc }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Setting</button>
                                </form>
                                <!-- /.card -->
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
