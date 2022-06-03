<template>
    <div>
        <v-main>
            <section id="news">
                <v-container>
                    <v-row justify="center">
                        <v-col cols="12" class="text-center text-h3 mt-12">NEWS</v-col>
                        <v-col
                            v-for="(item, i) in news"
                            :key="i"
                            cols="12"
                            md="6"
                        >
                            <v-card flat class="py-3 px-2" color="grey lighten-4">
                                <v-img src="@/assets/news_img.jpg"></v-img>
                                <v-card-title
                                    class="font-weight-black text-uppercase px-auto"
                                    v-text="item.title"
                                >
                                </v-card-title>
                                <p class="text-subtitle-2 grey--text pl-4">{{ item.time }}</p>
                                <v-card-text
                                    class="text-center"
                                    v-text="item.text"
                                ></v-card-text>
                                <v-card-actions>
                                    <v-row justify="center">
                                        <v-btn text @click="readMore(item)">Read more</v-btn>
                                    </v-row>
                                </v-card-actions>
                            </v-card>
                        </v-col>   
                    </v-row>
                </v-container>

                <v-dialog v-model="dialog" max-width="800">
                    <v-card>
                        <v-card-title class="text-h5">
                            {{ dialog_news.title }}
                            <v-img
                            width="100%"
                            :src="dialog_image === null ? require('@/assets/news_img.jpg') : dialog_image"
                            contain
                            />
                        </v-card-title>
                        <v-card-text style="white-space: pre-wrap;">
                            {{ dialog_news.content }}
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                            color="black"
                            text
                            @click.stop="dialog = false"
                            >
                            CLOSE
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </section>
        </v-main>

    </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'App',

  data: () => ({
            news: [
                {
                    title: 'Title 1',
                    time: '2022/05/01',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sit amet sint velit tempora!',
                },
                {
                    title: 'Title 2',
                    time: '2022/05/01',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
                {
                    title: 'Title 3',
                    time: '2022/05/01',
                    text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cupiditate sit amet sint velit tempora!',
                },
                {
                    title: 'Title 4',
                    time: '2022/05/01',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor sed sem eu tempus.',
                },
            ],
            dialog: false,
            dialog_news:{},
        }),
    created() {
        axios.get('./api/getNews.php').then((response) => {
            this.news = response.data
        })
    },
    methods: {
        readMore(news) {
            this.dialog_news = Object.assign({}, news)
            this.dialog = true
        }
    }
};
</script>