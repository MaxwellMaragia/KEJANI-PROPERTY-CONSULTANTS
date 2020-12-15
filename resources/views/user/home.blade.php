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
            /** Home 8 Carousel */
        .bs_carousel_bg {
            -webkit-background-size: cover;
            background-size: cover;
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        .bs_carousel .bs_carousel_bg:after {
            background-color: rgba(29, 41, 62,0.6);
            bottom: 0;
            content: " ";
            display: block;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 1;
        }
        .bs_carousel,
        .bs_carousel .carousel-inner,
        .bs_carousel .carousel-item {
            height: 100%;
        }
        .bs_carousel_prices {
            position: absolute;
            width: 50%;
            bottom: 15px;
            left: 0;
            height: 90px;
            z-index: 2;
            transform: scale(0, 1);
            -webkit-transition: transform .6s ease-in-out;
            -o-transition: transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            transform-origin: top right;
        }
        .bs_carousel_prices.pprty-price-active {
            transform: scale(1, 1);
        }
        .bs_carousel_prices .carousel-item {
            background-color: #000000;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
        .bs_carousel_prices .carousel-item .pprty-price {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
            font-size: 28px;
            line-height: 28px;
            height: 28px;
            overflow: hidden;
            left: calc((100% * 2 - 1140px) / 2 + 15px);
        }
        .bs_carousel_prices .carousel-item .pprty-price > span {
            display: block;
            transform: translateY(100%);
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        .bs_carousel_prices.pprty-price-active .carousel-item.active .pprty-price > span {
            transform: translateY(0);
        }
        .bs_carousel_prices.pprty-price-active.pprty-first-time .carousel-item.active .pprty-price > span {
            -webkit-transition-delay: .6s;
            transition-delay: .6s;
        }
        .bs_carousel_prices .property-carousel-ticker {
            position: absolute;
            left: 210px;
            top: 50%;
            color: #ffffff;
            white-space: nowrap;
            font-weight: 700;
            opacity: 0;
            -webkit-transition: opacity .2s ease-in-out;
            -o-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
        }
        .bs_carousel_prices.pprty-price-active .property-carousel-ticker {
            opacity: 1;
        }
        .bs_carousel_prices.pprty-price-active.pprty-first-time .property-carousel-ticker {
            -webkit-transition-delay: .6s;
            transition-delay: .6s;
        }
        .bs_carousel_prices .property-carousel-ticker > div {
            display: inline-block;
            line-height: 25px;
            vertical-align: bottom;
        }
        .bs_carousel_prices .property-carousel-ticker .property-carousel-ticker-counter {
            overflow: hidden;
            height: 24px;
        }
        .bs_carousel_prices .property-carousel-ticker .property-carousel-ticker-counter > span {
            display: block;
            font-size: 24px;
            -webkit-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        .bs_carousel_prices .carousel-item:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255,255,255,0.1);
            transform: scale(0, 1);
            transform-origin: 0% 50%;
            -webkit-transition: all 6.4s linear;
            -o-transition: all 6.4s linear;
            transition: all 6.4s linear;
        }
        .bs_carousel_prices.pprty-price-active .carousel-item.active:after {
            transform: scale(1, 1);
        }
        .bs_carousel_prices.pprty-price-active.pprty-first-time .carousel-item.active:after {
            -webkit-transition-delay: .6s;
            transition-delay: .6s;
        }
        .bs_carousel .property-carousel-controls {
            background-color: #ffffff;
            border-radius: 0 8px 0 0;
            bottom: 0;
            height: 90px;
            left: 0;
            line-height: 90px;
            overflow: hidden;
            position: absolute;
            text-align: center;
            width: 180px;
            z-index: 99;
        }
        .bs_carousel .property-carousel-controls a {
            background-color: #ffffff;
            color: #006c70;
            cursor: pointer;
            display: block;
            height: 90px;
            position: absolute;
            width: 90px;
        }
        .bs_carousel .property-carousel-controls a:hover{
            color: #ff5a5f;
        }
        .bs_carousel .property-carousel-controls a span{
            font-size: 23px;
        }
        .bs_carousel .property-carousel-controls a.property-carousel-control-prev {
            top: 0;
            left: 0;
        }
        .bs_carousel .property-carousel-controls a.property-carousel-control-next {
            top: 0;
            right: 0;
        }
        @keyframes arrowPCLeft {
            0% {
                -webkit-transform: translate(0, -50%);
                transform: translate(0, -50%);
            }
            25% {
                opacity: 0;
                -webkit-transform: translate(-30%, -50%);
                transform: translate(-30%, -50%);
            }
            50% {
                opacity: 0;
                -webkit-transform: translate(20%, -50%);
                transform: translate(20%, -50%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translate(0, -50%);
                transform: translate(0, -50%);
            }
        }
        @keyframes arrowPCRight {
            0% {
                -webkit-transform: translate(0, -50%);
                transform: translate(0, -50%);
            }
            25% {
                opacity: 0;
                -webkit-transform: translate(30%, -50%);
                transform: translate(30%, -50%);
            }
            50% {
                opacity: 0;
                -webkit-transform: translate(-30%, -50%);
                transform: translate(-30%, -50%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translate(0, -50%);
                transform: translate(0, -50%);
            }
        }
        .bs_carousel .property-carousel-controls a.property-carousel-control-prev:hover svg {
            -webkit-animation: arrowPCLeft 0.4s ease-in-out;
            -moz-animation: arrowPCLeft 0.4s ease-in-out;
            animation: arrowPCLeft 0.4s ease-in-out;
        }
        .bs_carousel .property-carousel-controls a.property-carousel-control-next:hover svg {
            -webkit-animation: arrowPCRight 0.4s ease-in-out;
            -moz-animation: arrowPCRight 0.4s ease-in-out;
            animation: arrowPCRight 0.4s ease-in-out;
        }
        .bs_carousel .carousel-item .bs-caption {
            color: #ffffff;
            left: 0;
            position: absolute;
            right: 0;
            top: 54%;
            transform: translateY(calc(-50% - 70px));
            z-index: 2;
        }
        .bs_carousel .main_title {
            color: #ffffff;
            font-family: "Nunito";
            font-size: 55px;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 15px;
            margin-top: 120px;
            opacity: 0;
            -webkit-transform: translateY(20px);
            -moz-transform: translateY(20px);
            -o-transform: translateY(20px);
            transform: translateY(20px);
            -webkit-transition: all .6s ease-in-out;
            -moz-transition: all .6s ease-in-out;
            -o-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
        }
        .bs_carousel .carousel-item.active .main_title {
            opacity: 1;
            transform: translateY(0);
        }
        .bs_carousel .parag {
            font-size: 18px;
            font-family: "Nunito";
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 0;
            opacity: 0;
            -webkit-transform: translateY(20px);
            -moz-transform: translateY(20px);
            -o-transform: translateY(20px);
            transform: translateY(20px);
            -webkit-transition: all .9s ease-in-out;
            -moz-transition: all .9s ease-in-out;
            -o-transition: all .9s ease-in-out;
            transition: all .9s ease-in-out;
        }
        .bs_carousel .carousel-item.active .parag {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

@endsection
{{--end additional css--}}
@section('page')
    @php
        $page = 1
    @endphp
@endsection
@section('main-content')
    <!-- 4th Home Slider -->
    <section class="p0">
        <div class="container-fluid p0">
            <div class="home8-slider vh-100">
                <div id="bs_carousel" class="carousel slide bs_carousel" data-ride="carousel" data-pause="false" data-interval="7000">
                    <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($banners as $banner)
                        <div class="carousel-item @if($i==0) active @endif" data-slide="{{ $i }}" data-interval="false">
                            <div class="bs_carousel_bg" style="background-image: url('{{ Storage::url($banner->banner_image) }}')"></div>
                            <div class="bs-caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-4">
                                            <div class="feat_property home8">
                                                <div class="details">
                                                    <div class="tc_content">
                                                        <ul class="tag">
                                                            <li class="list-inline-item"><a href="{{ url('for-rent') }}">{{ $banner->Property_status }}</a></li>
                                                            @if($banner->featured == 1)
                                                                <li class="list-inline-item">Featured</li>
                                                            @endif

                                                        </ul>
                                                        <p class="text-thm">Apartment</p>
                                                        <h4><a href="{{ route('property',$banner->slug) }}">{{ $banner->name }}</a></h4>
                                                        <p><span class="flaticon-placeholder"></span>{{ $banner->location }}</p>
                                                        <ul class="prop_details">
                                                            <li class="list-inline-item"><a href="#">Bedrooms: {{ $banner->bedroom }}</a></li>
                                                            <li class="list-inline-item"><a href="#">Bathrooms: {{ $banner->bathroom }}</a></li>
                                                            <li class="list-inline-item"><a href="#">{{ $banner->size }}</a></li>
                                                        </ul>
                                                        <a class="fp_price" href="#"><small>{{ $banner->price }}</small></a>
                                                        <div class="fp_footer">
                                                            <div class="fp_pdate float-right">{{ $banner->created_at->toFormattedDateString() }}</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                    <div class="property-carousel-controls">
                        <a class="property-carousel-control-prev" role="button" data-slide="prev">
                            <span class="flaticon-left-arrow-1"></span>
                        </a>
                        <a class="property-carousel-control-next" role="button" data-slide="next">
                            <span class="flaticon-right-arrow"></span>
                        </a>
                    </div>
                </div>
                <div class="carousel slide bs_carousel_prices" data-ride="carousel" data-pause="false" data-interval="false">
                    <div class="carousel-inner"></div>
                    <div class="property-carousel-ticker">
                        <div class="property-carousel-ticker-counter"></div>
                        <div class="property-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>
                        <div class="property-carousel-ticker-total"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="feature-property" class="latest-property bb1">
        <div class="container ovh">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb40">
                        <h2>Featured Properties</h2>
                        <p>Handpicked properties by our team.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="feature_property_slider">
                        @foreach($featured_properties as $featured)
                        <div class="item">
                            <div class="feat_property">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ Storage::url($featured->image) }}" alt="{{ $featured->name }}">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a>{{ $featured->Property_status }}</a></li>
                                        </ul>

                                        <a class="fp_price">{{ $featured->price }}</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">Apartment</p>
                                        <h4>{{ $featured->name }}</h4>
                                        <p><span class="flaticon-placeholder"></span>{{ $featured->location }}</p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a>Bedrooms: {{ $featured->bedroom }}</a></li>
                                            <li class="list-inline-item"><a>Bathrooms: {{ $featured->bathroom }}</a></li>
                                            <li class="list-inline-item"><a>{{ $featured->size }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="fp_footer">
                                        <div class="fp_pdate float-right">{{ $featured->created_at->toFormattedDateString() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="comfort-place" class="comfort-place pb30 bb1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2>Find a Place That Fits Your Comfort</h2>
                        <p>Explore the greates places in the city. You won’t be disappointed.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($types as $type)
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon_hvr_img_box" style="background-image: url({{ Storage::url($type->image) }});">
                            <div class="overlay">
                                <div class="icon"><span class="{{ $type->icon }}"></span></div>
                                <div class="details">
                                    <h4>{{ $type->name }}</h4>
                                    <p>07 Listings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@section('additional-js')
    <script>
        var bsCarouselItems = 1;
        if($('.bs_carousel .carousel-item').length){
            $('.bs_carousel .carousel-item').each(function(index, element) {
                if (index == 0) {
                    $('.bs_carousel_prices').addClass('pprty-price-active pprty-first-time');
                }
                $('.bs_carousel_prices .property-carousel-ticker-counter').append('<span>0' + bsCarouselItems + '</span>');
                bsCarouselItems += 1;
            });
        }

        $('.bs_carousel_prices .property-carousel-ticker-total').append('<span>0' + $('.bs_carousel .carousel-item').length + '</span>');

        if($('.bs_carousel').length){
            $('.bs_carousel').on('slide.bs.carousel', function(carousel) {
                $('.bs_carousel_prices').removeClass('pprty-first-time');
                $('.bs_carousel_prices').carousel(carousel.to);
            });
        }

        if($('.bs_carousel').length){
            $('.bs_carousel').on('slid.bs.carousel', function(carousel) {
                var tickerPos = (carousel.to) * 25;
                $('.bs_carousel_prices .property-carousel-ticker-counter > span').css('transform', 'translateY(-' + tickerPos + 'px)');
            });
        }

        if($('.bs_carousel .property-carousel-control-next').length){
            $('.bs_carousel .property-carousel-control-next').on('click',function(e) {
                $('.bs_carousel').carousel('next');
            });
        }

        if($('.bs_carousel .property-carousel-control-prev').length){
            $('.bs_carousel .property-carousel-control-prev').on('click',function(e) {
                $('.bs_carousel').carousel('prev');
            });
        }
        if($('.bs_carousel').length){
            $('.bs_carousel').carousel({
                interval: 6000,
                pause: "true"
            });
        }
    </style>
@endsection
@endsection
