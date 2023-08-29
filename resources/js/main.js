import {dynamicAdaptiv} from "./modules/dynamicAdapt.js";
import {menu} from "./modules/menu.js";
import {popup} from "./modules/popup.js";
import {SelectModule} from "./modules/select.js";

dynamicAdaptiv();

menu();

window.addEventListener("scroll", () => {
    const header_scroll = document.querySelector(".header");
    const phone_contact = document.querySelectorAll(".phone_text");
    const phone_number = document.querySelectorAll(".phone_number");
    const deleteMargin = document.querySelector(".phone_1");
    header_scroll.classList.toggle("_scroll", window.scrollY > 10);
    const logo = document.querySelector(".logo");
    const logo_scroll = document.querySelector(".logo-scroll");
    logo.classList.toggle("_show", window.scrollY > 10);
    logo_scroll.classList.toggle("_show", window.scrollY > 10);
    for (let i = 0; i < phone_contact.length; i++) {
        const element = phone_contact[i];
        element.classList.toggle(
            "_scroll",
            window.scrollY > 10 && window.innerWidth >= 992
        );
    }
    for (let i = 0; i < phone_number.length; i++) {
        phone_number[0].classList.toggle(
            "_isActive",
            window.scrollY > 10 && window.innerWidth >= 992
        );
        phone_number[1].classList.toggle(
            "_scroll",
            window.scrollY > 10 && window.innerWidth >= 992
        );
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const path = window.location.pathname;

    if (path === '/') {
        if (document.querySelector("#homeSplide")) {
            const splideIndex = new Splide("#homeSplide", {
                type: "loop",
                autoplay: true,
                interval: 3000,
                perPage: 1,
                gap: "24px",
            });
            splideIndex.mount();
        }
    }
    if (path.includes('detail')) {
        if (document.querySelector("#detailSplite")) {
            const splide = new Splide("#detailSplite", {
                type: "loop",
                padding:
                    window.innerWidth <= 575
                        ? "12px"
                        : window.innerWidth >= 575
                        ? "24px"
                        : "12px",
                autoplay: true,
                speed: 1000,
                interval: 3000,
                perPage:
                    window.innerWidth >= 1023
                        ? 3
                        : window.innerWidth >= 767
                        ? 2
                        : window.innerWidth >= 574
                            ? 1
                            : 1,
                perMove: 1,
            });
            splide.mount();
        }
    }
});

const popupBlock = document.querySelector('.popup');
if (popupBlock) {
    popup();
}

let paginationLinks = document.querySelectorAll(".pagination .pagination-link");
if (paginationLinks.length) {
    for (let i = 0; i < paginationLinks.length; i++) {
        const element = paginationLinks[i];
        element.addEventListener("click", (e) => {
            e.preventDefault();
            let currentPage = document.querySelector(
                ".pagination .pagination-active"
            );
            currentPage.classList.remove("pagination-active");
            element.classList.add("pagination-active");
        });
        window.addEventListener("resize", () => {
            resize(paginationLinks);
        });
    }

    function resize(array) {
        if (window.innerWidth <= 575) {
            array[2].style.display = "none";
            array[3].style.display = "none";
        } else {
            array[2].style.display = "flex";
            array[3].style.display = "flex";
        }
    }

    resize(paginationLinks);
}

const checkbox = document.querySelector(".checkbox");
if (checkbox) {
    checkbox.addEventListener("click", () =>
        checkbox.classList.toggle("_active")
    );
}

let hide_text = document.querySelector(".hide-text");
let detail_img = document.querySelector(".detail-img");
let see_all = document.querySelector(".see-all");
let hide_li = document.querySelector(".hide-li");
if (see_all) {
    see_all.addEventListener("click", () => {
        hide_li.classList.toggle("_active");
        hide_text.classList.toggle("_active");
        detail_img.classList.toggle("_active");
        see_all.style.display = "none";
    });
}

const homeSelect = document.querySelector("#select-filter");
const catalogSelect = document.querySelector("#select-catalog");
if (homeSelect || catalogSelect) {
    SelectModule();
}

const filterSelect = document.querySelector(".filterSelect");
const filterSelect_select = document.querySelector(".filterSelect_select");
const filterSelect_list = document.querySelector(".filterSelect_list");
const filterSelect_value = document.querySelector(".filterSelect_value");

const filterSelectMarka = [
    {id: 1, value: "Все марки"},
    {id: 2, value: "Renault"},
    {id: 3, value: "Volkswagen"},
    {id: 4, value: "Kia"},
    {id: 5, value: "Lada"},
    {id: 6, value: "Cherry"},
    {id: 7, value: "Arkana"},
    {id: 8, value: "Arkana"},
];

function renderFilterSelect(array = [], selectedId) {
    const items = array.map((item) => {
        return `
    <div class="flex items-center h22 mb-1">
      <input type="checkbox" class="filterCheckbox" name="${item.id}" id="${item.id}" value="${item.value}">
      <label class="filter_text" for="${item.id}">${item.value}</label><br>
    </div>
    `;
    });
    return `
    <div>${items?.join("")}</div>
  `;
}

if (filterSelect) {
    filterSelect_select.addEventListener("click", () => {
        filterSelect.classList.toggle("show");
    });
    filterSelect_list.innerHTML = renderFilterSelect(filterSelectMarka);
}

document.addEventListener("click", (e) => {
    const isClickInside = filterSelect?.contains(e.target);
    if (!isClickInside) {
        filterSelect?.classList.remove("show");
    }
});

const carList = document.getElementById("filterSelect_list");
const filterCheckboxes = carList?.querySelectorAll(".filterCheckbox");
filteredFunc();

function filteredFunc() {
    const filteredCars = [];
    if (filterCheckboxes?.length) {
        for (let i = 0; i < filterCheckboxes?.length; i++) {
            const checkbox = filterCheckboxes[i];
            if (checkbox.checked) {
                if (!filterCheckboxes[0]?.checked) {
                    const newCar = {
                        id: checkbox.id,
                        value: checkbox.value,
                    };
                    filteredCars.push(newCar);
                    console.log(filteredCars);
                }
            }
            filterSelect_value.innerHTML =
                filteredCars.length > 0
                    ? `Выбрано ${filteredCars.length}`
                    : "Выберите марку";
        }
        if (filterCheckboxes[0].checked) {
            filterSelect_value.innerHTML = "Все марки";
            filteredCars.push(...filterSelectMarka);
            console.log(filteredCars);
        }
    }
}

for (let i = 0; i < filterCheckboxes?.length; i++) {
    const checkbox = filterCheckboxes[i];
    checkbox.addEventListener("change", filteredFunc);
}
if (filterSelect_value) {
    filterSelect_value.innerHTML = "Выберите марку";
}

const gotoBlockScroll = document.querySelector(".detail-goto");
const toBlockComplectation = document.querySelector(".detail-complectation");

if (gotoBlockScroll) {
    gotoBlockScroll.addEventListener("click", () => {
        toBlockComplectation.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest",
        });
    });
}

const sales_person = document.querySelector(".sales_person");
const sales_person2 = document.querySelector(".sales_person2");

if (sales_person && sales_person2) {
    const personsList = [
        {
            src: "./img/persons/person-1.png",
            alt: "person-1",
            name: "Нибиуллин",
            br: true,
            surname: "Константин",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-2.png",
            alt: "person-2",
            name: "Приреченский",
            br: true,
            surname: "Владислав",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-3.png",
            alt: "person-3",
            name: "Михаливченков",
            br: true,
            surname: "Константин",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-4.png",
            alt: "person-4",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-5.png",
            className: "hide575 hidePerson",
            alt: "person-5",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-6.png",
            className: "hide575 hidePerson",
            alt: "person-6",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-7.png",
            className: "hide992 hidePerson",
            alt: "person-7",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-2.png",
            className: "hide992 hidePerson",
            alt: "person-2",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
    ];

    const personsList2 = [
        {
            src: "./img/persons/person-1.png",
            alt: "person-1",
            name: "Нибиуллин",
            br: true,
            surname: "Константин",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-2.png",
            alt: "person-2",
            name: "Приреченский",
            br: true,
            surname: "Владислав",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-3.png",
            alt: "person-3",
            name: "Михаливченков",
            br: true,
            surname: "Константин",
            job: "Менеджер по продажам"
        },
        {
            src: "./img/persons/person-4.png",
            alt: "person-4",
            name: "Волобуев",
            br: false,
            surname: "Кирилл",
            job: "Менеджер по продажам"
        },
    ];

    function personsTemplate(array = []) {
        const arr = array?.map(el => {
            return `<li class="${el.className ?? ''}">
        <img src="${el.src}" alt="${el.alt}">
        <h4>${el.name} ${el.br ? `<br />` : ""} ${el.surname}</h4>
        <p>${el.job}</p>
      </li> `
        });

        return `<ul class="sales_grid">${arr?.join('')}</ul>`
    }

    sales_person.innerHTML = personsTemplate(personsList);
    sales_person2.innerHTML = personsTemplate(personsList2);

    const morePerson = document.querySelector('.morePerson');
    const morePerson2 = document.querySelector('.morePerson2');

    if (
        window.innerWidth <= 575 && personsList.length > 4
        ||
        window.innerWidth <= 575 && personsList2.length > 4
    ) {
        morePerson.style.display = "block";
        morePerson2.style.display = "block";
    } else {
        morePerson.style.display = "none";
        morePerson2.style.display = "none";
    }

    const hidePersons = document.querySelectorAll('.hidePerson');
    morePerson?.addEventListener('click', () => {
        for (let i = 0; i < hidePersons.length; i++) {
            const el = hidePersons[i];
            el.classList.toggle('showPerson');
            morePerson.classList.add('hideButtonPerson')
        }
    })

    const hidePersons2 = document.querySelectorAll('.hidePerson2');
    morePerson2?.addEventListener('click', () => {
        for (let i = 0; i < hidePersons2.length; i++) {
            const el = hidePersons2[i];
            el.classList.toggle('showPerson');
            morePerson2.classList.add('hideButtonPerson')
        }
    })
}

const vakancies_block = document.querySelector('.vakancies_block');

if (vakancies_block) {
    function templateVakancies(array = [], WRITE_DESCRIPTION) {
        const arr = array.map((el) => {
            return `
      <li>
        <div class="vakancies-item">
          <div class="vakancies-item_text">
            <h1>${el.title}</h1>
            <span>
              ${el.price} ₽
            </span>
          </div>
          <div class="vakancies-item_arrow">
            <button class="splide_my-btn-next vakancies_arrow"></button>
          </div>
        </div>

        <div class="vakancies-item_text_show">
          <!-- ========== DISCRIPTION START ====== -->

          В связи с расширением салона, требуется автомойщик на постоянную основу
          <br>
          <br>
          <b>Требования:</b><br>
          — Мойка автомобилей<br>— Мелкий Детейлинг<br>— Ответственность<br>— Желание работать и зарабатывать<br> — Наличие ВУ
          <br>
          <b>Условия:</b><br>
          Сменный график с 9 до 19<br>
          — Униформа<br>
          — Стабильная выплата ЗП (без задержек)<br>
          — Премии <br>
          — Хороший коллектив<br>
          — Возможность карьерного роста<br>
          — Корпоротивные скидки на детейлинг услуги компании <br>
          — Возможно оформление по ТК РФ<br>
          <br>
          <b>Контакты для связи:</b><br>
          Телефон: <span><a href="tel:+78612054986">+7 (861) 205-49-86</a></span><br>
          E-mail: <span><a href="mailto:alliance.motors@bk.ru">alliance.motors@bk.ru</a></span>

          <!-- ========== DISCRIPTION END ====== -->
        </div>
      </li>
      `
        })
        return `
      <div class="vakancies_list">
        ${arr?.join('')}
      </div>`
    }

    const vakancies = [
        {title: 'Автомойщик в Автосалон', price: '50 000 — 80 000'},
        {title: 'мЕНЕДЖЕР ПО ПРОДАЖАМ', price: '80 000 — 100 000'},
        {title: 'Автомойщик в Автосалон', price: '80 000 — 100 000'}
    ]

    vakancies_block.innerHTML = templateVakancies(vakancies)
    let accardions = document.querySelectorAll(".vakancies-item");

    for (let i = 0; i < accardions.length; i++) {
        const acc = accardions[i];

        acc.addEventListener("click", function () {
            this.classList.toggle('_active');
            const panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null
                panel.style.padding = '0rem 24px'
            } else {
                panel.style.padding = '1rem 24px'
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
}


const submitRequiredForm = document.querySelector('.submitRequiredForm');
const submitRequiredFormHome = document.querySelector('.submitRequiredFormHome');
const submitRequiredFormCredit = document.querySelector('.submitRequiredFormCredit');

if (submitRequiredForm || submitRequiredFormHome || submitRequiredFormCredit) {
    submitRequiredForm?.addEventListener('click', () => {
        const input_1 = document.querySelector('.input-1');
        const input_2 = document.querySelector('.input-2');
        const myForm = {
            name: input_1.value,
            number: input_2.value
        }
        console.log(myForm);
        alert(JSON.stringify(myForm))
    })

    submitRequiredFormHome?.addEventListener('click', () => {
        const input_1 = document.querySelector('.inputHome-1');
        const input_2 = document.querySelector('.inputHome-2');
        const myForm = {
            name: input_1.value,
            number: input_2.value
        }
        console.log(myForm);
        alert(JSON.stringify(myForm))
    })

    submitRequiredFormCredit?.addEventListener('click', () => {
        const input_1 = document.querySelector('.inputCredit-1');
        const input_2 = document.querySelector('.inputCredit-2');
        const myForm = {
            name: input_1.value,
            number: input_2.value
        }
        console.log(myForm);
        alert(JSON.stringify(myForm))
    })
}
const cars_buy = document.querySelector('.homeCars');
const cars_buy2 = document.querySelector('.catalogCars');

function templateCars(array = []) {
    const arr = array.map(el => {
        return `
    <li class="car_info car-info">
      <div class="car-info_container">
        <a href="../${el.link}.html" target="_blank">
          <img loading="lazy" src="../img/cars/${el.img}.png" alt="Car" class="car-info_img">
        </a>
        <div class="car-info_content">
          <h4 class="car-info_name">
            ${el.name} <span class="car-info_year">${el.year}</span>
          </h4>
          <div class="car-info_price">
            ${el.price} ₽ ${el.minPrice ? `<span class="car-info_min-price">${el.minPrice} ₽ / мин. платеж</span>` : ''}
          </div>
          <ul class="car-info_characteristic">
            <li>
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.2844 10.6452H15C14.8834 11.8765 14.4812 13.0605 13.8276 14.0962C12.4574 12.7045 10.6931 11.8035 8.79314 11.5247L11.0776 8.02464L11.0775 8.02475C11.2315 7.7927 11.2543 7.49317 11.1372 7.23901C11.0202 6.98487 10.7811 6.8147 10.5101 6.7926C10.2391 6.7705 9.97727 6.89977 9.82323 7.13182L7.06902 11.4355C5.95914 11.4904 4.86888 11.7583 3.8534 12.2257C2.86682 12.6807 1.96628 13.3141 1.19398 14.0962C0.532649 13.0627 0.123083 11.8786 0 10.6451H0.715555C0.985069 10.6451 1.23402 10.4963 1.36877 10.2546C1.50352 10.0129 1.50352 9.71502 1.36877 9.47332C1.23401 9.23162 0.985052 9.08276 0.715555 9.08276H0C0.144715 7.55579 0.723785 6.10785 1.66384 4.92202L2.17244 5.44431V5.44442C2.3138 5.59161 2.50647 5.67367 2.70691 5.67211C2.90813 5.67267 3.10121 5.59004 3.24322 5.44252C3.38534 5.29488 3.46457 5.09466 3.46338 4.88625C3.46229 4.67785 3.38079 4.47864 3.23705 4.33279L2.75863 3.81935C3.3194 3.34246 3.94363 2.95156 4.61199 2.65874C5.30028 2.36401 6.02623 2.17457 6.76711 2.09619V2.83719C6.76711 3.11633 6.91085 3.37429 7.14431 3.51385C7.37767 3.65342 7.66516 3.65342 7.89863 3.51385C8.132 3.37428 8.27572 3.11631 8.27572 2.83719V2.09619C9.74959 2.24742 11.1475 2.84695 12.293 3.81935L11.7671 4.34175C11.6231 4.48793 11.5415 4.68783 11.5407 4.89667C11.5399 5.10563 11.6199 5.3062 11.7629 5.45348C11.9059 5.6009 12.0999 5.68273 12.3016 5.68094C12.5003 5.67993 12.6906 5.59821 12.8318 5.45325L13.336 4.93097C14.2761 6.11668 14.8551 7.56473 14.9999 9.0917H14.2843C14.0148 9.0917 13.7658 9.24069 13.6311 9.48238C13.4964 9.72407 13.4963 10.0219 13.6311 10.2636C13.7659 10.5053 14.0148 10.6542 14.2843 10.6542L14.2844 10.6452Z" fill="#E7E7E7"/>
              </svg>
              ${el.km} км
            </li>
            <li>
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.4348 1.31017C8.41323 1.26983 8.38171 1.23292 8.34218 1.20128C8.25731 1.13234 8.13757 1.09415 8.01305 1.0963C7.88078 1.09386 7.7529 1.13175 7.6581 1.20128C7.61676 1.23185 7.58512 1.26915 7.56548 1.31017C6.74758 2.07236 0.693296 7.92507 2.25675 11.9618C2.50334 12.5697 2.92171 13.1297 3.48311 13.6031C4.0445 14.0766 4.73529 14.452 5.50776 14.7034C6.25619 14.9599 7.06778 15.0936 7.88942 15.0962H8.01807H8.01794C8.97718 15.0766 9.92011 14.9043 10.7854 14.5906C11.4914 14.3302 12.1185 13.9622 12.6276 13.5098C13.1365 13.0574 13.5164 12.5304 13.7432 11.9618C15.3068 7.92532 9.25257 2.07641 8.43447 1.31017H8.4348ZM9.92646 10.9623C9.8124 11.331 9.53467 11.659 9.13954 11.8917C8.81868 12.0916 8.41578 12.2008 8.00012 12.2008C7.58445 12.2008 7.18155 12.0916 6.8607 11.8917C6.46583 11.6582 6.18667 11.3307 6.06862 10.9623C5.56962 9.4418 7.21568 7.18633 7.99754 6.22585C8.78459 7.18628 10.4306 9.43805 9.92646 10.9623Z" fill="#E7E7E7"/>
              </svg>
              Бензин
            </li>
            <li>
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_435_698)">
                <path d="M11.6553 1.07437C11.7429 0.745464 11.6066 0.397803 11.3188 0.21617C11.0308 0.0345293 10.6584 0.0612227 10.3993 0.282056L1.27336 8.05974C1.02531 8.2712 0.935326 8.6148 1.04797 8.92054C1.1606 9.22627 1.452 9.42954 1.77779 9.42954H5.60676L3.54454 14.5852C3.41395 14.9115 3.5185 15.2849 3.79962 15.496C4.08074 15.707 4.46848 15.7033 4.74544 15.4869L14.701 7.70922C14.9626 7.50479 15.0657 7.15702 14.9575 6.84309C14.8496 6.52928 14.5541 6.31848 14.2222 6.31848H10.2569L11.6553 1.07437Z" fill="#E7E7E7"/>
                </g>
                <defs>
                <clipPath id="clip0_435_698">
                <rect width="16" height="16" fill="white" transform="translate(0 0.0961914)"/>
                </clipPath>
                </defs>
              </svg>
              ${el.speed}
            </li>
            <li>
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.9999 2.8331C14.9999 1.88862 14.2382 1.11164 13.2784 1.11164C12.3339 1.11164 11.557 1.87334 11.557 2.8331C11.557 3.5948 12.0597 4.23462 12.7452 4.46319V7.82989L8.54091 7.82978V4.44785C9.22641 4.21938 9.72916 3.57946 9.72916 2.81776C9.72916 1.87328 8.96746 1.0963 8.0077 1.0963C7.06322 1.0963 6.28623 1.85799 6.28623 2.81776C6.28623 3.57946 6.78895 4.21928 7.47448 4.44785V7.81455L3.25468 7.81444V4.44774C3.94018 4.21928 4.44293 3.57935 4.44293 2.81765C4.44293 1.87318 3.68123 1.09619 2.72146 1.09619C1.77699 1.09619 1 1.85789 1 2.81765C1 3.57935 1.50272 4.21918 2.18825 4.44774V12.2323C1.50275 12.4608 1.01532 13.1006 1.01532 13.8623C1.01532 14.8067 1.77701 15.5837 2.73678 15.5837C3.68126 15.5837 4.45824 14.822 4.45824 13.8623C4.45824 13.1006 3.95552 12.4607 3.26999 12.2322L3.26989 8.88071H7.48969V12.2474C6.80419 12.4759 6.30144 13.1158 6.30144 13.8775C6.30144 14.822 7.06314 15.599 8.02291 15.599C8.96738 15.599 9.74437 14.8373 9.74437 13.8775C9.74437 13.1158 9.24165 12.476 8.55612 12.2474L8.55601 8.88071H13.309C13.5985 8.88071 13.8422 8.63694 13.8422 8.34747V4.44758C14.5126 4.21901 15 3.5945 15 2.83281L14.9999 2.8331Z" fill="#E7E7E7"/>
              </svg>
              ВКПП
            </li>
          </ul>
          <footer class="car-info_footer">
            <a href="tel:+786120054986" class="car-info_tel">
              <img src="../img/icons/contact.svg" alt="Contact">
            </a>
            <a href="/" class="btn-car-link">
              <button type="button" class="btn-car">Оставить заявку</button>
            </a>
          </footer>
        </div>
      </div>
    </li>
    `
    })

    return arr?.join('')
}

if (cars_buy) {
    const carsPerPage = 9;
    let currentPage = 1;
    let displayedCarsCount = 0;

    const homeCarList = [
        {
            id: 1,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 2,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 3,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 4,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 5,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 6,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 7,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 8,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 9,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 10,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 11,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 12,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 13,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 14,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 15,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 16,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 17,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 18,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 19,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 20,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
    ];
    const totalCarsCount = homeCarList.length;
    // showCars();

    function showCars() {
        const startIndex = displayedCarsCount;
        const endIndex = startIndex + carsPerPage;
        const carsToShow = homeCarList.slice(startIndex, endIndex);
        if (carsToShow.length > 0) {
            const list = document.querySelector(".car_list");
            list.insertAdjacentHTML("beforeend", templateCars(carsToShow));
            displayedCarsCount += carsToShow.length;
        }
        if (displayedCarsCount >= totalCarsCount) {
            showMoreButton.style.display = "none";
        }
    }

    const showMoreButton = document.querySelector("#show-more");
    showMoreButton?.addEventListener("click", (e) => {
        currentPage++;
        showCars();
        e.preventDefault();
    });
}
if (cars_buy2) {
    const carsPerPage = 15;
    let currentPage = 1;
    let displayedCarsCount = 0;

    const catalogCarList = [
        {
            id: 1,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 2,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 3,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 4,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 5,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 6,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 7,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 8,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 9,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 10,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 11,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 12,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 13,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 14,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 15,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 16,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 17,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 18,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 19,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 20,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 21,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 22,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 23,
            link: 'detail',
            img: 'car_4',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 24,
            link: 'detail',
            img: 'car_2',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 25,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 26,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 27,
            link: 'detail',
            img: 'car_5',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 28,
            link: 'detail',
            img: 'car_6',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 29,
            link: 'detail',
            img: 'car_3',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
        {
            id: 30,
            link: 'detail',
            img: 'car_1',
            name: 'Kia Carnival',
            year: 2018,
            price: '2 850 000',
            minPrice: '16 600',
            km: '1 000 000',
            speed: '1.2 л (98 л.с.)'
        },
    ];

    const totalCarsCount = catalogCarList.length;
    // showCars();

    function showCars() {
        const startIndex = displayedCarsCount;
        const endIndex = startIndex + carsPerPage;
        const carsToShow = catalogCarList.slice(startIndex, endIndex);
        if (carsToShow.length > 0) {
            const list = document.querySelector(".car_list");
            list.insertAdjacentHTML("beforeend", templateCars(carsToShow));
            displayedCarsCount += carsToShow.length;
        }
        if (displayedCarsCount >= totalCarsCount) {
            showMoreButton.style.display = "none";
        }
    }

    const showMoreButton = document.querySelector("#show-more");
    showMoreButton?.addEventListener("click", (e) => {
        currentPage++;
        showCars();
        e.preventDefault();
    });

    // для запуска локальной бд

    // (async function fetchData(){
    //   const response = await fetch(`http://localhost:3000/catalogCarList`);
    //   const data = response.json();
    //   cars_buy2.innerHTML = templateCars(data);
    // })()
}
const filterShow = document.querySelector('.filter-show');
const filterClose = document.querySelectorAll('.filter-close');


if (filterShow) {
    const body = document.querySelector('.filter_body');
    const header_filter = document.querySelector('.header-filter');
    const header_container = document.querySelector('.header_container')

    filterShow?.addEventListener('click', (e) => {
        e.preventDefault();
        body.classList.add('_active');
        document.body.classList.add('_active');
        header_filter.classList.add('_active');
        header_container.classList.add('_active')
    })

    for (let i = 0; i < filterClose?.length; i++) {
        const element = filterClose[i];

        element.addEventListener('click', (e) => {
            body.classList.remove('_active');
            document.body.classList.remove('_active');
            header_filter.classList.remove('_active');
            header_container.classList.remove('_active')
        })

    }
}
