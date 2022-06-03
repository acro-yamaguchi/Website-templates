<template>
    <div>
        <v-container fluid>
            <v-row>
                <v-col
                v-for="(image, i) in images"
                :key="i"
                class="d-flex child-flex"
                cols="4"
                >
                    <v-img
                        :src="image.src"
                        aspect-ratio="1"
                        class="grey lighten-2"
                    >
                        <template v-slot:placeholder>
                            <v-row
                                class="fill-height ma-0"
                                align="center"
                                justify="center"
                            >
                                <v-progress-circular
                                indeterminate
                                color="grey lighten-5"
                                ></v-progress-circular>
                            </v-row>
                        </template>
                    </v-img>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'App',
    data: () => ({
        images: [],
    }),
    mounted() {
        axios.get('./api/getImages.php').then((response) => {
            this.images = response
        })
    }
};
</script>

<style scoped>

</style>