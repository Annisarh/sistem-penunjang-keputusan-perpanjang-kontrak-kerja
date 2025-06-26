<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Wuling Motors | SPK Kontrak Salesman</title>
<!--

Lava Landing Page

https://templatemo.com/tm-540-lava-landing-page

-->

    <!-- file CSS tambahan -->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('Assets/css/templatemo-lava.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/css/owl-carousel.css') }}">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="https://wulingmajumotor.id/padang/" target="_blank" class="logo">
                            <img src="{{asset('Assets/images/Logo-Wuling-MMG-1024x267.webp')}}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="menu-item">Home</a></li>
                            <li class="scroll-to-section"><a href="#about" class="menu-item">About</a></li>
                            <li class="scroll-to-section"><a href="#promotion" class="menu-item">Panduan</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">login</a>
                                <ul>
                                    <li><a href="{{ route('login') }}">Sign In</a></li>
                                    {{-- <li><a href="{{route('register')}}">Sign Up</a></li> --}}
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us" class="menu-item">Credit</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-12 col-sm-6 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>SPK Kontrak Kerja <em>SALESMAN</em></h1>
                        <p>Penentuan Perpanjang Kontrak Kerja Salesman menggunakan metode TOPSIS dengan kriteria yang telah ditentukan oleh Sales Supervisor.</p> 
                        <a href="#about" class="main-button-slider">Info Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h3 class="mb-4">SPK Kontrak Kerja Salesman</h3>
                            <p class="fs-1">SPK Kontrak Kerja Salesman merupakan sistem pendukung keputusan yang membantu pihak sales supervisor dalam membuat keputusan mengenai penentuan perpanjang masa kontrak. SPK ini akan memberikan nilai atau peringkat pada masing-masing salesman terkait kinerja yang ia lakukan pada periode tertentu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    {{-- <div class="left-image-decor"></div> --}}

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="promotion">
        <div class="container">
            <div class="row">
                <div class="left-image col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix-big"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{asset('Assets/images/left-image.png')}}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text offset-lg-1 col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix">
                    <ul>
                        <li data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                            <img src="{{asset('Assets/images/about-icon-01.png')}}" alt="">
                            <div class="text">
                                <h4>Inputan Kriteria</h4>
                                <p>Please do not redistribute this template ZIP file for a download purpose. You may <a
                                rel="nofollow" href="https://templatemo.com/contact" target="_parent">contact</a> us for
                            additional licensing of our template or to get a PSD file.</p>
                            </div>
                        </li>
                        <li data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                            <img src="{{asset('Assets/images/about-icon-02.png')}}" alt="">
                            <div class="text">
                                <h4>Inputan Alternatif</h4>
                                <p>You can <a rel="nofollow"
                                        href="https://templatemo.com/tm-540-lava-landing-page">download Lava
                                        Template</a> from our website. Duis viverra, ipsum et scelerisque placerat, orci
                                    magna consequat ligula.</p>
                            </div>
                        </li>
                        <li data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                            <img src="{{asset('Assets/images/about-icon-03.png')}}" alt="">
                            <div class="text">
                                <h4>Inputan Penilaian</h4>
                                <p>Phasellus in imperdiet felis, eget vestibulum nulla. Aliquam nec dui nec augue
                                    maximus porta. Curabitur tristique lacus.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <div class="right-image-decor"></div>

    <!-- ***** Footer Start ***** -->
    <footer id="contact-us">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="right-content col-lg-12 col-md-12 col-sm-12 text-center">
                        <h2>More About This Website</h2>
                        <p>Website Sistem Penunjang Keputusan Penentuan Perpanjang Kontrak Salesman Menggunakan Metode TOPSIS pada PT. Maju Global Motor merupakan website yang dibuat untuk memenuhi penelitan skripsi jurusan sistem informasi. website dibangun dengan menggunakan templatemo bertema Lava.
                            <br><br>Lava Template. If you need this contact form to send email to your inbox, you may follow our <a
                                rel="nofollow" href="https://templatemo.com/contact" target="_parent">contact</a> page
                            for more detail.</p>
                        <ul class="social">
                            <li><a href="https://fb.com/templatemo"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sub-footer">
                        <p>Copyright &copy; 2020 Lava Landing Page

                        | Designed by <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{asset('Assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('Assets/js/popper.js')}}"></script>
    <script src="{{asset('Assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('Assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('Assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('Assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('Assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('Assets/js/imgfix.min.js')}}"></script>

    <!-- Global Init -->
    <script src="{{asset('Assets/js/custom.js')}}"></script>

</body>
</html>