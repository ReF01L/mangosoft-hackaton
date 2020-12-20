<template>
  <div class='TutorCalendar'>

    <vue-cal
      locale='ru'
      hide-view-selector
      :time-from='0'
      :time-to='23 * 60'
      active-view='week'
      :disable-views="['years', 'year', 'month', 'day']"
      :editable-events='{ title: false, drag: false, resize: false, delete: false, create: false }'
      :on-event-create='onEventCreate'
      @event-drag-create='onEventCreateEnd'
      :events='events'
      :on-event-click='onEventClick'
    >
    </vue-cal>

  </div>
</template>
<script>
import _ from 'lodash'
import Overlay from "@/components/Overlay";
import Close from "@/components/StepsForm/Close";
import TextField from "@/components/StepsForm/TextField";
import Vue from 'vue'
import {mapGetters} from "vuex";

export default {
  name: "TutorCalendar",
  components: {TextField, Close, Overlay},
  data: () => ({
    events: [],
  }),
  computed: {},
  watch: {},
  methods: {}
}
</script>

<style scoped lang='scss'>

.TutorCalendar {
  width: 100%;

  .delete-button {
    background: transparent;
    border: 1px solid gray;
    color: gray;
    margin-top: 15px;
  }
}

.button {
  margin-top: 40px;
}


.dialog {
  padding: 48px 10px;
  box-sizing: border-box;

  width: 520px;
  background: #FFFFFF;
  border-radius: 16px;
  position: relative;

  .field {
    margin-bottom: 20px;
  }

  .dialog-content {
    min-width: 300px;
    width: min-content;
    margin: 0 auto;
  }

  .subtitle {
    font-family: 'Montserrat', sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 28px;
    color: #3F3D56;
    margin-bottom: 13px;
  }

  .title {
    white-space: nowrap;
    text-align: center;
    font-size: 32px;
    line-height: 60px;
    color: #3F3D56;
    font-family: 'Montserrat', sans-serif;

    font-weight: bold;
    margin-bottom: 10px;
  }


}

</style>
