var Vue    = require('./vue.min.js');
var jQuery = require('./jquery.min.js');
Vue.use(require('./vue-resource.min.js'));


window.jQuery = jQuery;
window.Vue = Vue;


new Vue({
    el: '#Login',
    data:{},
    ready: function(){
    },

});