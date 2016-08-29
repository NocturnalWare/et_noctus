var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
	shows: etnoc.shows,
  product: [],
	products:[],
	cart: etnoc.cart,
	cart_quantity: etnoc.cart_quantity,
}

const mutations = {
  ADD_TO_CART (state, data) {
    state.cart_quantity++;
    state.cart = data;
  }
}

if(etnoc.products){
  state.product = etnoc.products;
  state.products = etnoc.products;
}

export default new Vuex.Store({
  state,
  mutations
})