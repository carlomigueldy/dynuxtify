<template>
  <v-card flat>
    <v-card-text>
      <v-row>
        <v-col 
          lg="4"
          md="4"
          sm="12"
          cols="12">
          <UserProfileSide />
        </v-col>
        <v-col 
          lg="8"
          md="8"
          sm="12"
          cols="12">
          <UserProfileMain />
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script>
import UserProfileSide from '@/components/users/UserProfileSide'
import UserProfileMain from '@/components/users/UserProfileMain'

export default {
  components: {
    UserProfileSide,
    UserProfileMain,
  }
}
</script>