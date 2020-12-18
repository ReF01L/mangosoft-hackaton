<template>
  <header>
    <div class="logo">
      <img src="/logo.png" alt="">
    </div>
    <div class="profile-image">
      <img src="/i_people.png" alt="">
      <span>Войти</span>
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
    background: #fff;
  }
  .logo {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    border-radius: 50px;
    padding: 5px 10em 5px 10px;
    background: rgba(255, 255, 255, 0.4);
  }
  .profile-image {
    display: flex;
    justify-content: center;
    align-items: center;
    & img {
      border-radius: 50px;
      background-color: #FDFDFD;
      box-shadow: 0px 4px 10px #CBC09F;
      padding: 20px;
    }
    & span {
      color: black;
      font-size: 24px;
      margin: 20px;
    }
  }
</style>
