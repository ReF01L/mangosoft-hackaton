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

Vue.use(Element, {locale})
Vue.use(ElementUI)

export default {
  components: {MainPage, Page}
}
</script>

<style>
</style>
