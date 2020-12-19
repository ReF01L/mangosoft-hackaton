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
      @event-drag-create='showEventCreationDialog = true'
    >
    </vue-cal>

    <transition name='fade'>
      <Overlay v-if='showEventCreationDialog'>
        <div class='dialog'>
          <Close @click='cancelEventCreation()'/>
          <div class='title'>
            Назначить время
          </div>


          <div class='button-save' @click='closeCreationDialog()'></div>
        </div>
      </Overlay>
    </transition>
  </div>
</template>

<script>
import BaseCalendar from "@/components/Calendar/BaseCalendar";
import Overlay from "@/components/Overlay";
import Close from "@/components/StepsForm/Close";

export default {
  name: "TutorCalendar",
  components: {Close, Overlay, BaseCalendar},

  data: () => ({
    selectedEvent: null,
    showEventCreationDialog: false,
    //eventsCssClasses: ['leisure', 'sport', 'health']
  }),
  methods: {
    onEventCreate(event, deleteEventFunction) {
      this.selectedEvent = event
      this.deleteEventFunction = deleteEventFunction
      return event
    },
    cancelEventCreation() {
      console.log(45)
      this.closeCreationDialog()
      this.deleteEventFunction()
    },
    closeCreationDialog() {
      this.showEventCreationDialog = false
      this.selectedEvent = {}
    }
  }
}
</script>

<style scoped lang='scss'>
.dialog {
  width: 720px;
  background: #FFFFFF;
  border-radius: 16px;

  .title {
    font-size: 32px;
    line-height: 60px;
    color: #3F3D56;
  }

  .button-save {

  }

}

</style>
