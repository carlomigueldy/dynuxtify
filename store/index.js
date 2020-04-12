import { getField, updateField } from 'vuex-map-fields';

export const state = () => ({
  // 
})

export const getters = {
  IS_AUTHENTICATED: state => state.auth.loggedIn,
  GET_AUTH_USER: state => state.auth.user,
  GET_AUTH: state => state.auth,
  getField,
}

export const mutations = {
  updateField,
}

export const actions = {

}