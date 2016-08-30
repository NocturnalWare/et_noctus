var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
	shows: etnoc.shows,
  product: [],
	products:[],
	cart: etnoc.cart,
  checkingServerForUpdate: false,
  checkoutCartFormObj: {zip:'', _token : '', promo_rate : 0, shipping_rate : 0, total : 0, code : ''},
	cart_quantity: etnoc.cart_quantity,
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

if(etnoc.products){
  state.product = etnoc.products;
  state.products = etnoc.products;
}

export default new Vuex.Store({
  state,
  mutations
})