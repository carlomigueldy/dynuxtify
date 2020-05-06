<template>
  <div>
    <v-card :loading="loading" flat>
      <v-toolbar color="transparent" flat>
        <v-text-field
          prepend-inner-icon="mdi-magnify"
          v-model="search"
          label="Search by name, email, username or user ID"
          solo
          flat
          single-line
          hide-details
          clearable
        ></v-text-field>
        <v-toolbar-title></v-toolbar-title>
        <v-spacer></v-spacer>
        <v-menu offset-y>
          <template v-slot:activator="{ on }">
            <v-btn 
              color="primary"
              text
              v-on="on"
              v-if="showCreateBtn">
              <v-icon small left>mdi-plus-circle-outline</v-icon>
              Add User
            </v-btn>
          </template>
          <v-list>
            <v-list-item @click="createDialog = !createDialog">
              <v-list-item-title>
                Quick create
              </v-list-item-title>
            </v-list-item>
            <v-list-item @click="$router.push({ name: 'users-create' })">
              <v-list-item-title>
                Go to create form
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>

        <!-- START Date filter -->
        <v-menu 
          v-model="dateFilterMenu"
          :close-on-content-click="false"
          offset-y>
          <template v-slot:activator="{ on }">
            <v-btn 
              v-on="on"
              icon>
              <v-icon>mdi-filter-outline</v-icon>
            </v-btn>
          </template>
          <v-card tile>
            <v-toolbar color="transparent" dense flat>
              <v-toolbar-title>
                <div class="caption">
                  Filter by Date Range
                </div>
              </v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn 
                icon
                small
                @click="dateFilterMenu = false">
                <v-icon small>mdi-close</v-icon>
              </v-btn>
            </v-toolbar>
            <v-card-text>
              <v-text-field
                v-model="fromDate"
                label="From"
                type="date"
              ></v-text-field>
              <v-text-field
                v-model="toDate"
                label="To"
                type="date"
              ></v-text-field>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn 
                @click="clearDateFilter()"
                color="primary" 
                text>
                Clear
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-menu>
        <!-- END Date filter -->
        
        <v-btn 
          @click="reload()"
          :loading="refreshing" 
          icon>
          <v-icon>mdi-refresh</v-icon>
        </v-btn>

        <!-- START Others -->
        <v-menu offset-y>
          <template v-slot:activator="{ on }">
            <v-btn v-on="on" icon>
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>
          <v-card tile>
            <v-list dense>
              <v-list-item @click="clearAllFilter()">
                <v-list-item-action>
                  <v-icon small>mdi-filter-remove-outline</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>Clear Filters</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item
                @click="exportToCSV(items, title)">
                <v-list-item-action>
                  <v-icon small>mdi-export</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>Export to CSV</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card>
        </v-menu>
        <!-- END Others -->
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :search="search"
        :items="items"
        multi-sort>
        <template v-slot:item.role.name="{ item }">
          <v-chip 
            dark
            label
            :color="item.role.color"
            v-text="capitalize(item.role.name)"
          ></v-chip>
        </template>
        <template v-slot:item.actions="{ item }">
          <v-btn :to="{ name: `${route}-id`, params: { id: item.id } }" icon>
            <v-icon>mdi-eye</v-icon>
          </v-btn>
          <v-btn @click="$store.dispatch('user/destroy', item.id)" icon>
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </v-card>

    <!-- START Quick create form -->
    <v-navigation-drawer 
      :width="
        $vuetify.breakpoint.xl
        ? '700' 
        : $vuetify.breakpoint.lg || $vuetify.breakpoint.md 
        ? '450' 
        : '100%'"
      :right="true"
      v-model="createDialog" 
      :temporary="true"
      :touchless="true"
      app>
      <v-form @submit.prevent="$store.dispatch('users/create')
        .then(() => createDialog = !createDialog)">
        <v-card flat>
          <v-toolbar color="transparent" flat>
            <v-toolbar-title>Create a User</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn @click="createDialog = !createDialog" icon>
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
            <UserForm />
            <v-btn 
              class="text-uppercase mb-3"
              @click="createDialog = !createDialog"
              color="primary"
              block
              large
              text>
              Cancel
            </v-btn>
            <v-btn 
              block
              large
              class="text-uppercase"
              color="primary"
              type="submit" 
              depressed>
              Submit
            </v-btn>
          </v-card-text>
        </v-card>
      </v-form>
    </v-navigation-drawer>
    <!-- END Quick create form -->
  </div>
</template>

<script>
import UserForm from '@/components/users/UserForm'

export default {
  components: {
    UserForm
  },
  
  props: {
    title: {
      type: String,
      default: () => 'Resource',
    },

    route: {
      type: String,
      default: () => 'users',
    },

    refresh: {
      type: String,
      default: () => 'users/fetchAll'
    },
    
    items: {
      type: Array,
      default: () => []
    },

    loading: {
      type: Boolean,
      default: () => false,
    },

    showCreateBtn: {
      type: Boolean,
      default: () => false,
    }
  },

  data: () => ({
    createDialog: false,
    refreshing: false,
    dateFilterMenu: false,
    fromDate: null,
    toDate: null,
    search: null,
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
        value: 'role.name',
      },
      {
        text: 'Created',
        value: 'created_at',
      },
      {
        text: 'Actions',
        value: 'actions',
        sortable: false,
      },
    ],
    options: [
      {
        ref: 'pdf',
        title: 'Export to PDF',
        icon: 'mdi-file-pdf-outline',
      },
      {
        ref: 'csv',
        title: 'Export to CSV',
        icon: 'mdi-file-pdf-outline',
      },
      {
        ref: 'json',
        title: 'Export to JSON',
        icon: 'mdi-file-pdf-outline',
      },
    ],
  }),

  methods: {
    async reload() {
      this.refreshing = true
      console.log(this.refresh)
      await this.$store.dispatch(this.refresh)
      await setTimeout(async () => {
        this.refreshing = false
      }, 1000)
    },
    
    clearAllFilter() {
      this.search = null
      this.fromDate = null
      this.toDate = null
    },
    
    clearDateFilter() {
      this.fromDate = null
      this.toDate = null
    },
    
    selectedOption(ref) {
      console.log(ref)
    },

  },
}
</script>