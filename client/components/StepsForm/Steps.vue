<template>
  <div class='Steps'>
    <template v-for='n in count'>
      <div :class='{step:1, active: active+1 > n}'>{{ n }}</div>
      <div v-if='n !== count' class='delimiter'/>
    </template>
  </div>
</template>

<script>
export default {
  name: "Steps",
  props: {
    count: Number,
    active: Number,

  }

}
</script>

<style lang='scss' scoped>

.Steps {

  display: flex;

  width: 100%;
  align-items: center;

  .delimiter {

    content: '';
    display: block;
    flex: 1 1 auto;
    width: 111px;
    height: 1px;
    background-color: #FFCC33;
  }

  .step {

    flex: none;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    text-align: center;

    border: 1px solid #FFCC33;
    box-sizing: border-box;
    color: #FFCC33;
    font-style: normal;
    font-weight: normal;
    font-size: 26px;
    line-height: 48px;
    width: 48px;

    border-radius: 50%;


    &.active {
      background: #FFCC33;
      color: black;
    }

  }

}

</style>
