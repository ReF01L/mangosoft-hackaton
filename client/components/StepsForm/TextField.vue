<template>
  <label class='TextField'>
    <div class='label'>
      {{ label }}
    </div>
    <div class='field'>
      <input :placeholder='placeholder' :type='show ? "text" : type' :class='{input: true, required}'>
      <div
        @click='show = !show'
        v-if='type === "password"'
        :class='{show: true, active: show}'
      />
    </div>
  </label>
</template>

<script>
export default {
  props: {
    label: String,
    type: String,
    placeholder: String,
    required: Boolean
  },
  data() {
    return {
      show: false
    }
  },
  name: "TextField"
}
</script>

<style scoped lang='scss'>

.TextField {
  display: block;


  .show {
    position: absolute;
    right: 10px;
    top: 0;

    background-image: url("../../static/show.svg");
    width: 20px;
    height: 20px;
    cursor: pointer;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform .2s;
    top: calc(50% - 9px);


    &:hover {
      transform: scale(1.2);
    }

    &:active {
      transform: scale(1.5);

    }

    &.active {
      background-image: url("../../static/hide.svg");
    }
  }

  .label {
    font-size: 15px;
    line-height: 17px;
    margin-bottom: 15px;
  }

  .field {

    position: relative;

  }

  width: 100%;

  .input {
    width: 100%;
    padding: 0 10px;

    height: 48px;
    border: 1px solid #BCBCBC;
    box-sizing: border-box;
    border-radius: 4px;

    &[type='password'] {
      color: #FFCC33;
    }

    &.required{
      &:after{
        content: '*';
        color: #FFCC33;

      }
    }
  }
}

</style>
