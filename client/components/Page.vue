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
import {mapActions} from "vuex";

export default {
  name: "Page",

  data() {
    return {}
  },
  methods: mapActions('user', ['updateProfile']),
  props: {
    pageTitle: String
  },
  beforeMount() {
    this.updateProfile()
  },
  components: {AuthForm, Overlay, Header, Footer, SignUpForm},
  head() {
    return {
      title: this.pageTitle + " - MangoEdu",
      link: [{rel: 'icon', type: 'image/x-icon', href: '/icon.png'}],
    }
  }
}

</script>

<style lang='scss' scoped>


.Page {

}

</style>
