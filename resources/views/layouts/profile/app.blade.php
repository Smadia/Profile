<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Smadia</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        
        <!-- Favicons -->
        <link href="{{ asset('img/Logo/4.png') }}" rel="icon">
        <link href="{{ asset('img/4.png') }}" rel="apple-touch-icon">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
        
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
        
        <!-- =======================================================
            Theme Name: Rapid
            Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
            Author: BootstrapMade.com
            License: https://bootstrapmade.com/license/
            ======================================================= -->
    </head>
    
    <body>
        <!--==========================
        Header
        ============================-->
        <header id="header">
            
            <div id="topbar">
                <div class="container">
                    <div class="social-links">
                        <a target="_blank" href="https://twitter.com/smadiaID" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="https://facebook.com/smadia.id" class="facebook"><i class="fa fa-facebook"></i></a>
                        <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
                        <a target="_blank" href="https://instagram.com/smadia.id" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="container">
                
                <div class="logo float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <h1 class="text-light"><a href="#intro" class="scrollto"><span>Rapid</span></a></h1> -->
                    <a href="{{ route('profile.index') }}" class="scrollto"><img src="img/Logo/9.png" alt="Logo" class="img-fluid"></a>
                </div>
                
                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="#intro">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="{{ route('profile.portfolio') }}">Portfolio</a></li>
                        <li><a href="#footer">Contact Us</a></li>
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
                                <img src="img/Logo/9.png" class="mb-3" style="width: 150px" alt="">
                                <p>
                                    Smadia consists of professional team which provides development of digital needs. Here, the clients not just built an app, but also advice to build a neat system to solve their problems. 
                                    The code is clean, and could be easily to maintenance or updating the system.
                                </p>
                            </div>
                        
                        </div>

                        <!-- <div class="col-lg-4">
                            
                            <div class="footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Portofolio</a></li>
                                    <li><a href="#">Products</a></li>
                                </ul>
                            </div>
                            
                        </div> -->

                        <div class="col-lg-4">
                            <div class="footer-links">
                                <h4>Contact Us</h4>
                                <p>
                                    <strong>Phone/WA:</strong> +6289636201616<br>
                                    <strong>Email:</strong> support@smadia.id<br>
                                </p>
                            </div>
                            
                            <div class="social-links">
                                <a href="https://twitter.com/SmadiaID" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://facebook.com/smadia.id" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://instagram.com/smadia.id" class="instagram"><i class="fa fa-instagram"></i></a>
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