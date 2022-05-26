import Vue from 'vue'
import VueRouter from 'vue-router'
import Store from '@/store/index.js'

import App from '../App.vue'
import UserApp from '../UserApp.vue'
import Top from '../views/Top.vue'
import Contact from '../views/Contact.vue'

import AdminApp from '../AdminApp.vue'
import EditNews from '../views/EditNews.vue'
import ReleasedNews from '../views/ReleasedNews.vue'
import OtherSettings from '../views/OtherSettings.vue'

import Login from '../views/Login.vue'
import List from '../views/newsList.vue'


import axios from "axios"

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'App',
    component: App,
    redirect: '/top',
    children: [
      {
        path: '/top',
        name: 'UserApp',
        component: UserApp,
        children: [
          {
            path: '/top',
            name: 'Top',
            component: Top
          },
          {
            path: '/contact',
            name: 'Contact',
            component: Contact
          },
          {
            path: '/about',
            name: 'About',
            // route level code-splitting
            // this generates a separate chunk (about.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
          },
        ]
      },
      {
        path: '/admin',
        name: 'AdminApp',
        component: AdminApp,
        meta: { requiresAuth: true },
        redirect: '/admin/editNews',
        children: [
          {
            path: '/admin/editNews',
            name: 'EditNews',
            component: EditNews,
            meta: { requiresAuth: true }
          },
          {
            path: '/admin/releasedNews',
            name: 'ReleasedNews',
            component: ReleasedNews,
            meta: { requiresAuth: true }
          },
          {
            path: '/admin/otherSettings',
            name: 'OtherSettings',
            component: OtherSettings,
            meta: { requiresAuth: true }
          }
        ]
      },
      {
        path: '/admin/login',
        name: 'Login',
        component: Login,
      },
      {
        path: '/newsList',
        name: 'newsList',
        component: List
      },
    ]
  }
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
  let id = Store.state.id
  let token = Store.state.token
  axios.post('./api/check.php', {
    id: id,
    token: token
  })
  .then((response) => {
    if(to.matched.some(record => record.meta.requiresAuth) && !response.data){
      next({ path: '/admin/login', query: { redirect: to.fullPath } })
    } else {
      next()
    }
  })
})

export default router
