<template>
  <div class='wrapper'>
    <div class='title'>
      <h2 class='title-title'>Мое расписание</h2>
      <div class='title__setter'>
        <div class='title__setter__date'>
          <span class='title__setter__date-title'>Введите дату</span>
          <el-date-picker class='title__setter__date-picker'
                          v-model='date'
                          type='date'
                          placeholder='dd/mm/yyyy'
                          :picker-options='pickerOptions'>
          </el-date-picker>
        </div>
        <div class='title__setter__time'>
          <span class='title__setter__time-title'>Введите время</span>
          <el-time-picker class='title__setter__time-picker'
                          is-range
                          arrow-control
                          v-model='time'
                          range-separator='To'
                          start-placeholder='Start time'
                          end-placeholder='End time'>
          </el-time-picker>
        </div>
        <button class='title__setter-add'>Добавить</button>
      </div>
      <el-carousel indicator-position='none' height='1400px' :autoplay=false>
        <el-carousel-item v-for='item in 4' :key='item'>
          <Grid/>
        </el-carousel-item>
      </el-carousel>
    </div>
  </div>
</template>

<script>

import Grid from "./Grid";

export default {
  name: "index",
  components: {Grid},
  data() {
    return {
      time1: null,
      pickerOptions: {
        disabledDate(time) {
          return time.getTime() < Date.now() - 3600 * 1000 * 24;
        },
        shortcuts: [{
          text: 'Сегодня',
          onClick(picker) {
            picker.$emit('pick', new Date());
          }
        }, {
          text: 'Завтра',
          onClick(picker) {
            const date = new Date();
            date.setTime(date.getTime() + 3600 * 1000 * 24);
            picker.$emit('pick', date);
          }
        }]
      },
      date: new Date(),
      time: [new Date().getTime(), new Date().getTime()]
    };
  }
};
</script>

<style lang='scss' scoped>
.el-carousel {
  width: 100%;
}

.wrapper {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;

  & .title {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    width: 100%;

    &-title {
      font-size: 44px;
      font-weight: bold;
      margin: 15px 0 25px;
    }

    &__setter {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      width: 100%;

      &__date {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0 10px;

        &-title {
          color: #000;
          font-size: 20px;
        }

        &-picker {
          border-radius: 4px;
          font-size: 14px;
          margin: 10px auto;
        }
      }

      &__time {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0 20px;

        &-title {
          color: #000;
          font-size: 20px;
        }

        &-picker {
          border-radius: 4px;
          margin: 10px auto;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
      }

      &-add {
        align-self: flex-end;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        background: #3F3D56;
        border-radius: 32px;
        border: none;
        outline: none;
        padding: 13px 100px;
        font-size: 14px;
        margin-bottom: 10px;

        &:hover {
          cursor: pointer;
        }
      }
    }
  }
}
</style>
