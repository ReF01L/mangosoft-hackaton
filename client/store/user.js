export default {
  mutations: {
    set_role(state, value) {
      state.role = value
    },
  },
  state: {
    role: '0', // 0 - student, 1 - tutor, 2 - organisation
    token: ''
  },
  getters: {
    current_role(state) {
      return state.role
    },
    current_token(state) {
      return state.token
    }
  }
}
