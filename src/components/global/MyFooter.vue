<script>;

export default {
  data() {
    return {
      className: 'footer-menu',
    }
  }
}
</script>

<template>
  <footer class="footer">
    <div class="footer_container">
      <div class="flex map">
        <div class="footer_map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2817.8275633262365!2d38.98310637556051!3d45.06900895972072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f04596973e77e7%3A0x1d9da4a217e535b8!2z0YPQuy4g0KDQvtGB0YLQvtCy0YHQutC-0LUg0YguLCA3LCDQmtGA0LDRgdC90L7QtNCw0YAsINCa0YDQsNGB0L3QvtC00LDRgNGB0LrQuNC5INC60YDQsNC5LCDQoNC-0YHRgdC40Y8sIDM1MDA1MQ!5e0!3m2!1sru!2s!4v1687773364655!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer_contact">
          <h1 class="footer_title">Контакты</h1>
          <ul>
            <li>
              <img src="@img/icons/geo.svg" alt="Geo">
              <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
            </li>
            <li>
              <img src="@img/icons/geo.svg"  alt="Geo">
              <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
            </li>
            <li>
              <img src="@img/icons/mail.svg" alt="Mail">
              <p><a href="mailto:alliance.motors@bk.ru" class="m-0">alliance.motors@bk.ru</a></p>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-navbar">
        <div class="footer_menubar">
          <router-link to="/" class="footer_logo">
            <img src="@img/logo.svg" alt="Logo">
          </router-link>
          <Navbar :className="className"/>
        </div>

        <div class="footer-contact">
          <div class="footer-phone_1 footer-phone">
            <p class="footer-phone_text">Ростовское шоссе, 7</p>
            <a href="tel:+786120054986" class="footer-phone_number">
              <img src="@img/icons/phone.svg">
              <span>+7 (861) 205-49-86</span>
            </a>
          </div>
          <div class="footer-phone_2 footer-phone">
            <p class="footer-phone_text">Ростовское шоссе, 17</p>
            <a href="tel:+786120054986" class="footer-phone_number">
              <img src="@img/icons/phone.svg">
              <span>+7 (861) 205-49-86</span>
            </a>
          </div>
        </div>
      </div>
      <div class="politicy">
        <div class="politicy_title">
          <div>ООО "Alliance Motors" © 2023</div>
          <div>Политика конфиденциальности</div>
        </div>
        <p class="politicy_text">Обращаем Ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положением ч. 2 ст. 437 Гражданского кодекса Российской Федерации. Для получения подробной информации о стоимости автомобилей, пожалуйста, обращайтесь к менеджеру по продажам. Предоставляя свои персональные данные и используя настоящий веб-сайт, Вы соглашаетесь с обработкой Ваших персональных данных и принимаете условия их обработки. <a href="{{ route('privacy') }}">Политика конфиденциальности.</a></p>
      </div>
    </div>
  </footer>
</template>

<style scoped>

</style>