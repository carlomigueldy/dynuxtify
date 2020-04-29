<template>
  <v-card>
    <v-alert 
      border="left"
      dense
      colored-border
      :color="borderColor">
      <v-row 
        justify="space-around" 
        align="center">
        <v-col>
          <v-sheet>
            <v-card-title 
              class="font-weight-regular" 
              v-text="title"
            ></v-card-title>
            <v-card-subtitle 
              v-if="!!subtitle"
              v-text="subtitle"
            ></v-card-subtitle>
          </v-sheet>
        </v-col>
        <v-col>
          <v-card-text 
            class="text-center">
            <div class="display-1">
              {{ numberFormat(value) }}
              <!-- <number
              :from="0"
              :to="value"
              :format="
                format === 'number'
                ? numberFormat : 
                format === 'money' 
                ? moneyFormat :
                null
              "
              :duration="duration"
              :delay="delay"
              easing="Power1.easeOut"/> -->
            </div>
          </v-card-text>
        </v-col>
      </v-row>
    </v-alert>
  </v-card>
</template>

<script>
export default {
  props: {
    // Title of the card
    title: {
      type: String,
      default: () => 'Title',
    },

    // Subtitle of the card
    subtitle: {
      type: String,
    },
    
    // The value of the count
    value: {
      type: Number,
      default: () => 0,
    },

    // Border color for the card
    borderColor: {
      type: String,
      default: () => 'primary',
    },

    // Allows number and money format
    format: {
      type: String,
      default: () => 'number',
    },

    // Total time duration of the number animation
    duration: {
      type: Number,
      default: () => 1,
    },

    // The delay before the animation executes
    delay: {
      type: Number,
      default: () => 0,
    },
  },

  methods: {
    // The default format for the number animation component
    // Reference: https://stackoverflow.com/questions/2901102/how-to-print-a-number-with-commas-as-thousands-separators-in-javascript
    numberFormat(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
  }
}
</script>