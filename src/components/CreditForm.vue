
<script>
export default {
  name: "CreditForm"
}
</script>

<template>
  <div class="form">
    <div class="form_container">
      <div class="form_title">
        <h1>хочешь</h1>
        <p>оформить автокредит легко и просто?</p>
      </div>
      <form class="form_action">
        <input required type="text" name="name" id="name" class="inputHome-1" placeholder="Имя">
        <input required type="tel" name="tel" id="tel" class="inputHome-2" placeholder="+7 (123) 456-78-90">
        <input type="submit" class="submitRequiredFormHome" name="submitForm" id="submitForm" value="Отправить заявку">
      </form>
    </div>
  </div>
</template>

<style scoped>

</style>