<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- slider revolution CSS files -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/revolution/css/navigation.css')}}">
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{asset('front/css/vendors.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/corporate/corporate.css')}}" />
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @stack('css')

</head>

<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#242E45">
<div class="box-layout">
    <!-- start header -->
    @include('front.layouts.header')
    <!-- end header -->
    @yield('content')
    <!-- start section -->
    <section>
        <div class="container position-relative">
            <div class="row align-items-center mb-7">
                <div class="col-xxl-4 col-lg-5 md-mb-15 sm-mb-20 text-center text-lg-start">
                    <span class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-block">Kolay süreç</span>
                    <h3 class="text-dark-gray fw-700 ls-minus-2px mb-40px">Sağlıklı yaşama adım adım.</h3>
                    <div class="row row-cols-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <!-- start process step item -->
                        <div class="col-12 process-step-style-05 position-relative hover-box">
                            <div class="process-step-item d-flex">
                                <div class="process-step-icon-wrap position-relative">
                                    <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-green fw-700 position-relative">
                                        <span class="number position-relative z-index-1 text-dark-gray">01</span>
                                        <div class="box-overlay bg-base-color rounded-circle"></div>
                                    </div>
                                    <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                                </div>
                                <div class="process-content ps-30px last-paragraph-no-margin mb-30px">
                                    <span class="d-block fw-700 text-dark-gray mb-5px fs-18">İlk Görüşme & Analiz</span>
                                    <p class="w-90 lg-w-100 lh-32">Beden ölçümleri, kan değerleri ve yaşam tarzı analizi ile sürece başlıyoruz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end process step item -->

                        <!-- start process step item -->
                        <div class="col-12 process-step-style-05 position-relative hover-box">
                            <div class="process-step-item d-flex">
                                <div class="process-step-icon-wrap position-relative">
                                    <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-green fw-700 position-relative">
                                        <span class="number position-relative z-index-1 text-dark-gray">02</span>
                                        <div class="box-overlay bg-base-color rounded-circle"></div>
                                    </div>
                                    <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                                </div>
                                <div class="process-content ps-30px last-paragraph-no-margin mb-30px">
                                    <span class="d-block fw-700 text-dark-gray mb-5px fs-18">Kişisel Beslenme Planı</span>
                                    <p class="w-90 lg-w-100 lh-32">Size özel, dengeli ve sürdürülebilir bir diyet listesi hazırlanır.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end process step item -->

                        <!-- start process step item -->
                        <div class="col-12 process-step-style-05 position-relative hover-box xs-mb-30px">
                            <div class="process-step-item d-flex">
                                <div class="process-step-icon-wrap position-relative">
                                    <div class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-light-green fw-700 position-relative">
                                        <span class="number position-relative z-index-1 text-dark-gray">03</span>
                                        <div class="box-overlay bg-base-color rounded-circle"></div>
                                    </div>
                                </div>
                                <div class="process-content ps-30px last-paragraph-no-margin">
                                    <span class="d-block fw-700 text-dark-gray mb-5px fs-18">Takip & Motivasyon</span>
                                    <p class="w-90 lg-w-100 lh-32">Haftalık kontroller ve motivasyon desteği ile hedefinize ulaşmanız sağlanır.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end process step item -->
                    </div>
                </div>

                <!-- Görsel Alan -->
                <div class="col-lg-7 offset-xxl-1 position-relative md-mb-30px sm-mb-15"
                     data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <img src="https://placehold.co/675x560?text=Sağlıklı+Yaşam" class="position-relative z-index-9 top-40px" alt="">
                    <img src="images/diyetisyen-surec.png" class="absolute-middle-center xs-w-95" alt="">
                    <img src="https://placehold.co/144x64?text=Sebzeler" class="position-absolute top-50px left-0px xs-left-15px"
                         data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
                         alt="">
                    <img src="https://placehold.co/67x34?text=Meyveler" class="position-absolute top-150px left-30"
                         data-bottom-top="transform: translateY(30px)" data-top-bottom="transform: translateY(-30px)"
                         alt="">
                    <img src="https://placehold.co/61x30?text=Su" class="position-absolute top-50px right-30"
                         data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)"
                         alt="">
                    <img src="https://placehold.co/93x45?text=Egzersiz"
                         class="position-absolute top-100px right-0px xs-right-15px"
                         data-bottom-top="transform: translateY(30px)" data-top-bottom="transform: translateY(-30px)"
                         alt="">
                </div>
            </div>

            <!-- Alt CTA -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center align-items-center" data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="bg-base-color fw-700 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 me-10px sm-m-5px d-inline-block align-middle">Hadi Başlayalım</div>
                    <div class="fs-18 fw-500 text-dark-gray d-inline-block align-middle">
                        Sağlıklı yaşam yolculuğunuza bugün başlayın. <a href="iletisim.html" class="text-dark-gray text-decoration-line-bottom fw-700">İletişime geçin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start footer -->
    @include('front.layouts.footer')
    <!-- end footer -->
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Kaydır</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
</div>
<!-- javascript libraries -->
<script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/vendors.min.js')}}"></script>
<!-- slider revolution core javaScript files -->
<script type="text/javascript" src="{{asset('front/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
@stack('script')
</body>

</html>
