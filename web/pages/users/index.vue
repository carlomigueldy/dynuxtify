<template>
  <div>
    <v-toolbar color="transparent" dark flat>
      <v-toolbar-title>
        <h2>Users</h2>
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
    <v-tabs 
      background-color="primary" 
      dark
      show-arrows
      v-model="tabs">
      <v-tab class="text-none">Active</v-tab>
      <v-tab class="text-none">Inactive</v-tab>
      <v-tab class="text-none">Trashed</v-tab>
    </v-tabs>
    <v-divider class="mb-10"></v-divider>

    <v-row 
      justify="center" 
      align="center">
      <v-col 
        lg="11" 
        md="11" 
        sm="12" 
        cols="12">
        <v-card>
          <v-tabs-items v-model="tabs">
            <v-tab-item>
              <DataTable 
                route="users"
                refresh="users/fetchAll"
                :items="$store.getters['users/activeUsers']"
                :headers="headers"
                :loading="loading"
              />
            </v-tab-item>
            <v-tab-item>
              <DataTable 
                route="users"
                refresh="users/fetchAll"
                :items="$store.getters['users/inactiveUsers']"
                :headers="headers"
                :loading="loading"
              />
            </v-tab-item>
            <v-tab-item>
              <DataTable 
                route="users"
                refresh="users/fetchAllArchived"
                :items="$store.getters['users/archivedUsers']"
                :headers="headers"
                :loading="loading"
              />
            </v-tab-item>
          </v-tabs-items>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import DataTable from '@/components/users/DataTable'
import axios from 'axios'

export default {
  head () {
    return {
      title: 'Nuxt Admin | Users',
    }
  },

  components: {
    DataTable,
  },

  async created() {
    this.fetchAll()
  },

  methods: {
    async fetchAll() {
      this.loading = true
      await this.$store.dispatch('users/fetchAll')
      
      await setTimeout(async () => {
        this.loading = false
      }, 1000)
    }
  },

  data: () => ({
    tabs: 0,
    loading: false,
    headers: [
      {
        text: '#',
        value: 'id'
      },
      {
        text: 'Name',
        value: 'name',
      },
      {
        text: 'Email',
        value: 'email',
      },
      {
        text: 'Role',
        value: 'role',
      },
      {
        text: 'Actions',
        value: 'actions',
        sortable: false,
      },
    ],
  }),
}
</script>