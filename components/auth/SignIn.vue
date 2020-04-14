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
          <v-form @submit.prevent="login()">
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
                :disabled="loggingIn"
                v-model="credentials.email"
                label="Email"
                solo
                flat
              ></v-text-field>
              <v-text-field
                label="Password"
                prepend-inner-icon="mdi-lock-outline"
                background-color="grey lighten-4"
                :disabled="loggingIn"
                v-model="credentials.password"
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
                    :disabled="loggingIn"
                    large
                    depressed>
                    Register
                  </v-btn>
                </div>
                <div class="mb-5">
                  <v-btn 
                    type="submit"
                    color="primary"
                    width="225"
                    :loading="loggingIn"
                    large
                    depressed>
                    Sign In
                  </v-btn>
                </div>
              </div>
            </v-card-text>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    loggingIn: false,
    credentials: {
      email: '',
      password: '',
    },
  }),

  methods: {
    async login() {
      this.loggingIn = true
      try {
        // this.$axios.setBaseURL(process.env.BASE_URL)

        const { data } = await this.$auth.loginWith('local', {
          data: this.credentials
        })

        // this.$axios.setToken(data.access_token, 'Bearer')
        // const res = await this.$axios.post('/api/auth/me')

        // this.$auth.setUser(res.data)
        // this.$auth.setToken('local', data.access_token)
        this.loggingIn = false
        
        await this.$router.push({ name: 'dashboard' })
      } catch (error) {
        console.log(error)
        this.loggingIn = false
      }
    },
  }
}
</script>