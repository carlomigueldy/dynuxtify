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

    <v-row justify="center" align="center">
      <v-col lg="11" md="11" sm="12" cols="12">
        <v-card>
          <v-card-text>
            <v-text-field
              label="First Name"
            ></v-text-field>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>