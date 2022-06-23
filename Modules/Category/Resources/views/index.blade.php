{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Category List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                <h3 class="card-title">Category List</h3>

                                @if (session('success'))
                                    @include('backend.layouts.success')
                                @elseif(session('status'))
                                    @include('backend.layouts.success')
                                @else
                                    @include('backend.layouts.error')
                                @endif

                                <a href="{{ route('CreateCategory') }}" class="btn btn-primary text-light">Create
                                    Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Category Name</th>
                                    <th>Category Picture</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value->category_name }}</td>
                                        <td>
                                            <div style="max-width:70px;max-height:70px;overflow:hidden" class="m-auto">
                                                <img src="@if ($value->image_url) {{ $value->image_url }} @else
                                          {{ asset('backend/category/default_image.png') }} @endif"
                                                    class="img-fluid img-rounded" alt="">
                                            </div>
                                            {{-- <img src="{{ $value->image_url }}" alt="" width="75"
                                                height="65"> --}}
                                        </td>
                                        <td>{{ $value->slug }}</td>
                                        <td class="text-center">{{ $value->posts_count }}</td>
                                        <td>
                                            @if ($value->status == 1)
                                                <span class="text-success"
                                                    style="color:green;font-weight: bold;font-size:20px">Enable</span>
                                            @else
                                                <span style="color:red;font-weight: bold;font-size:20px">Disable</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($value->status == 1)
                                                <a href="{{ route('status', $value->id) }}" class="btn btn-danger">
                                                    <i class="fa fa-eye-slash text-light" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('status', $value->id) }}" class="btn btn-success">
                                                    <i class="fa fa-solid fa-eye text-light"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('EditCategory', $value->id) }}" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('DeleteCategory', $value->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are You Sure You Want To Delete This Item Y/N')"><i
                                                    class="fas fa-trash"></i></a>
                                            {{-- <a href="{{ route('status', $value->id) }}" class="btn btn-warning"><i
                                                    class="fa fa-solid fa-eye"></i></a>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch1">
                                                <label class="custom-control-label" for="switch1">Toggle me</label>
                                            </div> --}}

                                            <input type="checkbox" checked data-toggle="toggle">
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                    <div class="text-center">
                        {{ $category->links() }}
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
