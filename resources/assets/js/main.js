var Vue    = require('./vue.min.js');
var jQuery = require('./jquery.min.js');
var VueResource = require('vue-resource');


window.jQuery = jQuery;
window.Vue = Vue;


new Vue({
    el: '#Login',
    data:{},
    ready: function(){
    },

});

var warehouse = new Vue({
    el: '#wareHouse',
    data:{
    	thisworks: etnoc,
    },
    ready: function(){
    	console.warn('thisworks')
    },

});