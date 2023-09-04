<script>
import Splide from "@splidejs/splide";

export default {
  data() {
    return {
      origin: location.origin,
    }
  },
  methods: {
    initSlider() {
      const options = {
        type: "loop",
        autoplay: true,
        interval: 3000,
        perPage: 1,
        gap: "24px",
      };
      const splideIndex = new Splide("#homeSplide", options);

      splideIndex.mount();
    }
  },
  mounted() {
    this.initSlider();
  }
}
</script>

<template>
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
                  <source srcset="@img/jeep.png" type="image/webp">
                  <img src="@img/jeep.png" alt="Jeep" class="car-img">
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
            <div
                class="slide-2"
                :style="{ 'background': `url(${origin}/static/img/slide-2.png) no-repeat center` }">
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
            <div
                class="slide-3"
                :style="{ 'background': `url(${origin}/static/img/slide-3.png) no-repeat center` }"
            >
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
</template>

<style scoped lang="scss">
$primary_clr: #B40D16;
$white: #fff;

.splide_my-btn-prev {
  opacity: 1;
  padding: 1.5rem;
  border-radius: 16px;
  border: 1px solid $white;
  transition: .3s ease all;
  background: #fff;

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
  background: #fff;
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

.homeNextSlide {
  left: -1.5rem;
}

.homePrevSlide {
  right: -1.5rem;
}
</style>