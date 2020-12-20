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
      :drag-to-create-threshold='0'>
    </vue-cal>
  </div>
</template>

<script>
import BaseCalendar from "@/components/Calendar/BaseCalendar";

export default {
  name: "TutorCalendar",
  components: {BaseCalendar},
  methods: {
    onEventCreate(event, deleteEventFunction) {
      //  this.selectedEvent = event
      // this.showEventCreationDialog = true
      // this.deleteEventFunction = deleteEventFunction


      return event
    },
    cancelEventCreation() {
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

<style scoped>
.TutorCalendar {
  width: 100%;
}

</style>
