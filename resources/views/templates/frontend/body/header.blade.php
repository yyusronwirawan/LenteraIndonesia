@if (true)
    <header data-anim="fade" data-add-bg="" class="header -type-4 -shadow bg-white js-header"
        style="box-shadow: 0px 0px 20px 0px #404f680d">
        @if ($notifikasi)
            @foreach ($notifikasi as $v)
                <div class="bg-green-1 py-10 notification_top">
                    <div class="container  d-flex justify-content-between">

                        <p class="text-white">{{ $v->deskripsi }}
                            @if ($v->link)
                                <a href="{{ $v->link }}" class="text-orange-1 fw-bold">{{ $v->link_nama }}</a>
                            @endif
                        </p>
                        <span class="text-white fw-bold" style="cursor: pointer"
                            onclick="$(this).parent().parent().fadeOut()">
                            x</span>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="header__container py-10">
            <div class="row justify-between items-center">

                <div class="col-auto">
                    <div class="header-left d-flex items-center">

                        {{-- logo white --}}
                        <div class="header__logo pr-30 xl:pr-20 md:pr-0">
                            <a data-barba href="{{ url('') }}">
                                <img data-src="{{ asset(settings()->get(set_front('app.foto_dark_landscape_mode'))) }}" class="lazy"
                                    alt="logo" style="max-height: 50px;">
                            </a>
                        </div>


                        <div class="header-menu js-mobile-menu-toggle pl-30 xl:pl-20">
                            <div class="header-menu__content">
                                <div class="mobile-bg js-mobile-bg"></div>

                                {{-- @if (auth()->user())
                                <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                    <a href="{{ route('dashboard') }}" class="text-dark-1 ml-30">Dashboard</a>
                                </div>
                            @else
                                <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                    <a href="{{ route('login') }}" class="text-dark-1 ml-30">Login</a>
                                </div>
                            @endif --}}
                                <div class="menu js-navList">
                                    <ul class="list-style-none menu__nav text-dark-1 -is-active">
                                        {!! navbar_menu_front2($page_attr->navigation) !!}
                                    </ul>
                                </div>

                                {{-- footer mobile --}}

                            </div>

                            <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                                <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                                    <div class="icon-close text-dark-1 text-16"></div>
                                </div>
                            </div>

                            <div class="header-menu-bg"></div>
                        </div>

                    </div>
                </div>


                <div class="col-auto">
                    <div class="header-right d-flex items-center">
                        <div class="header-right__icons text-white d-flex items-center">
                            {{-- search --}}
                            <div class="relative -after-border pl-20 sm:pl-15">
                                <div class="pr-20 sm:pr-15">
                                    <button class="d-flex items-center text-dark-1" data-el-toggle=".js-search-toggle">
                                        <i class="text-20 icon icon-search"></i>
                                    </button>

                                    <div class="toggle-element js-search-toggle">
                                        <div class="header-search pt-90 bg-white shadow-4" style="height: 300px">
                                            <div class="container">
                                                <div class="header-search__field">
                                                    <form action="" id="search-form">
                                                        <div class="icon icon-search text-dark-1"
                                                            onclick="document.getElementById('search-form').submit()"
                                                            style="cursor: pointer"></div>
                                                        <input type="search"
                                                            class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                            placeholder="Masukan kata kunci pencarian." name="search"
                                                            value="{{ request()->query('search') }}">

                                                        <button
                                                            class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                            data-el-toggle=".js-search-toggle" type="button">
                                                            <div class="icon-close text-dark-1 text-16"></div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header-search__bg" data-el-toggle=".js-search-toggle">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-none xl:d-block pl-20 sm:pl-15">
                                <button class="text-dark-1 items-center" data-el-toggle=".js-mobile-menu-toggle">
                                    <i class="text-11 icon icon-mobile-menu"></i>
                                </button>
                            </div>
                        </div>

                        {{-- @if (auth()->user())
                        <div class="header-right__buttons d-flex items-center lg:d-none">
                            <a href="{{ route('dashboard') }}"
                                class="button h-50 px-30 -dark-1 -rounded text-white ml-20">Dashboard</a>
                        </div>
                    @else
                        <div class="header-right__buttons d-flex items-center lg:d-none">
                            <a href="{{ route('login') }}"
                                class="button h-50 px-30 -dark-1 -rounded text-white ml-20">Login</a>
                        </div>
                    @endif --}}

                    </div>
                </div>

            </div>
        </div>
    </header>
@endif

@if (false)
    <header data-anim="fade" data-add-bg="bg-blue-1" class="header -type-5 js-header">

        {{-- <div class="d-flex items-center bg-purple-1 py-10">
        <div class="container">
            <div class="row y-gap-5 justify-between items-center">
                <div class="col-auto">
                    <div class="d-flex x-gap-40 y-gap-10 items-center">
                        <div class="d-flex items-center text-white md:d-none">
                            <div class="icon-email mr-10"></div>
                            <div class="text13 lh-1">(00) 242 844 39 88</div>
                        </div>
                        <div class="d-flex items-center text-white">
                            <div class="icon-email mr-10"></div>
                            <div class="text13 lh-1">hello@educrat.com</div>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="d-flex x-gap-30 y-gap-10">
                        <div>
                            <div class="d-flex x-gap-20 items-center text-white">
                                <a href="#"><i class="icon-facebook text-11"></i></a>
                                <a href="#"><i class="icon-twitter text-11"></i></a>
                                <a href="#"><i class="icon-instagram text-11"></i></a>
                                <a href="#"><i class="icon-linkedin text-11"></i></a>
                            </div>
                        </div>

                        <div class="d-flex items-center text-white text-13 sm:d-none">
                            English <i class="icon-chevron-down text-9 ml-10"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


        <div class="container py-10">
            <div class="row justify-between items-center">

                <div class="col-auto">
                    <div class="header-left">

                        <div class="header__logo ">
                            <a data-barba href="{{ url('') }}">
                                <img data-src="{{ asset(settings()->get(set_front('app.foto_light_landscape_mode'))) }}" class="lazy"
                                    alt="Logo">
                            </a>
                        </div>

                    </div>
                </div>


                <div class="col-auto">
                    <div class="header-right d-flex items-center">

                        <div class="header-menu js-mobile-menu-toggle mr-30">
                            <div class="header-menu__content">
                                <div class="mobile-bg js-mobile-bg"></div>

                                <div class="menu js-navList">
                                    <ul class="list-style-none menu__nav text-white -is-active">
                                        {!! navbar_menu_front2($page_attr->navigation) !!}
                                    </ul>
                                </div>

                                <div class="mobile-footer px-20 py-20  js-mobile-footer">
                                    <div class="mobile-footer__number">
                                        <div class="text-17 fw-500 text-white">Hubungi Kami</div>
                                        <div class="text-17 fw-500 text-white">
                                            <a href="tel:+6285798132505">+6285798132505</a>
                                        </div>
                                    </div>

                                    <div class="lh-2 mt-10 text-white">
                                        <div>Cianjur Selatan,
                                            <br> Jawa barat 43272, Indonesia.
                                        </div>
                                        <div>
                                            <a href="mailto:admin@karmapack.my.id">admin@karmapack.my.id</a>
                                        </div>
                                    </div>

                                    <div class="mobile-socials mt-10">
                                        @foreach ($getSosmed_val as $sosmed)
                                            <a href="{{ $sosmed['url'] }}"
                                                class="d-flex items-center justify-center rounded-full size-40 text-white"
                                                target="_blank">
                                                <i class="{{ $sosmed['icon'] }}"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                                <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                                    <div class="icon-close text-dark-1 text-16"></div>
                                </div>
                            </div>

                            <div class="header-menu-bg"></div>
                        </div>


                        <div class="header-right__icons text-white d-flex items-center">
                            <div class="relative -after-border pl-20 sm:pl-15">
                                <div class="pr-20 sm:pr-15">
                                    <button class="d-flex items-center text-white" data-el-toggle=".js-search-toggle">
                                        <i class="text-20 icon icon-search"></i>
                                    </button>

                                    <div class="toggle-element js-search-toggle">
                                        <div class="header-search pt-90 bg-white shadow-4" style="height: 300px">
                                            <div class="container">
                                                <div class="header-search__field">
                                                    <form action="" id="search-form">
                                                        <div class="icon icon-search text-dark-1"
                                                            onclick="document.getElementById('search-form').submit()"
                                                            style="cursor: pointer"></div>
                                                        <input type="search"
                                                            class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                            placeholder="Masukan kata kunci pencarian." name="search"
                                                            value="{{ request()->query('search') }}">

                                                        <button
                                                            class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                            data-el-toggle=".js-search-toggle" type="button">
                                                            <div class="icon-close text-dark-1 text-16"></div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header-search__bg" data-el-toggle=".js-search-toggle">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-none xl:d-block ml-20">
                                <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                                    <i class="text-11 icon icon-mobile-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif
