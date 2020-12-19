<template>

  <div class='close' @click='onclose()'/>
</template>

<script>
export default {
  name: "Close",
  props: ['onclose']
}
</script>

<style scoped lang='scss'>

.close {
  position: absolute;
  width: 17px;
  height: 17px;
  background-image: url("../../static/close.svg");
  box-sizing: content-box;
  background-size: 17px;
  padding: 17px 20px;
  background-position: center;
  background-repeat: no-repeat;
  right: 0;
  top: 0;
  cursor: pointer;
  transition: transform .2s, filter .2s;

  & :hover {
    transform: scale(1.2);
    filter: brightness(.5);
  }


}
</style>
