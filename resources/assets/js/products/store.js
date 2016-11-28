var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  product: [],
  inventory: {},
  price: {},
  categories: ['Tees', '¾ Tees', 'Tanks', 'Hoodies', 'Pants', 'Accessories', 'Ticket'],
}

const mutations = {

}

if(typeof etnoc !== 'undefined'){
  if(etnoc.product){

    state.product = etnoc.product;
    state.inventory = etnoc.product.inventories;
    state.price = etnoc.product.prices;
  }
}

export default new Vuex.Store({
  state,
  mutations
})