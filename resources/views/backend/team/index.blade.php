{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Team List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Team</h1>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- view data -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Team List</h3>

                                @if (session('status'))
                                    @include('backend.layouts.success')
                                @else
                                    @include('backend.layouts.error')
                                @endif

                                <a href="{{ route('team.create') }}" class="btn btn-primary text-light">Team Create</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        @if ($teams->count())
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th width="7%">image</th>
                                        <th>Team Name</th>
                                        <th>Team Designation</th>
                                        <th>Team Description</th>
                                        <th>Updated_at</th>
                                        <th width="2%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div style="max-width:130px;max-height:170px;overflow:hidden"
                                                    class="m-auto">
                                                    <img src="@if ($team->team_img) {{ asset($team->team_img) }} @else
                                                 {{ asset('backend/user/user.png') }} @endif"
                                                        class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>
                                            <td>{{ $team->team_name }}</td>
                                            <td>{{ $team->designation }}</td>
                                            <td>{{ substr($team->team_desc, 0, 30) }}</td>
                                            <td>
                                                @if ($team->updated_at)
                                                    {{ $team->updated_at->format('d-m-Y') }}
                                                    {{ $team->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex">
                                                    <a href="{{ route('team.show', $team->id) }}"
                                                        class="btn btn-warning mr-1"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('team.edit', $team->id) }}"
                                                        class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('team.destroy', $team->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Sure Delete This Items ?')"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
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
