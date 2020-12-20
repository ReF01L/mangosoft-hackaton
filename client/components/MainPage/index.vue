<template>
  <main>
    <div class='hero'>
      <div class='hero__banner'>
        <div class='hero__banner-title'>Знания помогают оставаться на шаг впереди.</div>
        <div class='hero__banner__layer'>
          <button class='hero-btn' @click='()=>$store.commit("modals/setRegister", true)'>Зарегистрироваться</button>
          <img src='/hero_women.png' alt=''>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="interesting">
        <img src="/women_with_books.png" alt="">
        <div class="interesting__content">
          <span>Выбирай интересные предметы!</span>
          <span>Изучай новое!</span>
        </div>
      </div>
      <div class="learning">
        <span>Делись знаниями с другими</span>
        <img src="/learning.png" alt="">
      </div>
      <div class="knowledge">
        <h2 class="knowledge-title">Хорошо разбираешься в предмете и хочешь помочь другим?</h2>
        <div class="knowledge__content">
          <img src="/books.png" alt="">
          <div class="knowledge__content__body">
            <span>Стань репетитором!</span>
            <button class="btn">Стать репетитором</button>
          </div>
        </div>
      </div>
      <div class="tutors">
        <h2 class="tutors-title">Топ репетиторов</h2>
        <div class="tutors__search">
          <input type="search" placeholder="Математический анализ">
          <img class="tutors__search-icon" src="/search.svg" alt="">
        </div>
        <div class="tutors__list">
          <div v-for="i in 4" class="tutors__list-tutor">
            <img src="/men.png" alt="">
            <span class="tutors__list-tutor-name">
              Валерий Павлович Петров
            </span>
            <div class="tutors__list-tutor__rank">
              <span>4.4</span>
              <el-rate
                v-model="value"
                :colors="colors"
                :disabled="true"
                :max="5">
              </el-rate>
            </div>
            <div class="tutors__list-tutor-subinfo">
              Преподаю математический анализ, линейную алгебру и дифференциальные уравнения.
            </div>
          </div>
        </div>
      </div>
      <div class="auth">
        <h2 class="auth-title">Регистрируйся</h2>
        <img src="/sign_up.png" alt="">
      </div>
      <div class="themes">
        <img src="/headphones.png" alt="" class="themes-headphones">
        <h2 class="themes-title">Отмечай интересные тебе темы!</h2>
        <div class="themes__block">
          <img src="/temp.png" alt="" class="themes__block-temp">
          <img src="/girl.png" alt="" class="themes__block-girl">
          <img src="/boy.png" alt="" class="themes__block-boy">
        </div>
      </div>
      <div class="schedule">
        <h2 class="schedule-title">Выбирай подходящее тебе время</h2>
        <img src="/schedule.png" alt="">
      </div>
      <div class="schedule2">
        <h2 class="schedule2-title">Котролируй своё расписание</h2>
        <img src="/schedule-control.png" alt="" class="schedule2-img">
      </div>
      <div class="better">
        <img src="/girl_with_books.png" alt="" class="better-img">
        <h2 class="better-title">
          Становись лучше с <span>Mango</span><span>Edu</span>!
        </h2>
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
        value: 4.4,
        colors: ['#99A9BF', '#F7BA2A', '#FF9900']
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');

  main {
    max-width: 100vw;
    overflow: hidden;
    background: #fff;
  }

  .hero {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    background: #fff;
    padding: 50px 15em;
    width: 100vw;

    &__banner {
      padding: 150px 0;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-start;

      &__layer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;

        & img {
          align-self: flex-end;
        }
      }

      &-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 70px;
        color: #000;
        word-break: break-word;
        max-width: 70%;
        text-align: left;
      }
    }

    &-btn {
      font-family: 'Montserrat', sans-serif;
      background: #FAD150;
      color: #000;
      border-radius: 50px;
      padding: 32px;
      width: 30%;
      border: none;
      outline: none;
      font-weight: 700;
      font-size: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: 0.3s;

      &:hover {
        width: 40%;
        transition: 0.3s;
      }
    }
  }

  .courses {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
  }

  .content {
    padding: 0 15em;

    .interesting {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;

      &__content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;

        & span {
          font-family: 'Montserrat', sans-serif;
          display: block;
          text-align: center;
          color: #2F2E41;
          font-size: 60px;

          &:first-child {
            margin-bottom: 100%;
            transform: translateX(-30%);
          }
        }
      }
    }

    .learning {
      margin-top: 10vh;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;

      & span {
        font-family: 'Montserrat', sans-serif;
        color: #2F2E41;
        font-size: 60px;
        font-weight: 400;
      }
    }

    .knowledge {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      margin: 10vh auto;
      background: rgba(63, 61, 86, 0.9);
      padding: 25px;
      box-shadow: 0 4px 10px #CBC09F;
      border-radius: 32px;

      &-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 60px;
        color: #FAD150;
        text-align: right;
      }

      &__content {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;

        & img {
          margin-right: 5em;
        }

        &__body {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          align-items: center;
          font-family: 'Montserrat', sans-serif;

          & span {
            color: #F5F5F5;
            font-size: 48px;
          }

          & .btn {
            color: #000000;
            font-weight: bold;
            font-size: 28px;
            background: #FAD150;
            border: 1px solid #FFCC33;
            box-sizing: border-box;
            border-radius: 100px;
            padding: 32px;
            width: 80%;
            margin-top: 30%;
            margin-bottom: 20%;
            transition: 0.3s;

            &:hover {
              width: 100%;
              transition: 0.3s;
            }
          }
        }
      }
    }

    .tutors {
      &-title {
        font-family: 'Montserrat', sans-serif;
        color: #2F2E41;
        font-size: 60px;
      }

      &__search {
        margin-top: 75px;
        margin-bottom: 50px;
        position: relative;

        & input {
          width: 50%;
          border: 2px solid #605D6E;
          border-radius: 100px;
          padding: 10px;
          outline: none;
          font-size: 24px;
        }

        &-icon {
          position: absolute;
          top: 30%;
          right: 51%;
        }
      }

      &__list {
        display: flex;
        justify-content: space-between;
        margin: 12px;
        flex-wrap: wrap;

        &-tutor {
          transition: 0.6s;

          &:hover {
            transform: scale(1.2);
            transition: 0.6s;
          }

          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          box-shadow: 0 4px 10px #CBC09F;
          border-radius: 10px;
          background: #FDFDFD;
          padding: 20px 15px;
          width: 23%;
          margin: 12px;

          &:first-child {
            margin: 12px 12px 12px 0;
          }

          &:last-child {
            margin: 12px 0 12px 12px;
          }

          & img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 5px auto 15px;
          }

          &-name {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            word-break: break-word;
            font-family: 'Montserrat', sans-serif;
          }

          &__rank {
            display: flex;
            justify-content: center;
            align-items: center;

            & span {
              padding-right: 5px;
              font-weight: 600;
              font-size: 24px;
            }
          }

          &-subinfo {
            font-family: Graphik, sans-serif;
            font-size: 16px;
            color: #000000;
            word-break: break-word;
            text-align: center;
          }
        }
      }
    }

    .auth {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 150px auto;

      &-title {
        font-family: 'Montserrat', sans-serif;
        color: #2F2E41;
        font-size: 60px;
        transform: translateX(25%);
      }

      & img {

      }
    }

    .themes {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      justify-content: flex-end;
      margin: 10vh auto;
      background: rgba(63, 61, 86, 0.9);
      padding: 25px;
      box-shadow: 0 4px 10px #CBC09F;
      border-radius: 32px;

      &-headphones {
        position: absolute;
        top: -1%;
        left: -10%;
      }

      &-title {
        width: 60%;
        font-family: 'Montserrat', sans-serif;
        color: #FAD150;
        font-size: 60px;
        text-align: left;
      }

      &__block {
        align-self: center;
        position: relative;

        &-girl {
          position: absolute;
          bottom: 20%;
          left: 17%;
        }

        &-temp {
          position: absolute;
          bottom: 0;
          left: 17%;
        }

        &-boy {
          margin-top: 25vh;
        }
      }
    }

    .schedule {
      margin-top: 200px;

      &-title {
        font-family: 'Montserrat', sans-serif;
        color: #3F3D56;
        font-size: 60px;
        text-align: center;
        margin-bottom: 70px;
      }

      & img {

      }
    }

    .schedule2 {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      margin: 10vh auto;
      background: rgba(63, 61, 86, 0.9);
      padding: 25px;
      box-shadow: 0 4px 10px #CBC09F;
      border-radius: 32px;

      &-title {
        font-family: 'Montserrat', sans-serif;
        align-self: flex-start;
        padding: 0 35px;
        color: #FAD150;
        font-size: 60px;
      }

      &-img {
        align-self: flex-end;
        justify-self: flex-end;
        transform: translateY(20%);
      }
    }

    .better {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 150px auto;

      &-img {

      }

      &-title {
        color: #3F3D56;
        font-size: 60px;
        transform: translateX(-20%);
        font-family: 'Montserrat', sans-serif;

        & span {
          color: #FFCC33;

          &:last-child {
            color: #3F3D56;
          }
        }
      }
    }
  }
</style>
