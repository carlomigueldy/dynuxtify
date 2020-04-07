<template>
  <v-app dark>
    <AuthNav />

    <v-content app>
      <div class="app-background">
        <v-container>
          <nuxt />
        </v-container>
      </div>
    </v-content>

    <v-footer
      :fixed="true"
      max-height="30"
      inset
      app
    >
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
import AuthNav from '@/components/layouts/AuthNav'

export default {
  components: {
    AuthNav
  },
}
</script>

<style scoped>
html {
  scroll-behavior: smooth;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}

.app-background {
  width: 100%;
  height: 20rem;
  background-color: #1976d2;
}
</style>
