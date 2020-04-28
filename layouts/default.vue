<template>
  <v-app app>
    <AuthNav 
      :toolbarColor="pageTheme"
      :toolbarDark="isDark"
    />

    <v-content class="grey lighten-4" app>
      <div :class="`app-background ${pageTheme}`"></div>
      <v-container>
        <nuxt />
        <div class="mb-10 pb-10"></div>
      </v-container>
    </v-content>

    <Snackbar />
  </v-app>
</template>

<script>
import AuthNav from '@/components/layouts/AuthNav'
import Snackbar from '@/components/alerts/Snackbar'

export default {
  components: {
    AuthNav,
    Snackbar
  },

  computed: {
    pageTheme() {
      const defaultTheme = 'primary'
      const theme = this.getTheme(this.$route.name)

      if (theme == null) {
        this.isDark = true
        return defaultTheme
      }

      return theme
    },
  },

  data: () => ({
    isDark: false,
  }),

  methods: {
    getTheme (route) {
      let theme
      
      if (route == 'dashboard') {
        this.isDark = true
        theme = 'primary'
        return theme
      } 
      
      this.isDark = true
      theme = 'primary'

      return theme
    },
  }
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
  height: 25rem;
  /* background-color: #1976d2; */
  position: absolute;
}
</style>
