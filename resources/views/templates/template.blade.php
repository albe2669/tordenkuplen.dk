<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tordenkuplen @yield('title')</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="main_menu_iner">
                        <div class="search_icon">
                        </div>
                        <div class="logo">
                            <a href="index.html"><img src="img/logo.png" alt="#"></a>
                        </div>
                        <span class="menu-trigger visible-xs">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <div class="off-canven-menu">
                            <span class="close-icon">
                                <i class="ti-close"></i>
                            </span>
                            <div class="canven-menu-warp">
                                <div class="canven-menu-iner">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">about</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @yield('content')
    <!-- contact us part start-->
    <section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact_us_iner">
                        <div class="row justify-content-around">
                            <div class="col-lg-4">
                                <div class="contact_us_left_text">
                                    <h4>Tordenkuplen</h4>
                                    <span>Holland</span>
                                    <p>Pim Mulierlaan 1, 8443 DA Heerenveen, Holland</p>
                                    <p>Email: dev@tordenkuplen.dk <br>Telefon nr: +31 309 055 (1992)</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact_us_right_text">
                                    <h5>Ring til os;</h5>
                                    <h2>+31 309 055 (1992)</h2>
                                    <h5>Adresse</h5>
                                    <span>Pim Mulierlaan 1, 
                                        8443 DA Heerenveen, Holland</span>
                                    <h5>Working Hours:</h5>
                                    <p>08:00 - 16:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map_iner">
                        <div class="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer_1">
                        <h4>Om denne side</h4>
                        <p> Denne side er baseret på en intern joke om tordenkuplen fra filmen "Mad Max i tordenkuplen", produceret i 1985</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget footer_2">
                        <h4>Kontakt</h4>
                        <div class="contact_info">
                            <p><span>Adresse :</span> Pim Mulierlaan 1, 8443 DA Heerenveen, Holland </p>
                            <p><span>Telef :</span> +31 309 055 (1992) </p>
                            <p><span>Email :</span> dev@tordenkuplen.dk </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/gmap3.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('extra-js')
</body>

</html>