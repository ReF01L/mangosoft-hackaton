<template>
  <div class="container">
    <main>
      <Header/>
      <div class="content">
        <div class="hero">
          <div v-if="current_role === '0'" class="recs">
            <h2 class="hero-title">Вам может понравиться</h2>
            <div class="recommends">
              <Rec v-for="(rec, i) in recoms" :key="i"/>
            </div>
          </div>
          <div v-else-if="current_role === '1'" class="rating">
            <h2 class="rating-title">Рейтинг репетитора</h2>
            <div class="rating__stars">
              <span>9.4</span>
              <el-rate
                v-model="value2"
                :colors="colors">
              </el-rate>
            </div>
            <span class="rating-students">25 студентов</span>
          </div>
          <Courses v-else-if="current_role === '2'"/>
          <div class="right_side">
            <Info/>
            <div class="interests" v-if="current_role !== '2'">
              <Interest/>
            </div>
            <div v-else class="body">
              <OrganizationInfo/>
            </div>
          </div>
        </div>
        <Schedule v-if="current_role !== '2'"/>
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
  import Courses from '../components/Courses'
  import OrganizationInfo from "../components/OrganizationInfo";

  import ElementUI from 'element-ui';
  import 'element-ui/lib/theme-chalk/index.css';
  import Element from 'element-ui'
  import locale from 'element-ui/lib/locale/lang/ru-RU'
  import Vue from 'vue'

  import {mapGetters} from 'vuex'

  Vue.use(Element, {locale})
  Vue.use(ElementUI)

  export default {
    components: {
      OrganizationInfo,
      Header,
      Footer,
      Info,
      Rec,
      Interest,
      Schedule,
      Courses
    },
    data() {
      return {
        recoms: [1, 2],
        value1: null,
        value2: null,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900'], // same as { 2: '#99A9BF', 4: { value: '#F7BA2A', excluded: true }, 5: '#FF9900' }
        count: 0
      }
    },
    computed: mapGetters('user', ['current_role']),
    methods: {
      load() {
        this.count += 2
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
        width: 60%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-end;
        margin-top: 20px;
      }

      & .rating {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        background: #FDFDFD;
        box-shadow: 0 4px 10px #CBC09F;
        border-radius: 10px;
        padding: 35px;

        &-title {
          color: #000;
          font-size: 28px;
          font-weight: bold;
        }

        &__stars {
          display: flex;
          justify-content: flex-start;
          align-items: center;

          & span {
            padding-right: 5px;
            font-size: 24px;
            font-weight: 600;
          }
        }

        &-students {
          font-size: 18px;
          color: #333333;
        }
      }

      & .recs {
        width: 50%;
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
