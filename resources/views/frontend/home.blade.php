@extends('templates.frontend.master')
@section('content')
    @php
        $p = 'setting.home';
        $k = "$p.hero";
    @endphp
    {{-- herro --}}
    @if (settings()->get("$k.visible"))
        <section data-anim-wrap class="masthead -type-5 pt-lg-0 pb-lg-0 bg-green-1 mt-lg-0">
            <div class="masthead__bg"></div>
            <div class="container">
                <div class="row y-gap-50 items-center d-lg-flex flex-row-reverse">

                    <div class="col-lg-6 col-image-logo">
                        <div class="masthead__content text-center">
                            <h1 data-anim-child="slide-up delay-1" class="text-white">
                                PROGRAM PENDIDIKAN <br> LINGKUNGAN HIDUP
                            </h1>
                            <img data-src="{{ asset('assets/templates/frontend/logo.png') }}" alt="logo" class="mt-20 mb-20 lazy">

                            <h1 data-anim-child="slide-up delay-2" class="masthead__title text-white">
                                GREEN EDUCATION BANDUNG
                            </h1>

                            <div class="col-auto mt-20" data-anim-child="slide-right delay-2">
                                <a href="{{ settings()->get("$k.video_link") }}" class="d-flex items-center js-gallery"
                                    data-gallery="gallery1">
                                    <div class="d-flex justify-center items-center size-60 rounded-full"
                                        style="border: 2px solid white;">
                                        <div class="icon-play text-20 text-white pl-5"></div>
                                    </div>
                                    <div class="ml-10 text-white">{{ settings()->get("$k.video_title") }}</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-image-hero pt-0 pb-0">
                        <div data-anim-child="slide-up delay-3" class="masthead__image">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($home_sliders as $slider)
                                        <div class="carousel-item  @if ($loop->first) active @endif">
                                            <img data-src="{{ "$home_slider_url/$slider->foto" }}" alt="{{ $slider->nama }}" class="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.about";
    @endphp
    {{-- deskripsi --}}
    @if (settings()->get("$k.visible"))
        <section data-anim-wrap class="cta -type-1 layout-pt-lg layout-pb-lg bg-dark-1 pb-0" style="padding-top: 460px">
            <div data-parallax="0.6" class="cta__bg">
                <div data-parallax-target class="bg-image js-lazy" data-bg="{{ asset(settings()->get("$k.foto1")) }}"
                    style="opacity: 0.7; background-size: contain;background-repeat: inherit;"></div>
            </div>
            <div class="bg-green-1">
                <div class="container pb-90 pt-40">
                    <p class="text-30 md:text-30 text-white" data-anim-child="slide-up delay-1" style="line-height: 35px">
                        {{ settings()->get("$k.deskripsi1") }}
                    </p>
                </div>
            </div>
        </section>
        <section data-anim-wrap class="cta -type-1 layout-pt-lg layout-pb-lg bg-dark-1 pt-0 pb-0">
            <div data-parallax="0.6" class="cta__bg">
                <div data-parallax-target class="bg-image js-lazy" data-bg="{{ asset(settings()->get("$k.foto2")) }}"
                    style="opacity: 0.7; background-size: contain;background-repeat: inherit;"></div>
            </div>
            <div class="row">
                <div class="col-lg-6 description-2"></div>
                <div class="col-lg-6">
                    <div class="bg-green-1 pl-lg-60 pt-40 pb-90">
                        <div style="max-width: 720px" class="container-lg">
                            <p class="text-30 md:text-30 text-white" data-anim-child="slide-up delay-1"
                                style="line-height: 35px">
                                {{ settings()->get("$k.deskripsi2") }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.struktur";
    @endphp
    {{-- struktur --}}
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg"
            style="background-image: url('{{ asset(settings()->get("$k.image")) }}');  background-repeat: no-repeat;
        /* background-attachment: fixed; */
        background-position: center;
        background-size: cover;"
            data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end" data-anim-child="slide-up delay-1">
                    <div class="col-lg-6">
                        <div class="sectionTitle bg-white" style="padding: 8px; border-radius: 4px">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>
                </div>

                <div class="pt-60 lg:pt-40 js-section-slider " data-gap="30"
                    data-pagination="js-students-slider-pagination" data-nav-prev="js-students-slider-prev"
                    data-nav-next="js-students-slider-next" data-slider-cols="xl-4 lg-3 md-2"
                    data-anim-child="slide-left delay-2">
                    <div class="swiper-wrapper">

                        @foreach ($strukturs as $i => $struktur)
                            <div class="swiper-slide" data-anim-child="slide-left delay-{{ $i + 2 }}">
                                <div class="teamCard -type-2 bg-white shadow-4" style="min-height: 325px; border: 0">
                                    <div class="teamCard__content pt-25">
                                        <img data-src="{{ "$struktur_url/$struktur->foto" }}" class="lazy" alt="{{ $struktur->nama }}"
                                            style=" margin: auto; position: relative; margin: auto; width: 150px; height: 150px; max-height: 150px; border-radius: 150px; object-fit: cover; object-position: center; -webkit-border-radius: 150px; -moz-border-radius: 150px;">
                                        <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12 text-center">
                                            {{ $struktur->nama }}
                                        </h4>
                                        <div class="teamCard__subtitle text-14 lh-1 mt-5 text-center">
                                            {{ $struktur->jabatan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row pt-60 lg:pt-40">
                    <div class="col-auto">
                        <div class="d-flex x-gap-15 justify-center items-center bg-white"
                            style="padding: 8px; border-radius: 4px">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover js-students-slider-prev">
                                    <i class="icon icon-arrow-left"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -arrows js-students-slider-pagination"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover js-students-slider-next">
                                    <i class="icon icon-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.visi_misi";
    @endphp
    {{-- visi misi --}}
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-md" data-anim-wrap>
            <div class="container">
                <div class="row justify-center text-center mb-60">
                    <div class="col-auto">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title "data-anim-child="slide-up delay-1">
                                {{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text " data-anim-child="slide-up delay-2">
                                {{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>
                </div>

                <div class="row y-gap-30 items-center" data-anim-child="slide-right delay-3">
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <img class="w-1/1 lazy" data-src="{{ url(settings()->get("$k.visi_image")) }}" style="border-radius: 8px"
                            alt="image">
                    </div>

                    <div class="col-xl-4 offset-xl-1 col-lg-6" data-anim-child="slide-left delay-4">
                        <h3 class="text-24 lh-1">{{ settings()->get("$k.visi_title") }}</h3>
                        {!! settings()->get("$k.visi") !!}
                    </div>
                </div>
            </div>
        </section>
        <section class="layout-pt-md layout-pb-md" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-30 items-center">
                    <div class="col-xl-4 offset-xl-1 order-lg-1 col-lg-6 order-2" data-anim-child="slide-left delay-1">
                        <h3 class="text-24 lh-1">{{ settings()->get("$k.misi_title") }}</h3>
                        {!! settings()->get("$k.misi") !!}
                    </div>

                    <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1" data-anim-child="slide-right delay-2">
                        <img class="w-1/1 lazy" data-src="{{ url(settings()->get("$k.misi_image")) }}" style="border-radius: 8px"
                            alt="image">
                    </div>
                </div>
            </div>
        </section>
    @endif


    @php
        $k = "$p.galeri_kegiatan";
    @endphp
    {{-- Geleri Kegiatan --}}
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-light-3" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end">
                    <div class="col-lg-6" data-anim="slide-right delay-3">

                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>

                    </div>

                    <div class="col-auto" data-anim="slide-left delay-3">
                        <div class="d-flex justify-center x-gap-15 items-center">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover js-events-slider-prev">
                                    <i class="icon icon-arrow-left"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -arrows js-events-slider-pagination"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover js-events-slider-next">
                                    <i class="icon icon-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30"
                    data-pagination="js-events-slider-pagination" data-nav-prev="js-events-slider-prev"
                    data-nav-next="js-events-slider-next" data-slider-cols="xl-3 lg-2">
                    <div class="swiper-wrapper">
                        @foreach ($galeri_list as $galery)
                            <div class="swiper-slide">
                                <div data-anim="slide-left delay-3" class="eventCard -type-1">
                                    <div class="eventCard__img">
                                        <img data-src="{{ "https://drive.google.com/uc?export=view&id={$galery->foto_id_gdrive}" }}" class="lazy"
                                            alt="{{ $galery->nama }}"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>

                                    <div class="eventCard__bg bg-white">
                                        <div class="eventCard__content y-gap-10">
                                            <div class="eventCard__inner">
                                                <h4 class="eventCard__title text-17 fw-500">
                                                    {{ $galery->nama }}
                                                </h4>
                                                <div class="d-flex x-gap-15 pt-10">
                                                    <div class="d-flex items-center">
                                                        <div class="icon-calendar-2 text-16 mr-8"></div>
                                                        <div class="text-14">{{ $galery->tanggal_str }}</div>
                                                    </div>
                                                    <div class="d-flex items-center">
                                                        <div class="icon-location text-16 mr-8"></div>
                                                        <div class="text-14">{{ $galery->lokasi }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="eventCard__button">
                                                <a href="{{ route('galeri.detail', $galery->slug) }}"
                                                    class="button -sm -rounded -green-1 text-white px-25">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row pt-60 lg:pt-40" data-anim="slide-right delay-3">
                    <div class="col-auto">
                        <a href="{{ route('galeri') }}" class="button -icon -outline-green-1 text-green-1 fw-500">
                            {{ settings()->get("$k.button_text") }}
                            <span class="icon-arrow-top-right text-14 ml-10"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = 'setting.produk.kategori';
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg">
            <div data-anim-wrap class="container">
                <div class="row y-gap-20 justify-between items-end">
                    <div class="col-lg-6" data-anim-child="slide-right delay-1">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-2">
                        <a href="{{ url('produk') }}" class="button -icon -green-1 text-white">
                            {{ settings()->get("$k.btn_title") }}
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>
                    </div>
                </div>

                <div class="row y-gap-50 pt-60 lg:pt-50">
                    @foreach ($produk_kategories as $i => $kategori)
                        <div class="col-xl-3 col-lg-4 col-sm-6" data-anim-child="slide-right delay-{{ $i + 3 }}">
                            <a href="{{ url("produk?kategori=$kategori->slug") }}" class="categoryCard -type-2">
                                <div class="categoryCard__image mr-20">
                                    <img data-src="{{ asset("$produk_kategori_folder/$kategori->foto") }}" class="lazy"
                                        alt="{{ $kategori->nama }}"
                                        style="margin: auto; position: relative; margin: auto; width: 80px; height: 80px; border-radius: 4px; object-fit: cover; object-position: center;">
                                </div>
                                <div class="categoryCard__content">
                                    <h4 class="categoryCard__title text-17 fw-500">{{ $kategori->nama }}</h4>
                                    <div class="categoryCard__text text-13 lh-1 mt-5">
                                        @php
                                            $jumlah = $kategori->produks->count();
                                        @endphp
                                        {{ $jumlah > 1 ? $jumlah - 1 : $jumlah }} {{ $jumlah > 1 ? '+' : '' }} Produk
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @else
        <section class="layout-pt-lg" data-anim-wrap>
        </section>
    @endif

    @php
        $k = 'setting.produk';
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg section-bg">
            <div class="section-bg__item bg-light-6"></div>

            <div data-anim-wrap class="container">
                <div class="row y-gap-15 justify-between items-center" data-anim-child="slide-right delay-1">
                    <div class="col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>
                    <div class="col-auto" data-anim-child="slide-left delay-2">
                        <a href="{{ url('produk') }}" class="button -icon -green-1 text-white">
                            {{ settings()->get("$k.btn_title", 'Lihat Semua Produk') }}
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="overflow-hidden pt-60 lg:pt-50 js-section-slider" data-gap="30" data-loop data-pagination
                        data-nav-prev="js-courses-prev" data-nav-next="js-courses-next"
                        data-slider-cols="xl-4 lg-3 md-2 sm-2">

                        <div class="swiper-wrapper">
                            @foreach ($produks as $produk)
                                <div class="swiper-slide">
                                    <div data-anim-child="slide-up delay-1">
                                        <div class="coursesCard -type-1 px-10 py-10 border-light bg-white rounded-8">
                                            <div class="relative">
                                                <div class="coursesCard__image overflow-hidden rounded-8">
                                                    <img class="w-1/1 lazy" data-src="{{ asset("$produk_folder/$produk->foto") }}"
                                                        alt="{{ $produk->nama }}"
                                                        style="margin: auto; position: relative; margin: auto; width: 265px; height: 185px; border-radius: 4px; object-fit: cover; object-position: center;">
                                                    <div class="coursesCard__image_overlay rounded-8"></div>
                                                </div>
                                                <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">
                                                    <div>
                                                        @if (!is_null($produk->kategori))
                                                            <a href="{{ url('produk?kategori=' . $produk->kategori->slug) }}"
                                                                class="px-15 rounded-200 bg-green-1">
                                                                <span class="text-11 lh-1 uppercase fw-500 text-white">
                                                                    {{ $produk->kategori->nama }}
                                                                </span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="h-100 px-10 pt-10">
                                                <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">
                                                    {{ $produk->nama }}
                                                </div>

                                                <div class="coursesCard-footer">
                                                    <div class="coursesCard-footer__author">
                                                        <a target="_blank"
                                                            href="https://api.whatsapp.com/send?phone={{ settings()->get('setting.produk.no_whatsapp') }}&text=Saya tertarik dengan {{ $produk->nama }}">
                                                            <i class="fab fa-whatsapp text-success"
                                                                style="font-size: 1.5em"></i>
                                                            Whatsapp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <button
                        class="section-slider-nav -prev -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-prev">
                        <i class="icon icon-arrow-left text-24"></i>
                    </button>
                    <button
                        class="section-slider-nav -next -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-next">
                        <i class="icon icon-arrow-right text-24"></i>
                    </button>

                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.artikel";
    @endphp
    {{-- Artikel --}}
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-md layout-pb-lg">
            <div data-anim-wrap class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-lg-6" data-anim-child="slide-right delay-3">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-3">
                        <a href="{{ route('artikel') }}" class="button -icon -green-1 text-white">
                            {{ settings()->get("$k.button_text") }}
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>
                    </div>
                </div>

                <div class="row y-gap-30 pt-50">
                    @foreach ($articles as $k => $a)
                        @if ($k > 1)
                            @continue
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <div data-anim-child="slide-left delay-3" class="blogCard -type-1">
                                @php
                                    $get_id_yt = check_image_youtube($a->detail);
                                    $youtube = $get_id_yt ? true : false;
                                    $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';
                                @endphp
                                <div class="blogCard__image">
                                    <img data-src="{{ $foto }}" alt="{{ $a->nama }}" class="lazy"
                                        style="width: 100%; height: 300px; object-fit: cover;">
                                </div>
                                <div class="blogCard__content">
                                    @if ($a->kategori)
                                        <a href="{{ url("artikel?kategori=$a->kategori_slug") }}" class=" text-green-1"
                                            title="Kategori {{ $a->kategori }}">
                                            {{ $a->kategori }}
                                        </a>
                                    @elseif ($a->tag)
                                        <a href="{{ url("artikel?tag=$a->tag_slug") }}" class=" text-green-1"
                                            title="tag {{ $a->tag }}">
                                            {{ $a->tag }}
                                        </a>
                                    @endif
                                    <h4 class="blogCard__title">
                                        <a href="{{ route('artikel.detail', $a->slug) }}">{{ $a->nama }}</a>
                                    </h4>
                                    <div class="blogCard__date">{{ $a->date_full }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-4">
                        <div class="row y-gap-30">

                            @foreach ($articles as $k => $a)
                                @if ($k < 2)
                                    @continue
                                @endif
                                <div class="col-lg-12 col-md-6">
                                    <a href="{{ route('artikel.detail', $a->slug) }}"
                                        data-anim-child="slide-left delay-3" class="eventCard -type-4">
                                        <div class="eventCard__date bg-light-7 mr-20"
                                            style="min-width: 100px; min-height: 100px">
                                            <span class="text-30 lh-1 text-green-1 fw-700">{{ $a->date_str }}</span>
                                            <span
                                                class="text-18 lh-1 text-green-1 fw-500 uppercase mt-10">{{ $a->month_str }}</span>
                                        </div>

                                        <div class="eventCard__content">
                                            @if ($a->kategori)
                                                {{-- <a href="{{ url("?kategori=$a->kategori_slug") }}"
                                                    class="text-13 lh-1 fw-500 uppercase text-green-1"
                                                    title="Kategori {{ $a->kategori }}">
                                                    {{ $a->kategori }}
                                                    </a> --}}
                                                <div class="text-13 lh-1 fw-500 uppercase text-green-1">
                                                    {{ $a->kategori }}
                                                </div>
                                            @elseif ($a->tag)
                                                {{-- <a href="{{ url("?tag=$a->tag_slug") }}"
                                                    class="text-13 lh-1 fw-500 uppercase text-green-1"
                                                    title="tag {{ $a->tag }}">
                                                    {{ $a->tag }}
                                                    </a> --}}
                                                <div class="text-13 lh-1 fw-500 uppercase text-green-1">
                                                    {{ $a->tag }}
                                                </div>
                                            @endif
                                            <h4 class="text-17 lh-15 fw-500 mt-10"> {{ $a->nama }}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.terima_kasih";
    @endphp
    {{-- Terima Kasih --}}
    @if (settings()->get("$k.visible"))
        <section class="bg-green-3 text-center" data-anim-wrap style="height: 720px">
            <img data-src="{{ asset(settings()->get("$k.image")) }}" alt="terima kasih" class="lazy"
                style="height: 100%;
            object-fit: cover; /* cover, contain, fill, scale-down */
            object-position: center;">

            <div style="position: absolute;margin-top: -720px;width: 100%;" data-anim-child="slide-top delay-1">
                <img data-src="{{ asset(settings()->get("$k.image_logo")) }}" alt="terima-kasih" class="lazy"
                    style="margin-top:60px; width: 150px" id="image-thank">
                <h1 class="text-white mt-25">{{ settings()->get("$k.title") }}</h1>
            </div>

            <div class="d-flex justify-content-center"
                style="position: absolute;margin-top: -160px;width: 100%;text-align: center;">
                <div class="bg-green-1 pt-20 pb-20 pl-20 pr-20" style="max-width: 960px;border-radius: 8px;opacity: 0.5;">
                    <h3 class="text-white text-alamat" data-anim-child="slide-top delay-1">
                        {{ settings()->get("$k.deskripsi") }}
                    </h3>
                </div>
            </div>

            <div class="d-flex justify-content-center"
                style="position: absolute;margin-top: -160px;width: 100%;text-align: center;">
                <div class="pt-20 pb-20 pl-20 pr-20" style="max-width: 960px;border-radius: 8px;">
                    <h3 class="text-white text-alamat" data-anim-child="slide-top delay-2">
                        {{ settings()->get("$k.deskripsi") }}
                    </h3>
                </div>
            </div>

        </section>
    @endif

@endsection


@section('javascript')
    <script>
        var myCarousel = document.querySelector('#carouselExampleControls');
        var carousel = new bootstrap.Carousel(myCarousel);

        $(window).resize(function() {
            const width = $(this).width();
            set_thx_width(width);
        });

        function set_thx_width(width) {
            const el = $('.text-alamat');
            if (width < 320) {
                el.addClass('text-18');
                el.removeClass('text-20');
            } else if (width < 768) {
                el.removeClass('text-18');
                el.addClass('text-20');
            } else {
                el.removeClass('text-20');
                el.removeClass('text-18');
            }
        }

        set_thx_width($(window).width());
    </script>
@endsection
