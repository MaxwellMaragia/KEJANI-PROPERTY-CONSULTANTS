<footer class="footer-strip-dark bg-extra-dark-gray padding-90px-tb lg-padding-70px-tb md-padding-50px-tb sm-padding-40px-tb">
    <div class="container">
        <div class="row align-items-center sm-text-center">
            <div class="col-md-8 col-12 sm-margin-30px-bottom">
                <h5 class="text-white margin-5px-bottom">Let's make something great together</h5>
                <span class="text-medium">{{ $footer_text->value }}</span>
            </div>
            <div class="col-md-4 col-12 text-md-right text-sm-center">
                <span class="text-extra-large text-extra-dark-gray text-light-gray d-inline-block sm-d-block"><a href="{{ url('contact_us') }}" class="btn btn-large btn-transparent-white d-table d-lg-inline-block md-margin-lr-auto">Start a project</a></span>
            </div>
        </div>
        <div class="border-top border-color-medium-dark-gray padding-80px-top margin-80px-top lg-padding-60px-top lg-margin-60px-top md-padding-50px-top md-margin-50px-top sm-padding-40px-top sm-margin-40px-top">
            <div class="row align-items-center">
                <!-- start logo -->
                <div class="col-lg-3 col-md-12 md-text-center md-margin-50px-bottom sm-margin-30px-bottom">
                    <a href="https://codeisystems.co.ke"><img class="footer-logo" src="{{ Storage::url($logo_dark->value) }}" data-rjs="{{ Storage::url($logo_dark->value) }}" alt="CODEI SYSTEMS"></a>
                </div>
                <!-- end logo -->
                <!-- start copyright -->
                <div class="col-lg-4 col-md-5 col-12 sm-margin-30px-bottom text-medium sm-text-center">
                   {{ $address->value }}
                </div>
                <div class="col-lg-3 col-md-4 col-12 sm-margin-30px-bottom text-medium sm-text-center">
                    <a href="tel:{{ $mobile->value }}">{{ $mobile->value }}</a><br>
                    <a href="{{ $email->value }}">{{ $email->value }}</a>
                </div>
                <!-- end copyright -->
                <!-- start social media -->
                <div class="col-lg-2 col-md-3 text-md-right sm-text-center">
                    <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                        <ul class="small-icon mb-0">
                            <li><a class="facebook text-white-2" href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a class="linkedin text-white-2" href="{{ $linkedin->value }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a class="github text-white-2" href="{{ $github->value }}" target="_blank"><i class="fab fa-github"></i></a></li>

                        </ul>
                    </div>
                </div>
                <!-- end social media -->
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
<!-- end scroll to top -->
<!-- javascript libraries -->
<script type="text/javascript" src="{{ asset('user/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/skrollr.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/smooth-scroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/jquery.appear.js')}}"></script>
<!-- menu navigation -->
<script type="text/javascript" src="{{ asset('user/js/bootsnav.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/jquery.nav.js')}}"></script>
<!-- animation -->
<script type="text/javascript" src="{{ asset('user/js/wow.min.js')}}"></script>
<!-- page scroll -->
<script type="text/javascript" src="{{ asset('user/js/page-scroll.js')}}"></script>
<!-- swiper carousel -->
<script type="text/javascript" src="{{ asset('user/js/swiper.min.js')}}"></script>
<!-- counter -->
<script type="text/javascript" src="{{ asset('user/js/jquery.count-to.js')}}"></script>
<!-- parallax -->
<script type="text/javascript" src="{{ asset('user/js/jquery.stellar.js')}}"></script>
<!-- magnific popup -->
<script type="text/javascript" src="{{ asset('user/js/jquery.magnific-popup.min.js')}}"></script>
<!-- portfolio with shorting tab -->
<script type="text/javascript" src="{{ asset('user/js/isotope.pkgd.min.js')}}"></script>
<!-- images loaded -->
<script type="text/javascript" src="{{ asset('user/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- pull menu -->
<script type="text/javascript" src="{{ asset('user/js/classie.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/hamburger-menu.js')}}"></script>
<!-- counter -->
<script type="text/javascript" src="{{ asset('user/js/counter.js')}}"></script>
<!-- fit video -->
<script type="text/javascript" src="{{ asset('user/js/jquery.fitvids.js')}}"></script>
<!-- equalize -->
<script type="text/javascript" src="{{ asset('user/js/equalize.min.js')}}"></script>
<!-- skill bars -->
<script type="text/javascript" src="{{ asset('user/js/skill.bars.jquery.js')}}"></script>
<!-- justified gallery -->
<script type="text/javascript" src="{{ asset('user/js/justified-gallery.min.js')}}"></script>
<!--pie chart-->
<script type="text/javascript" src="{{ asset('user/js/jquery.easypiechart.min.js')}}"></script>
<!-- instagram -->
<script type="text/javascript" src="{{ asset('user/js/instafeed.min.js')}}"></script>
<!-- retina -->
<script type="text/javascript" src="{{ asset('user/js/retina.min.js')}}"></script>
<!-- revolution -->
<script type="text/javascript" src="{{ asset('user/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<!-- setting -->
<script type="text/javascript" src="{{ asset('user/js/main.js') }}"></script>
@section('additional-js')
    @show
