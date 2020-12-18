<template>
  <div class="info">
    <h2 class="info-title">Романенкова Людмила</h2>
    <dropdown :options="arrayOfObjects"
              :selected="object"
              v-on:updateOption="methodToRunOnSelect"
              :placeholder="'Select an Item'"
              :closeOnOutsideClick="true">
    </dropdown>
  </div>
</template>

<script>
  import Dropdown from '../Dropdown'

  export default {
    name: "index",
    data() {
      return {
        arrayOfObjects: [{name: 'Репетитор'}, {name: 'Студент'}],
        object: {
          name: 'Студент',
        }
      }
    },

    components: {
      'dropdown': Dropdown,
    },

    methods: {
      methodToRunOnSelect(payload) {
        this.object = payload;
      }
    }
  }
</script>

<style lang="scss" scoped>
  .info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    background: #FDFDFD;
    box-shadow: 0 4px 10px #CBC09F;
    border-radius: 10px;
    &-title {
      font-size: 28px;
      font-weight: bold;
      padding: 10px 30px 30px 70px;
    }
  }
</style>
