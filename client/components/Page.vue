<template>
  <div class='Page'>
    <Header/>
    <slot/>
    <Footer/>
    <Overlay v-if='registerModal'>
      <AuthForm/>
    </Overlay>
  </div>
</template>

<script>
import Overlay from "~/components/Overlay";
import AuthForm from "~/components/StepsForm/AuthForm";
import Header from "~/components/Header";
import Footer from "~/components/Footer";

export default {
  name: "Page",
  async asyncData({store}) {
    return {
      registerModal: store.state.registerModal,
    }
  },
  data() {
    return {
      registerModal: false,
    }
  },
  components: {AuthForm, Overlay}
}
</script>

<style lang='scss' scoped>


.Page {

}

</style>
<style lang='scss'>


</style>
