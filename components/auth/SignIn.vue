<template>
  <div>
    <v-card tile elevation="10">
      <v-card-text>
        <div class="title text-center mb-10">
          <div 
            class="font-weight-regular">
            Dynuxtify
          </div>
        </div>
        
        <v-text-field
          label="Email"
          outlined
          prepend-inner-icon="mdi-email-outline"
        ></v-text-field>
        <v-text-field
          label="Password"
          type="password"
          outlined
          prepend-inner-icon="mdi-lock-outline"
        ></v-text-field>

        <div 
          @click="$router.push({ name: 'register' })"
          class="primary--text" 
          style="cursor: pointer">
          Create an account
        </div>
      </v-card-text>
      <v-card-actions>
        <v-btn 
          color="primary"
          @click="$router.push({ name: 'dashboard' })"
          depressed 
          tile
          block 
          large>
          Sign In
        </v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {

}
</script>