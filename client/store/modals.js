export const state = () => ({
  register: false,
})


export const mutations = {
  setRegister(state, value) {
   // console.log('setRegisterModal', value)
    state.register = value
  },
}
