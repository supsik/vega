<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="header__inner">
                <button class="header__burger  d-flex d-lg-none" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="header__logo navbar-brand p-0 d-md-none" href="{{ route('home') }}" itemprop="name" content="Vega Клиника">
                    <img class="d-inline-block align-text-top img-fluid" src="{{ Vite::image('mobile-logo.png') }}"
                         alt="Vega Клиника">
                </a>
                <a class="header__logo navbar-brand p-0 d-none d-md-block" href="{{ route('home') }}">
                    <img class="d-inline-block align-text-top img-fluid" src="{{ Vite::image('logo.png') }}"
                         alt="Vega Клиника">
                </a>
                <div class="header__top">
                    <div class="header__contact-list">
                        <div class="header-contact">
                            Пункты рядом с вами:
                            <a href="https://yandex.ru/maps/33/vladikavkaz/house/ulitsa_butyrina_37/YE0YcA5jSEUPQFppfXxzeXxiZQ==/?ll=44.693107%2C43.028011&source=constructorLink&um=constructor%3Ad30db39fd69d174281f4342af6159fc6aeaae0dc4ebbca325f70f9859abeb0cd&z=16" class="header-contact__address" itemprop="address" content="{{ $variables->first_address }}">
                                {{ $variables->first_address }}
                            </a>
                            <a href="https://yandex.ru/maps/33/vladikavkaz/house/ulitsa_shmulevicha_41/YE0YcQdkTE0PQFppfXxzdHRhZw==/?ll=44.704588%2C43.025823&source=constructorLink&um=constructor%3Ad30db39fd69d174281f4342af6159fc6aeaae0dc4ebbca325f70f9859abeb0cd&z=16" class="header-contact__address" itemprop="address" content="{{ $variables->second_address }}">
                                {{ $variables->second_address }}
                            </a>
                        </div>
                        <div class="header-contact">
                            <div class="social-list header__feedback-social">
                                @if($variables->whatsapp_link)
                                    <x-social-link :link="$variables->whatsapp_link" icon="whatsapp"></x-social-link>
                                @endif

                                @if($variables->vk_link)
                                    <x-social-link :link="$variables->vk_link" icon="vk"></x-social-link>
                                @endif

                                @if($variables->tg_link)
                                    <x-social-link :link="$variables->tg_link" icon="tg"></x-social-link>
                                @endif
                                <br>
                            </div>
                            <a class="header-contact__phone" href="tel:{{ $variables->phone }}" itemprop="telephone">
                                {{ $variables->phone }}
                            </a>
                        </div>
                    </div>

                    <div class="header__links">
                        <a class="btn btn-main header__link-btn header__link-btn--lk header__link-btn--appointment"
                           href="{{ route('account.index') }}">
                           <span>
                               @if(!auth()->user())
                                    Личный кабинет
                                @else
                                    {{ auth()->user()->getMedodsUser()['name'] }}
                                @endif
                            </span>
                        </a>
                        <a class="btn btn-main header__link-btn header__link-btn--appointment"
                           href="{{ route('appointment.index') }}">
                            <span class="header__link-btn--desktop">Записаться на прием</span>
                        </a>
                    </div>
                    <a class="btn btn-main header__link-btn header__link-btn--phone d-md-none"
                       href="tel:+78672404130">
                    </a>
                    <a class="btn btn-main header__link-btn header__link-btn--user d-md-none"
                       href="{{ route('account.index') }}">
                        @if(!auth()->user())
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_81_53)">
                                <path d="M17 19V17C17 15.9391 16.5786 14.9217 15.8284 14.1716C15.0783 13.4214 14.0609 13 13 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_81_53">
                                    <rect width="18" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        @else
                            <span class="header__link-user">
                                {{ auth()->user()->getShortName() }}
                            </span>
                        @endif
                    </a>
                </div>

                <div class="header__search search-form d-none d-md-block">
                    <form class="d-flex" action="{{ route('search') }}">
                        @csrf
                        <div class="header__search-input-wp">
                            <input class="header__search-input search-form__input form-control me-2" type="search" name="q"
                                placeholder="Поиск по сайту..." required oninput="mega.quickSearch(event, '_header-search-content')">
                            <div class="serch__helper _header-search-content hidden"></div>
                        </div>
                        <button class="header__search-btn search-form__btn btn btn-main" type="submit">Искать</button>
                    </form>
                </div>

                <div class="header__feedback">
                    <a class="header__feedback-phone" href="tel:{{ $variables->phone }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="header__feedback-phone-icon">
                            <path fill-rule="evenodd"
                                  d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                  clip-rule="evenodd"/>
                        </svg>

                        {{ $variables->phone }}
                    </a>

                    <div class="header__feedback-social">
                        <div class="social-list header__feedback-social">
                            @if($variables->whatsapp_link)
                                <x-social-link :link="$variables->whatsapp_link" icon="whatsapp"></x-social-link>
                            @endif

                            @if($variables->vk_link)
                                <x-social-link :link="$variables->vk_link" icon="vk"></x-social-link>
                            @endif

                            @if($variables->tg_link)
                                <x-social-link :link="$variables->tg_link" icon="tg"></x-social-link>
                            @endif
                        </div>
                    </div>
                </div>

                @include('partials.menu')
                <div class="mobile-menu header__mobile-menu">
                    <div>
                        <ul class="mobile-menu__list">
                            <li class="mobile-menu__item">
                                <a href="{{ route('appointment.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_21_406)">
                                            <path d="M10 15.5H3C2.46957 15.5 1.96086 15.2893 1.58579 14.9142C1.21071 14.5391 1 14.0304 1 13.5V3.5C1 2.96957 1.21071 2.46086 1.58579 2.08579C1.96086 1.71071 2.46957 1.5 3 1.5H17C17.5304 1.5 18.0391 1.71071 18.4142 2.08579C18.7893 2.46086 19 2.96957 19 3.5V11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1 3.5L10 9.5L19 3.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13 15.5H19" stroke="#83b2fc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16 12.5L19 15.5L16 18.5" stroke="#83b2fc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_21_406">
                                                <rect width="20" height="19" fill="white" transform="translate(0 0.5)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Онлайн-запись
                                </a>
                            </li>

                            <li class="mobile-menu__item">
                                <a href="{{ route('doctors.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                      <g clip-path="url(#clip0_21_413)">
                                        <path d="M4 2H3C2.46957 2 1.96086 2.21071 1.58579 2.58579C1.21071 2.96086 1 3.46957 1 4V7.5C1 8.95869 1.57946 10.3576 2.61091 11.3891C3.64236 12.4205 5.04131 13 6.5 13C7.95869 13 9.35764 12.4205 10.3891 11.3891C11.4205 10.3576 12 8.95869 12 7.5V4C12 3.46957 11.7893 2.96086 11.4142 2.58579C11.0391 2.21071 10.5304 2 10 2H9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 13C6 13.7879 6.15519 14.5681 6.45672 15.2961C6.75825 16.0241 7.20021 16.6855 7.75736 17.2426C8.31451 17.7998 8.97595 18.2417 9.7039 18.5433C10.4319 18.8448 11.2121 19 12 19C12.7879 19 13.5681 18.8448 14.2961 18.5433C15.0241 18.2417 15.6855 17.7998 16.2426 17.2426C16.7998 16.6855 17.2417 16.0241 17.5433 15.2961C17.8448 14.5681 18 13.7879 18 13V10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 1V3" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 1V3" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 8C16 8.53043 16.2107 9.03914 16.5858 9.41421C16.9609 9.78929 17.4696 10 18 10C18.5304 10 19.0391 9.78929 19.4142 9.41421C19.7893 9.03914 20 8.53043 20 8C20 7.46957 19.7893 6.96086 19.4142 6.58579C19.0391 6.21071 18.5304 6 18 6C17.4696 6 16.9609 6.21071 16.5858 6.58579C16.2107 6.96086 16 7.46957 16 8Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_21_413">
                                          <rect width="21" height="20" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    Врачи
                                </a>
                            </li>

                            <li class="mobile-menu__item">
                                <a href="{{ route('prices') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                      <g clip-path="url(#clip0_81_39)">
                                        <path d="M1 3V7.172C1.00011 7.70239 1.2109 8.21101 1.586 8.586L7.296 14.296C7.74795 14.7479 8.36089 15.0017 9 15.0017C9.63911 15.0017 10.252 14.7479 10.704 14.296L14.296 10.704C14.7479 10.252 15.0017 9.63911 15.0017 9C15.0017 8.36089 14.7479 7.74795 14.296 7.296L8.586 1.586C8.21101 1.2109 7.70239 1.00011 7.172 1H3C2.46957 1 1.96086 1.21071 1.58579 1.58579C1.21071 1.96086 1 2.46957 1 3Z" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 14L17.592 12.408C18.4958 11.5041 19.0035 10.2782 19.0035 9C19.0035 7.72178 18.4958 6.4959 17.592 5.592L13 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.00023 5H4.99023" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_81_39">
                                          <rect width="20" height="16" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    Прайс
                                </a>
                            </li>
                            <li class="mobile-menu__item">
                                <a class="mobile-menu__item-icon" href="/analysis">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                      <g clip-path="url(#clip0_21_446)">
                                        <path d="M7 15L12 13.5" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.5 6.5L12.31 11.87" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 5L13 4" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 5C1 5.53043 1.21071 6.03914 1.58579 6.41421C1.96086 6.78929 2.46957 7 3 7C3.53043 7 4.03914 6.78929 4.41421 6.41421C4.78929 6.03914 5 5.53043 5 5C5 4.46957 4.78929 3.96086 4.41421 3.58579C4.03914 3.21071 3.53043 3 3 3C2.46957 3 1.96086 3.21071 1.58579 3.58579C1.21071 3.96086 1 4.46957 1 5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 13C12 13.5304 12.2107 14.0391 12.5858 14.4142C12.9609 14.7893 13.4696 15 14 15C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13C16 12.4696 15.7893 11.9609 15.4142 11.5858C15.0391 11.2107 14.5304 11 14 11C13.4696 11 12.9609 11.2107 12.5858 11.5858C12.2107 11.9609 12 12.4696 12 13Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13 4C13 4.79565 13.3161 5.55871 13.8787 6.12132C14.4413 6.68393 15.2044 7 16 7C16.7956 7 17.5587 6.68393 18.1213 6.12132C18.6839 5.55871 19 4.79565 19 4C19 3.20435 18.6839 2.44129 18.1213 1.87868C17.5587 1.31607 16.7956 1 16 1C15.2044 1 14.4413 1.31607 13.8787 1.87868C13.3161 2.44129 13 3.20435 13 4Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 16C1 16.7956 1.31607 17.5587 1.87868 18.1213C2.44129 18.6839 3.20435 19 4 19C4.79565 19 5.55871 18.6839 6.12132 18.1213C6.68393 17.5587 7 16.7956 7 16C7 15.2044 6.68393 14.4413 6.12132 13.8787C5.55871 13.3161 4.79565 13 4 13C3.20435 13 2.44129 13.3161 1.87868 13.8787C1.31607 14.4413 1 15.2044 1 16Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_21_446">
                                          <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    Анализы
                                </a>
                            </li>
                            <li class="mobile-menu__item">
                                <a class="mobile-menu__item-icon" href="/about">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                      <g clip-path="url(#clip0_23_551)">
                                        <path d="M3 19V3C3 2.46957 3.21071 1.96086 3.58579 1.58579C3.96086 1.21071 4.46957 1 5 1H15C15.5304 1 16.0391 1.21071 16.4142 1.58579C16.7893 1.96086 17 2.46957 17 3V19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7 19V15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H11C11.5304 13 12.0391 13.2107 12.4142 13.5858C12.7893 13.9609 13 14.4696 13 15V19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 19H19" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 7H12" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 5V9" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_23_551">
                                          <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    О клинике
                                </a>
                            </li>
                            <li class="mobile-menu__item">
                                <a class="mobile-menu__item-icon" href="/operations-blocks/otkrytie-xirurgiceskogo-otdeleniia">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                                      <g clip-path="url(#clip0_23_557)">
                                        <path d="M5 3H3C2.46957 3 1.96086 3.21071 1.58579 3.58579C1.21071 3.96086 1 4.46957 1 5V17C1 17.5304 1.21071 18.0391 1.58579 18.4142C1.96086 18.7893 2.46957 19 3 19H13C13.5304 19 14.0391 18.7893 14.4142 18.4142C14.7893 18.0391 15 17.5304 15 17V5C15 4.46957 14.7893 3.96086 14.4142 3.58579C14.0391 3.21071 13.5304 3 13 3H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 3C5 2.46957 5.21071 1.96086 5.58579 1.58579C5.96086 1.21071 6.46957 1 7 1H9C9.53043 1 10.0391 1.21071 10.4142 1.58579C10.7893 1.96086 11 2.46957 11 3C11 3.53043 10.7893 4.03914 10.4142 4.41421C10.0391 4.78929 9.53043 5 9 5H7C6.46957 5 5.96086 4.78929 5.58579 4.41421C5.21071 4.03914 5 3.53043 5 3Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.99257 14.75L10.7396 11.935C11.0794 11.5811 11.2691 11.1096 11.2691 10.619C11.2691 10.1284 11.0794 9.65684 10.7396 9.30299C10.5739 9.13058 10.3752 8.99341 10.1552 8.89971C9.93526 8.80601 9.69865 8.75771 9.45957 8.75771C9.22049 8.75771 8.98387 8.80601 8.76391 8.89971C8.54396 8.99341 8.3452 9.13058 8.17957 9.30299L7.99657 9.49099L7.81357 9.30199C7.64793 9.12958 7.44917 8.99241 7.22922 8.89871C7.00926 8.80501 6.77265 8.75671 6.53357 8.75671C6.29449 8.75671 6.05787 8.80501 5.83791 8.89871C5.61796 8.99241 5.4192 9.12958 5.25357 9.30199C4.91354 9.65572 4.72363 10.1273 4.72363 10.618C4.72363 11.1086 4.91354 11.5803 5.25357 11.934L7.99157 14.759L7.99257 14.75Z" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_23_557">
                                          <rect width="16" height="20" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    Хирургическое отделение
                                </a>
                            </li>
                            <li class="mobile-menu__item">
                                <a class="mobile-menu__item-icon" href="/news">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                      <g clip-path="url(#clip0_23_566)">
                                        <path d="M13 3H16C16.2652 3 16.5196 3.10536 16.7071 3.29289C16.8946 3.48043 17 3.73478 17 4V15C17 15.5304 16.7893 16.0391 16.4142 16.4142C16.0391 16.7893 15.5304 17 15 17M15 17C14.4696 17 13.9609 16.7893 13.5858 16.4142C13.2107 16.0391 13 15.5304 13 15V2C13 1.73478 12.8946 1.48043 12.7071 1.29289C12.5196 1.10536 12.2652 1 12 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.7956 1.31607 15.5587 1.87868 16.1213C2.44129 16.6839 3.20435 17 4 17H15Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 5H9" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 9H9" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 13H9" stroke="#0d548f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_23_566">
                                          <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                    Новости
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <form action="#" class="mobile-serch active">
            <div class="container-fluid">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.22222 13.9444C10.6587 13.9444 13.4444 11.1587 13.4444 7.72222C13.4444 4.28578 10.6587 1.5 7.22222 1.5C3.78578 1.5 1 4.28578 1 7.72222C1 11.1587 3.78578 13.9444 7.22222 13.9444Z" stroke="#ACB5BB" stroke-width="1.05" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.0005 15.4999L11.6172 12.1166" stroke="#ACB5BB" stroke-width="1.05" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="text" placeholder="Поиск по сайту..." oninput="mega.quickSearch(event, '_mobile-header-search-content')">
                <div class="mobile-serch__helper _mobile-header-search-content hidden"></div>
            </div>
        </form>
    </nav>

</header>
