export const state = () => ({
  registerModal: false,
})

export const mutations = {
  setRegisterModal(state, value) {
    console.log('setRegisterModal', value)
    state.registerModal = value
  },
}
