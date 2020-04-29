<template>
  <div>
    <v-toolbar color="transparent" dark flat>
      <v-toolbar-title>
        <h2>Playground</h2>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu offset-y>
        <template v-slot:activator="{ on }">
          <v-btn small v-on="on" icon>
            <v-icon>mdi-help-circle</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-card-title>Help</v-card-title>
          <v-card-text>
            Some help
          </v-card-text>
        </v-card>
      </v-menu>
    </v-toolbar>
    
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

            <v-btn>
              Fetch
            </v-btn>

            <v-btn>
              Fetch Uesr
            </v-btn>

            <v-btn 
              color="teal darken-2" 
              dark>
              BUY PIZZA
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
  head () {
    return {
      title: 'Nuxt Admin | Playground',
    }
  },
  
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