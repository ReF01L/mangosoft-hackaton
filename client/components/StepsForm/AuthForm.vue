<template>
  <div class='AuthForm'>
    <div class='close' @click='$store.commit("modals/setRegister", false)'/>


    <div v-if='step === 0' class='step first'>
      <div class='logo'/>

      <div class='form auth'>
        <div class='fields'>
          <TextField :required='true' label='Логин'/>
          <TextField label='Пароль' type='password'/>
        </div>

        <div class='button' @click='$store.commit("modals/setRegister", false)'>
          Войти
        </div>
        <div class='link' @click='step = 2'>
          Регистрация
        </div>
      </div>
    </div>

    <div v-if='step === 1'>
      <Steps/>


    </div>


  </div>

</template>

<script>
import Steps from "./Steps";
import Logo from "~/components/Logo";
import TextField from "~/components/StepsForm/TextField";

export default {
  name: "AuthForm",
  components: {TextField, Logo, Steps},
  data() {
    return {
      step: 0,
    }
  }
}
</script>

<style scoped lang='scss'>


.AuthForm {
  width: 720px;
  max-width: 100%;
  background: #FFFFFF;
  border-radius: 16px;
  position: relative;
  padding-bottom: 64px;

  .button {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #FFCC33;
    border-radius: 32px;

    font-weight: 500;
    font-size: 14px;
    height: 46px;
    width: 100%;
    cursor: pointer;
  }

  .link {

    font-weight: 500;
    font-size: 14px;
    line-height: 14px;
    margin-top: 16px;
    text-align: center;
    cursor: pointer;
  }

  .step {

    &.first {
      display: flex;
      align-items: center;
      flex-direction: column;
    }


  }

  .form {
    &.auth {
      width: 240px;

      .fields {
        display: grid;
        grid-gap: 25px;
        margin-bottom: 45px;

      }
    }
  }


  .logo {
    width: 309px;
    height: 81px;
    background-image: url("../../static/logo.svg");

    margin-bottom: 31px;
    margin-top: 48px;
  }

  .close {
    position: absolute;
    width: 17px;
    height: 17px;
    background-image: url("../../static/close.svg");
    box-sizing: content-box;
    background-size: 17px;
    padding: 17px 20px;
    background-position: center;
    background-repeat: no-repeat;
    right: 0;
    top: 0;
    cursor: pointer;
    transition: transform .2s, filter .2s;

    &:hover {
      transform: scale(1.2);
      filter: brightness(.5);
    }


  }

}


</style>
