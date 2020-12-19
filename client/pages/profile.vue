<template>
  <div class="container">
    <main>
      <Header/>
      <div class="content">
        <div class="hero">
          <div class="recs">
            <h2 class="hero-title">Вам может понравиться</h2>
            <div class="recommends">
              <Rec v-for="(rec, i) in recoms" :key="i"/>
            </div>
          </div>
          <div class="right_side">
            <Info class="info"/>
            <div class="interests">
              <Interest/>
            </div>
          </div>
        </div>
        <Schedule/>
      </div>
      <Footer/>
    </main>
  </div>
</template>

<script>
  import Header from '../components/Header'
  import Footer from '../components/Footer'
  import Info from '../components/Info'
  import Rec from '../components/Rec'
  import Interest from '../components/Interest'
  import Schedule from '../components/Schedule'

  import ElementUI from 'element-ui';
  import 'element-ui/lib/theme-chalk/index.css';
  import Element from 'element-ui'
  import locale from 'element-ui/lib/locale/lang/ru-RU'
  import Vue from 'vue'

  Vue.use(Element, { locale })
  Vue.use(ElementUI)


  export default {
    components: {
      Header,
      Footer,
      Info,
      Rec,
      Interest,
      Schedule
    },
    data() {
      return {
        recoms: [1, 2]
      }
    }
  }
</script>

<style lang="scss" scoped>
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
      & .right_side {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        margin-top: 20px;
        & .info {
          margin-bottom: 25px;
        }
      }
      & .recs {
        & h2 {
          font-weight: bold;
          font-size: 44px;
        }

        & .recommends {
          display: flex;
          justify-content: center;
          align-items: flex-start;
          margin: 25px auto;
        }
      }
    }
  }
</style>
