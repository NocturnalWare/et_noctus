var Vue    = require('./vue.min.js');
var jQuery = require('./jquery.min.js');
var Router = require('./vue-router.min.js');
var moment = require('moment');
Vue.use(require('./vue-resource.min.js'));

window.jQuery = jQuery;
window.Vue = Vue;
window.moment = moment;

new Vue({
    el: '#Login',
    data:{},
    ready: function(){
    },

});