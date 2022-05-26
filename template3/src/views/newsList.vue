<template>
<v-app>
    <v-app-bar
      app
      color="#b5e61d"
      short
      flat
    >
      <div class="d-flex align-center">
        <v-img
          alt="Happy Position Logo"
          contain
          src="@/assets/logo.png"
          height="56"
          max-width="56"
          transition="scale-transition"
        />
        <v-toolbar-title class="text-subtitle-1 text-md-h5">Happy Position ホームページ</v-toolbar-title>
      </div>
      <template v-slot:extension>
        <v-tabs
        background-color="#b5e61d"
        grow
        color="basil"
        >
          <v-tab
            v-for="tab in tabs"
            :key="tab"
            :to="tab.to"
          >
            {{ tab.name }}
          </v-tab>
        </v-tabs>
      </template>
    </v-app-bar>

    <v-main>
        <v-container>
            <v-row justify="center">
                <v-col cols="12" class="text-h5 text-center">【お知らせ一覧】</v-col>
                <v-col cols="12" md="8">
                    <v-card v-for="item in news" :key="item" class="mb-3 pb-4" @click.native.prevent="show_detail(item)">
                        <v-card-title>
                            <img :src="item.image == null ? require('@/assets/news.png') : item.image">
                        </v-card-title>
                        <v-card-content>
                            <div class="d-flex align-center pl-3">
                                <v-icon small>mdi-clock-time-three-outline</v-icon>
                                <span class="ml-1">{{ item.create_at }}</span>
                            </div>
                            <v-divider class="mx-3 mb-2"></v-divider>
                            <v-card-title class="text-body-1">{{ item.title }}</v-card-title>
                            <v-card-text class="text--primary">{{ item.summary }}</v-card-text>
                        </v-card-content>
                        <v-card-action>
                            <v-btn
                              text
                              color="primary"
                              plain
                            >>詳細を見る</v-btn>
                        </v-card-action>
                    </v-card>
                    <!-- お知らせがないとき -->
                    <v-card v-if="news.length === 0" width="100%" height="200px" class="d-flex justify-center align-center">
                      <span>現在お知らせはありません</span>
                    </v-card>
                    
                    <v-dialog v-model="dialog" max-width="800">
                      <v-card>
                        <v-card-title class="text-h5">
                          {{ dialog_title }}
                          <v-img
                            width="100%"
                            :src="dialog_image === null ? require('@/assets/news.png') : dialog_image"
                            contain
                          />
                        </v-card-title>
                        <v-card-text style="white-space: pre-wrap;">
                          {{ dialog_content }}
                        </v-card-text>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn
                            color="#b5e61d"
                            text
                            @click.stop="dialog = false"
                          >
                            CLOSE
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</v-app>
</template>

<script>
import axios from 'axios'
export default {
  name: 'App',

  data: () => ({
    tabs: [
      { name:'トップページ', to: '/top' },
      { name:'お問い合わせ', to: '/contact' },
      { name:'会社案内', to: '/about' },
    ],  
    news: [],
    top_image: [],
    dialog: false,
    dialog_title: '',
    dialog_content: '',
    dialog_image: null,
  }),
  created() {
    axios.get('./api/getNewsList.php').then((response) => {
      this.news = response.data
    })
  },
  methods: {
    show_detail(item) {
      this.dialog = true
      this.dialog_title = item.title
      this.dialog_content = item.content
      this.dialog_image = item.image
    },
  }
};
</script>

<style scoped>
img{
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>