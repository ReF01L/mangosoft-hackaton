<template>
  <div class="rating">
    <h2 class="rating-title">Рейтинг репетитора</h2>
    <div class="rating__stars">
      <span>9.4</span>
      <el-rate
        v-model="value2"
        :colors="colors">
      </el-rate>
    </div>
    <span class="rating-students">25 студентов</span>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        value2: null,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900']
      }
    }
  }
</script>

<style lang="scss" scoped>
  .rating {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    background: #FDFDFD;
    box-shadow: 0 4px 10px #CBC09F;
    border-radius: 10px;
    padding: 35px;
    width: 50%;
    @media screen and (max-width: 1300px){
      padding: 10px;
      margin-right: 30px;
      margin-top: 20px;
      @media (max-width: 1000px){
        display: none;
      }
    }
    &-title {
      color: #000;
      font-size: 28px;
      font-weight: bold;
    }

    &__stars {
      display: flex;
      justify-content: flex-start;
      align-items: center;

      & span {
        padding-right: 5px;
        font-size: 24px;
        font-weight: 600;
      }
    }

    &-students {
      font-size: 18px;
      color: #333333;
    }
  }
</style>
