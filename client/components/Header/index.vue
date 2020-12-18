<template>
  <header>
    <div class="logo"></div>
    <div class="profile-image">
    </div>
  </header>
</template>

<script>
  export default {
    name: "index"
  }
</script>

<style lang="scss" scoped>
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15em;
    background: #cb9c3e;
  }
  .logo {
    background-color: #ccc;
    padding: 50px 150px;
  }
  .profile-image {
    border-radius: 50px;
    background-color: #ccc;
    padding: 50px;
  }
</style>
