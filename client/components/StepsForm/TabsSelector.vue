<template>
  <div class='TabsSelector'>

    <div class='tabs'>
      <div class='tab' v-for='name in ["Дизайн", "Математический анализ"]'>
        {{ name }}
        <div class='tab-icon'/>
      </div>

    </div>
    <div class='field'>
      <input placeholder='Поиск' class='input'/>
      <div class='input-icon'/>

      <div class='selector'>
        <Close :onclose='() => {this.open = false}'/>
        <div class='smol-title'>
          Рекомендуем
        </div>

        <div class='tabs'>
          <div class='tab' v-for='name in ["Дизайн", "Математический анализ"]'>
            {{ name }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Close from "~/components/StepsForm/Close";

export default {
  name: "TabsSelector",
  components: {Close},
  data() {
    return {
      open: false
    }
  }
}
</script>

<style scoped lang='scss'>

.TabsSelector {

}

.tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 30px;

  .tab {
    height: 32px;
    padding: 8px 35px;
    display: flex;
    align-items: center;
    gap: 10px;

    border: 1px solid #C4C4C4;
    box-sizing: border-box;
    border-radius: 10px;


    font-size: 14px;
    line-height: 15px;

    color: #717171;


  }

  .tab-icon {
    width: 22px;
    height: 16px;
    background: url("../../static/tab-del.svg");
    background-size: contain;
    cursor: pointer;

    &:hover {

      filter: brightness(.5);
    }
  }

}

.field {
  position: relative;


  .input {
    width: 100%;
    height: 52px;

    border: 1px solid #BCBCBC;
    box-sizing: border-box;
    border-radius: 100px;
    padding: 0 32px;
  }

  .input-icon {
    width: 21px;
    height: 21px;
    background-image: url("../../static/search.svg");
    position: absolute;
    right: 30px;
    top: calc(50% - 10px);
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  .selector {
    position: absolute;
    left: 0;
    right: 0;
    top: 100%;

    background: #FDFDFD;
    box-shadow: 0px 4px 10px #CBC09F;
    border-radius: 10px;
    padding: 11px 15px;
    min-height: 253px;
  }
}

.smol-title {
  font-weight: 600;
  font-size: 18px;
  line-height: 30px;
  color: #333333;
  margin-bottom: 16px;
}

</style>
