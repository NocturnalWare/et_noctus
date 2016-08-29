var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
	shows: etnoc.shows,
	product: etnoc.products,
	addToCartformObj: {'product_id':etnoc.products.id, 'cart_id':'', 'quantity':'1', 'size': etnoc.products.onesize === 1 ? 'onesize' : '', 'color':'base'},
	cart: etnoc.cart,
	cart_quantity: etnoc.cart_quantity,
}

const mutations = {
  ADD_TO_CART (state, data) {
    state.cart_quantity++;
    state.cart = data;
  }
}

export default new Vuex.Store({
  state,
  mutations
})