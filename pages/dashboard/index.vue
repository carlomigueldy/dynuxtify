<template>
  <div>
    <v-btn @click="count++">
      Click Me
    </v-btn>
    <div>You have clicked it {{ count }} times.</div>

    <v-row justify="center" align="center">
      <v-col lg="10" md="10" sm="12" cols="12">

        <v-row class="mb-10">
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card>
              <v-card-text>
                <v-card
                  flat
                  height="200"
                ></v-card>
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Sales</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card>
              <v-card-text>
                <v-card
                  flat
                  height="200"
                >
                </v-card>
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Overview</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>

        <v-divider class="mb-10"></v-divider>

        <v-row class="mb-10">
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card color="purple lighten-2" dark>
              <v-card-text>
                <v-card
                  color="transparent"
                  flat
                  height="200"
                ></v-card>
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Sales</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card color="orange darken-4" dark>
              <v-card-text>
                <v-card
                  color="transparent"
                  flat
                  height="200"
                >
                </v-card>
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Overview</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>

        <v-divider class="mb-10"></v-divider>

        <v-row class="mb-10">
          <v-col>
            <v-card>
              <v-card-title>Calendar</v-card-title>
              <v-card-text>
                <Calendar />
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
        
      </v-col>
    </v-row>
  </div>
</template>

<script>
import Calendar from '@/components/calendar/Calendar'

export default {
  components: {
    Calendar
  },
  
  data: () => ({
    count: 0
  })
}
</script>