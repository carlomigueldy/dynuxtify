<template>
  <div>
    <h2>Summary</h2>
    <v-divider></v-divider>
    <div>No summary available</div>
  </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields'

export default {
  computed: {
    ...mapFields('users', [
      'user.name',
      'user.email',
      'user.role',
    ])
  }
}
</script>