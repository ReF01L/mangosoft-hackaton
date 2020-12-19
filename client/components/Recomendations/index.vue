<template>
  <div class="recs">
    <h2 class="hero-title">Вам может понравиться</h2>
    <div class="recommends">
      <Rec v-for="i in 2" :key="i"
           :name="'Физмат Физматович Физматов'"
           :rating="9.4"
           :body="'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequatur dicta ipsum laudantium nihil officia sint. Deleniti iure laboriosam rerum sed suscipit vero voluptates voluptatum.'"
           :title="'Математическое и компьютерное моделирование'"
      />
    </div>
  </div>
</template>

<script>
  import Rec from './Rec'
  export default {
    name: "index",
    components: {Rec}
  }
</script>

<style lang="scss" scoped>
  .recs {
    width: 50%;
    @media screen and (max-width: 1260px){
      display: none;
    }

    & h2 {
      font-weight: bold;
      font-size: 44px;
    }

    & .recommends {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 25px auto;
    }
  }
</style>
