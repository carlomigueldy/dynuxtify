export default ({ app, store }, inject) => {
  inject('notifier', {
    execute ({ message = '', type = '' }) {
      store.dispatch('alerts/execute', { message, type })
    }
  })
}