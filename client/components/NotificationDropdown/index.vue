<template>
  <div class="wrapper">
    <div class="cards">
      <Card v-for="i in 5" @click="DialogVisible=true"/>
    </div>
    <div class="read">
      Пометить всё прочитанным
    </div>
  </div>
</template>

<script>
  import Card from "./Card";
  export default {
    name: "index",
    components: {Card},
    data() {
      return {
        DialogVisible: false
      }
    }
  }
</script>

<style lang="scss" scoped>
.wrapper {
  position: absolute;
  right: 0;
  top: 90%;
  background: #FDFDFD;
  border-radius: 10px;
  box-shadow: 0 4px 10px #CBC09F;
  padding: 20px 25px;
  .cards {
    max-height: 320px;
    overflow-y: auto;
  }
  .read {
    margin: 20px 0 0;
    color: #3F3D56;
    font-size: 16px;
    &:hover {
      text-decoration: underline;
    }
  }
}
</style>
