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
