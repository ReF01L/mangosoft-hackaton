<template>
  <div class='Overlay'>
    <slot/>
  </div>
</template>

<script>
export default {
  name: "Overlay"
}
</script>

<style scoped>

.Overlay {
  position: fixed;
  background: rgba(0, 0, 0, 0.5);
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: flex;
  align-items: center;

}

</style>
