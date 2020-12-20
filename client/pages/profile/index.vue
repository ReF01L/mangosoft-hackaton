<template>
  <Page pageTitle='Профиль'>
    <div class='content'>
      <div class='hero'>
        <Recomendations v-if='current_role === "STUDENT"'/>
        <RatingProfile v-else-if="current_role === 'TUTOR'" class='rating'/>
        <Courses v-else-if="current_role === 'ORGANIZATION'"/>
        <div class='right_side'>
          <Info/>
          <Interest v-if="current_role !== 'ORGANIZATION'"/>
          <div v-else class='body'>
            <OrganizationInfo/>
          </div>
        </div>
      </div>
      <Schedule v-if="current_role !== 'ORGANIZATION'">
        <TutorCalendar v-if="current_role !== 'TUTOR'"/>
        <ViewCalendar v-if="current_role !== 'STUDENT'"/>
      </Schedule>
    </div>
  </Page>
</template>

<script>
import Header from '~/components/Header'
import Footer from '~/components/Footer'
import Info from '~/components/Info'
import Recomendations from '~/components/Recomendations'
import Interest from '~/components/Interest'
import Schedule from '~/components/Schedule'
import Courses from '~/components/Courses'
import OrganizationInfo from "~/components/OrganizationInfo";
import RatingProfile from "~/components/RatingProfile";

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/ru-RU'
import Vue from 'vue'
import Page from "~/components/Page";

import {mapGetters} from 'vuex'
import TutorCalendar from "@/components/Calendar/TutorCalendar";
import ViewCalendar from "@/components/Calendar/ViewCalendar";

Vue.use(Element, {locale})
Vue.use(ElementUI)


export default {
  components: {
    OrganizationInfo,
    Header,
    Footer,
    Info,
    Recomendations,
    Interest,
    Schedule,
    Page,
    RatingProfile,
    Courses,
    TutorCalendar,
    ViewCalendar,

  },
  computed: mapGetters('user', ['current_role']),
}
</script>

<style lang='scss' scoped>
main {
  max-width: 100vw;
  overflow: hidden;
  background: #fff;
}

.content {
  padding: 0 15em;
  margin: 3em auto;

  & .hero {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    @media screen and (max-width: 1260px) {
      justify-content: center;
    }

    & .right_side {
      width: 60%;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-end;
      margin-top: 20px;
    }
  }
}
</style>
