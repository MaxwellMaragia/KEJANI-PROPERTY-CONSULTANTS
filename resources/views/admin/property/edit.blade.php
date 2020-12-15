@extends('admin.layouts.app')
@section('main-content')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit property
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('properties.index') }}">Properties</a></li>
            <li class="active">Edit property</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{ route('properties.update',$property->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.messages')
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Property details</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Description</a></li>
                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">SEO</a></li>
                            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Media</a></li>
                            <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Status</a></li>

                            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Unique name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" value="{{ $property->name }}" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label for="subtitle">Location<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="eg Nairobi, Kawangware" required="required" value="{{ $property->location }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Select type/s<span class="text-danger">*</span></label>
                                            <select class="form-control select2" multiple="multiple" data-placeholder="Select types"
                                                    style="width: 100%;" name="types[]" required="required">
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}"
                                                            @foreach($property->types as $propertytype)
                                                            @if($propertytype->id == $type->id)
                                                            selected
                                                        @endif
                                                        @endforeach
                                                    >{{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select feature/s<span class="text-danger">*</span></label>
                                            <select class="form-control select2" multiple="multiple" data-placeholder="Select features"
                                                    style="width: 100%;" name="features[]" required="required">
                                                @foreach($features as $feature)
                                                    <option value="{{ $feature->id }}"
                                                            @foreach($property->features as $propertyfeature)
                                                            @if($propertyfeature->id == $feature->id)
                                                            selected
                                                        @endif
                                                        @endforeach
                                                    >
                                                        {{ $feature->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Price (ksh)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="eg 20,000/month" required="required" value="{{ $property->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Deposit (ksh)<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="price" name="deposit" placeholder="eg 0" required="required" value="{{ $property->deposit }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Size (ft)</label>
                                            <input type="text" class="form-control" id="size" name="size" placeholder="eg 200 sqft"  value="{{ $property->size }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Date build</label>
                                            <input type="date" class="form-control" id="date" name="date_built" placeholder="Date built"  value="{{ $property->date_built }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Garage size<span class="text-danger">(Leave blank if not present)</span></label>
                                            <input type="text" class="form-control" id="garage_size" name="garage_size" placeholder="eg 100 sqft" required="required" value="{{ $property->garage }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Number of bedrooms</label>
                                            <input type="number" class="form-control" id="bedroom" name="bedroom" placeholder="eg 0"  value="{{ $property->bedroom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Number of bathrooms</label>
                                            <input type="number" class="form-control" id="bathroom" name="bathroom" placeholder="eg 0"  value="{{ $property->bathroom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Kitchen<span class="text-danger">*</span></label>
                                            <select name="kitchen" id="kitchen" class="form-control" required="required">
                                                @if($property->kitchen == 0)
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                @else
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="description" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ $property->description }}
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Meta author</label>
                                            <input type="text" class="form-control" id="meta_author" name="meta_author" placeholder="Enter author" value="{{ $property->meta_author }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle">Meta title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="{{ $property->meta_title  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Meta description</label>
                                            <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter description" value="{{ $property->meta_description }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Meta keywords</label>
                                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter SEO keywords separated by ," value="{{ $property->meta_keywords }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <img src="{{ Storage::url($property->image) }}"  alt="User Image" id="preview" height="auto" width="100%" onchange="previewImage(this)">
                                            </div>
                                            <div class="file">
                                                <label for="avatar" class="btn bg-navy"><span class="fa fa-upload"></span> Upload default image</label>
                                                <input type="file" name="image" accept="image/*" class="form-control" id="default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="video">Upload video if present</label>
                                            <input type="file" name="video" class="form-control" accept="video/*"/>
                                            <label for="video">Upload carousel images</label>
                                            <input type="file" name="carousel[]" class="form-control" multiple accept="image/*"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-6 ">
                                                <label>
                                                    <input type="checkbox" name="banner" id="banner_check"
                                                           value="1"
                                                           @if($property->banner == 1)
                                                           checked
                                                        @endif
                                                    > Set as banner
                                                </label>
                                            </div>

                                            <div class="check @if($property->banner != 1) hide @endif">
                                                <div class="form-group">

                                                    <img src="@if($property->banner == 1){{ Storage::url($property->banner_image) }} @else http://placehold.it/1920x1100 @endif"  alt="User Image" id="preview1" width="100%"  onchange="previewImage(this)" class="padding-10px-bottom">
                                                    <br>
                                                    <div class="file" style="margin-top:10px;">
                                                        <label for="avatar" class="btn bg-navy btn-flat btn-block "><span class="fa fa-upload"></span> Upload banner image</label>
                                                        <input type="file" name="banner_image" accept="image/*" class="form-control" id="banner">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>This property is for</label>
                                            <select name="property_status" class="form-control" required="required">
                                                <option value="">Sale or Rent?</option>
                                                <option value="For sale">Sale</option>
                                                <option value="For rent">Rent</option>
                                            </select>

                                            <label for="slug">Feature property</label><br>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="featured"
                                                              @if(old('featured')==1)
                                                              checked
                                                        @endif
                                                    > Feature</label>
                                            </div>

                                            <label for="slug">Set as active</label><br>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="status"
                                                              @if(old('status')==1)
                                                              checked
                                                        @endif
                                                    > Activate</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-warning" href="{{ route('properties.index') }}">Back</a>

                </form>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('footerSection')

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {

            // instance, using default configuration.
            CKEDITOR.replace( 'editor1');

        })
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });

        $('#banner_check').change(function(){
            if($(this).is(":checked")) {

                $('div.check').removeClass("hide");
                $('#banner_image').attr('required','required');

            } else {
                $('div.check').addClass("hide");
                $('#banner_image').removeAttr('required');

            }
        });

        function readURL(input,loadscreen) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(loadscreen).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#default").change(function(){
            readURL(this,'#preview');
        });

        $("#banner").change(function(){
            readURL(this,'#preview1');
        });

        function activatePlacesSearch() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
@endsection

@endsection
