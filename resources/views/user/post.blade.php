@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $post->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="{{ $post->meta_author }}">
    <!-- description -->
    <meta name="title" content="{{ $post->meta_title }}">
    <meta name="description" content="{{ $post->meta_description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection
{{--end meta tags--}}

{{--additional css--}}
@section('additional-css')
    <style>
        {{ $post->css }}
    </style>
@endsection
{{--end additional css--}}

@section('main-content')
@section('facebook-comments')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0&appId=277480706746819&autoLogAppEvents=1"></script>
@endsection
    <!-- Blog Single Post -->
    <section class="blog_post_container bgc-f7 pb30">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content style2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active text-thm" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_post_content">
                        <div class="mbp_thumb_post">
                            <h3 class="blog_sp_title">{{ $post->title }}</h3>
                            <ul class="blog_sp_post_meta">
                                <li class="list-inline-item"><img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->avatar }}" height="50px" width="50px" style="border-radius: 100%;"></li>
                                <li class="list-inline-item">{{ $user->name }}</li>
                                <li class="list-inline-item"><span class="flaticon-calendar"></span></li>
                                <li class="list-inline-item">{{ $post->created_at->toFormattedDateString() }}</li>
                            </ul>
                            <div class="thumb">
                                <img class="img-fluid" src="{{ Storage::url($post->image) }}" alt="{{ $post->name }}">
                            </div>
                            <div class="details">
                                {!! htmlspecialchars_decode($post->body) !!}

                            </div>

                        </div>

                        <div class="bsp_reveiw_wrt" style="margin-top: 20px;">
                            <h4>Drop your comments here</h4>

                            <div class="fb-comments col-md-12" data-href="{{ Request::url() }}" data-numposts="5"
                                 data-width=""></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="sidebar_search_widget">
                        <div class="blog_search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms_condition_widget">
                        <h4 class="title">Categories</h4>
                        <div class="widget_list">
                            <ul class="list_details">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('category',$category->slug) }}"><i class="fa fa-caret-right mr10"></i>{{ $category->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="blog_tag_widget">
                        <h4 class="title">Tags</h4>
                        <ul class="tag_list">
                            @foreach($tags as $tag)
                                <li class="list-inline-item"><a href="{{ route('tag',$tag->slug) }}">{{  $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

