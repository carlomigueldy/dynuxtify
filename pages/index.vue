<template>
  <v-app app>
    <v-app-bar 
      :elevate-on-scroll="true"
      dense 
      app>
      <v-spacer></v-spacer>
      <v-btn 
        @click="$router.push({ name: 'sign-in' })"
        text>
        Sign In
      </v-btn>
    </v-app-bar>

    <v-content app>

    </v-content>
  </v-app>
</template>

<script>
export default {
  layout: 'none',
}
</script>
