@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add permission
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                <li class="active">Create</li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Permissions</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('permissions.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Permission name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="eg Publish_post" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Permission for</label>
                                        <select name="for" id="for" class="form-control" required="required">
                                            <option value="" selected disabled="disabled">Select permission for</option>
                                            <option value="blog">Blog</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('permissions.index') }}">Back</a>
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