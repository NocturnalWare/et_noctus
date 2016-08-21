var Vue    = require('vue');

var inventoryManager = new Vue({
    el: '#inventoryManager',
    data: {
        products:{},
        search_input: {'input':''},
        categories:['Tees', '¾ Tees', 'Tanks', 'Hoodies', 'Pants', 'Accessories', 'Ticket'],
    },
    methods:{
        showInventory: function(product){
            this.products.forEach(function(product){
                product.show_table = false;
            });

            product.show_table = !product.show_table;
        },
        saveInventory: function(product){
            var data = {};
            var url = jQuery('#inventoryManager').attr('route');
            var token = jQuery('#inventoryManager').attr('token');
            data.product = product; 
            data._token = token;
            jQuery.ajax({
                type: "POST",
                url: url,
                data: data,
                cache: false,
                success: function(response){ 
                    product.updated = true;
                }
            });
            return false;
        },
    },
    ready: function ready() {
    }

});

if(etnoc.products){
    inventoryManager.$set('products', etnoc.products);
}