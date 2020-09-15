<!-- start header -->
<header>
    <!-- start navigation -->
    @if($page == 0)
        <nav class="navbar navbar-default bootsnav bg-transparent navbar-scroll-top nav-box-width header-light on no-full">
    @elseif($page == 1)
        <nav class="navbar navbar-default bootsnav bg-transparent navbar-top header-dark white-link">
    @endif

        <div class="container nav-header-container">
            <div class="row">
                <!-- start logo -->
                <div class="col-md-2 col-xs-5">
                    <a href="{{ url('/') }}" title="Codei systems" class="logo"><img src="{{ Storage::url($logo_dark->value) }}" data-rjs="{{ Storage::url($logo_dark->value) }}" class="logo-dark" alt="CODEI"><img src="{{ Storage::url($logo_light->value) }}" data-rjs="{{ Storage::url($logo_light->value) }}" alt="CODEI SYSTEMS" class="logo-light default"></a>
                </div>
                <!-- end logo -->
                <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                    <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                        <span class="sr-only">toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                        <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                            <!-- start menu item -->
                            <li>
                                <a href="{{ url('about_us') }}">About us</a>
                                <!-- start sub menu -->
                            </li>
                            <li>
                                <a href="{{ url('offers') }}">Awesome deals</a>
                                <!-- start sub menu -->
                            </li>
                            <li>
                                <a href="{{ url('/blog') }}">Blog</a>
                                <!-- start sub menu -->
                            </li>
                            <li>
                                <a href="{{ url('/contact_us') }}">Contact us</a>
                                <!-- start sub menu -->
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Staff login</a>
                                <!-- start sub menu -->
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-xs-5 width-auto">
                    <div class="header-searchbar">
                        <a href="#search-header" class="header-search-form text-white"><i class="fas fa-search search-button"></i></a>
                        <!-- start search input -->
                        <form id="search-header" method="post" action="{{ route('search') }}" name="search-header" class="mfp-hide search-form-result">
                            <div class="search-form position-relative">
                                <button type="submit" name="submit" class="fas fa-search close-search search-button"></button>
                                <input type="text" name="keywords" class="search-input" placeholder="Enter your keywords..." autocomplete="off">
                            </div>
                        </form>
                        <!-- end search input -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<!-- end header -->
