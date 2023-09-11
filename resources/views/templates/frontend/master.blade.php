<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : settings()->get(set_front('meta.description')),
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : settings()->get(set_front('meta.keyword')),
    'author' => isset($page_attr['author']) ? $page_attr['author'] : settings()->get(set_front('meta.author')),
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset(settings()->get(set_front('meta.image'))),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : settings()->get(set_front('app.preloader')),
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
    'url' => isset($page_attr['url']) ? $page_attr['url'] : url(''),
    'type' => isset($page_attr['type']) ? $page_attr['type'] : 'website',
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . settings()->get(set_front('app.title'), env('APP_NAME'));
$search_master_key = isset($_GET['search']) ? $_GET['search'] : '';
$getSosmed_val = get_sosmed();
$footerInstagram_val = footer_instagram();
$notifikasi = notif_depan_atas();
$compact = isset($compact) ? $compact : [];
$compact = array_merge($compact, compact('page_attr_title', 'search_master_key', 'getSosmed_val', 'notifikasi', 'page_attr'));
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="theme-color" content="#548235">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/icon-144x144.png') }}">

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <!-- Primary Meta Tags -->
    <title>{{ $page_attr_title }}</title>
    <meta name="description" content="{{ $page_attr->description }}">
    <meta name="author" content="{{ $page_attr->author }}">
    <meta name="keywords" content="{{ $page_attr->keywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="{{ $page_attr->url }}">
    <meta property="og:type" content="{{ $page_attr->type }}">
    <meta property="og:title" content="{{ $page_attr_title }}">
    <meta property="og:description" content="{{ $page_attr->description }}">
    <meta property="og:image" content="{{ $page_attr->image }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page_attr->url }}">
    <meta name="twitter:title" content="{{ $page_attr_title }}">
    <meta name="twitter:description" content="{{ $page_attr->description }}">
    <meta name="twitter:image" content="{{ $page_attr->image }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $page_attr_title }}">
    <meta itemprop="description" content="{{ $page_attr->description }}">
    <meta itemprop="image" content="{{ $page_attr->image }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/templates/frontend/assets/leaflet1.7.1/dist/leaflet.css') }}" /> --}}

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/main.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/templates/frontend/assets/font-awesome/5.15.4/css/all.min.css') }}" />

    <style>
        #preloader {
            background: #FFF;
            height: 100%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1031;
        }

        .bottom-left-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1030;
        }

        #back-to-top {
            color: #fff;
            height: 50px;
            width: 50px;
            background-repeat: no-repeat;
            background-position: center;
            transition: background-color .1s linear;
            -moz-transition: background-color .1s linear;
            -webkit-transition: background-color .1s linear;
            -o-transition: background-color .1s linear;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: #FFF 3px solid;
        }

        #whatsapp-container {
            height: 50px;
            width: 50px;
            background-repeat: no-repeat;
            background-position: center;
            transition: background-color .1s linear;
            -moz-transition: background-color .1s linear;
            -webkit-transition: background-color .1s linear;
            -o-transition: background-color .1s linear;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: #FFF 3px solid;
        }

        .pl-lg-60 {
            padding-left: 60px;
        }

        @media only screen and (max-width: 992px) {
            .col-image-hero {
                /* display: none */
                padding: 0;
            }

            .col-image-logo {
                position: absolute;
                z-index: 1;
            }

            .masthead.-type-5 {
                padding-bottom: 0;
                padding-top: 0;
            }

            .carousel-control-prev {
                display: none;
            }

            .carousel-control-next {
                display: none;
            }

            .carousel-item img {
                opacity: 0.5;
            }

            section.masthead.-type-5 {
                background-color: #000;
            }

            .pl-lg-60 {
                padding-left: 0;
            }

            .description-2 {
                padding-top: 420px;
            }
        }

        .carousel-item img {
            height: 780px;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        .button.-green-1.text-white:hover {
            color: var(--color-green-1) !important;
        }

        .button.-icon.-outline-green-1.text-green-1:hover {
            color: var(--color-white) !important;
        }

        .text-orange-1:hover {
            color: var(--color-green-7);
        }
    </style>
    @yield('stylesheet')

    @foreach (json_decode(settings()->get(set_front('meta_list'), '{}')) as $meta)
        <!-- custom {{ $meta->name }} -->
        {!! $meta->value !!}
    @endforeach

</head>

<body>

    <!-- preloader -->
    @if ($page_attr->loader)
        <div id="preloader">
            <div class="d-flex justify-content-center align-items-center flex-column bg-green-1"
                style="height: 100vh;">
                <img src="{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}" style="max-width: 80px;"
                    alt="logo" />
            </div>
        </div>
    @endif

    <!-- barba container start -->
    <div class="barba-container" data-barba="container">


        <main class="main-content ">

            @include('templates.frontend.body.header', $compact)

            <div class="content-wrapper  js-content-wrapper">
                @yield('content', '')
                @include('templates.frontend.body.footer', $compact)
            </div>

            <div class="bottom-left-container">
                <a class="button -green-5 p-20 text-white fw-bold" id="whatsapp-container"
                    href="https://api.whatsapp.com/send?phone={{ settings()->get(set_front('app.no_whatsapp')) }}"
                    target="_blank">
                    <i class="fab fa-whatsapp" style="font-size: 1.5em"></i>
                </a>

                <div style="display: none">
                    <div id="back-to-top" class="span bg-blue-1 p-20 mt-5">
                        <i class="fas fa-arrow-up" style="font-size: 1.5em"></i>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <!-- barba container end -->


    <!-- JavaScript -->
    <script src="{{ asset('assets/templates/admin/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/templates/frontend/assets/leaflet1.7.1/dist/leaflet.js') }}"></script> --}}
    <script src="{{ asset('assets/templates/frontend/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/main_v2.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery.lazy-master/jquery.lazy.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const preload_container = $("#preloader");
        let preload_finish = false;
        $(window).on('load', function() {
            "use strict";
            preload_container.delay(750).fadeOut('slow');
            refresh_margin_top();
            preload_finish = true;
            $('.lazy').Lazy({
                scrollDirection: 'vertical',
            });
        });

        (function pulse(back) {
            const img_el = preload_container.find('img');
            img_el.animate({
                'font-size': (back) ? '100px' : '140px',
                opacity: (back) ? 1 : 0.5
            }, 700, function() {
                if (!preload_finish) {
                    pulse(!back);
                }
            });
        })(false);

        const btn_scroll = $('#back-to-top');

        $(window).scroll(function() {
            // position
            const p = $(window).scrollTop();

            if (p >= 100) btn_scroll.parent().fadeIn();
            else btn_scroll.parent().fadeOut();

            // document height
            const d_height = $(document).height() - $(window).height();
            refresh_margin_top();
        });

        btn_scroll.click(() => {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
        })

        function refresh_margin_top() {
            $('.content-wrapper').css('margin-top', $('header').height() + 'px');
        }
    </script>
    @yield('javascript')
</body>

</html>
