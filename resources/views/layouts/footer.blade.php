<!-- Start Footer aera -->
<footer class="rbt-footer footer-style-1" id="contact">
    <div class="footer-top">
        <div class="container">
            <div class="row row--15 mt_dec--30">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('images/icon/logo.png') }}" alt="Edu-cause">
                            </a>
                        </div>

                        <p class="description mt--20">We’re always in search for talented
                            and motivated people. Don’t be shy introduce yourself!
                        </p>

                        <ul class="social-icon social-default icon-naked justify-content-start mt--20">
                            <li><a >
                                    <i class="feather-facebook"></i>
                                </a>
                            </li>
                            <li><a >
                                    <i class="feather-twitter"></i>
                                </a>
                            </li>
                            <li><a >
                                    <i class="feather-instagram"></i>
                                </a>
                            </li>
                            <li><a >
                                    <i class="feather-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Sitemap</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('welcome','#trainer') }}">Trainer</a>
                            </li>
                            <li>
                                <a href="{{ route('welcome','#course') }}">Course</a>
                            </li>
                            <li>
                                <a href="{{ route('welcome','#testimonial') }}">Testimonial</a>
                            </li>
                            <li>
                                <a href="{{ route('welcome','#news') }}">News</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Our Company</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="become-a-teacher.html">Become Teacher</a>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="instructor.html">Instructor</a>
                            </li>
                            <li>
                                <a href="event-list.html">Events</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Get Contact</h5>
                        <ul class="ft-link">
                            <li><span>Phone:</span> <a >+60 16-888 9428</a></li>
                            <li><span>E-mail:</span> <a > support@hrdp.com.my</a></li>
                            <li><span>Location:</span> Kuala Lumpur, Malaysia</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer aera -->
<div class="rbt-separator-mid">
    <div class="container">
        <hr class="rbt-separator m-0">
    </div>
</div>
<!-- Start Copyright Area  -->
<div class="copyright-area copyright-style-1 ptb--20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                <p class="rbt-link-hover text-center text-lg-start">Copyright © 2023 {{ config('app.name') }} All Rights Reserved</p>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                    <li><a href="{{ route('tnc') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('reward_tnc') }}">Reward T&C</a></li>
                    {{-- <li><a href="subscription.html">Subscription</a></li>
                    <li><a href="login.html">Login & Register</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
