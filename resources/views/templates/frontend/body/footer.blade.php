<footer class="footer -type-1 bg-green-1 -green-links mt-0">
    <div class="container">
        <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="footer-header__logo">
                        <img src="{{ asset(settings()->get(set_front('app.foto_light_landscape_mode'))) }}" alt="logo"
                            style="width: 230px">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-white">Follow us on social media</div>
                        <div class="footer-header-socials__list">

                            @foreach ($getSosmed_val as $sosmed)
                                <li class="list-inline-item list-style-none">
                                    <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                        <i class="{{ $sosmed['icon'] }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-30 border-top-light-15">
            <div class="d-md-flex items-center h-100 text-white">
                {!! str_parse(settings()->get(set_front('app.copyright'))) !!}
            </div>
        </div>
    </div>
</footer>
