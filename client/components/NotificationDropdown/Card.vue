<template>
  <div class="card">
    <div class="card-title" @click="DialogVisible = true">{{title}}</div>
    <div class="card-content" @click="DialogVisible = true">
      {{description.length > 50 ? (description.slice(0, 50) + '...') : description}}
    </div>

    <el-dialog class="dialog" v-if="type === 'mark_teacher'"
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
<!--        <button class="content-remove" @click="readNotification">Прочитано</button>-->
      </div>
    </el-dialog>
    <el-dialog class="dialog" v-if="type === 'success_payment' || type==='failed_payment'"
               :visible.sync="DialogVisible"
               width="45%">
      <div class="logo">
        <img src="/logo.png" alt="">
      </div>
      <div class="content">
        <div class="content-title">{{title}}</div>
        <div class="content-body">{{description}}</div>
        <div class="content-error">Возникло недопонимание?</div>
        <div class="content-error">Напишите нам <span>helper@mail.ru</span></div>
<!--        <button class="content-remove" @click="readNotification">Прочитано</button>-->
      </div>
    </el-dialog>
  </div>
</template>

<script>
  import {mapMutations} from "vuex";

  export default {
    name: "Card",
    data() {
      return {
        DialogVisible: false,
        value: null,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900'],
      }
    },
    props: {
      title: String,
      description: String,
      type: String,
      id: Number
    },
    methods: {
      ...mapMutations('cards', ['readNotification']),
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
    &-remove {
      padding: 5px;
      margin: 15px;
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
      margin: auto auto 10px;
    }

    &:last-child {
      margin: 10px auto auto;
    }

    &-title {
      font-family: 'Graphik', sans-serif;
      color: #3F3D56;
      font-weight: 600;
      font-size: 16px;
      padding-bottom: 8px;
      width: 100%;
    }

    &-content {
      font-family: 'Graphik', sans-serif;
      width: 100%;
      font-size: 14px;
      color: #000000;
    }
  }
</style>
