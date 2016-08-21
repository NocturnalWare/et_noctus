var Vue    = require('vue');

var editProduct = new Vue({
    el: '#editProduct',
    data: {
        product:{},
        inventory:{},
        price:{},
        categories:['Tees', '¾ Tees', 'Tanks', 'Hoodies', 'Pants', 'Accessories', 'Ticket'],
    },
    methods:{
        addProduct: function(){
            var data = {};
            var url = jQuery('#editProduct').attr('route');
            var token = jQuery('#editProduct').attr('token');
            data.product = this.product; 
            data.inventory = this.inventory;
            data.prices = this.price;
            data._token = token;
            jQuery.ajax({
                type: "PUT",
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
        console.log(this.product);
    }

});

if(etnoc.product){
    editProduct.$set('product', etnoc.product);
    editProduct.$set('inventory', etnoc.product.inventories);
    editProduct.$set('price', etnoc.product.prices);
}