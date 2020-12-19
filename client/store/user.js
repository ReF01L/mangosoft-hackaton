export const STUDENT = 'STUDENT' // 0
export const TUTOR = 'TUTOR'  //1
export const ORGANIZATION = 'ORGANIZATION' // 2

export default {
  mutations: {
    set_role(state, value) {
      state.role = value
    },
  },
  state: {
    role: TUTOR
  },
  getters: {
    current_role(state) {
      return state.role
    }
  }
}

