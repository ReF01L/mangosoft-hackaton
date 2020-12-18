<template>
  <div class="card">
    <div class="card__content">
      <h2 class="card__content-title">Математическое и компьютерное моделирование</h2>
      <div class="card__content-rating">9.4</div>
      <div class="card__content-name">Физмат Физматович Физматов</div>
      <div class="card__content-body">{{body.length > 50 ? body.slice(0, 50 - 3) + '...' : body}}</div>
    </div>
    <button class="card-btn">Записаться на курс</button>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequatur dicta\n' +
          'ipsum laudantium nihil officia sint. Deleniti iure laboriosam rerum sed suscipit vero voluptates voluptatum.'
      }
    }
  }
</script>

<style lang="scss" scoped>
  .card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    max-width: 350px;
    border-radius: 10px;
    border: 1px solid #A6A08E;
    background: #FDFDFD;
    margin: 35px 15px;

    &:first-child {
      margin: auto;
    }

    &__content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
      &-body {
        padding: 15px;
      }

      &-title {
        font-size: 24px;
        font-weight: bold;
        word-break: break-word;
        padding: 15px;
      }

      &-rating {
        padding: 0 15px;

        &:after {
          content: "\2B50";;
          margin-left: 5px;
        }
      }

      &-name {
        padding: 15px;
      }
    }

    &-btn {
      background: #FFCC33;
      color: #000;
      border-radius: 30px;
      padding: 15px 30px;
      border: none;
      outline: none;
      font-weight: 500;
      font-size: 14px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px auto 20px;
      transition: 0.5s;

      &:hover {
        cursor: pointer;
        padding: 15px 55px;
        transition: 0.5s;
      }
    }
  }
</style>
