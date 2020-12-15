@section('meta')
    @show
<link rel="stylesheet" href="{{ asset("user/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{ asset("user/css/style.css")}}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset("user/css/responsive.css")}}">
<!-- Title -->
<!-- Favicon -->
<link rel="shortcut icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Storage::url($favicon->value) }}">


<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@section('additional-css')

@show


