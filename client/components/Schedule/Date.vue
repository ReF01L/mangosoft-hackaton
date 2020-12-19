<template>
  <div class="date">
    {{`${date.getDay()} ${date.toLocaleString('default', { month: 'short' })}, ${days[date.getDay()]}`}}
  </div>
</template>

<script>
  export default {
    name: "Date",
    data() {
      return {
        days: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        date: new Date()
      }
    }
  }
</script>

<style lang="scss" scoped>
  .date {
    color: #A6A08E;
    font-size: 28px;
    padding: 5px 15px;
  }
</style>
