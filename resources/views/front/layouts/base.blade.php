<!doctype html>
<html class="no-js" lang="tr">

<head>
    <title>Demo Diyetisyen | @yield('page-title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="tufiworks">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="tufiworks">
    <meta name="robots" content="noindex, nofollow">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('front/images/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/images/apple-touch-icon-114x114.png')}}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{asset('front/css/vendors.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/sass/icon/icon.scss')}}"/>
    <link rel="stylesheet" href="{{asset('front/corporate/corporate.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>

        /* Pagination (bullet) stilleri */
        .splide__pagination {
            position: absolute;
            bottom: 12px; /* görselin içinde yer alır */
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            display: flex;
            gap: 8px;
            color: var(--base-color) !important;
        }

        .splide__pagination__page {
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .splide__pagination__page.is-active {
            background: #fff;
            transform: scale(1.3);
        }

        /* Mobilde biraz daha yukarı çekelim */
        @media (max-width: 768px) {
            .splide__pagination {
                bottom: 6px;
            }
            .splide__pagination__page {
                width: 6px;
                height: 6px;
            }
        }
    </style>
    @stack('css')

</head>

<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#242E45">
<div class="box-layout">
    <!-- start header -->
    @include('front.layouts.header')
    <!-- end header -->
    @yield('content')

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

<script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let splideSlide = new Splide('.splide', {
            type: 'loop',
            rewind: true,
            autoplay: true,
            interval: 4000,
            pauseOnHover: true,
            arrows: true,
            pagination: true,
            speed: 800,
        });
        splideSlide.mount();
    });
</script>
@stack('script')
</body>

</html>
