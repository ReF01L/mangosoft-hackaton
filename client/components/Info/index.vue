<template>
  <div class="info">
    <h2 class="info-title">Романенкова Людмила</h2>
    <el-select v-model="value" :placeholder="options[0].label" class="dropdown" popper-class="tmp">
      <el-option
        v-for="item in options"
        :key="item.value"
        :label="item.label"
        :value="item.value"
        :change="setRole()">
      </el-option>
    </el-select>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        options: [{value: '0', label: 'Студент'}, {value: '1', label: 'Репетитор'},
          {value: '2', label: 'Представитель организации'}],
        value: '0'
      }
    },
    methods: {
      setRole() {
        console.log(this.value)
        this.$store.commit('user/set_role', this.value)
      }
    }
  }
</script>

<style lang="scss" scoped>
  .tmp {
    border: none !important;
  }

  .el-select-dropdown__item {
    &.selected {
      background: rgba(255, 204, 51, 0.4);
      font-weight: 500;
      font-size: 14px;
      color: #000000;
    }
  }

  .info {
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #FDFDFD;
    box-shadow: 0 4px 10px #CBC09F;
    border-radius: 10px;
    width: 60%;
    min-width: 450px;
    @media screen and (max-width: 1260px) {
      min-width: auto;
      width: 100%;
      @media screen and (max-width: 915px) {
        align-items: center;
        min-width: 125px;
      }
    }

    &-title {
      font-size: 28px;
      font-weight: bold;
      padding: 10px 30px 30px 70px;
      @media screen and (max-width: 915px) {
        font-size: 16px;
        padding: 5px;
      }
    }
  }
</style>
