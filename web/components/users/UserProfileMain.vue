<template>
  <v-card flat>
    <v-toolbar-title>Summary</v-toolbar-title>
    <v-divider></v-divider>
    <v-card-text>
      No summary available
    </v-card-text>
  </v-card>
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