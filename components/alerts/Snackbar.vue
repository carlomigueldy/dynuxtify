<template>
  <div>
    <v-snackbar 
      :bottom="bottom"
      :top="top"
      :right="right"
      :left="left"
      :timeout="timeout"
      v-model="show">
      <v-icon
        size="32"
        v-if="type == 'success' || type == 'error'"
        :color="type == 'success' 
          ? 'success' 
          : type == 'error'
          ? 'error'
          : '' "
        v-text="type == 'success' 
          ? 'mdi-check-circle' 
          : type == 'error'
          ? 'mdi-alert'
          : '' "
      ></v-icon>
      {{ message }}
      <v-btn 
        dark 
        icon>
        <v-icon 
          small
          @click="show = false">
          mdi-close
        </v-icon>
      </v-btn>
    </v-snackbar>
  </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields'

export default {
  computed: {
    ...mapFields('alerts', [
      'show',
      'message',
      'color',
      'type',
      'position.bottom',
      'position.top',
      'position.right',
      'position.left',
      'timeout',
    ])
  },
}
</script>