<template>
  <div class='Overlay'>
    <div class='content'>
      <div class='ctn'>
        <div class='item'>
          <slot/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Overlay"
}
</script>

<style scoped lang='scss'>

.Overlay {
  /* position: fixed;
   background: rgba(0, 0, 0, 0.5);
   top: 0;
   left: 0;
   bottom: 0;
   right: 0;
   display: flex;
   align-items: center;
   z-index: 100;
   justify-content: center;*/

  position: fixed;
  top: 0;
  left: 0;
  z-index: 100;
  bottom: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.5);
  width: 100%;
  height: 100%;
  overflow-y: auto;
  max-height: 100%;

  .content {
    display: table;
    width: 100%;
    height: 100%;
  }

  .ctn {
    position: relative;
    margin: 0 auto;
    width: fit-content;
    display: table-cell;
    vertical-align: middle;
  }

  .item {
    display: flex;
    justify-content: center;
  }

}

</style>
