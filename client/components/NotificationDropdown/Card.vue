<template>
  <div class="card">
    <div class="card-title" @click="DialogVisible=true">Оцените занятие!</div>
    <div class="card-content" @click="DialogVisible=true">В случае возникновения недопонимания обратитесь в поддержку.
    </div>

    <el-dialog class="dialog" v-if="type === 1"
               :visible.sync="DialogVisible"
               width="45%">
      <div class="logo">
        <img src="/logo.png" alt="">
      </div>
      <div class="content">
        <div class="content-title">Оцените занятие с репетитором</div>
        <el-rate class="content-rating"
                 v-model="value"
                 :colors="colors">
        </el-rate>
        <button class="content-btn">Оценить</button>
        <div class="content-miss">Возникло недопонимание?</div>
        <div class="content-write">Напишите нам <span>helper@mail.ru</span>!</div>
      </div>
    </el-dialog>
    <el-dialog class="dialog" v-if="type === 2"
               :visible.sync="DialogVisible"
               width="45%">
      <div class="logo">
        <img src="/logo.png" alt="">
      </div>
      <div class="content">
        <div class="content-title">Оплата прошла успешно</div>
        <div class="content-body">Ваше занятие запланированно <span>25 декабря в 18:20</span>. Контакты для связи с преподавателем
          отправлены Вам на почту! Продуктивного дня!
        </div>
        <div class="content-error">Возникло недопонимание?</div>
        <div class="content-error">Напишите нам <span>helper@mail.ru</span></div>
      </div>
    </el-dialog>
    <el-dialog class="dialog" v-if="type === 3"
               :visible.sync="DialogVisible"
               width="45%">
      <div class="logo">
        <img src="/logo.png" alt="">
      </div>
      <div class="content">
        <div class="content-title">Оплата не прошла :(</div>
        <div class="content-body">Повторите попытку позднее!
        </div>
        <div class="content-error">Возникло недопонимание?</div>
        <div class="content-error">Напишите нам <span>helper@mail.ru</span></div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
  export default {
    name: "Card",
    data() {
      return {
        DialogVisible: false,
        type: 3,
        value: null,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900'],
      }
    }
  }
</script>

<style lang="scss" scoped>
  .logo {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .content {
    padding: 70px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    &-body {
      font-size: 20px;
      text-align: center;
      padding: 20px 40px;
      word-break: break-word;
    }
    &-error {
      margin: 5px auto;
      font-size: 18px;
      color: #3F3D56;
      & span {
        text-decoration: underline;
      }
    }
    &-title {
      padding: 20px;
      font-size: 32px;
      color: #3F3D56;
    }
    &-btn {
      font-size: 14px;
      color: #000000;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #FFCC33;
      border-radius: 32px;
      padding: 16px;
      width: 30%;
      transition: 0.3s;
      margin: 15px 0;

      &:hover {
        width: 40%;
        transition: 0.3s;
      }
    }
    &-miss, &-write {
      color: #3F3D56;
      font-size: 24px;

      & span {
        text-decoration: underline;

        &:hover {
          cursor: pointer;
        }
      }
    }
  }
  .card {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    padding: 15px;
    background: rgba(255, 204, 51, 0.4);
    border-radius: 10px;
    width: 50vh;
    margin: 10px auto;

    &:hover {
      cursor: pointer;
    }

    &:first-child {
      margin: auto;
    }

    &:last-child {
      margin: auto;
    }

    &-title {
      color: #3F3D56;
      font-weight: 600;
      font-size: 16px;
      padding-bottom: 8px;
      width: 100%;
    }

    &-content {
      width: 100%;
      font-size: 14px;
      color: #000000;
    }
  }
</style>
