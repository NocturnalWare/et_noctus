var Vue    = require('vue');

var createContact = new Vue({
    el: '#createContact',
    data: {
        contact:{'phones':[], 'emails':[], 'product':{
            'f_name':'',
            'l_name':'',
            'city':'',
            'state':'',
            'zip':'',
            'facebook':'',
            'twitter':'',
            'linkedin':'',
            'instagram':'',
            'snapchat':'',
            'website':'',
            'notes':'',
        }},
        newPhone: {'number':'', 'label':''},
        newEmail: {'email':'', 'label':''},
        saved: false,
    },
    methods:{
        saveContact: function(){
            this.addNewPhone();
            this.addNewEmail();
            var data = {};
            var token = jQuery('#createContact').attr('token');
            data.contact = this.contact;
            data.phones = this.contact.phones;
            data.emails = this.contact.emails;
            data._token = token;
            // console.log(data);
            jQuery.ajax({
                type: "POST",
                url: jQuery('#createContact').attr('route'),
                data: data,
                cache: false,
                success: function(response){ 
                    createContact.$set('saved', true);
                }
            });
            return false;
        },
        addNewPhone: function(){
            if(this.newPhone.number.length > 0 || this.newPhone.label.length > 0){
                this.contact.phones.push(this.newPhone);
                this.newPhone = {'number':'', 'label':''};
            }
        },
        addNewEmail: function(){
            if(this.newEmail.email.length > 0 || this.newEmail.label.length > 0){
                this.contact.emails.push(this.newEmail);
                this.newEmail = {'email':'', 'label':''};
            }
        },
    },
    ready: function ready() {
    }

});