<template>
  <div class="grid">
    <div class="date">
      <div class="date-dates">
        <Date v-for="(date, i) in dates" :key="i"/>
      </div>
    </div>
    <div class="cals">
      <GridCard v-for="(cal, i) in cals" :key="i"/>
    </div>
  </div>
</template>

<script>
  import GridCard from "./GridCard";
  import Date from "./Date"

  export default {
    name: "Grid",
    components: {GridCard, Date},
    data() {
      return {
        dates: [1, 2, 3, 4, 5, 6, 7],
        cals: [1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7]
      }
    }
  }
</script>

<style lang="scss" scoped>
  .grid {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;

    & .date {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;

      &-left {

      }

      &-dates {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
      }

      &-right {
        transform: rotateY(180deg);
      }
    }

    & .cals {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
  }
</style>
