<template>
  <Page pageTitle='Главная'>
    <MainPage/>
  </Page>
</template>

<script>
import MainPage from '../components/MainPage/index'
import Page from "~/components/Page";

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/ru-RU'
import Vue from 'vue'
import apiCall from "@/scripts/api";

Vue.use(Element, {locale})
Vue.use(ElementUI)

export default {
  components: {MainPage, Page},
  mounted() {
    if (this.$route?.query?.token)
      apiCall({url: 'auth/confirm', data: {token: this.$route.query.token}, method: 'get'})
        .then(() => {
          alert('Ваш Email успешно подтвержден!')
        })
        .catch(console.error)
  }
}
</script>

<style>
</style>
