<template>
  <div>
    <code>{{ fields }}</code>
    <Component 
      :key="i"
      v-for="(f, i) in fields"
      :is="f.component"
      :label="f.label"
      :dense="f.dense"
      :outlined="f.outlined"
      :solo="f.solo"
      v-model="f[data]"
    ></Component>
  </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields'

export default {
  props: {
    fields: {
      type: Array,
      default: () => [
        {
          component: 'v-text-field',
          label: 'Field A',
          outlined: false,
          solo: false,
          dense: false,
          data: null,
        }
      ],
    },

    store: {
      type: String,
      default: () => 'index',
    },

    bindings: {
      type: Array,
      default: () => [
        'user.first_name',
        'user.last_name',
        'user.email',
      ],
    }
  },

  computed: {
    ...mapFields(
      this.store, 
      this.bindings
    )
  },
}
</script>