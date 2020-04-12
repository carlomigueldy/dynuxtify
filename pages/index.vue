<template>
  <v-app app>
    <v-app-bar 
      :elevate-on-scroll="true"
      color="primary"
      dense 
      app>
      <v-spacer></v-spacer>
      <v-btn 
        @click="$router.push({ name: 'login' })"
        depressed>
        Log In
      </v-btn>
    </v-app-bar>

    <v-content app>
      <div class="app-background primary"></div>
      <v-container fill-height>
        <v-row justify="center" align="center">
          <v-col>
            <v-card color="transparent" flat>
              <v-card-text>
                <div class="display-4">
                  <div class="text-center white--text">
                    Welcome to Dynuxtify js
                  </div>
                </div>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  layout: 'none',
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
  height: 30rem;
  position: absolute;
  /* background-color: #1976d2; */
}
</style>
