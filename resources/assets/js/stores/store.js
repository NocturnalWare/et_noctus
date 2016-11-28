var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
	shows: [],
  product: [],
	products:[],
  productNames: [],
	cart: {},
  search_input: {input : ''},
  checkingServerForUpdate: false,
  checkoutCartFormObj: {zip:'', _token : '', promo_rate : 0, shipping_rate : 0, total : 0, code : ''},
	cart_quantity: '',
}

const mutations = {
  ADD_TO_CART (state, data) {
    state.cart_quantity++;
    state.cart = data;
  },
  TOGGLE_CHECKING_FOR_SERVER_UPDATE (state){
    state.checkingServerForUpdate = !state.checkingServerForUpdate;
  },
  UPDATE_CHECKOUT_PRICES (state, data) {
    state.checkoutCartFormObj.shipping_rate = data.rate;
    state.checkoutCartFormObj.promo_rate = data.promo_rate;
    state.checkoutCartFormObj.total = data.total;
  }
}

if(typeof etnoc !== 'undefined'){

  if(etnoc.shows){
    state.shows = etnoc.shows
  }
  if(etnoc.cart){
    state.cart = etnoc.cart;
    state.cart_quantity = etnoc.cart_quantity;
  }

  if(etnoc.products){
    state.product = etnoc.products;
    state.products = etnoc.products;
  }

  if(etnoc.product_names){
    state.productNames = etnoc.product_names;
  }
}

export default new Vuex.Store({
  state,
  mutations
})