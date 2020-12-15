<div class="preloader" style="background-image: url({{ asset('user/images/preloader.gif') }});"></div>
<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{ Storage::url($logo_dark->value) }}" alt="KEJANI PROPERTY CONSULTANTS">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="{{ url('/') }}" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{ Storage::url($logo_dark->value) }}" alt="KEJANI PROPERTY CONSULTANTS">
                <img class="logo2 img-fluid" src="{{ Storage::url($logo_dark->value) }}" alt="KEJANI PROPERTY CONSULTANTS">
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-left" data-menu-style="horizontal">
                <li>
                    <a href="{{ url("/") }}"><span class="title">Home</span></a>
                </li>
                <li>
                    <a href="{{ url("buy") }}"><span class="title">Buy</span></a>
                </li>
                <li>
                    <a href="{{ url("rent") }}"><span class="title">Rent</span></a>
                </li>
                <li>
                    <a href="{{ url("blog") }}"><span class="title">Blog</span></a>
                </li>
                <li>
                    <a href="{{ url("about_us") }}"><span class="title">About us</span></a>
                </li>
                <li>
                    <a href="{{ url("contact_us") }}"><span class="title">Contact us</span></a>
                </li>
                <li class="list-inline-item add_listing home2 style2 float-right"><a href="tel: {{ $mobile->value }}"><span class="fa fa-phone" style="margin-right:10px;"></span><span class="dn-lg">{{ $mobile->value }}</span></a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Header Nav For Mobile -->
    <div id="page" class="stylehome1 h0">
        <div class="mobile-menu">
            <div class="header stylehome1">
                <div class="main_logo_home2 text-center">
                    <img class="nav_logo_img img-fluid mt20" src="{{ $logo_light->value }}" alt="KEJANI">
                </div>
            </div>
        </div><!-- /.mobile-menu -->
    </div>
</header>
<nav id="menu" class="stylehome1">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
        <li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
        <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
    </ul>
</nav>

