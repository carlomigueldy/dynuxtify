<template>
  <v-card flat>
    <v-card-title class="font-weight-regular">
      <v-icon left>mdi-cog</v-icon>
      Settings
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider></v-divider>
    <v-card-text>
      <v-row>
        <v-col>
          <v-switch
            label="Allow login"
            color="primary"
          ></v-switch>
          <v-switch
            label="Receive notifications"
            color="primary"
          ></v-switch>
        </v-col>
        <v-col>
          <v-select
            solo
          ></v-select>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script>
export default {

}
</script>