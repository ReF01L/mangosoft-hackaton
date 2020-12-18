<template>
  <div class='Steps'>
    <div class='step'>1</div>
    <div class='step'>2</div>
    <div class='step'>3</div>


  </div>
</template>

<script>
export default {
  name: "Steps"

}
</script>

<style lang='scss' scoped>

.Steps {

  display: flex;

  .step {
    flex: 0;
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


    &.active{
      background: #FFCC33;
      color: black;
    }

    &:after {
      display: block;
      flex: 1 1 auto;
      width: 111px;
      height: 0px;
      left: 790px;
      top: 1996px;

      border: 1px solid #FFCC33;

    }


  }

}

</style>
