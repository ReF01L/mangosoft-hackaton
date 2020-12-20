import axios from "axios";
import apiCall from "@/scripts/api";

export const STUDENT = 'STUDENT' // 0
export const TUTOR = 'TUTOR'  //1
export const ORGANIZATION = 'ORGANIZATION' // 2

function convertErrors(errors) {
  return Object.fromEntries(Object.entries(errors || {}).map(([name, value]) => [name, value[0]]));
}

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
    error: '',
    profile: null
  },
  getters: {
    current_role(state) {
      return state.role
    },
    current_token(state) {
      return state.token
    },
    profile(state) {
      return state.profile
    },
    sendError(state) {
      return state.error
    }
  },
  actions: {
    async signIn(state, user) {

      await apiCall({
        url: 'auth/login',
        data: {
          username: user.login,
          password: user.password
        },
        method: 'post',
      })
        .then(res => {
          state.error = ''
        })
        .catch((e) => {
          console.log(e)
          alert(JSON.stringify(e.response?.data?.errors))
          throw ''
        })
    },
    async signUp(state, user) {
      await axios
        .post(process.env.API + 'auth/register', {
          ...user,
          skills: state["modals/skills"],
        }, {withCredentials: true})
        .then(res => {
          state.error = ''
        })
        .catch(e => {
          alert(JSON.stringify(e.response?.data?.errors))
          throw 'error'
        })
    },
    async signOut(state) {
      axios
        .get(process.env.API + 'auth/logout', {withCredentials: true})
        .then(res => {
          state.token = ''
        })
        .catch(e => {
          alert(JSON.stringify(e.response?.data?.errors))
        })
    },
    async updateProfile(state) {
      axios
        .get(process.env.API + 'lk', {withCredentials: true})
        .then(({data}) => {
          state.profile = data
        })
        .catch(e => {
          state.profile = null
        })
    }
  }
}

