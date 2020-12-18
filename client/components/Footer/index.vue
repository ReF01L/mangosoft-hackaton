<template>
  <footer>
    <div class="info">
      <div class="info__logo"></div>
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
      background-color: #ccc;
      padding: 50px 150px;
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
    padding: 10px 25px;
    font-weight: 700;
    font-size: 20px;
    background-color: transparent;
    border-radius: 20px;
    border: 1px solid black;
    outline: none;
  }
</style>
