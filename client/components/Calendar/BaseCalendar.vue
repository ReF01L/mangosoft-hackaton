<template>


  <vue-cal
    locale='ru'
    hide-view-selector
    :time-from='0'
    :time-to='23 * 60'
    active-view='week'
    :disable-views="['years', 'year', 'month', 'day']"
    :editable-events='{ title: true, drag: true, resize: true, delete: true, create: true }'
    :drag-to-create-threshold='0'>
  </vue-cal>

</template>

<script>
export default {
  name: "BaseCalendar",
  data: () => ({
    selectedEvent: null,
    showEventCreationDialog: false,
    eventsCssClasses: ['leisure', 'sport', 'health']
  }),
  methods: {
    onEventCreate(event, deleteEventFunction) {
      this.selectedEvent = event
      this.showEventCreationDialog = true
      this.deleteEventFunction = deleteEventFunction

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


<style>

</style>
