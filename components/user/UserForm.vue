<template>
  <div>
    <v-text-field
      label="Name"
      v-model="name"
      filled
    ></v-text-field>
    <v-autocomplete
      label="Role"
      v-model="role"
      :items="[
        'Administrator',
        'User',
      ]"
      filled
    ></v-autocomplete>
    <v-text-field
      label="Email"
      v-model="email"
      filled
    ></v-text-field>
    <v-text-field
      label="Password"
      v-model="password"
      :type="showPassword ? 'text' : 'password'"
      :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
      @click:append="showPassword = !showPassword"
      filled
    ></v-text-field>
    <v-text-field
      label="Confirmation"
      v-model="password_confirmation"
      :type="showPasswordConfirmation ? 'text' : 'password'"
      :append-icon="showPasswordConfirmation ? 'mdi-eye' : 'mdi-eye-off'"
      @click:append="showPasswordConfirmation = !showPasswordConfirmation"
      filled
    ></v-text-field>
  </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields'

export default {
  data: () => ({
    showPassword: false,
    showPasswordConfirmation: false,
  }),
  
  computed: {
    ...mapFields('users', [
      'form.name',
      'form.email',
      'form.role',
      'form.phone_number',
      'form.password',
      'form.password_confirmation',
    ])
  }
}
</script>