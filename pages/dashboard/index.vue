<template>
  <div>
    <v-toolbar color="transparent" dark flat>
      <v-toolbar-title>
        <h2>Dashboard</h2>
      </v-toolbar-title>
    </v-toolbar>
    
    <v-row justify="center" align="center">
      <v-col lg="11" md="11" sm="12" cols="12">
        <v-row>
          <v-col>
            <Count 
              title="Users"
              border-color="cyan" 
              :value="103"
            />
          </v-col>
          <v-col>
            <Count 
              title="Leads"
              border-color="red" 
              format="money"
              :value="45155"
            />
          </v-col>
          <v-col>
            <Count 
              title="Sales"
              border-color="orange" 
              format="money"
              :value="80445"
            />
          </v-col>
        </v-row>

        <v-row class="mb-10">
          <v-col lg="6" md="6" sm="12" cols="12">
            <v-card height="100%">
              <v-card-text>
                <line-chart height="250px" />
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
                <line-chart height="250px" />
              </v-card-text>
              <v-divider></v-divider>
              <v-card-title>Overview</v-card-title>
              <v-card-text>
                Some cool information
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>

      </v-col>
    </v-row>
  </div>
</template>

<script>
import Count from '@/components/reporting/Count'
import LineChart from '@/components/charts/chartjs/LineChart.js'
import BarChart from '@/components/charts/apex-charts/BarChart'
import AreaChart from '@/components/charts/apex-charts/LineChart'

export default {
  components: {
    Count,
    LineChart,
    BarChart,
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