@extends('backend.layouts.master')
@section('title', 'Message Show')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">
@endsection
@section('header')
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
    <div class="container-fluid">
        <!-- Create Post Start -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Messager View</h3>
                    <a href="{{ route('message') }}" class="btn btn-outline-primary"><i class="fa fa-undo"
                            aria-hidden="true"></i> &nbsp;Go Back Message</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>
                            <td style="width: 250px;">Full Name</td>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Email</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <td style="width: 250px;">Subject</td>
                            <td>{{ $contact->subject }}</td>
                        </tr>

                        <tr>
                            <td style="width: 250px;">Description</td>
                            <td>{!! $contact->message !!}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="card-footer">Footer</div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>
    <script>
        //dropify image upload
        $('.dropify').dropify({
            messages: {
                'default': 'Add a File Upload',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
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
