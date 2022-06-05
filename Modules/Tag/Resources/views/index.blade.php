@extends('backend.layouts.master')
@section('styles')

    <!-- Toaser  Css -->
    <link rel="stylesheet" href="{{ asset('toastr') }}/toastr.min.css">

@endsection
@section('title', 'Tag List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tag List</li>
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
                            <h3 class="card-title"><i class="fas fa-plus"></i>&nbsp;Create Tag</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('CreateTag') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tag Name</label>
                                    <input type="text" class="form-control @error('tag_name') is-invalid @enderror"
                                        name="tag_name" value="{{ old('tag_name') }}" id="exampleInputEmail1"
                                        placeholder="Enter Tag Name">
                                    @error('tag_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Create Tag</button>
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
                            <h3 class="card-title">All Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('deleteall') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete All Select</button>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        {{-- <th>
                                            <div class="form-group form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input selectall" type="checkbox"> Select All
                                                </label>
                                            </div>
                                            <input type="checkbox" class="selectall"> Delete all
                                        </th> --}}
                                        {{-- <button id="selectall">Delete all</button> --}}
                                        <th>Sl No</th>
                                        <th>Tag Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                        <th class="text-center"><label class="form-check-label">
                                                <input class="form-check-input selectall" type="checkbox"> Select All
                                            </label></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tagList->count() > 0)


                                        @foreach ($tagList as $value)
                                            <tr>
                                                {{-- <td>
                                                    <input type="checkbox" class="form-control selectbox" name="ids[]"
                                                        value="{{ $value->id }}">

                                                    <input type="checkbox" name="ids[]" class="selectbox"
                                                        value="{{ $value->id }}">
                                                </td> --}}
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->tag_name }}</td>
                                                <td>{{ $value->slug }}</td>

                                                <td>
                                                    <a href="{{ route('EditTag', $value->id) }}" class="btn btn-info"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ route('DeleteTag', $value->id) }}" class="btn btn-danger"
                                                        onclick="return confirm('Are You Sure You Want To Delete This Item Y/N')"><i
                                                            class="fas fa-trash"></i></a>

                                                </td>
                                                <td>

                                                    <input type="checkbox" class="form-control selectbox" name="ids[]"
                                                        value="{{ $value->id }}" id="exampleInputEmail1">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5"><span class="text-danger text-center">No Tag Found</span></td>

                                        </tr>


                                    @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!-- /.card -->
                    <div class="text-center">
                        {{ $tagList->links() }}
                    </div>
                </div>

                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
{!! Toastr::message() !!}
@section('script')
    <script src="{{ asset('toastr') }}/toastr.min.js"></script>
    <script>
        {{-- {!! Toastr::message() !!} --}}
        $('.selectall').click(function() {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            // $('.selectall2').prop('checked',$(this).prop('checked'));

        });
        {{-- $('.selectall2').click(function(){

        $('.selectbox').prop('checked',$(this).prop('checked'));
        $('.selectall').prop('checked',$(this).prop('checked'));

        }); --}}

        $('.selectbox').change(function() {

            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall').prop('checked', true);
                // $('.selectall2').prop('checked',true);
            } else {
                $('.selectall').prop('checked', false);
                // $('.selectall2').prop('checked',false);
            }

        });
    </script>
    <script>
        /*  @if (Session::has('success'))
            toaser.success("{{ Session::get('success') }}");
        @endif
        Command: toastr["success"]("Tag Create Successfully !!", "Create Tag")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }*/
    </script>

@endsection
