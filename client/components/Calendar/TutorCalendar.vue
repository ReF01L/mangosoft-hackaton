<template>
  <div class='TutorCalendar'>

    <vue-cal
      locale='ru'
      hide-view-selector
      :time-from='0'
      :time-to='23 * 60'
      active-view='week'
      :disable-views="['years', 'year', 'month', 'day']"
      :editable-events='{ title: false, drag: false, resize: false, delete: true, create: true }'
      :on-event-create='onEventCreate'
      @event-drag-create='onEventCreateEnd'
      :events='events'
      :on-event-click='onEventClick'
    >
    </vue-cal>

    <transition name='fade'>
      <Overlay v-if='showEventCreationDialog'>
        <div class='dialog'>
          <Close @click='cancelEventCreation()'/>
          <div class='dialog-content'>
            <div class='title'>
              Назначить время
            </div>
            <div class='field'>
              <div class='subtitle'>
                Дата
              </div>
              <el-date-picker
                class='title__setter__date-picker'
                v-model='displayDate'
                type='date'
                placeholder='dd/mm/yyyy'
                :picker-options='pickerOptions'
              >
              </el-date-picker>
            </div>

            <div class='field'>
              <div class='subtitle'>
                Время
              </div>
              <el-time-picker
                v-if='selectedEvent' class='title__setter__time-picker'
                is-range
                arrow-control
                v-model='displayTime'>
              </el-time-picker>
            </div>
            <div class='field'>
              <div class='subtitle'>
                Цена за час (руб.)
              </div>
              <TextField v-model='form.pricePerHour' type='number'/>
            </div>

            <div class='rounded-button button' @click='closeCreationDialog()'>Сохранить</div>
          </div>
        </div>
      </Overlay>
    </transition>

    <transition name='fade'>
      <Overlay v-if='showEventEditDialog'>
        <div class='dialog'>
          <Close @click='closeEditDialog()'/>
          <div class='dialog-content'>
            <div class='title'>
              Редактировать время
            </div>
            <div class='field'>
              <div class='subtitle'>
                Дата
              </div>
              <el-date-picker
                class='title__setter__date-picker'
                v-model='displayDate'
                type='date'
                placeholder='dd/mm/yyyy'
                :picker-options='pickerOptions'
              />
            </div>

            <div class='field'>
              <div class='subtitle'>
                Время
              </div>
              <el-time-picker
                v-if='selectedEvent'
                class='title__setter__time-picker'
                is-range
                arrow-control
                v-model='displayTime'
              />
            </div>
            <div class='field'>
              <div class='subtitle'>
                Цена за час (руб.)
              </div>
              <TextField v-model='form.pricePerHour' type='number'/>
            </div>

            <div class='rounded-button button' @click='submitEditDialog()'>Сохранить</div>
            <div class='delete-button rounded-button' @click='deleteEvent(selectedEvent)'>Удалить</div>
          </div>
        </div>
      </Overlay>
    </transition>

  </div>
</template>
<script>
import _ from 'lodash'
import BaseCalendar from "@/components/Calendar/BaseCalendar";
import Overlay from "@/components/Overlay";
import Close from "@/components/StepsForm/Close";
import TextField from "@/components/StepsForm/TextField";
import Vue from 'vue'
import {mapGetters} from "vuex";

export default {
  name: "TutorCalendar",
  components: {TextField, Close, Overlay, BaseCalendar},
  data: () => ({
    selectedEvent: null,
    showEventEditDialog: false,
    showEventCreationDialog: false,
    events: [],
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
    form: {
      start: null,
      end: null,
      pricePerHour: 0
    },
    displayTime: [0, 0],
    displayDate: new Date()
  }),
  computed: {},
  watch: {
    'form.pricePerHour': function (newValue) {
      if (this.selectedEvent) this.selectedEvent.pricePerHour = newValue || '0' // --
    },
    'form.end': function (newValue) {
      if (this.selectedEvent) this.selectedEvent.end = newValue  // --
    },
    'form.start': function (newValue) {
      console.log(newValue)
      if (this.selectedEvent) this.selectedEvent.start = newValue  // --
    },


    selectedEvent: function (newValue) {
      if (!newValue) return

      this.form.pricePerHour = newValue.pricePerHour || '0'

      this.displayDate = newValue.start
      this.displayTime = [newValue.start.getTime(), newValue.end.getTime()]
    },
    displayTime: function (newValue, oldValue) {

      const start = new Date(this.displayDate.getTime())

      const s = (new Date(newValue[0]))
      start.setHours(s.getHours())
      start.setMinutes(s.getMinutes())
      start.setSeconds(0)
      start.setMilliseconds(0)

      const end = new Date(this.displayDate.getTime())
      const e = (new Date(newValue[1]))
      end.setHours(e.getHours())
      end.setMinutes(e.getMinutes())

      end.setSeconds(0)
      end.setMilliseconds(0)

      this.form.start = start
      this.form.end = end
    },
    displayDate: function (newValue) {

      const start = new Date(newValue.getTime())
      const s = new Date(this.displayTime[0])
      start.setHours(s.getHours())
      start.setMinutes(s.getMinutes())
      start.setSeconds(0)
      start.setMilliseconds(0)

      const end = new Date(newValue.getTime())
      const e = new Date(this.displayTime[1])
      end.setHours(e.getHours())
      end.setMinutes(e.getMinutes())
      end.setSeconds(0)
      end.setMilliseconds(0)

      this.form.start = start
      this.form.end = end
    },
  },
  methods: {
    onEventCreateEnd(event) {
      this.showEventCreationDialog = true
      this.selectedEvent = event
    },
    onEventCreate(event, deleteEventFunction) {
      this.deleteEventFunction = deleteEventFunction
      return event
    },
    cancelEventCreation() {
      this.closeCreationDialog()
      this.deleteEventFunction()
    },
    submitEditDialog() {
      this.closeEditDialog()
    },
    closeCreationDialog() {
      this.showEventCreationDialog = false
      this.selectedEvent = null
    },
    closeEditDialog() {
      this.showEventEditDialog = false
      this.selectedEvent = null
    },
    onEventClick(event, e) {
      this.selectedEvent = event
      this.showEventEditDialog = true
    },
    deleteEvent(event) {
      this.events = this.events.filter((e) => !_.isEqual(event, e))

      this.selectedEvent = null
      this.showEventEditDialog = false
    }
  }
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
