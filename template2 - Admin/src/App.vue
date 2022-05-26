<template>
  <v-app>
      <v-app-bar app color="rgba(0, 0, 0, 0.8)" height="56" dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer" color="fff"></v-app-bar-nav-icon>
        <v-toolbar-title class="headline">
            {{ title }}
        </v-toolbar-title>
      </v-app-bar>

      <v-navigation-drawer
        v-model="drawer"
        app
        bottom
        color="black"
        dark
      >
        <v-list>
          <v-list-item v-for="item in navi_list" :key="item.title">
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>

      <router-view></router-view>
  </v-app>
</template>

<script>
import Img1 from "@/assets/img1.jpg"
import Img2 from "@/assets/img2.jpg"
import Img3 from "@/assets/img3.jpg"
import Img4 from "@/assets/img4.jpg"

export default {
  name: 'App',

  data: () => ({
            title: 'Sample2',
            img_items: [
                { src: Img1 },
                { src: Img2 },
                { src: Img3 },
                { src: Img4 }
            ],
            carousel_height: window.innerHeight,
            top_div_style: {
                width: '100%',
                position: 'absolute',
                top: '0px',
                left: '0px',
                height: window.innerHeight + 'px',
            },
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
            drawer: false,
            navi_list: [
              { title: 'TOP' },
              { title: 'PAGE 2' },
              { title: 'PAGE 3' },
            ],
        }),
};
</script>

<style scoped>
  .pre-line {
    white-space: pre-line;
  }
</style>