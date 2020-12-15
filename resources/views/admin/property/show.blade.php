@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Properties
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Properties</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                      <a href="{{ route('properties.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span>   Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Banner</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>
                                        <img

                                                @if($property->image)
                                                src="{{ Storage::url($property->image) }}"
                                                @else
                                                src="{{ Storage::url('public/noimage.jpg') }}"
                                                @endif

                                                alt="" height="70px" width="70px">
                                    </td>
                                    <td>{{ $property->name }}</td>
                                    <td>
                                        @foreach($property->types as $type)
                                            {{ $type->name }}
                                            @if( !$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <strong>{{ $property->location }}</strong>
                                    </td>
                                    <td>{{ $property->price }}</td>
                                    <td>
                                        {{ $property->Property_status }}
                                    </td>
                                    <td>
                                        @if($property->banner === 1)
                                            <span class="badge bg-green">Yes</span>
                                        @else
                                            <span class="badge bg-red">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($property->status === 1)
                                            <span class="badge bg-green">Yes</span>
                                        @else
                                            <span class="badge bg-red">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($property->featured === 1)
                                            <span class="badge bg-green">Yes</span>
                                        @else
                                            <span class="badge bg-red">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('properties.edit',$property->id) }}" class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form id="delete-form-{{ $property->id }}" action="{{ route('properties.destroy',$property->id) }}" style="display: none;" method="post">
                                            {{@csrf_field()}}
                                            {{@method_field('DELETE')}}
                                        </form>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                                if(confirm('Are you sure you want to delete this property?'))
                                                {event.preventDefault();
                                                document.getElementById('delete-form-{{ $property->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }
                                                " class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Banner</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>


@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
@endsection
