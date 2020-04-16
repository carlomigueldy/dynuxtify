import { createInvoice, isOverDue } from '../models/Invoice.js'
import { getField, updateField } from 'vuex-map-fields'

export const state = () => ({
  invoices: [],
  invoice: {}
})

export const getters = {
  getOverDueInvoices: state => state.invoices
    .filter(d => isOverDue(d.due_date)),
  
  getField,
}

export const mutations = {
  SET_INVOICES: (state, payload) => 
    state.invoices = payload,

  SET_INVOICE: (state, payload) =>
    state.invoice = payload,

  ADD_INVOICE: (state, payload) =>
    state.invoices.push(payload),

  REMOVE_INVOICE: (state, index) =>
    state.invoices.slice(index, 1),

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
      const { data } = await $axios.$get('/api/invoices')

      console.assert(data.length > 0, "No invoices found")
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
  async add({ commit, dispatch }, payload) {
    try {
      const {
        invoice_date,
        due_date,
        days_overdue
      } = payload
      
      const invoice = createInvoice({
        invoice_date,
        due_date,
        days_overdue,
      })

      commit('ADD_INVOICE', invoice)
      dispatch('alerts/execute', {
        type: 'success',
        message: 'A new invoice has been added.',
      }, { root: true })
    } catch (error) {
      console.log(error)
      dispatch('alerts/execute', {
        type: 'error',
        message: 'An invoice was not added.',
      }, { root: true })
    }
  },

  /**
   * Updates a single resource based on id.
   * 
   * @param { Object } context 
   * @param { Object } payload 
   */
  async update({ commit, dispatch }, payload) {
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
      // 
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