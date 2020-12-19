export default {
  mutations: {
    set_role(state, value) {
      state.role = value
    },
  },
  state: {
    role: '1' // 0 - student, 1 - tutor, 2 - organisation
  },
  getters: {
    current_role(state) {
      return state.role
    }
  }
}
