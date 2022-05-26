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
            @click="$vuetify.goTo('#views')"
          >
            {{ tab.name }}
          </v-tab>
        </v-tabs>
      </template>
    </v-app-bar>

    <v-main>
      <v-container fluid class="pa-0">
        <v-row justify="center" no-gutters>
          <v-col cols="12" md="9">
            <v-img
              alt="TOP画像"
              :src="top_image.image_url == null ? require('@/assets/Top.png') : top_image.image_url"
              width="100%"
              transition="fade-transition"
            />
          </v-col>
        </v-row>
        <!-- お知らせがないとき -->
        <v-row justify="center" v-if="news.length === 0">
          <v-col cols="12" md="10">
            <v-card width="100%" height="200px" class="d-flex justify-center align-center">
              <span>現在お知らせはありません</span>
            </v-card>
          </v-col>
        </v-row>
        <!-- お知らせが少ないとき -->
        <v-row justify="center" v-else-if="news.length === 1 || news.length === 2 && !$vuetify.breakpoint.mobile">
          <v-col cols="12" class="text-h5 text-center">【お知らせ】</v-col>
          <v-col cols="10" sm="5" v-for="item in news" :key="item">
            <v-card
            width="100%"
            @click.native.prevent="show_detail(item)"
            >
              <v-img
                height="160px"
                contain
                :src="item.image === null ? require('@/assets/news.png') : item.image"
              />
              <v-card-title class="text-body-1">{{ item.title }}</v-card-title>
              <v-card-text class="text--primary">{{ item.summary }}</v-card-text>
              <v-card-action>
                <v-btn
                  text
                  color="primary"
                  plain
                >>詳細を見る</v-btn>
                
              </v-card-action>
            </v-card>
          </v-col>
          <v-col cols="12" md="10" class="d-flex justify-end align-center">
            <v-btn
              text
              color="primary"
              plain
              to="/newsList"
            >>お知らせ一覧</v-btn>
          </v-col>
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
        </v-row>
        <v-row justify="center" v-else>
          <v-col cols="12" class="text-h5 text-center">【お知らせ】</v-col>
          <v-col cols="12" style="justify-content: center">
            <v-slide-group show-arrows center-active>
              <v-slide-item
                v-for="item in news"
                :key="item"
              >
                <v-card
                :width="$vuetify.breakpoint.mobile ? (news_width - 22) : (news_width / 2 - 10)"
                style="margin:5px;"
                :ripple="false"
                @click.native.prevent="show_detail(item)"
                >
                  <v-img
                    height="160px"
                    :src="item.image === null ? require('@/assets/news.png') : item.image"
                    contain
                  />
                  <v-card-title class="text-body-1">{{ item.title }}</v-card-title>
                  <v-card-text class="text--primary">{{ item.summary }}</v-card-text>
                  <v-card-action>
                    <v-btn
                      text
                      color="primary"
                      plain
                    >>詳細を見る</v-btn>
                    
                  </v-card-action>
                </v-card>
              </v-slide-item>
            </v-slide-group>
          </v-col>
          <v-col cols="12" md="10" class="d-flex justify-end align-center">
            <v-btn
              text
              color="primary"
              plain
              to="/newsList"
            >>お知らせ一覧</v-btn>
          </v-col>
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
        </v-row>
      </v-container>

      <transition name="fade">
        <router-view id="views"/>
      </transition>
    </v-main>

    <v-footer padless dark>
      <v-col cols="12" class="text-center">
        2022 ― <strong>Happy Position</strong>
      </v-col>
    </v-footer>
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
    news_width: null,
  }),
  created() {
    axios.get('./api/getNews.php').then((response) => {
      this.news = response.data
    })
    axios.get('./api/getTopImage.php').then((response) => {
      this.top_image = response.data[0]
    })
  },
  mounted() {
    this.getWidth()
    window.addEventListener('resize', this.getWidth)
  },
  methods: {
    show_detail(item) {
      this.dialog = true
      this.dialog_title = item.title
      this.dialog_content = item.content
      this.dialog_image = item.image
    },
    getWidth() {
      let slide_wrapper = document.getElementsByClassName("v-slide-group__wrapper");
      let news_width = slide_wrapper[0].clientWidth
      this.news_width = news_width - 104
    }
  }
};
</script>

<style scoped>
.fade-enter-active {
  transition: opacity 1s;
  opacity: 0;
}

.fade-enter-to {
  opacity: 1;
}
</style>