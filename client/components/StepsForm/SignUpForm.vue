
<template>
  <div class='AuthForm'>
    <div class='close' @click='$store.commit("modals/setRegister", false)'/>


    <div v-if='step === 0' class='step first'>
      <div class='steps'>
        <Steps :count='3' :active='1'/>
      </div>

      <div class='form register'>
        <div class='title'>
          Укажите свои данные
        </div>

        <div class='fields'>
          <TextField required label='Имя'/>
          <TextField required label='Фамилия'/>
          <TextField required label='Номер телефона'/>
          <TextField required label='E-mail'/>
        </div>

        <div class='title'>
          Введите логин и пароль
        </div>
        <div class='fields'>
          <TextField required label='Логин'/>
          <TextField required label='Пароль'/>
        </div>
        <label class='checkbox'>
          <input type='checkbox' class='checkbox-input'/>
          <div class='checkbox-icon'/>
          <span>Я согласен на <a>обработку персональных данных</a></span>
        </label>

        <div class='button next' @click='step = 1'>
          Далее
        </div>
      </div>
    </div>


    <div v-if='step === 1' class='step second'>
      <div class='steps'>
        <Steps :count='3' :active='2'/>
      </div>

      <div class='form register'>
        <div class='title'>
          Укажите сферы интересов
        </div>
        <TabsSelector/>
        <div class='title'>
          Введите данные организации
        </div>
        <div class='fields'>
          <TextField label='Наименование' placeholder='ООО Школа математики'/>
          <TextField label='Что-то еще' placeholder='Я не знаю что это и сколько такого надо'/>
        </div>
        <div class='button next' @click='step = 2'>
          Далее
        </div>
      </div>
    </div>

    <div v-if='step === 2' class='step second'>
      <div class='logo'/>
      <div class='end-text'>
        <span>
          Для завершения регистрации подтвердите свой <b>E-mail!</b>
        </span>
      </div>

    </div>
  </div>
</template>

<script>
import Steps from "./Steps";
import Logo from "~/components/Logo";
import TextField from "~/components/StepsForm/TextField";
import TabsSelector from "~/components/StepsForm/TabsSelector";
// component is
export default {
  name: "AuthForm",
  components: {TabsSelector, TextField, Logo, Steps},
  data() {
    return {
      step: 0,
    }
  }
}
</script>

<style scoped lang='scss'>

.end-text {
  font-weight: 500;
  font-size: 24px;
  line-height: 36px;
  text-align: center;
  max-width: 472px;

}

.checkbox {
  display: flex;
  align-items: center;
  font-size: 16px;
  line-height: 18px;
  margin-top: 43px;

  a {
    border-bottom: 1px solid black;
  }

  .checkbox-input {
    position: absolute;
    opacity: 0;
  }


  .checkbox-icon {
    flex: none;
    width: 30px;
    height: 30px;
    border: 1px solid #BCBCBC;
    box-sizing: border-box;
    border-radius: 4px;
    margin-right: 18px;

  }

  .checkbox-input:checked + .checkbox-icon {
    background-repeat: no-repeat;
    background-position: center;
    background-size: 18px 14px;

    background-image: url("../../static/check.svg");
  }


}


.title {
  font-weight: 600;
  font-size: 24px;
  line-height: 30px;
  margin-bottom: 33px;
}

.AuthForm {
  width: 720px;
  max-width: 100%;
  background: #FFFFFF;
  border-radius: 16px;
  position: relative;
  padding-bottom: 64px;

  padding-top: 64px;

  .steps {
    width: 508px;
    margin: 0 auto;
  }

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

    &.next {
      background: #FFCC33;
      border-radius: 10px;
      font-size: 14px;
      line-height: 14px;
      width: fit-content;
      min-width: 180px;
      justify-self: flex-end;
      margin-left: auto;
    }
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

    display: flex;
    align-items: center;
    flex-direction: column;

    &.first {
    }


  }

  .form {
    &.register {
      width: 100%;
      padding: 0 33px;
      margin-top: 62px;


      .fields {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 25px;


        &:not(:last-of-type) {
          margin-bottom: 33px;
        }
      }


    }
  }


  .logo {
    width: 309px;
    height: 81px;
    background-image: url("../../static/logo.svg");

    margin-bottom: 31px;
    //margin-top: 48px;
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
