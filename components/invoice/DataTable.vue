<template>
  <div>
    <v-card flat>
      <v-toolbar color="transparent" flat>
        <v-text-field
          prepend-inner-icon="mdi-magnify"
          v-model="search"
          label="Search by invoice date, and due date"
          solo
          flat
          single-line
          hide-details
          clearable
        ></v-text-field>
        <v-toolbar-title></v-toolbar-title>
        <v-spacer></v-spacer>
          <!-- @click="$router.push({ name: `${route}-create` })" -->
        <v-btn 
          color="primary"
          @click="createDialog = true"
          text>
          <v-icon small left>mdi-plus-circle-outline</v-icon>
          Add Invoice
        </v-btn>

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
        <v-btn 
          @click="reload()"
          :loading="refreshing" 
          icon>
          <v-icon>mdi-refresh</v-icon>
        </v-btn>
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
        multi-sort
      >
        <template v-slot:item.actions="{ item }">
          <v-btn icon>
            <v-icon>mdi-eye</v-icon>
          </v-btn>
          <v-btn @click="$store.dispatch('invoice/destroy', item.id)" icon>
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </v-card>

    <v-dialog 
      v-model="createDialog" 
      scrollable 
      max-width="500">
      <v-form @submit.prevent="$store.dispatch('invoice/add')">
        <v-card>
          <v-toolbar color="transparent" flat>
            <v-toolbar-title>NEW INVOICE</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn @click="createDialog = false" icon>
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
            <InvoiceForm />
          </v-card-text>
          <v-card-actions>
            <v-btn 
              block
              tile
              class="text-uppercase"
              x-large
              width="225"
              color="primary"
              type="submit" 
              depressed>
              Submit
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-dialog>
  </div>
</template>

<script>
import InvoiceForm from '@/components/invoice/InvoiceForm'

export default {
  components: {
    InvoiceForm
  },
  
  props: {
    title: {
      type: String,
      default: () => 'Resource',
    },

    route: {
      type: String,
      default: () => 'invoices',
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
    refreshing: false,
    createDialog: false,
    dateFilterMenu: false,
    fromDate: null,
    toDate: null,
    search: null,
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
    reload() {
      this.refreshing = true
      setTimeout(() => {
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