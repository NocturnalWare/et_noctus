var Vue    = require('vue');

var contactManager = new Vue({
    el: '#contactManager',
    data: {
        contacts:{},
        search_input: {'input':''},
    },
    methods:{
    },
    ready: function ready() {
    }

});

if(etnoc.contacts){
    contactManager.$set('contacts', etnoc.contacts);
}