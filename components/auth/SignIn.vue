<template>
  <div>
    <v-card elevation="10">
      <v-row no-gutters>
        <v-col lg="7" md="7" sm="12" cols="12">
          <v-img
            src="https://udemy-images.udemy.com/course/750x422/1639836_a03e_3.jpg"
            height="100%"
          ></v-img>
        </v-col>
        <v-col lg="5" md="5" sm="12" cols="12">
          <v-card-text>
            <div class="title text-center mb-10">
              <div 
                class="font-weight-regular">
                Dynuxtify
              </div>
            </div>
            
            <v-text-field
              prepend-inner-icon="mdi-email-outline"
              background-color="grey lighten-4"
              label="Email"
              solo
              flat
            ></v-text-field>
            <v-text-field
              label="Password"
              prepend-inner-icon="mdi-lock-outline"
              background-color="grey lighten-4"
              type="password"
              solo
              flat
            ></v-text-field>

            <div class="text-center">
              <div 
                @click="$router.push({ name: 'register' })"
                class="mb-5 primary--text" 
                style="cursor: pointer">
                Forgot your password?
              </div>
              <div class="mb-5">
                <v-btn 
                  @click="$router.push({ name: 'dashboard' })"
                  width="225"
                  large
                  depressed>
                  Register
                </v-btn>
              </div>
              <div class="mb-5">
                <v-btn 
                  color="primary"
                  @click="$router.push({ name: 'dashboard' })"
                  width="225"
                  large
                  depressed>
                  Sign In
                </v-btn>
              </div>
            </div>
          </v-card-text>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {

}
</script>