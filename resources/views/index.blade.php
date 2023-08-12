@extends('layouts.app')
@section('content')
<main class="main">
    <div class="wrapper">
        <section class="splide" id="homeSplide" aria-label="Splide">
            <div class="splide__arrows">
                <button type="button" aria-controls="splide01-track" class="splide__arrow homeNextSlide splide__arrow--prev splide_my-btn-prev"></button>
                <button class="splide__arrow splide__arrow--next homePrevSlide splide_my-btn-next "></button>
            </div>
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="slide_block">
                            <div class="slide">
                                <div class="car-img_block">
                                    <picture>
                                        <source srcset="{{ url('/img/jeep.webp') }}" type="image/webp">
                                        <img src="{{ url('/img/jeep.webp') }}" alt="Jeep" class="car-img">
                                    </picture>
                                </div>
                                <div class="slide_container">
                                    <div class="slide_texts">
                                        <div class="slide_title">кредит<br /><span>ОТ 7%</span></div>
                                        <div class="slide_text">при<br class="hide575"/>оставлениИ заявки</div>
                                    </div>
                                    <div class="slide_btn">
                                        <a href="#submit-application" class="btn-slide-link popup-link">
                                            <button type="button" class="btn-slide">Оставить заявку</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="slide_block">
                            <div class="slide-2" style="background: url({{ url('/img/slide-2.png') }}) no-repeat center;">
                                <div class="slide-2_container">
                                    <div class="slide-2_texts full575">
                                        <h1>акция</h1>
                                        <h2>Трейд ин с выгодой</h2>
                                        <div class="slide-2_text-block full575">
                                            <p>до 100 тыс. руб.</p>
                                        </div>
                                    </div>
                                    <div class="slide_btn">
                                        <a href="#submit-application" class="btn-slide-link popup-link">
                                            <button type="button" class="btn-slide">Оставить заявку</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="slide_block">
                            <div class="slide-3" style="background: url({{ url('/img/slide-3.png') }}) no-repeat center;">
                                <div class="slide-3_container">
                                    <div class="slide-3_texts">
                                        <h1>акция</h1>
                                        <h2>гарантия на год со скидкой</h2>
                                    </div>
                                    <div class="slide_btn">
                                        <h3 class="slide-3_50">в 50%</h3>
                                        <a href="#submit-application" class="btn-slide-link popup-link">
                                            <button type="button" class="btn-slide">Оставить заявку</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="benefits">
            <div class="benefits_container">
                <ul class="benefits_body">
                    <li class="benefits_item">
                        <span class="benefits_title">Автокредит</span>
                        <img src={{ url('/img/benefit_1.svg') }} class="benefits_figure-1">
                    </li>
                    <li class="benefits_item">
                        <span class="benefits_title">пРОДАЖА</span>
                        <img src={{ url('/img/benefit_2.svg') }} class="benefits_figure-2">
                    </li>
                    <li class="benefits_item">
                        <span class="benefits_title">КОМИССИЯ</span>
                        <img src={{ url('/img/benefit_3.svg') }} class="benefits_figure-3">
                    </li>
                    <li class="benefits_item">
                        <span class="benefits_title">трейд-ин</span>
                        <img src={{ url('/img/benefit_4.svg') }} class="benefits_figure-4">
                    </li>
                </ul>
            </div>
        </div>

        <div class="cars">
            <div class="select-filter">
                <div class="flex items-center">
                    <div id="select-filter"></div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('main') }}" class="popup_btn filter-show">
                        <img src={{ url('/img/icons/filter-filter.svg') }} alt="Filter">
                    </a>
                </div>
            </div>
            <div class="cars_container">
                <div class="cars_buy car homeCars">
                    <ul class="car_list">
                        @foreach($cars as $car)
                            @include('part.car_info', ['car' => $car])
                        @endforeach
                    </ul>
                </div>

                @include('part.filter')

            </div>
            <div class="watch">
                <a href="{{ route('main') }}" class="watch-link" target="_blank" id="show-more">
                    <button type="button" class="btn-watch">Посмотреть еще</button>
                </a>
            </div>
        </div>

        <div class="form">
            <div class="form_container">
                <div class="form_title">
                    <h1>хочешь</h1>
                    <p>оформить автокредит легко и просто?</p>
                </div>
                <form action="{{ route('main') }}" class="form_action">
                    <input required type="text" name="name" id="name" class="inputHome-1" placeholder="Имя">
                    <input required type="tel" name="tel" id="tel" class="inputHome-2" placeholder="+7 (123) 456-78-90">
                    <input type="submit" class="submitRequiredFormHome" name="submitForm" id="submitForm" value="Отправить заявку">
                </form>
            </div>
        </div>

        <div class="popup" id="win">
            <div class="popup__body">
                <div class="popup__content deletePadding">
                    <div class="submit">
                        <div class="submit_container">
                            <div class="flex justify-between items-center">
                                <h1 class="submit_title">Заявка успешно отправлена</h1>
                                <a href="#header" class="close-popup close-modal">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 10L10 30" stroke="white" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 10L30 30" stroke="white" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <p class="wait">Наш специалист вскоре с вами свяжется</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup" id="submit-application">
            <div class="popup__body">
                <div class="popup__content deletePadding">
                    <div class="submit">
                        <div class="submit_container">
                            <div class="flex justify-between items-center">
                                <h1 class="submit_title">Оставить заявку</h1>
                                <a href="#header" class="close-popup close-modal">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 10L10 30" stroke="white" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 10L30 30" stroke="white" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <form action="{{ route('main') }}" class="submit_form" id="submit">
                                <input required type="text" id="name" minlength="2" placeholder="Имя" class="input-1"/>
                                <input required type="tel" id="tel" placeholder="+7 (___) ___-__-__" class="input-2"/>
                                <a href="#win" class="btn-link popup-link w-100">
                                    <button type="submit" form="/" class="btn zayavka-btn w-100 submitRequiredForm">Отправить</button>
                                </a>
                            </form>
                            <p>Нажимая на кнопку “Отправить”, вы даете согласие на обработку перс. данных</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#submit-application" class="btn-link full575 show992 popup-link" data-da="menu_body,5,992">
            <button type="submit" form="/" class="btn zayavka-btn full575">Оставить заявку</button>
        </a>

    </div>
</main>
@endsection
