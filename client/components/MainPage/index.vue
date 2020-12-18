<template>
  <main>
    <div class='hero'>
      <div class='hero__banner'>
        <div class='hero__banner-title'>Стремись к большему</div>
        <div class='hero__banner-content'>Знания помогают оставаться на шаг впереди. Получите актуальные навыки и
          произведите впечатление.
        </div>
      </div>
      <button class='hero-btn' @click='()=>$store.commit("modals/setRegister", true)'>Зарегистрироваться</button>
    </div>
    <div class='content'>
      <div class='cards'>
        <AboutUs v-for='card in cards'/>
      </div>
      <div class='search'>
        <h2 class='search-title'>Большой выбор курсов!</h2>
        <input class='search-input' placeholder='Поиск' type='search' v-model='search'>
      </div>
      <div class='courses'>
        <Course v-for='course in courses'/>
      </div>
      <div class='interests'>
        <h2 class='interests-title'>Выбери сферу своих интересов</h2>
        <div class='interests__body'></div>
      </div>
      <div class='timetable'>
        <h2 class='timetable-title'>Составь своё расписание</h2>
        <div class='timetable__body'></div>
      </div>
      <div class='knowledge'>
        <h2 class='knowledge-title'>Получай новые знания!!!!!</h2>
        <div class='knowledge__body'></div>
      </div>
    </div>
  </main>
</template>

<script>
import Header from '../Header'
import Footer from '../Footer'
import AboutUs from './AboutUs'
import Course from './Course'

export default {
  name: "index",
  components: {
    AboutUs,
    Header,
    Course,
    Footer
  },
  data() {
    return {
      search: '',
      cards: [1, 2, 3],
      courses: [1, 2, 3, 4, 5, 6, 7, 8],
    }
  }
}
</script>

<style lang='scss' scoped>
main {
  max-width: 100vw;
  overflow: hidden;
  background: #E5E5E5;
}

.hero {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  flex-direction: column;
  background: #B58743;
  padding: 50px 15em;
  width: 100vw;

  &__banner {
    padding: 150px 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    color: #fff;

    &-title {
      font-size: 32px;
    }

    &-content {
      font-size: 22px;
    }
  }

  &-btn {
    background: #FAD150;
    color: #000;
    border-radius: 30px;
    padding: 15px;
    border: none;
    outline: none;
    font-weight: 700;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}

.content {
  padding: 0 15em;

  .cards {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .search {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    margin: 50px auto;

    &-title {
      color: #000;
      font-weight: 700;
      font-size: 44px;
      padding: 0 5px;
      margin: 15px 0;
    }

    &-input {
      padding: 15px 40em 15px 15px;
      border-radius: 25px;
      border: 1px solid black;
      background-color: transparent;
      outline: none;
    }
  }

  .courses {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
  }

  .interests {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    margin: 15px auto;

    &-title {
      font-size: 44px;
      font-weight: 700;
      padding: 15px;
    }

    &__body {
      padding: 15em 35em;
      background-color: #ccc;
    }
  }

  .timetable {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    margin: 15px auto;

    &-title {
      font-size: 44px;
      font-weight: 700;
      padding: 15px;
    }

    &__body {
      padding: 15em 35em;
      background-color: #ccc;
    }
  }

  .knowledge {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    margin: 15px auto;

    &-title {
      font-size: 44px;
      font-weight: 700;
      padding: 15px;
    }

    &__body {
      padding: 15em 35em;
      background-color: #ccc;
    }
  }
}
</style>
