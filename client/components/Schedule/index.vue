<template>
  <div class='wrapper'>
    <div class='title'>
      <h2 class='title-title'>{{ title || 'Мое расписание' }}</h2>
    </div>
    <slot/>

    <!--    <TutorCalendar/>-->
    <!--    <StudentCalendar/>-->
  </div>
</template>

<script>

import Grid from "./Grid";
import TutorCalendar from "@/components/Calendar/TutorCalendar";
import {mapGetters} from "vuex";
import StudentCalendar from "@/components/Calendar/StudentCalendar";

export default {
  name: "index",
  components: {StudentCalendar, TutorCalendar, Grid},
  computed: mapGetters('user', ['current_role']),
  props: [
    'title'
  ],
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
