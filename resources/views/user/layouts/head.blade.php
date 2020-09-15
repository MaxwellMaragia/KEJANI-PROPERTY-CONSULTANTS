@section('meta')
    @show
<link rel="shortcut icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Storage::url($favicon->value) }}">
<!-- animation -->
<link rel="stylesheet" href="{{ asset('user/css/animate.css')}}" />
<!-- bootstrap -->
<link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css')}}" />
<!-- et line icon -->
<link rel="stylesheet" href="{{ asset('user/css/et-line-icons.css')}}" />
<!-- font-awesome icon -->
<link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css')}}" />
<!-- themify icon -->
<link rel="stylesheet" href="{{ asset('user/css/themify-icons.css')}}">
<!-- swiper carousel -->
<link rel="stylesheet" href="{{ asset('user/css/swiper.min.css')}}">
<!-- justified gallery -->
<link rel="stylesheet" href="{{ asset('user/css/justified-gallery.min.css')}}">
<!-- magnific popup -->
<link rel="stylesheet" href="{{ asset('user/css/magnific-popup.css')}}" />
<!-- revolution slider -->
<link rel="stylesheet" type="text/css" href="{{ asset('user/revolution/css/settings.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('user/revolution/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/revolution/css/navigation.css')}}">
<!-- bootsnav -->
<link rel="stylesheet" href="{{ asset('user/css/bootsnav.css')}}">
<!-- style -->
<link rel="stylesheet" href="{{ asset('user/css/style.css')}}" />
<!-- responsive css -->
<link rel="stylesheet" href="{{ asset('user/css/responsive.css')}}" />
<style>
    {{ strip_tags($custom_css->value) }}
</style>
@section('additional-css')

@show

<script src="{{ asset('user/js/html5shiv.js') }}"></script>

