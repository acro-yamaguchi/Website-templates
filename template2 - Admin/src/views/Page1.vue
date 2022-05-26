<template>
    <div>
        <v-main>
            <section id="section3">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center text-h3 mt-12">SECTION3</v-col>
                        <v-col
                            v-for="({ icon, title, text }, i) in list_items"
                            :key="i"
                            cols="12"
                            md="6"
                        >
                            <v-card flat class="py-6 px-4" color="grey lighten-4">
                                <v-row justify="center">
                                    <v-avatar
                                        color="primary"
                                        size="90"
                                    >
                                        <v-icon
                                            x-large
                                            v-text="icon"
                                            color="#FFF"
                                        ></v-icon>
                                    </v-avatar>
                                </v-row>
                                <v-row justify="center" class="pa-0">
                                    <v-card-title
                                        class="font-weight-black text-uppercase px-auto"
                                        v-text="title"
                                    ></v-card-title>
                                </v-row>
                                <v-card-text
                                    class="text-center"
                                    v-text="text"
                                ></v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="10" class="text-center text-body-1 pre-line mb-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim gravida fringilla. In lorem risus, semper sed enim ut, posuere pulvinar justo. Ut dapibus tellus vehicula lacus finibus venenatis.
                        </v-col>        
                    </v-row>
                </v-container>
            </section>
        </v-main>

    </div>
</template>

<script>
export default {
  name: 'App',

  data: () => ({
            list_items: [
                {
                    icon: 'mdi-account-check',
                    title: 'Title 1',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sint possimus quidem atque harum excepturi nemo velit tempora! Enim inventore fuga, qui ipsum eveniet facilis obcaecati corrupti asperiores nam.',
                },
                {
                    icon: 'mdi-alarm-check',
                    title: 'Title 2',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim.',
                },
                {
                    icon: 'mdi-shield-check-outline',
                    title: 'Title 3',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sint possimus quidem atque harum excepturi nemo velit tempora! Enim inventore fuga, qui ipsum eveniet facilis obcaecati corrupti asperiores nam.',
                },
                {
                    icon: 'mdi-car-wash',
                    title: 'Title 4',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus. Vivamus et tristique magna, sed vehicula nunc. Etiam aliquet varius dui, vel consectetur risus. Pellentesque gravida elit eu enim.',
                },
            ],
        }),
};
</script>
