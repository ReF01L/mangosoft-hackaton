<template>
  <div class='Page'>
    <Header/>
    <slot/>
    <Footer/>
    <transition name='fade'>
      <Overlay v-if='$store.state.modals.register'>
        <AuthForm/>
      </Overlay>
    </transition>
  </div>
</template>

<script>
import Overlay from "~/components/Overlay";
import AuthForm from "~/components/StepsForm/AuthForm";
import Header from "~/components/Header";
import Footer from "~/components/Footer";

export default {
  name: "Page",
  data() {
    return {}
  },
  components: {AuthForm, Overlay, Header, Footer}
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
