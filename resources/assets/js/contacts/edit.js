var Vue    = require('vue');

var editContact = new Vue({
    el: '#editContact',
    data: {
        contact:{},
        saved: false,
    },
    methods:{
        saveContact: function(){
            var data = {};
            var token = jQuery('#editContact').attr('token');
            data.contact = this.contact;
            data.phones = this.contact.phones;
            data.emails = this.contact.emails;
            data._token = token;
            // console.log(data);
            jQuery.ajax({
                type: "POST",
                url: jQuery('#editContact').attr('route'),
                data: data,
                cache: false,
                success: function(response){ 
                    editContact.$set('saved', true);
                }
            });
            return false;
        },
    },
    ready: function ready() {
    }

});

if(etnoc.contact){
    editContact.$set('contact', etnoc.contact);
}