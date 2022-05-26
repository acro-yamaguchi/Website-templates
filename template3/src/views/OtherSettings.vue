<template>
    <div class="otherSettings">
        <v-container class="py-6">
            <v-row justify="center">
                <v-col cols="8">
                    <update-top-image></update-top-image>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import updateTopImage from "../components/otherSettings/UpdateTopImage.vue"

export default {
    components: {
        updateTopImage
    },
  name: 'OtherSettings',

  data: () => ({

  }),
};
</script>