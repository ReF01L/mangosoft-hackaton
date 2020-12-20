import axios from "axios";

export const STUDENT = 'STUDENT' // 0
export const TUTOR = 'TUTOR'  //1
export const ORGANIZATION = 'ORGANIZATION' // 2

export default {
  mutations: {
    set_role(state, value) {
      state.role = value
    },
    setError(state, value) {
      state.error = value
    }
  },
  state: {
    token: '',
    role: STUDENT,
    skills: [],
    error: ''
  },
  getters: {
    current_role(state) {
      return state.role
    },
    current_token(state) {
      return state.token
    },
    sendError(state) {
      return state.error
    }
  },
  actions: {
    async signIn(state, user) {
      axios
        .post(process.env.API + '/auth/login', {
          username: user.login,
          password: user.password
        })
        .then(res => {
          this.$store.commit("modals/setAuth", false)
          state.error = ''
        })
        .catch(err => {
          alert("Отсутсвует соединение с сервером: \n" + err)
        })
    },
    async signUp(state, user) {
      axios
        .post(process.env.API + '', {
          email: user.email,
          password: user.password,
          skills: state["modals/skills"],
          role: 'student'
        })
        .then(res => {
          state.error = ''
        })
        .catch(err => {
          alert("Отсутсвует соединение с сервером: \n" + error)
        })
    },
    async signOut(state) {
      axios
        .get(process.env.API + '/auth/logout')
        .then(res => {
          state.token = ''
        })
        .catch(err => {
          alert("Отсутствует соединение с сервером");
        })
    }
  }
}

