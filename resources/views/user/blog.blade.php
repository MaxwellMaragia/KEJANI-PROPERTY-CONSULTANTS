@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $seo->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="{{ $seo->author }}">
    <!-- description -->
    <meta name="title" content="{{ $seo->title }}">
    <meta name="description" content="{{ $seo->description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $seo->keywords }}">
    <meta name="language" content="{{ $seo->language }}">
    <meta name="revisit-after" content="{{ $seo->revisit_after }}">
@endsection
{{--end meta tags--}}

{{--additional css--}}
@section('additional-css')
    <style>
        {{ $seo->css }}
    </style>
@endsection
{{--end additional css--}}
@section('page')
    @php
        $page = 1
    @endphp
@endsection
@section('main-content')
    <!-- Main Blog Post Content -->
    <section class="blog_post_container bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content style2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – Grid View</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_post_content">
                        @foreach($posts as $post)
                        <div class="for_blog feat_property">
                            <div class="thumb">
                                <img class="img-whp" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                            </div>
                            <div class="details">
                                <div class="tc_content">
                                    <h4 class="mb15"><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h4>
                                    <p>
                                        {{ $post->subtitle }}
                                    </p>
                                </div>
                                <div class="fp_footer">
                                    <ul class="fp_meta float-left mb0">
                                        <li class="list-inline-item"><img src="{{ Storage::url($post->avatar) }}" alt="{{ $post->name }}" height="50px" width="50px" style="border-radius: 100%;"></li>
                                        <li class="list-inline-item"><a>{{ $post->name }}</a></li>
                                        <li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span> {{ $post->created_at->toFormattedDateString() }}</a></li>
                                    </ul>
                                    <a class="fp_pdate float-right text-thm" href="{{ route('post',$post->slug) }}">Read More <span class="flaticon-next"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mbp_pagination mt20">
                                        {{ $posts->links() }}
                                    </div>
                                </div>
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

