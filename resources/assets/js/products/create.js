var Vue    = require('vue');

var newProduct = new Vue({
    el: '#createProduct',
    data: {
        product:{'name':'', 'description':'', 'category':'', 'display_price_min':'', 'display_price_max':'', 'active':1, 'onsale':0, 'upcomming':0, 'preorder':0, 'onesize':0, 'main_image':''},
        inventory:{'xsmall':'', 'small':'', 'medium':'', 'large':'', 'xlarge':'', 'xxlarge':'', 'xxxlarge':''},
        price:{'xsmall':'', 'small':'', 'medium':'', 'large':'', 'xlarge':'', 'xxlarge':'', 'xxxlarge':''},
        categories:['Tees', '¾ Tees', 'Tanks', 'Hoodies', 'Pants', 'Accessories', 'Ticket'],
    },
    methods:{
        addProduct: function(){
            var data = {};
            var url = jQuery('#createProduct').attr('route');
            var token = jQuery('#createProduct').attr('token');
            data.product = this.product; 
            data.inventory = this.inventory;
            data.prices = this.price;
            data._token = token;
            // console.log(data);
            jQuery.ajax({
                type: "POST",
                url: url,
                data: data,
                cache: false,
                success: function(response){ 
                    window.location = response;
                }
            });
            return false;
        },
        setActive: function(){
            if(this.product.active === 1){
                this.product.active = 0;
            }else{
                this.product.active = 1;
            }
        },
        setOnesize: function(){
            if(this.product.onesize === 1){
                this.product.onesize = 0;
            }else{
                this.product.onesize = 1;
            }
        }
    },
    ready: function ready() {
    }

});


