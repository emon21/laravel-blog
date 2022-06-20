{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Subscribe List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Subscribe</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subscribe List</li>
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
                                <h3 class="card-title">Subscribe List</h3>

                                @if (session('status'))
                                    @include('backend.layouts.success')
                                @else
                                    @include('backend.layouts.error')
                                @endif

                                {{-- <a href="{{ route('team.create') }}" class="btn btn-primary text-light">Team Create</a> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        @if ($subscribe->count())
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Subscribe Email</th>
                                        <th>Updated_at</th>
                                        {{-- <th width="2%">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscribe as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if ($value->updated_at)
                                                    {{ $value->updated_at->format('d-m-Y') }}
                                                    {{ $value->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            {{-- <td class="text-center">
                                                <div class="d-flex">
                                                    <a href="{{ route('team.show', $value->id) }}"
                                                        class="btn btn-warning mr-1"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('team.edit', $value->id) }}"
                                                        class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('team.destroy', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Sure Delete This Items ?')"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <tr>
                                <td>
                                    <span class="text-center text-danger">No User Found</span>
                                </td>
                            </tr>
                        @endif
                    </div>
                    <!-- /.card -->
                    <div class="text-center">

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
