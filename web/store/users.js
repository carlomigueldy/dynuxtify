import { createUser, User } from '../models/User.js'
import { getField, updateField } from 'vuex-map-fields'

export const state = () => ({
  users: [],
  user: {},
  form: new User()
})

export const getters = {
  getField,
}

export const mutations = {
  SET_USERS: (state, payload) => 
    state.users = payload,

  SET_USER: (state, payload) =>
    state.user = payload,

  ADD_USER: (state, payload) =>
    state.users.push(payload),

  REMOVE_USER: (state, payload) => {
    const index = state.users.findIndex(d => d.id == payload)
    state.users.splice(index, 1)
  },

  CLEAR_FORM: state => state.form = new User(),

  updateField,
}

export const actions = {
  /**
   * Fetch all resources.
   * 
   * @param { Object } context 
   */
  async fetchAll({ commit }) {
    try {
      const data = await this.$axios.$get('/api/users')

      console.assert(data.length > 0, "No users found")
      commit('SET_USERS', data)
    } catch (error) {
      console.log(error)
    }
  },

  async fetchAllDeleted({ commit }) {
    try {
      
    } catch (error) {
      console.log(error)
    }
  },

  /**
   * Fetch a single resource.
   * 
   * @param { Object } payload
   * # must have id 
   */
  async fetch({ commit }, payload) {
    try {
      // 
    } catch (error) {
      console.log(error)
    }
  },
  
  /**
   * Add new data.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async add({ state, commit, dispatch }) {
    try {
      const {
        name,
        role,
        email,
        phone_number,
        password,
      } = state.form
      
      const user = createUser({
        id: state.users.length + 1,
        name,
        role,
        email,
        phone_number,
        password,
      })

      console.log(user)

      commit('ADD_USER', user)
      commit('CLEAR_FORM')
      dispatch('alerts/execute', {
        type: 'success',
        message: 'A new user has been added.',
      }, { root: true })
    } catch (error) {
      console.log(error)
      dispatch('alerts/execute', {
        type: 'error',
        message: 'An user was not added.',
      }, { root: true })
    }
  },

  /**
   * Updates a single resource based on id.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async update({ state, commit, dispatch }, payload) {
    try {
      // 
    } catch (error) {
      console.log(error)
    }
  },

  /**
   * Soft deletes a resource.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async destroy({ commit, dispatch }, payload) {
    try {
      commit('REMOVE_USER', payload)
      dispatch('alerts/execute', {
        type: 'success',
        message: 'A user has been removed.',
      }, { root: true })
    } catch (error) {
      console.log(error)
    }
  },

  /**
   * Restores a softly deleted resource.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async restore({ commit, dispatch }, payload) {
    try {
      // 
    } catch (error) {
      console.log(error)
    }
  },

  /**
   * Deletes a resource permanently.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async forceDestroy({ commit, dispatch }, payload) {
    try {
      // 
    } catch (error) {
      console.log(error)
    }
  },
}