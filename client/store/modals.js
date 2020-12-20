import axios from 'axios'


export const state = () => ({
  register: false,
  auth: false
})


export const mutations = {
  setRegister(state, value) {
    state.register = value
  },
  setAuth(state, value) {
    state.auth = value
  },
  setSkills(state, value) {
    state.skills = value.map(({id}) => id)
  },
}

export const actions = {
  async signUp(state, user) {
    axios
      .post(process.env.API + '', {
        email: user.email,
        password: user.password,
        skills: state["modals/skills"],
        role: 'student'
      })
      .then(res => {

      })
      .catch(err => {
        alert("Отсутсвует соединение с сервером: \n" + error)
      })
  },
  async signOut(state) {
    axios
      .get(process.env.API + '/auth/logout')
      .then(res => {

      })
      .catch(err => {
        alert("Отсутствует соединение с сервером");
      })
  }
}
