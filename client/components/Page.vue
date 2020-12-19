<template>
  <div class='Page'>
    <Header/>
    <slot/>
    <Footer/>
    <transition name='fade'>
      <Overlay v-if='$store.state.modals.auth'>
        <AuthForm/>
      </Overlay>
    </transition>
    <transition name='fade'>
      <Overlay v-if='$store.state.modals.register'>
        <SignUpForm/>
      </Overlay>
    </transition>

  </div>
</template>

<script>
import Overlay from "~/components/Overlay";
import AuthForm from "~/components/StepsForm/AuthForm";
import Header from "~/components/Header";
import Footer from "~/components/Footer";
import SignUpForm from "~/components/StepsForm/SignUpForm";

export default {
  name: "Page",
  data() {
    return {}
  },
  components: {AuthForm, Overlay, Header, Footer, SignUpForm}
}

</script>

<style lang='scss' scoped>


.Page {

}

</style>
<style lang='scss'>


.fade-enter-active, .fade-leave-active {
  transition: opacity .15s;
}

.fade-enter, .fade-leave-to {
  transition: opacity .1s;
  opacity: 0;
}

</style>
