<template>
  <div>
    <v-toolbar color="transparent" dark flat>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>mdi-arrow-left</v-icon>
      </v-btn>
      <v-toolbar-title>
        <h2 
          class="font-weight-regular">
          New User
        </h2>
      </v-toolbar-title>
    </v-toolbar>

    <v-row>
      <v-col lg="1" md="1" sm="12" cols="12"></v-col>
      <v-col lg="10" md="10" sm="12" cols="12">
        <v-card tile>
          <v-card-text>
            <v-text-field
              label="First Name"
              outlined
            ></v-text-field>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col lg="1" md="1" sm="12" cols="12"></v-col>
    </v-row>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>