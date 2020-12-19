<template>
  <div class="organization">
    <h2 class="organization-title">Данные организации</h2>
    <h2 class="organization-name">Клуб юных спелеологов</h2>
    <div class="organization__stars">
      <span>9.4</span>
      <el-rate
        v-model="value2"
        :colors="colors">
      </el-rate>
    </div>
    <div class="organization__body">
      Выщелачивание, согласно традиционным представлениям, одномерно отталкивает упруго-пластичный солеперенос.
      Плодородие, в сочетании с традиционными агротехническими приемами, сжимает лесной ортштейн.
    </div>
    <div class="organization-show">Показать ещё</div>
    <button class="organization-btn">Добавить курс</button>
  </div>
</template>

<script>
  export default {
    name: "OrganizationInfo",
    data() {
      return {
        value1: null,
        value2: null,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900'],
      }
    }
  }
</script>

<style lang="scss" scoped>
  .organization {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-end;
    background: #FDFDFD;
    box-shadow: 0 4px 10px #CBC09F;
    border-radius: 10px;
    padding: 10px 32px 32px;
    width: 80%;
    min-width: 300px;
    margin: auto 0 auto auto;
    &-show {
      text-decoration: underline;
      font-size: 14px;
      margin: 40px 0;
      &:hover {
        cursor: pointer;
      }
    }
    &-btn {
      background: #FFCC33;
      border-radius: 32px;
      font-size: 14px;
      font-weight: 500;
      padding: 15px 80px;
      transition: 0.3s;
      &:hover {
        padding: 15px 90px;
        transition: 0.3s;
      }
    }
    &-title {
      font-size: 28px;
      font-weight: bold;
      color: #000;
      margin: 5px 0 15px;
    }
    &-name {
      font-size: 24px;
      color: #000;
    }
    &__stars {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      font-size: 24px;
      font-weight: 600;
      margin: 15px 0;
      & span {
        margin-right: 5px;
      }
    }
    &__body {
      text-align: right;
    }
  }
</style>
