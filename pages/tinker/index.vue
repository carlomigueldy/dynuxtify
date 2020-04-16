<template>
  <div>
    <v-row justify="center" align="center">
      <v-col lg="11" md="11" sm="12" cols="12">
        <v-card>
          <v-card-text>
            <v-btn color="#448AFF" @click="count++">
              Click Me
            </v-btn>
            <div>You have clicked it {{ count }} times.</div>

            <v-btn color="primary" @click="$nuxt.$loading.start()">
              Start Loading
            </v-btn>

            <v-btn color="#42A5F5" @click="$nuxt.$loading.finish()">
              End Loading
            </v-btn>

            <v-btn @click="fetchData()">
              Fetch
            </v-btn>

            <v-btn>
              Fetch Uesr
            </v-btn>

            <div>
              {{ $auth.loggedIn }}  
            </div>
          </v-card-text>
          <v-card-text>
            <FormBuilder 
              :fields="fields"
            />
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import FormBuilder from '@/components/builder/FormBuilder'

export default {
  components: {
    FormBuilder
  },

  data: () => ({
    count: 0,
    fields: [
      {
        component: 'v-text-field',
        label: 'First Name',
        outlined: false,
        solo: false,
        dense: false,
        data: null,
      },
    ]
  })
}
</script>