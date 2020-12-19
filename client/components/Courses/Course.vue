<template>
  <div class="course">
    <h2 class="course-title" @click="centerDialogVisible = true">Выживание в лесу</h2>

    <el-dialog class="dialog"
      :visible.sync="centerDialogVisible"
      width="45%"
      center>
      <div class="logo">
        <img src="/logo.png" alt="">
      </div>
      <div class="content">
        <div class="content-name">Выживание в лесу</div>
        <div class="content__title">
          <div class="content__title-title">Организация</div>
          <div class="content__title-name">Клуб юных спелеологов</div>
        </div>
        <div class="content__rating">
          <div class="content__rating-title">Рейтинг курса</div>
          <div class="content__rating__stars">
            <span>9.4</span>
            <el-rate
              v-model="value"
              :colors="colors">
            </el-rate>
          </div>
        </div>
        <div class="content__speaker">
          <div class="content__speaker-title">Спикер</div>
          <div class="content__speaker-name">Физмат Физматович Физматов</div>
        </div>
        <div class="content-body">
          Глубина очага землетрясения поднимает плюмаж. Замерзание, разделенные узкими линейновытянутыми зонами
          выветрелых пород, поступает в недонасыщенный ортоклаз. Тем не менее, нужно учитывать и то обстоятельство, что
          базис эрозии возрастающе ослабляет термокарст, но приводит к загрязнению окружающей среды. Поверхность Мохо,
          так же, как и в других регионах, обедняет меловой корунд. В типологическом плане вся территория Нечерноземья
          корунд смещает лакколит.
        </div>
        <div class="content__datetime">
          <div class="content__datetime-title">Время занятий</div>
          <div class="content__datetime__date">
            <span>Период проведения курса</span>
            <el-date-picker
              class="content__datetime__date-picker"
              v-model="valueDate"
              type="daterange"
              range-separator="—"
              start-placeholder="С"
              end-placeholder="По">
            </el-date-picker>
          </div>
          <div class="content__datetime__days">
            <div class="content__datetime__days-title">
              Дни недели
            </div>
            <div class="content__datetime__days__block">
              <div class="content__datetime__days__block-option">
                <el-checkbox class="content__datetime__days__block-option-elem" v-for="(day, i) in days1">
                  {{day}}
                </el-checkbox>
              </div>
              <div class="content__datetime__days__block-option">
                <el-checkbox class="content__datetime__days__block-option-elem" v-for="(day, i) in days2">
                  {{day}}
                </el-checkbox>
              </div>
            </div>
          </div>
          <div class="content__datetime__time">
            <span>Время</span>
            <el-time-picker
              is-range
              v-model="valueTime"
              range-separator="—"
              start-placeholder="С"
              end-placeholder="По">
            </el-time-picker>
          </div>
        </div>
        <div class="content-btn" @click="centerDialogVisible = false">Записаться на курс</div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
  export default {
    name: "Course",
    data() {
      return {
        centerDialogVisible: false,
        value: null,
        valueDate: null,
        valueTime: [new Date(2016, 9, 10, 8, 40), new Date(2016, 9, 10, 9, 40)],
        colors: ['#99A9BF', '#F7BA2A', '#FF9900'],
        days1: ['Понедельник', 'Вторник', 'Среда', 'Четверг'],
        days2: ['Пятница', 'Суббота', 'Воскресенье'],
      }
    }
  }
</script>

<style lang="scss" scoped>
  .dialog {
    .logo {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .content {
      padding: 60px;
      &__datetime {
        &-title {
          font-weight: bold;
          font-size: 28px;
          color: #3F3D56;
          margin: 30px 0;
        }
        &__date {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: flex-start;
          & span {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
          }
        }
        &__days {
          &-title {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
            margin-top: 50px;
          }
          &__block {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            &-option {
              display: flex;
              flex-direction: column;
              color: #000000;
              font-size: 16px;
              &:nth-child(2) {
                margin-left: 100px;
              }
              &-elem {
                margin: 7px 0;
              }
            }
          }
        }
        &__time {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: flex-start;
          margin-top: 50px;
          & span {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
          }
        }
      }
      &-btn {
        font-weight: 500;
        font-size: 14px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #000000;
        background: #FFCC33;
        border-radius: 32px;
        padding: 10px 30px;
        transition: 0.3s;
        margin-top: 40px;
        &:hover {
          padding: 10px 50px;
          transition: 0.3s;
        }
      }
      &-body {
        font-size: 16px;
        color: #000000;
      }
      &__speaker {
        margin: 30px 0;
        &-title {
          color: #3F3D56;
          font-weight: 600;
          font-size: 20px;
        }
        &-name {
          font-size: 18px;
          color: #000000;
        }
      }
      &__rating {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        &-title {
          color: #3F3D56;
          font-weight: 600;
          font-size: 20px;
        }
        &__stars {
          display: flex;
          justify-content: center;
          align-items: center;
          & span {
            padding-right: 5px;
            font-size: 24px;
            font-weight: 600;
          }
        }
      }
      &__title {
        margin: 30px 0;
        &-title {
          font-weight: 600;
          font-size: 20px;
          color: #3F3D56;
        }
        &-name {
          color: #000000;
          font-size: 24px;
        }
      }
      &-name {
        color: #3F3D56;
        font-weight: bold;
        font-size: 32px;
      }
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
    }
  }
  .course {
    background: #FDFDFD;
    border: 1px solid #A6A08E;
    border-radius: 10px;
    width: 100%;
    margin: 20px auto;

    &:hover {
      box-shadow: 0 4px 10px #CBC09F;
    }

    &-title {
      display: inline-block;
      width: 100%;
      color: #333333;
      font-size: 24px;
      font-weight: 600;
      padding: 20px;
      word-break: break-word;
    }
  }
</style>
