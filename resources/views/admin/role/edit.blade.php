@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('role.index') }}">Roles</a></li>
                <li class="active">Edit role</li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Role</h3>
                        </div>

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('role.update',$role->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Role</label>
                                        <input type="text" class="form-control" id="name" name="role" placeholder="Role" value="{{ $role->role }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="posts">Blog permissions</label><br>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'blog')
                                                <label>  <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                    @foreach($role->permissions as $role_permit)
                                                        @if($role_permit->id === $permission->id)
                                                        checked
                                                        @endif
                                                    @endforeach
                                                    > {{ $permission->name }}</label><br>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <label for="posts">Admin</label><br>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'admin')
                                                <label>  <input type="checkbox"  name="permission[]" value="{{ $permission->id }}"
                                                    @foreach($role->permissions as $role_permit)
                                                        @if($role_permit->id === $permission->id)
                                                        checked
                                                        @endif
                                                    @endforeach
                                                    > {{ $permission->name }} </label><br>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('role.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection