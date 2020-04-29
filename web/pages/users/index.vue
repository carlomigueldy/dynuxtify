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
                title="Users"
                route="users"
                :items="$store.state.users.users"
                :headers="headers"
              />
            </v-tab-item>
            <v-tab-item>
              <DataTable 
                title="Users"
                route="users"
                :items="$store.state.users.users"
                :headers="headers"
              />
            </v-tab-item>
            <v-tab-item>
              <DataTable 
                title="Users"
                route="users"
                :items="$store.state.users.users"
                :headers="headers"
              />
            </v-tab-item>
          </v-tabs-items>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import DataTable from '@/components/user/DataTable'
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

  data: () => ({
    tabs: 0,
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