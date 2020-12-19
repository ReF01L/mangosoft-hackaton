<template>
  <div class="card">
    <div class="card__content">
      <h2 class="card__content-title">{{title}}</h2>
      <div class="card__content-rating">{{rating}}</div>
      <div class="card__content-name">{{name}}</div>
      <div class="card__content-body">{{body.length > 50 ? body.slice(0, 50 - 3) + '...' : body}}</div>
    </div>
    <button class="card-btn">Записаться на курс</button>
  </div>
</template>

<script>
  export default {
    name: "Rec",
    props: {
      body: String,
      name: String,
      title: String,
      rating: Float32Array
    },
  }
</script>

<style lang="scss" scoped>
  .card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
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

      @media screen and (max-width: 1420px){
        padding: 5px 20px 5px;
      }

      &-body {
        padding: 15px 0;
        @media screen and (max-width: 1420px){
          display: none;
        }
      }

      &-title {
        font-size: 24px;
        font-weight: bold;
        word-break: break-word;
        width: 100%;
        @media screen and (max-width: 1650px){
          font-size: 18px;
          @media screen and (max-width: 1420px){
            font-size: 14px;
          }
        }
      }

      &-rating {
        @media screen and (max-width: 1420px){
          display: none;
        }
        padding: 5px 0;
        &:after {
          content: "\2B50";;
          margin-left: 5px;
        }
      }

      &-name {
        padding: 10px 0;
      }
    }

    &-btn {
      background: #FFCC33;
      color: #000;
      border-radius: 30px;
      padding: 15px 0;
      width: 70%;
      border: none;
      outline: none;
      font-weight: 500;
      font-size: 14px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px auto 20px;
      transition: 0.5s;

      @media screen and (max-width: 1420px){
        font-size: 10px;
        padding: 5px;
        margin: 0 auto 10px;
      }
      &:hover {
        cursor: pointer;
        width: 80%;
        transition: 0.5s;
      }
    }
  }
</style>
