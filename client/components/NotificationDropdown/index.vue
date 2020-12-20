<template>
  <div class="wrapper">
    <div class="cards">
      <Card v-for="(card, i) in getNotifications" v-if="!card.read" :key="i"
            :title="card.title"
            :description="card.description"
            :type="card.type"
            :id="i"
      />
    </div>
    <div class="read" @click="readAllNotifications">
      Пометить всё прочитанным
    </div>
  </div>
</template>

<script>
  import Card from "./Card";
  import {mapGetters, mapMutations} from "vuex";

  export default {
    name: "index",
    components: {Card},
    computed: mapGetters('cards', ['getNotifications']),
    methods: mapMutations('cards', ['readAllNotifications'])
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
    z-index: 100;

    .cards {
      max-height: 320px;
      overflow-y: scroll;
    }

    .read {
      margin: 20px 0 0;
      color: #3F3D56;
      font-size: 16px;

      &:hover {
        cursor: pointer;
        text-decoration: underline;
      }
    }
  }
</style>
