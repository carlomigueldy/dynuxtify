<template>
  <div>
    <v-card tile>
      <v-toolbar color="transparent" flat>
        <v-text-field
          append-icon="mdi-magnify"
          v-model="search"
          label="Filter"
          hide-details
          clearable
        ></v-text-field>
        <v-toolbar-title></v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn 
          tile
          color="primary"
          @click="$router.push({ name: `${route}-create` })"
          text>
          <v-icon left>mdi-plus-circle-outline</v-icon>
          Add {{ title }}
        </v-btn>

        <v-menu 
          :close-on-content-click="false"
          offset-y>
          <template v-slot:activator="{ on }">
            <v-btn 
              color="primary" 
              v-on="on"
              tile 
              text>
              <v-icon left>mdi-filter-outline</v-icon>
              Date Filter
            </v-btn>
          </template>
          <v-card tile>
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
                :key="index"
                v-for="(option, index) in options"
                @click="selectedOption(option.ref)"
              >
                <v-list-item-action>
                  <v-icon small v-text="option.icon"></v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title v-text="option.title"></v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card>
        </v-menu>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :search="search"
        :items="items"
      >
        <template v-slot:item.actions="{ item }">
          <v-btn icon>
            <v-icon>mdi-eye</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </v-card>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: () => 'Resource',
    },

    route: {
      type: String,
      default: () => 'users',
    },
    
    items: {
      type: Array,
      default: () => []
    },

    headers: {
      type: Array,
      default: () => []
    },
  },

  data: () => ({
    fromDate: null,
    toDate: null,
    search: null,
    options: [
      {
        ref: 'refresh',
        title: 'Refresh',
        icon: 'mdi-refresh',
      },
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