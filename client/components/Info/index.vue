<template>
  <div class="info">
    <h2 class="info-title">Романенкова Людмила</h2>
    <el-select v-model="value" :placeholder="options[0].label" class="dropdown" popper-class="tmp">
      <el-option
        v-for="item in options"
        :key="item.value"
        :label="item.label"
        :value="item.value">
      </el-option>
    </el-select>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        options: [{value: 'Студент', label: 'Студент'}, {value: 'Репетитор', label: 'Репетитор'},
          {value: 'Представитель организации', label: 'Представитель организации'}],
        value: ''
      }
    },
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
