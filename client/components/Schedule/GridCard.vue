<template>
  <div class="card">
    <div class="card-time">
      {{time.getHours() + ":" + (time.getMinutes().toString().length === 1 ? '0' + time.getMinutes() : time.getMinutes())}}
      -
      {{time.getHours() + ":" + (time.getMinutes().toString().length === 1 ? '0' + time.getMinutes() : time.getMinutes())}}
    </div>
    <div class="card-title">{{title}}</div>
  </div>
</template>

<script>
  export default {
    name: "GridCard",
    data() {
      return {
        time: new Date(),
        title: 'Математический анализ'
      }
    }
  }
</script>

<style lang="scss" scoped>
.card {
  border: 1px solid #A6A08E;
  padding: 15px 5px 5em;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  transition: 0.1s;
  &:hover {
    background-color: #C2FFF0;
    cursor: pointer;
    transition: 0.3s;
  }
  &-time {
    font-size: 20px;
    font-weight: bold;
  }
  &-title {
    color: #333;
    font-size: 16px;
    padding: 5px 0;
    word-break: break-word;
    max-width: 70%;
  }
}
</style>
