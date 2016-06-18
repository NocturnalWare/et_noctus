var Vue    = require('./vue.min.js');
var jQuery = require('./jquery.min.js');

window.jQuery = jQuery;


new Vue({
    el: '#Login',
    data:{},
    ready: function(){
    },

});

new Vue({
    el: '#wareHouse',
    data:{},
    ready: function(){
    	console.warn('thisworks')
    },

});