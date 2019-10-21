<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ setting('site.title') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
{!! SEO::generate() !!}

<!-- Favicons -->
    <link href="{{ asset(Voyager::image(setting('site.logo'))) }}" rel="icon">
    <link href="{{ asset(Voyager::image(setting('site.logo'))) }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('profile/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('profile/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('profile/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/css/index.css') }}" rel="stylesheet">
    @stack('head-tag')
</head>

<body>
<!--==========================
Header
============================-->
<header id="header">
    <div id="topbar" class="@if(Route::currentRouteName() != 'profile.index') with-bg @endif">
        <div class="container">
            <div class="social-links">
                <a target="_blank" href="https://twitter.com/smadiaID" class="twitter"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="https://facebook.com/smadia.id" class="facebook"><i class="fa fa-facebook"></i></a>
                <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
                <a target="_blank" href="https://instagram.com/smadia.id" class="instagram"><i
                        class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="logo float-left">
            <a href="{{ route('profile.index') }}" class="scrollto"><img
                    src="{{ Voyager::image(setting('site.typeicon')) }}" alt="Logo" class="img-fluid"></a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="{{ is_current_route('profile.index') ? 'active' : '' }}"><a
                        href="{{ route('profile.index') }}">Home</a></li>
                <li class="{{ is_current_route('profile.portofolio') ? 'active' : '' }}"><a
                        href="{{ route('profile.portofolio') }}">Portfolio</a></li>
            </ul>
        </nav>
        <!-- .main-nav -->

    </div>
</header>
<!-- #header -->

@yield('content')

<!--==========================
        Footer
============================-->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-info">
                        <img src="{{ Voyager::image(setting('site.typeicon')) }}" class="mb-3" style="width: 150px"
                             alt="">
                        {!! setting('site.about_us_min') !!}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-links">
                        <h4>Contact Us</h4>
                        <p>
                            <strong>Phone/WA:</strong> {{ setting('site.phone') }}<br>
                            <strong>Email:</strong> {{ setting('site.email') }}<br>
                        </p>
                    </div>
                    <div class="social-links">
                        <a href="https://twitter.com/SmadiaID" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="https://facebook.com/smadia.id" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="https://instagram.com/smadia.id" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form">
                        <h4>Send us a message</h4>
                        <form action="{{ route('profile.message') }}" method="post" role="form" class="contactForm">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                          data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>

                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>

                            <div class="text-center">
                                <button type="submit" title="Send Message">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright 2019 <strong>Smadia</strong>. All Rights Reserved
        </div>
        <div class="credits">

        </div>
    </div>
</footer>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<a href="https://wa.me/6289636201616" class="fab-whatsapp" target="_blank">
    <i class="fa fa-whatsapp float"></i>
</a>

<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{ asset('profile/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('profile/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('profile/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('profile/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('profile/lib/mobile-nav/mobile-nav.js') }}"></script>
<script src="{{ asset('profile/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('profile/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('profile/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('profile/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('profile/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('profile/lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('profile/js/main.js?time=1') }}"></script>

</body>
</html>
