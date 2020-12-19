<template>
  <div class="courses">
    <div class="courses__title" @click="drop_menu">
      <h2 class="courses__title-title">Список курсов</h2>
      <img class="courses__title-img" :class="{active: Active}" src="/up_arrow.png" alt="">
    </div>
    <div class="content" :class="{active: Active}">
      <Course class="content__course" v-for="i in 3"/>
    </div>
  </div>
</template>

<script>
  import Course from "./Course";

  export default {
    name: "index",
    components: {
      Course
    },
    data() {
      return {
        Active: false
      }
    },
    methods: {
      drop_menu() {
        this.Active = !this.Active
      }
    }
  }
</script>

<style lang="scss" scoped>
  .courses {
    width: 100%;
    & .content{
      width: 100%;
      height: 50vh;
      opacity: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      margin-top: 20px;
      transition: 0.6s;
      overflow: hidden;
      &:hover {
        cursor: pointer;
      }
      &.active {
        max-height: none;
        opacity: 1;
        transition: 1.2s;
      }
    }

    &__title {
      display: flex;
      justify-content: flex-start;
      align-items: center;

      &:hover {
        cursor: pointer;
      }

      &-title {
        font-size: 40px;
        font-weight: bold;
        margin-right: 16px;
      }

      &-img {
        transition: 0.5s;
        &.active {
          transform: rotateX(180deg);
        }
      }
    }
  }
</style>
