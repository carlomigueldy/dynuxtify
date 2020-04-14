<template>
  <v-form @submit.prevent="login()">
    <v-card-text>
      <v-row justify="center" class="mb-5">
        <div class="text-center">
          <v-img 
            height="75"
            width="75"
            src="https://logo.clearbit.com/github.com"
          ></v-img>
        </div>
      </v-row>
      <div class="title text-center mb-10">
        <div 
          class="font-weight-regular">
          Welcome to
        </div>
        <div class="display-2">
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
        <div class="mb-2">
          <v-btn 
            @click="$router.push({ name: 'dashboard' })"
            width="250"
            :disabled="loggingIn"
            large
            depressed>
            Register
          </v-btn>
        </div>
        <div class="mb-2">
          <v-btn 
            type="submit"
            color="primary"
            width="250"
            :loading="loggingIn"
            large
            depressed>
            Sign In
          </v-btn>
        </div>
      </div>
    </v-card-text>
  </v-form>
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