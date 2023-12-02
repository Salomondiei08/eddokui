<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>{{ config('app.name', 'Laravel') }} @isset($title) - {{ $title }} @endisset</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <link rel="icon" href="{{ asset('img/ED.png') }}" type="image/png" />
        <!-- Favicons -->
        {{--
        <link href="assets/img/favicon.png" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
        --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
        <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet" />

        <!-- =======================================================
  * Template Name: Mentor
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h1 class="logo me-auto">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('img/ED.png') }}" alt="" srcset="" />
                        <img src="{{ asset('img/ED1.png') }}" alt="" srcset="" />
                    </a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="order-last navbar order-lg-0">
                    <ul>
                        <li><a class="{{request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Accueil</a></li>
                        <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Nous concernant</a></li>
                        <li><a class=" {{ request()->routeIs('contacts') ? 'active' : '' }}" href="{{route('contacts')}}">Contactez-nous</a></li>
                        @auth
                        <li><a href="{{ route('student') }}">Faire un récencement</a></li>
                        @endauth
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->

                <a href="/admin" class="get-started-btn">Se connecter</a>
            </div>
        </header>
        <!-- End Header -->

        <main id="main">
            @yield('content')
        </main>
        <!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 footer-contact">
                            <h3>EDDokui1</h3>
                            <p>
                                Côte d'ivoire, Abidjan <br />
                                Abobo Dokui<br />
                                Eglise CMA Dokui1<br />
                                <br />
                                <strong>Tel:</strong> +225 0505011574<br />
                                <strong>Email:</strong> info@eddokui1.com<br />
                            </p>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Les liens</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('welcome') }}">Accueil</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">Nous concernant</a></li>
                                <li><i class="bx bx-chevron-right"></i><a href="{{route('contacts')}}">Contactez-nous</a></li>
                                @auth
                                <li><i class="bx bx-chevron-right"></i><a href="{{ route('student') }}">Faire un récencement</a></li>
                                @endauth
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Nos forces</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Formation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-4 d-md-flex">
                <div class="text-center me-md-auto text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Eddokui1</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
                <div class="pt-3 text-center social-links text-md-right pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.facebook.com/EDDOKUI1?mibextid=2JQ9oc" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
