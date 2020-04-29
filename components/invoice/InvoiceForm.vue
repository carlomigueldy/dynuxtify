<template>
  <div>
    <v-text-field
      label="Invoice Date"
      type="date"
      v-model="invoice_date"
      outlined
    ></v-text-field>
    <v-text-field
      label="Due Date"
      type="date"
      v-model="due_date"
      outlined
    ></v-text-field>
    <v-text-field
      label="Days Overdue"
      v-model="days_overdue"
      outlined
    ></v-text-field>
  </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields'

export default {
  computed: {
    ...mapFields('invoices', [
      'form.invoice_date',
      'form.due_date',
      'form.days_overdue',
    ])
  }
}
</script>