import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      id: "",
      token: ""
    },
    mutations: {
      updateUser(state, data) {
        state.id = data.id;
        state.token = data.token;
      }
    },
    actions: {
      auth(context, data) {
        context.commit('updateUser', data);
      }
    },
    plugins: [createPersistedState({ storage: window.sessionStorage })],
})
