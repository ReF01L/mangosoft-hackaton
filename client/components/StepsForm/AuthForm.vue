<template>
  <div class='AuthForm'>
    <div class='close' @click='$store.commit("modals/setAuth", false)'/>

    <div class='step first'>
      <div class='logo'/>
      <span class="error">{{sendError}}</span>
      <div class='form auth'>
        <div class='fields'>
          <TextField required label='Логин' v-model='user.login'/>
          <TextField label='Пароль' type='password' v-model='user.password'/>
        </div>

        <div class='button' @click='send()'>
          Войти
        </div>
        <div class='link' @click='$store.commit("modals/setRegister", true)'>
          Регистрация
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  import Steps from "./Steps";
  import Logo from "~/components/Logo";
  import TextField from "~/components/StepsForm/TextField";
  import {mapActions, mapGetters} from "vuex";

  export default {
    name: "AuthForm",
    components: {TextField, Logo, Steps},
    data() {
      return {
        step: 0,
        user: {
          login: '',
          password: ''
        }
      }
    },
    methods: {
      send() {
        if (this.user.login !== '' && this.user.password !== '')
          this.signIn(this.user)
        else
          this.$store.commit('user/setError', 'Заполните все поля!')
      },
      ...mapActions('user', ['signIn'])
    },
    computed: mapGetters('user', ['sendError'])
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

    .error {
      color: #ff4500;
      padding: 0 0 15px;
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
