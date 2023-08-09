@extends('layouts.app')
@section('content')
<main class="main">
    <div class="wrapper">
        <div class="footer map-contact">
            <div class="footer_container map-contact_container">
                <div class="flex map map-contact_body">
                    <div class="footer_contact map-contact_contact">
                        <h1 class="footer_title map-contact_title">Контакты</h1>
                        <ul>
                            <li>
                                <img src="{{ url('/img/icons/geo.svg') }}" alt="Geo">
                                <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
                            </li>
                            <li>
                                <img src="{{ url('/img/icons/geo.svg') }}" alt="Geo">
                                <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
                            </li>
                            <li>
                                <img src="{{ url('/img/icons/mail.svg') }}" alt="Mail">
                                <p><a href="mailto:alliance.motors@bk.ru" class="m-0">alliance.motors@bk.ru</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_map map-contact_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2817.8275633262365!2d38.98310637556051!3d45.06900895972072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f04596973e77e7%3A0x1d9da4a217e535b8!2z0YPQuy4g0KDQvtGB0YLQvtCy0YHQutC-0LUg0YguLCA3LCDQmtGA0LDRgdC90L7QtNCw0YAsINCa0YDQsNGB0L3QvtC00LDRgNGB0LrQuNC5INC60YDQsNC5LCDQoNC-0YHRgdC40Y8sIDM1MDA1MQ!5e0!3m2!1sru!2s!4v1687773364655!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="counter_container">
                <ul class="counter_row">
                    <li>
                        <span>23+</span>
                        <p>Лет на рынке</p>
                    </li>
                    <li>
                        <span>1000+</span>
                        <p>Машин отличного качества</p>
                    </li>
                    <li>
                        <span>2000+</span>
                        <p>Довольных клиентов за 2022 год</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gallery">
            <ul class="gallery_container">
                <picture><source srcset="{{ url('/img/salon/salon-1.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-1.png') }}" alt="salon-1" class="salon-1"></picture>
                <picture><source srcset="{{ url('/img/salon/salon-2.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-2.png') }}" alt="salon-2" class="salon-2"></picture>
                <picture><source srcset="{{ url('/img/salon/salon-3.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-3.png') }}" alt="salon-3" class="salon-3"></picture>
                <picture><source srcset="{{ url('/img/salon/salon-4.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-4.png') }}" alt="salon-4" class="salon-4"></picture>
                <picture><source srcset="{{ url('/img/salon/salon-5.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-5.png') }}" alt="salon-5" class="salon-5"></picture>
                <picture><source srcset="{{ url('/img/salon/salon-6.webp') }}" type="image/webp"><img src="{{ url('/img/salon/salon-6.png') }}" alt="salon-6" class="salon-6"></picture>
            </ul>
        </div>
    </div>
</main>
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
@endsection
