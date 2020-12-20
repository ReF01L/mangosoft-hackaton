import axios from "axios";

export const STUDENT = 'STUDENT' // 0
export const TUTOR = 'TUTOR'  //1
export const ORGANIZATION = 'ORGANIZATION' // 2

export default {
  state: {
    notifications: [
      {
        type: 'mark_teacher',
        title: 'Оцените занятие!',
        description: 'В случае возникновения недопонимания обратитесь в поддержку.',
        read: false
      },
      {
        type: 'success_payment',
        title: 'Оплата прошла успешно!',
        description: `Ваше занятие запланировано 25 декабря в 18:20. Контакты для связи с преподавателем отправлены Вам на почту! Продуктивного дня!`,
        read: false
      },
      {
        type: 'failed_payment',
        title: 'Оплата не прошла :(',
        description: 'Повторите попытку позднее.',
        read: false
      },
      {
        type: 'mark_teacher',
        title: 'Оцените занятие!',
        description: 'В случае возникновения недопонимания обратитесь в поддержку.',
        read: true
      },
      {
        type: 'success_payment',
        title: 'Оплата прошла успешно!',
        description: `Ваше занятие запланировано 25 декабря в 18:20. Контакты для связи с преподавателем отправлены Вам на почту! Продуктивного дня!`,        read: true
      },
      {
        type: 'failed_payment',
        title: 'Оплата не прошла :(',
        description: 'Повторите попытку позднее.',
        read: false
      },
    ]
  },
  mutations: {
    setNotifications(state, value) {
      state.notifications = value
    },
    readAllNotifications(state) {
      state.notifications.forEach(item => item.read = true)
    },
    readNotification(state, id) {
      state.notifications[id].read = true
    }
  },
  getters: {
    getNotifications(state) {
      return state.notifications
    },
    getNotificationsCount(state) {
      return state.notifications.length
    },
    UnreadNotificationsCount(state) {
      return state.notifications.filter(nots => !nots.read).length
    }
  },
  actions: {
    async serverNotifications(state, user) {
      axios
        .post(process.env.API + '', {})
        .then(res => {
          this.$store.commit('setNotifications',)
        })
        .catch(err => {
          alert("Отсутсвует соединение с сервером: \n" + error)
        })
    },
  }
}

