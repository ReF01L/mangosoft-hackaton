<template>
  <div class='AuthForm'>


    <div v-if='step === 0'>
      <img class='logo' src='static/logo.svg'/>


    </div>
    <div>
      <Steps/>


    </div>


  </div>

</template>

<script>
import Steps from "./Steps";
import Logo from "~/components/Logo";

export default {
  name: "AuthForm",
  components: {Logo, Steps},
  data() {
    return {
      step: 0,
    }
  }
}
</script>

<style scoped lang='scss'>


.AuthForm {

  .logo {

  }

}


</style>
