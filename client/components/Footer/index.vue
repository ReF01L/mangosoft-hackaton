<template>
  <footer>
    <div class="info">
      <div class="info__logo">
        <img src="/f_logo.png" alt="">
      </div>
      <div class="info-copy">&copy; 2020 ООО "MangoSoft"</div>
      <div class="info-policy">Политика конфиденциальности</div>
    </div>
    <!-- /.info -->
    <button class="error">Сообщить о проблеме</button>
  </footer>
</template>

<script>
    export default {
        name: "index"
    }
</script>

<style lang="scss" scoped>
  footer {
    background: #FFCC33;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15em;
  }
  .info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    &__logo {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    &-copy {
      padding: 10px 0;
      color: rgba(0, 0, 0, 0.9);
    }
    &-policy {
      padding: 10px 0;
      color: rgba(0, 0, 0, 0.9);
      text-decoration: underline;
      &:hover {
        cursor: pointer;
      }
    }
  }
  .error {
    align-self: flex-end;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 50px;
    font-weight: 700;
    font-size: 24px;
    background-color: #3F3D56;
    color: #fff;
    border-radius: 50px;
    border: none;
    outline: none;
  }
</style>
