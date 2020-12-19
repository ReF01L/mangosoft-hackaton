<template>
  <div class="info">
    <h2 class="info-title">Романенкова Людмила</h2>
    <div class="dropdown">
      <div class="dropdown-title" @click="isActive = !isActive">
        {{label}}
        <img src="/arrow.png" alt="">
      </div>
      <div class="dropdown__list" :class="{active: isActive}">
        <div v-for="item in options" class="elem" :class="{active: item.value === value}" @click="setRole(item.value)">{{item.label}}</div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        options: [{value: '0', label: 'Студент'}, {value: '1', label: 'Репетитор'},
          {value: '2', label: 'Представитель организации'}],
        value: '0',
        label: 'Студент',
        isActive: false
      }
    },
    methods: {
      setRole(value) {
        this.value = value
        this.label = this.options[this.value].label;
        this.$store.commit('user/set_role', this.value)
      }
    }
  }
</script>

<style lang="scss" scoped>
  .dropdown {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    position: relative;
    &-title {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      & img {
        padding: 15px;
        transform: rotateZ(-90deg);
      }
      &:hover {
        cursor: pointer;
      }
    }
    &__list {
      position: absolute;
      top: 100%;
      width: 15vw;
      display: flex;
      flex-direction: column;
      align-self: flex-end;
      justify-content: flex-end;
      margin: 5px 15px;
      opacity: 0;
      z-index: -1;
      transition: 0.5s;
      background: #FDFDFD;
      border-radius: 10px;
      box-shadow: 0 4px 10px #CBC09F;
      &.active {
        opacity: 1;
        z-index: 10;
        transition: 0.5s;
      }
      .elem {
        text-align: right;
        padding: 10px 5px;
        width: 100%;
        &.active {
          background: rgba(255, 204, 51, 0.4);
        }
        &:hover {
          cursor: pointer;
        }
      }
    }
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
    align-items: flex-end;
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
