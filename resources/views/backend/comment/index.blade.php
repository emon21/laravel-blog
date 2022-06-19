{{-- @extends('category::layouts.master') --}}
@extends('backend.layouts.master')
@section('title', 'Message List')
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Message</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Message List</li>
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
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">All Message List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%">#Sl</th>
                                        <th>User</th>
                                        <th>Post</th>
                                        <th>Post Image</th>
                                        <th>Message</th>
                                        <th>Created_at</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($comments->count() > 0)
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->post->title }}</td>
                                                <td>
                                                    <div style="width:85px;height:85px;overflow:hidden" class="m-auto">
                                                        {{-- <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle img-rounded" alt=""> --}}

                                                        <img src="@if ($comment->post->image) {{ asset($comment->post->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                                                            class="img-fluid img-rounded"
                                                            alt="{{ $comment->post->title }}">
                                                    </div>
                                                </td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>{{ $comment->created_at->format('d M , Y  h:i:s A') }}
                                                    {{ $comment->created_at->diffForHumans() }}</td>
                                                {{-- Str::limit($value->message, 150) --}}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('comment.view', $comment->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    {{-- <form action="{{ route('contact.delete', ['id' => $comment->id]) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6"><span class="text-danger ">No Message
                                                    Found</span>
                                            </td>

                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-header -->

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
