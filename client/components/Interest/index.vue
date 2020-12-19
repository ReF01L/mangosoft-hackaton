<template>
  <div class="card">
    <h2 class="card-title">Мои интересы</h2>
    <div class="card__interests">
      <div class="card__interests-box">
        <label v-for="item in current_list" :key="item.id" class="custom-checkbox">
          <input type="checkbox" :checked="checkboxes[item.id].checked" @click="checkboxes[item.id].checked = false">
          <span>{{item.title}}</span>
        </label>
      </div>
      <span class="card__interests-show" @click="all_list.length !== 0 ? isActive = !isActive : isActive = false">Показать ещё</span>
      <div class="card__interests__all" :class="{active: isActive}">
        <label v-for="item in all_list" :key="item.id" class="custom-checkbox">
          <input type="checkbox" :checked="checkboxes[item.id].checked"  @click="checkboxes[item.id].checked = true">
          <span>{{item.title}}</span>
        </label>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        checkboxes: [{id: 0, checked: true, title: 'Математический анализ'}, {id: 1, checked: true, title: 'Веб-разработка'},
          {id: 2, checked: true, title: 'Дизайн'}, {id: 3, checked: true, title: 'Анализ данных'}],
        isActive: false
      }
    },
    computed: {
      current_list() {
        return this.checkboxes.filter(el => el.checked)
      },
      all_list() {
        return this.checkboxes.filter(el => !el.checked)
      }
    }
  }
</script>

<style lang="scss" scoped>
  .custom-checkbox {
    padding: 7px 0;
    &:hover {
      cursor: pointer;
    }
    & > input {
      position: absolute;
      z-index: -1;
      opacity: 0;
      & + span::after {
        padding: 15px;
      }

      &:disabled + span::after {
        background-color: #e9ecef;
      }

      &:checked + span::after {
        border-color: #BCBCBC;
        background-color: transparent;
        background-image: url("/checked.png");
        border-radius: 4px;
      }
    }

    & > span {
      display: inline-flex;
      align-items: center;
      user-select: none;
      font-size: 16px;

      &::after {
        margin-left: 15px;
        content: '';
        display: inline-block;
        width: 1em;
        height: 1em;
        flex-shrink: 0;
        flex-grow: 0;
        border: 1px solid #adb5bd;
        border-radius: 0.25em;
        margin-right: 0.5em;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 50% 50%;
      }
    }
  }
  .card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #FDFDFD;
    box-shadow: 0 4px 10px #CBC09F;
    border-radius: 10px;
    padding: 20px 20px 20px 150px;
    &-title {
      font-weight: 700;
      font-size: 28px;
    }
    &__interests {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      position: relative;
      &__all {
        min-width: 50%;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        position: absolute;
        top: 100%;
        background: #FDFDFD;
        box-shadow: 0 4px 10px #CBC09F;
        border-radius: 10px;
        padding: 20px 0 20px 40px;
        opacity: 0;
        &.active {
          opacity: 1;
          transition: 0.5s;
          & label {
            display: block;
          }
        }
        & label {
          display: none;
        }
      }
      &-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
      }
      &-show {
        text-decoration: underline;
        font-size: 14px;
        padding: 5px;
        &:hover {
          cursor: pointer;
        }
      }
    }
  }
</style>
