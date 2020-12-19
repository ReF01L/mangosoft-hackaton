export default {
  mutations: {
    setRegister(state, value) {
      state.role = value
    },
  },
  state: {
    role: 0 // 0 - student, 1 - tutor, 2 - organisation
  },
  getters: {
    current_role(state) {
      return state.role
    }
  }
}
