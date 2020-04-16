<template>
  <div>
    <v-row justify="center" align="center">
      <v-col lg="10" md="10" sm="12" cols="12">

        <v-row class="mb-10">
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card height="100%">
              <v-card-text>
                <BarChart />
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Sales</v-card-title>
              <v-card-text>
                Sales information
              </v-card-text>
            </v-card>
          </v-col>
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card height="100%">
              <v-card-text>
                <LineChart />
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
            <v-card height="100%">
              <v-card-text>
                <ScatterChart />
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Sales</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card height="100%">
              <v-card-text>
                <AreaChart />
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
            <v-card height="100%">
              <v-card-title>Calendar</v-card-title>
              <v-card-text>
                <!-- <Calendar /> -->
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
import BarChart from '@/components/charts/BarChart'
import LineChart from '@/components/charts/LineChart'
import ScatterChart from '@/components/charts/ScatterChart'
import AreaChart from '@/components/charts/AreaChart'

export default {
  components: {
    Calendar,
    BarChart,
    LineChart,
    ScatterChart,
    AreaChart,
  },
  
  data: () => ({
    count: 0,
    posts: []
  }),

  methods: {
    async fetchData() {
      try {
        const data = await this.$axios.$get('https://jsonplaceholder.typicode.com/posts')

        console.log(data)
        this.posts = data
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>