<template>
    <div class="card">
      <div class="card-title">Мы куртые</div>
      <div class="card__content">
        Контент?
      </div>
    </div>
</template>

<script>
    export default {
        name: "index"
    }
</script>

<style lang="scss" scoped>
  .card {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    &-title {
      font-weight: 700;
      font-size: 24px;
      padding: 15px 0;
    }
    &__content {
      width: 350px;
      height: 300px;
      background-color: #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
</style>
