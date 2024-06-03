<footer id="footer" class="footer">
    <div class="container-fluid">
        <div class="footer__inner">
            <div class="footer__left">
                <a class="footer__logo" href="{{ route('home') }}">
                    <img class="d-none d-lg-block align-text-top img-fluid" src="{{ Vite::image('logo-white.png') }}"
                         alt="Логотип">
                    <img class="d-block d-lg-none align-text-top img-fluid" src="{{ Vite::image('logo-white.png') }}"
                         alt="Логотип">
                </a>

                <a class="footer__ngc" href="{{ $variables->ngc_link }}" target="_blank">
                    VEGA <br>
                    Клиника репродукции и генетики NGC
                </a>

                <a class="footer__logo footer__logo--ngc" href="{{ $variables->ngc_link }}" target="_blank">
                    <img class="d-none d-lg-block align-text-top img-fluid" src="{{ Vite::image('logo-ngc.png') }}"
                         alt="Логотип ngc">
                </a>
            </div>

            <div class="footer__right">
                <div class="footer__info">

                    <div class="footer-contact">
                        <a class="footer-contact__phone" href="tel:{{ $variables->phone }}">
                            {{ $variables->phone }}
                        </a>
                        <span class="footer-contact__address">
                            {{ $variables->first_address }}
                        </span>
                        <span class="footer-contact__address">
                            {{ $variables->second_address }}
                        </span>
                        <span class="footer-contact__info">
                            {{ $variables->first_mode }}
                        </span>
                    </div>


                    <div class="footer-contact">
                        <a class="footer-contact__phone" href="mailto:{{ $variables->contact_email }}">
                            {{ $variables->contact_email }}
                        </a>
                    </div>

                    <div class="social-list footer__social">
                        @if($variables->vk_link)
                            <x-social-link :link="$variables->vk_link" icon="vk" />
                        @endif

                        @if($variables->tg_link)
                            <x-social-link :link="$variables->tg_link" icon="tg" />
                        @endif

                        @if($variables->whatsapp_link)
                            <x-social-link :link="$variables->whatsapp_link" icon="whatsapp" />
                        @endif
                    </div>

                    <ul class="footer__menu">
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="{{ route('doctors.index') }}">
                                Первоклассные специалисты
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="{{ route('pages', 'advanced-equipment') }}">
                                Передовое оборудование
                            </a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="footer__menu-link" href="{{ route('prices') }}">
                                Стоимость услуг
                            </a>
                        </li>
                    </ul>


                </div>

                <div class="footer__map map">
                    <div class="map__iframe">
                        @if($variables->ya_map)
                            {!! $variables->ya_map !!}
                        @endif
                    </div>

                    @if($variables->ya_link)
                        <a href="{{ $variables->ya_link }}" class="map__link">Открыть на Яндекс картах</a>
                    @endif

                    <div class="footer__copyright">
                        <a class="footer__copyright-link" href="{{ route('pages', 'policy') }}">
                            Политика конфиденциальности
                        </a>
                        <span class="footer__copyright-text">
                            Copyright Клиника VEGA, {{ date('Y') }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
