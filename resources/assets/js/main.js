var Vue    = require('./vue.min.js');
var jQuery = require('./jquery.min.js');
var Router = require('./vue-router.min.js');
var moment = require('moment');
Vue.use(require('./vue-resource.min.js'));

window.jQuery = jQuery;
window.Vue = Vue;
window.moment = moment;

import editProduct from './products/edit.js';
import addContact from './contacts/create.js';
import editContact from './contacts/edit.js';
import createProduct from './products/create.js';
import inventoryManager from './products/inventory.js';
import contactManager from './contacts/index.js';


window.wareHouse = new Vue({
    el: '#wareHouse',
    data:{},
    components:{
    	editProduct,
    	editContact,
    	createProduct,
    },
    ready: function(){
    },

});