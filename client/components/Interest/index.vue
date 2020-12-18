<template>
  <div class="card">
    <h2 class="card-title">Мои интересы</h2>
    <div class="card__interests">
      <div class="card__interests-box">
        <label v-for="(item, i) in checkboxes" :key="i" class="custom-checkbox">
          <input type="checkbox" value="value-1">
          <span>{{item.title}}</span>
        </label>
      </div>
      <span class="card__interests-show">Показать ещё</span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "index",
    data() {
      return {
        checkboxes: [{title: 'Математический анализ'}, {title: 'Веб-разработка'}, {title: 'Дизайн'}, {title: 'Анализ данных'}],
        checked: []
      }
    }
  }
</script>

<style lang="scss" scoped>
  .custom-checkbox {
    padding: 7px 0;
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
