<!-- Our Footer -->
<section class="footer_one">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
                <div class="footer_about_widget">
                    <h4>KEJANI PROPERTY CONSULTANTS</h4>
                    <p>{{ $footer_text->value }}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_qlink_widget">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('about_us') }}">About Us</a></li>
                        <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ url('contact_us') }}">Contact us</a></li>
                        <li><a target="_blank" href="{{ route('login') }}">Staff login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_contact_widget">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li><a href="mailto: {{ $email->value }}">{{ $email->value }}</a></li>
                        <li><a href="{{ $map->value }}">{{ $address->value }}</a></li>
                        <li><a href="tel: {{ $mobile->value }}">{{ $mobile->value }}</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_social_widget">
                    <h4>Follow us</h4>
                    <ul class="mb30">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Footer Bottom Area -->
<section class="footer_middle_area pt40 pb40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-widget text-right">
                    <p>© <script>document.write(new Date().getFullYear());</script> Kejani Property Consultants. Developed by <a
                            href="https://codeisystems.co.ke" target="_blank">CODEI SYSTEMS</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="scrollToHome home8" href="#"><i class="flaticon-arrows"></i></a>
</div>

<!-- Wrapper End -->
<script type="text/javascript" src="{{ asset("user/js/jquery-3.3.1.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/jquery-migrate-3.0.0.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/popper.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/jquery.mmenu.all.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/ace-responsive-menu.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/bootstrap-select.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/isotop.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/snackbar.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/simplebar.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/parallax.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/scrollto.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/jquery-scrolltofixed-min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/jquery.counterup.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/wow.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/progressbar.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/slider.js")}}"></script>
<script type="text/javascript" src="{{ asset("user/js/timepicker.js")}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCmkDpS9DDEV73V2YT1OeOK4tA-HcSxDQ"type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("user/js/google-maps.js")}}"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="{{ asset("user/js/script.js")}}"></script>
@section('additional-js')

@show
