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
        <v-toolbar-title class="text-subtitle-1 text-md-h5">Admin 編集画面</v-toolbar-title>
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
      <transition name="fade">
        <router-view/>
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
  name: 'AdminApp',

  data: () => ({
    tabs: [
      { name:'お知らせ追加/編集', to: '/admin/editNews' },
      { name:'お知らせ公開', to: '/admin/releasedNews' },
      { name:'その他部品編集', to: '/admin/otherSettings' },
    ],
    news: [],
    dialog: false,
    dialog_title: '',
    dialog_content: '',
    display_width: null,
    display_height: null,
  }),
  created() {
    axios.get('./api/getNews.php').then((response) => {
      this.news = response.data
    })

    this.display_width = document.body.clientWidth
    this.display_height = document.documentElement.clientHeight
  },
  methods: {

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