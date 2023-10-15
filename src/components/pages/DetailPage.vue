<script>
import axios from "axios";
import { API_URL } from "../../main";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
  data() {
    return {
      car: {
        id: 0,
        configuration: {
          id: 0,
          model: {
            id: 0,
            name: '',
            brand: {
              id: 0,
              name: '',
            }
          },
          engine: {
            id: 0,
            type: '',
            engine_power: '',
            engine_volume: '',
          },
          description: '',
        },
        price: 0,
        vehicle_mileage: 0,
        availability: '',
        body: {
          id: 0,
          name: '',
        },
        wheel_drive: '',
        color: {
          id: 0,
          name: '',
        },
        fuel: '',
        pictures: [],
        kpp: {
          id: 0,
          name: '',
        }
      },
      pageName: 'Каталог',
      gap: window.innerWidth <= 575 ? "12px" : window.innerWidth >= 575 ? "24px" : "12px",
      perPage: window.innerWidth >= 1023 ? 3 : window.innerWidth >= 767 ? 2 : window.innerWidth >= 574 ? 1 : 1,
      modalOn: false,
      currentPicture: null,
    }
  },

  methods: {
    async getCar() {
      try {
        const id = this.$route.params.id;
        const response = await axios.get(`${API_URL}/api/car/${id}`);
        const { data: car } = response;
        this.car = car;
      } catch (e) {
        console.log(e)
      }
    },
    getAutoName() {
      return `${this.car.configuration.model.brand.name} ${this.car.configuration.model.name} ${this.car.year}`;
    },
    getPrice() {
      let price = this.prepareNum(this.car.price);

      return `${price} ₽`;
    },
    getMinPay() {
      const months = 7 * 12;
      const sum = this.car.price / months;

      const fullSum = sum + 0.07 * sum + 0.01 * sum;

      return `${this.prepareNum(fullSum.toFixed())} ₽ / мин. платеж`;
    },
    prepareNum(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    },
    getMileage() {
      return `${this.prepareNum(this.car.vehicle_mileage)} км`;
    },
    getEngineVolume() {
      const power = this.car.configuration.engine.engine_power;
      const volume = this.car.configuration.engine.engine_volume;

      return `${(volume / 1000).toFixed(1)} л (${power})`;
    },
    getConfiguration() {
      const decode = this.car.configuration.description
        .replace(/\\u(....)/g, (match, p1) => String.fromCharCode(parseInt(p1, 16)))
        .replace(/\\(\d{3})/g, (match, p1) => String.fromCharCode(parseInt(p1, 8)))
        .replace(/"/g, "");
      return decode.split(',');
    },
    showModal(value) {
      this.modalOn = value;
    },
    getPictureSrc(value) {
      this.currentPicture = value;
    }


  },
  mounted() {
    this.getCar();
  }
}
</script>

<template>
  <main class="main">
    <div class="wrapper">
      <MyBreadcrumbs :page="pageName" />
      <div class="detail-product">
        <div class="detail-product_container">
          <div class="title-block">
            <div>
              <h1 class="detail-product_title">
                {{ getAutoName() }}
                <div class="detail-product_title-right">
                  <div class="title-right el-1">VIN</div>
                  <div class="title-right el-2">АКЦИЯ</div>
                </div>
              </h1>
              <p class="detail-product_subtitle">{{ car.year }} <span>{{ car.configuration.name }}</span></p>
            </div>
            <div class="zayavka-block">
              <a href="#submit-application" class="btn-link popup-link full575">
                <button type="button" class="btn zayavka-btn full575 submit-zayavka-btn">Заявка на кредит</button>
              </a>
              <a href="tel:+78612054986" class="btn-link white-link full575">
                <button type="button" class="btn red-text number-btn full575">+7 (861) 205-49-86</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <Splide :options="{
    rewind: true, autoplay: true, speed: 1000, interval: 3000, start: 1, perPage: perPage, perMove: 1, gap: gap, pagination: false,
    classes: {
      arrows: 'splide__arrows your-class-arrows',
      arrow: 'splide__arrow your-class-arrow',
      prev: 'splide__arrow--prev ',
      next: 'splide__arrow--next',
    },
  }" aria-label="Car picture" class="splide__container">
    <!-- <div class="splide__arrows">
      <button type="button" class="splide__arrow splide__arrow--prev splide_my-btn-prev"></button>
      <button type="button" class="splide__arrow splide__arrow--next splide_my-btn-next"></button>
    </div> -->
    <SplideSlide class="splide-slide" v-for="picture in car.pictures" :key="picture.id">
      <div>
        <img @click="showModal(true), getPictureSrc(picture.src)" class="splide-img" :src="picture.src"
          :alt="picture.name">
      </div>
      <!-- <transition name="component-fade" mode="out-in"> -->
      <!-- <div class="modal" v-if="modalOn">
        <button @click="showModal(false), console.log(modalOn)">НАЖМИ МЕНЯ</button>
        <img class="splide-img" :src="picture.src" :alt="picture.name">
      </div> -->
      <!-- </transition> -->
    </SplideSlide>

  </Splide>
  <main class="main main-2">
    <div class="wrapper">
      <div class="detail-container">
        <div class="detail-body">
          <div class="modal" v-if="modalOn">
            <button class="close_btn" @click="showModal(false)"></button>
            <img class="modal_img" :src="currentPicture">
          </div>
          <div class="detail-product-price">
            <div class="detail-product-price_container">
              <div class="detail-price">
                <p>{{ getPrice() }}
                  <span class="detail-min-price" data-da="detail-product-price_container,1,575">{{ getMinPay() }}</span>
                </p>
                <div class="detail-available">{{ car.availability }}</div>
              </div>
              <div class="detail-info">
                <ul>
                  <li>Пробег: <span>{{ getMileage() }}</span></li>
                  <li>Тип кузова: <span>{{ car.body.name }}</span></li>
                  <li>Привод: <span>{{ car.wheel_drive }}</span></li>
                </ul>
                <div class="detail-see">
                  <div class="white-rounded"></div>
                  <p>{{ car.color.name }}</p>
                </div>
              </div>
              <div class="detail-btns">
                <a href="#submit-application" class="btn-link popup-link" data-da="detail-product-price_container,2,575">
                  <button type="button" class="btn zayavka-btn full575">Заявка на кредит</button>
                </a>
                <a href="#" class="btn-link white-link">
                  <button type="button" class="btn red-text number-btn2">Обмен авто</button>
                </a>
                <div class="detail-phone number-btn2">
                  <a href="tel:+78612054986">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M8.84778 15.1267C11.0307 17.3147 13.6871 19 15.8552 19C16.8245 19 17.6755 18.66 18.3562 17.906C18.7558 17.4625 19 16.9525 19 16.4425C19 16.0507 18.8446 15.6663 18.4672 15.4002L16.1956 13.7888C15.833 13.5375 15.537 13.4192 15.2706 13.4192C14.9228 13.4192 14.6121 13.6114 14.2717 13.9514L13.7389 14.4836C13.6501 14.5649 13.5465 14.6019 13.4503 14.6019C13.3319 14.6019 13.2209 14.5576 13.1469 14.5132C12.6808 14.2619 11.8816 13.5818 11.1416 12.8427C10.4017 12.1035 9.71353 11.3126 9.46934 10.8395C9.42495 10.7582 9.38795 10.6547 9.38795 10.5364C9.38795 10.4477 9.41755 10.3442 9.49894 10.2555L10.0317 9.71595C10.3647 9.36853 10.5645 9.06547 10.5645 8.71806C10.5645 8.44456 10.4461 8.14889 10.1945 7.79409L8.58879 5.54699C8.31501 5.16262 7.93023 5 7.50846 5C7.00529 5 6.50211 5.22175 6.06554 5.64308C5.32558 6.33791 5 7.20275 5 8.15628C5 10.3221 6.6649 12.9461 8.84778 15.1267Z"
                        fill="#000" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="detail-goto">
            <p>
              Комплектация
              <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Vector 1 (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                  d="M0.710883 0.988215C0.992061 0.737164 1.44794 0.737164 1.72912 0.988215L6.5 5.24793L11.2709 0.988215C11.5521 0.737164 12.0079 0.737164 12.2891 0.988215C12.5703 1.23927 12.5703 1.6463 12.2891 1.89735L7.00912 6.61164C6.72794 6.86269 6.27206 6.86269 5.99088 6.61164L0.710883 1.89735C0.429706 1.6463 0.429706 1.23927 0.710883 0.988215Z"
                  fill="#B40D16" />
              </svg>
            </p>
          </div>
          <div class="detail-akciya">
            <h1>акции</h1>
            <ul>
              <li><img src="@img/icons/gift-1.svg" />
                <p>Масляный сервис бесплатно</p>
              </li>
              <li><img src="@img/icons/gift-2.svg" />
                <p>ОСАГО в подарок</p>
              </li>
            </ul>
          </div>
          <div class="detail-benefits">
            <h1>Преимущества</h1>
            <div class="credit-grid detail-grid">
              <ul class="row-1 detail-row-1">
                <li><img src="@img/icons/doc.svg" alt="Document" />
                  <p>Оформление<br />по 2 документам</p>
                </li>
                <li><img src="@img/icons/valuta.svg" alt="Rubl" />
                  <p>Без первоначального взноса</p>
                </li>
                <li><img src="@img/icons/kacko.svg" alt="KASKO" />
                  <p>Без оформления<br />КАСКО</p>
                </li>
                <li><img src="@img/icons/russia.svg" alt="Russia" />
                  <p>Все регионы РФ<br />(в т.ч. Кавказ и Крым)</p>
                </li>
              </ul>
              <li class="without-comissia flex items-center">
                <img src="@img/icons/without-comissia.svg" alt="Без комиссий" />
                <p>Досрочное погашение без комиссий и штрафов</p>
              </li>
              <ul class="row-2 detail-row-2">
                <li>
                  <img src="@img/icons/dist.svg" alt="Dist" />
                  <p>Дистанционная<br />подача</p>
                </li>
                <li>
                  <img src="@img/icons/dnr-lnr.svg" alt="DNR & LNR" />
                  <p>По паспорту<br />ДНР и ЛНР</p>
                </li>
              </ul>
            </div>
          </div>
          <div class="detail-img" data-da="details-right,1,992">
            <img v-for="picture in car.pictures" :src="picture.src" :alt="picture.name" />
          </div>
        </div>
        <div class="details-right">
          <div class="flex details-right-block">
            <div class="detail-product-characteristic" data-da="detail-body,1,574">
              <ul class="car-info_characteristic detail-car">
                <li>
                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14.2844 10.6452H15C14.8834 11.8765 14.4812 13.0605 13.8276 14.0962C12.4574 12.7045 10.6931 11.8035 8.79314 11.5247L11.0776 8.02464L11.0775 8.02475C11.2315 7.7927 11.2543 7.49317 11.1372 7.23901C11.0202 6.98487 10.7811 6.8147 10.5101 6.7926C10.2391 6.7705 9.97727 6.89977 9.82323 7.13182L7.06902 11.4355C5.95914 11.4904 4.86888 11.7583 3.8534 12.2257C2.86682 12.6807 1.96628 13.3141 1.19398 14.0962C0.532649 13.0627 0.123083 11.8786 0 10.6451H0.715555C0.985069 10.6451 1.23402 10.4963 1.36877 10.2546C1.50352 10.0129 1.50352 9.71502 1.36877 9.47332C1.23401 9.23162 0.985052 9.08276 0.715555 9.08276H0C0.144715 7.55579 0.723785 6.10785 1.66384 4.92202L2.17244 5.44431V5.44442C2.3138 5.59161 2.50647 5.67367 2.70691 5.67211C2.90813 5.67267 3.10121 5.59004 3.24322 5.44252C3.38534 5.29488 3.46457 5.09466 3.46338 4.88625C3.46229 4.67785 3.38079 4.47864 3.23705 4.33279L2.75863 3.81935C3.3194 3.34246 3.94363 2.95156 4.61199 2.65874C5.30028 2.36401 6.02623 2.17457 6.76711 2.09619V2.83719C6.76711 3.11633 6.91085 3.37429 7.14431 3.51385C7.37767 3.65342 7.66516 3.65342 7.89863 3.51385C8.132 3.37428 8.27572 3.11631 8.27572 2.83719V2.09619C9.74959 2.24742 11.1475 2.84695 12.293 3.81935L11.7671 4.34175C11.6231 4.48793 11.5415 4.68783 11.5407 4.89667C11.5399 5.10563 11.6199 5.3062 11.7629 5.45348C11.9059 5.6009 12.0999 5.68273 12.3016 5.68094C12.5003 5.67993 12.6906 5.59821 12.8318 5.45325L13.336 4.93097C14.2761 6.11668 14.8551 7.56473 14.9999 9.0917H14.2843C14.0148 9.0917 13.7658 9.24069 13.6311 9.48238C13.4964 9.72407 13.4963 10.0219 13.6311 10.2636C13.7659 10.5053 14.0148 10.6542 14.2843 10.6542L14.2844 10.6452Z"
                      fill="#E7E7E7" />
                  </svg>
                  {{ getMileage() }}
                </li>
                <li>
                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8.4348 1.31017C8.41323 1.26983 8.38171 1.23292 8.34218 1.20128C8.25731 1.13234 8.13757 1.09415 8.01305 1.0963C7.88078 1.09386 7.7529 1.13175 7.6581 1.20128C7.61676 1.23185 7.58512 1.26915 7.56548 1.31017C6.74758 2.07236 0.693296 7.92507 2.25675 11.9618C2.50334 12.5697 2.92171 13.1297 3.48311 13.6031C4.0445 14.0766 4.73529 14.452 5.50776 14.7034C6.25619 14.9599 7.06778 15.0936 7.88942 15.0962H8.01807H8.01794C8.97718 15.0766 9.92011 14.9043 10.7854 14.5906C11.4914 14.3302 12.1185 13.9622 12.6276 13.5098C13.1365 13.0574 13.5164 12.5304 13.7432 11.9618C15.3068 7.92532 9.25257 2.07641 8.43447 1.31017H8.4348ZM9.92646 10.9623C9.8124 11.331 9.53467 11.659 9.13954 11.8917C8.81868 12.0916 8.41578 12.2008 8.00012 12.2008C7.58445 12.2008 7.18155 12.0916 6.8607 11.8917C6.46583 11.6582 6.18667 11.3307 6.06862 10.9623C5.56962 9.4418 7.21568 7.18633 7.99754 6.22585C8.78459 7.18628 10.4306 9.43805 9.92646 10.9623Z"
                      fill="#E7E7E7" />
                  </svg>
                  {{ car.configuration.engine.type }}
                </li>
                <li>
                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_435_698)">
                      <path
                        d="M11.6553 1.07437C11.7429 0.745464 11.6066 0.397803 11.3188 0.21617C11.0308 0.0345293 10.6584 0.0612227 10.3993 0.282056L1.27336 8.05974C1.02531 8.2712 0.935326 8.6148 1.04797 8.92054C1.1606 9.22627 1.452 9.42954 1.77779 9.42954H5.60676L3.54454 14.5852C3.41395 14.9115 3.5185 15.2849 3.79962 15.496C4.08074 15.707 4.46848 15.7033 4.74544 15.4869L14.701 7.70922C14.9626 7.50479 15.0657 7.15702 14.9575 6.84309C14.8496 6.52928 14.5541 6.31848 14.2222 6.31848H10.2569L11.6553 1.07437Z"
                        fill="#E7E7E7" />
                    </g>
                    <defs>
                      <clipPath id="clip0_435_698">
                        <rect width="16" height="16" fill="white" transform="translate(0 0.0961914)" />
                      </clipPath>
                    </defs>
                  </svg>
                  {{ getEngineVolume() }}
                </li>
                <li>
                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14.9999 2.8331C14.9999 1.88862 14.2382 1.11164 13.2784 1.11164C12.3339 1.11164 11.557 1.87334 11.557 2.8331C11.557 3.5948 12.0597 4.23462 12.7452 4.46319V7.82989L8.54091 7.82978V4.44785C9.22641 4.21938 9.72916 3.57946 9.72916 2.81776C9.72916 1.87328 8.96746 1.0963 8.0077 1.0963C7.06322 1.0963 6.28623 1.85799 6.28623 2.81776C6.28623 3.57946 6.78895 4.21928 7.47448 4.44785V7.81455L3.25468 7.81444V4.44774C3.94018 4.21928 4.44293 3.57935 4.44293 2.81765C4.44293 1.87318 3.68123 1.09619 2.72146 1.09619C1.77699 1.09619 1 1.85789 1 2.81765C1 3.57935 1.50272 4.21918 2.18825 4.44774V12.2323C1.50275 12.4608 1.01532 13.1006 1.01532 13.8623C1.01532 14.8067 1.77701 15.5837 2.73678 15.5837C3.68126 15.5837 4.45824 14.822 4.45824 13.8623C4.45824 13.1006 3.95552 12.4607 3.26999 12.2322L3.26989 8.88071H7.48969V12.2474C6.80419 12.4759 6.30144 13.1158 6.30144 13.8775C6.30144 14.822 7.06314 15.599 8.02291 15.599C8.96738 15.599 9.74437 14.8373 9.74437 13.8775C9.74437 13.1158 9.24165 12.476 8.55612 12.2474L8.55601 8.88071H13.309C13.5985 8.88071 13.8422 8.63694 13.8422 8.34747V4.44758C14.5126 4.21901 15 3.5945 15 2.83281L14.9999 2.8331Z"
                      fill="#E7E7E7" />
                  </svg>
                  {{ car.kpp.name }}
                </li>
              </ul>
            </div>
            <div class="detail-logo"><img src="@img/logo.svg" /></div>
          </div>
          <div class="detail-complectation">
            <h1>Комплектация</h1>
            <div v-for="(detail, key) in getConfiguration()" :key="key">{{ detail }}</div>
          </div>
        </div>
      </div>
      <div class="benefits detail-benef">
        <div class="benefits_container">
          <ul class="benefits_body">
            <li class="benefits_item">
              <span class="benefits_title">Автокредит</span>
              <img src="@img/benefit_1.svg" class="benefits_figure-1" />
            </li>
            <li class="benefits_item">
              <span class="benefits_title">пРОДАЖА</span>
              <img src="@img/benefit_2.svg" class="benefits_figure-2" />
            </li>
            <li class="benefits_item">
              <span class="benefits_title">КОМИССИЯ</span>
              <img src="@img/benefit_3.svg" class="benefits_figure-3" />
            </li>
            <li class="benefits_item">
              <span class="benefits_title">трейд-ин</span>
              <img src="@img/benefit_4.svg" class="benefits_figure-4" />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <div class="popup" id="car1">
    <div class="popup__body">
      <div class="popup__content popup-car-content">
        <img src="@img/big-car.png" alt="CAR" class="popup-car" />
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
$primary_clr: #B40D16;
$white: #fff;

.splide {
  margin-top: -20px;
}

.detail-product {
  position: relative;

  margin: 56px 0px 0px 0px;

  @media (max-width: 767.98px) {
    margin: 2rem 0px 0 0px;
  }

  &_container {}

  &_title {
    color: #0E0E0F;
    font-size: 28px;
    font-style: normal;
    font-weight: 700;
    line-height: 120%;
    text-transform: uppercase;

    @media (max-width: 574.98px) {
      font-size: 20px;
    }
  }

  &_btn-text {
    color: #FFF;
    text-align: center;
    font-size: 12px !important;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
  }

  &_subtitle {
    margin: 1rem 0;
    color: #0E0E0F;
    font-size: 1rem;
    font-style: normal;
    font-weight: 400;
    line-height: 123%;

    span {
      color: #8E8E8E;
    }
  }
}

.splide__container {
  padding-top: 56px;
  background-color: #F2F2F2;
}

.splide-slide {
  margin: 0px 0px 0px 24px;
  max-width: 376px;

  @media (max-width: 574.98px) {
    margin: 0px 0px 0px 12px;
  }
}

.splide-img {
  width: 100%;
  object-fit: cover;
  border-radius: 32px;
  height: 264px;

  @media (max-width: 460px) {
    height: 100%;
  }

  @media (max-width: 574.98px) {
    border-radius: 16px;
  }

  @media (max-width: 340px) {
    width: 288px;
  }
}

.splide__my-arrow {
  -ms-flex-align: center;
  align-items: center;
  background: #fff;
  border: 0;
  border-radius: 50%;
  cursor: pointer;
  display: -ms-flexbox;
  display: flex;
  height: 2em;
  -ms-flex-pack: center;
  justify-content: center;
  opacity: .7;
  padding: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 2em;
  z-index: 1;
}

.splide_my-btn-prev {
  opacity: 1;
  padding: 1.5rem;
  border-radius: 16px;
  border: 1px solid $white;
  transition: .3s ease all;
  background-color: #fff;

  &::after {
    content: '';
    border: solid $primary_clr;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: .5rem;
    position: absolute;
    left: 1rem;
    transform: rotate(135deg);
    -webkit-transform: rotate(135deg);
  }

  &:disabled {
    background: rgba(255, 255, 255, 0.32);
  }
}

.splide_my-btn-next {
  opacity: 1;
  padding: 1.5rem;
  border-radius: 16px;
  border: 1px solid $white;
  background-color: #fff;
  transition: .3s ease all;

  &::after {
    content: '';
    border: solid $primary_clr;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: .5rem;
    position: absolute;
    left: .5rem;
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
  }

  &:disabled {
    background: rgba(255, 255, 255, 0.32);
  }
}

.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(22, 22, 22, .8);
  backdrop-filter: blur(3px);
  z-index: 1000;
}

.modal_img {
  width: 994px;
  height: 560px;
  object-fit: cover;
  border-radius: 32px;
  overscroll-behavior: none;
  overflow-y: hidden;

  @media (max-width: 1440px) {
    width: 60%;
    height: 60%;
  }
  @media (max-width: 1000px) {
    padding-top: 50px;
    width: 60%;
    height: 60%;
    border-radius: 0;
    object-fit: contain;
  }

}

.close_btn {
  width: 40px;
  height: 44px;
  position: absolute;
  right: 0.5rem;
  top: 5.5rem;
  z-index: 11111;
  text-decoration: none;
  background-color: transparent;
  background-image: url(https://alliance-motors.vercel.app/img/close.svg);
  border: none;

  @media (max-width: 1440px) {
    right: 0.5rem;
    top: 12.5rem;
  }
}

.homeNextSlide {
  left: -1.5rem;
}

.homePrevSlide {
  right: -1.5rem;
}
</style>