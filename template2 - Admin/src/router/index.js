import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Page1.vue'
import Top from '../views/Top.vue'
import Page2 from '../views/Page2.vue'
import About from '../views/About.vue'
import ImageList from '../components/ImageList.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/page1',
    name: 'Home',
    component: Home
  },
  {
    path: '/editNews',
    name: 'About',
    component: About
  },
  {
    path: '/page2',
    name: 'Page2',
    component: Page2
  },
  {
    path: '/',
    name: 'Top',
    component: Top
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/list',
    name: 'ImageList',
    component: ImageList
  },
]

const router = new VueRouter({
  routes
})

export default router
