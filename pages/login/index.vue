<template>
  <div>
    <!-- <span class="bg"></span> -->
    <v-app app>
      <v-content class="primary" app>
        <v-container fill-height>
          <v-row 
            justify="center" 
            align="center"
            class="mx-auto">
            <v-col 
              lg="12"
              md="12"
              sm="12"
              cols="12"
              >
              <SignIn />
            </v-col>
          </v-row>
        </v-container>
      </v-content>
    </v-app>
  </div>
</template>

<script>
import SignIn from '@/components/auth/SignIn'

export default {
  auth: 'guest',
  
  layout: 'none',
  
  components: {
    SignIn,
  },
}
</script>

<style scoped>
.bg {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background: url("https://source.unsplash.com/random/1600x900") no-repeat center center;
  background-size: cover;
  background-color: black;
}
</style>