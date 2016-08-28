var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  shows: etnoc.shows,
}

const mutations = {
  INCREMENT (state) {
    state.count++
  }
}

export default new Vuex.Store({
  state,
  mutations
})