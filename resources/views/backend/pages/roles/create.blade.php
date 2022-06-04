@extends('backend.layouts.master')
@section('title')
    Dashboard ~ Admin Page
@endsection
@section('header')
    {{-- @include('backend.layouts.partials.header') --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('admin-content')
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title">Add Role</div>
                    </div>
                    @include('backend.layouts.partials.messages')
                    <form action="{{ route('roles.store') }}" method="post"
                        class="col-sm-6 justify-content-center d-block mx-auto">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="rolename">Role Name</label>
                                <input type="text" class="form-control" id="rolename" placeholder="Enter Role Name...!!"
                                    name="role_name" value="{{ old('role_name') }}">
                                {{-- @error('role_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>


                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Permission</label>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="checkPermissionAll" value="1">
                                    <label for="checkPermissionAll" class="custom-control-label">All</label>
                                </div>
                                <hr />
                                @php $i = 1; @endphp
                                @foreach ($permissin_group as $group)
                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" name="permissions[]"
                                                    id="checkPermission" value="{{ $group->name }}"
                                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <label for="checkPermission"
                                                    class="custom-control-label">{{ $group->name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                //$permission = App\User::gerPermissionsByGroupName($group->name);
                                                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="permissions[]"
                                                        id="checkPermission{{ $permission->id }}"
                                                        value="{{ $permission->name }}">
                                                    <label for="checkPermission{{ $permission->id }}"
                                                        class="custom-control-label">{{ $permission->name }}</label>
                                                </div>
                                                @php $j++; @endphp
                                            @endforeach

                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach

                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Create Role</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('script')
    <script>
        $('#checkPermissionAll').click(function() {
            if ($(this).is(':checked')) {
                //check
                $('input[type=checkbox]').prop('checked', true);
            } else {
                //uncheck
                $('input[type=checkbox]').prop('checked', false);

            }
        });

        function checkPermissionByGroup(className, checkThis) {

            // const groupIdName = $("#"+checkThis.id);
            //  class classCheckBox = $('.' +className+ ' input');

            const groupIdName = $("#" + checkThis.id);
            const classCheckBox = $('.' + className + 'input');

            if (groupIdName.is(':checked')) {

                classCheckBox.prop('checked', true);
            } else {

                classCheckBox.prop('checked', false);

            }

        }
    </script>
@endsection
