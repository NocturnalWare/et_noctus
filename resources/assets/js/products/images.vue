<template>

</template>

<script>
    import store from './store.js';
    
    export default{
        props:['token', 'route'],
        computed: {

        },
        methods:{
            addProduct: function(){
                var data = {};
                data.product = this.product; 
                data.inventory = this.inventory;
                data.prices = this.price;
                data._token = this.token;
                jQuery.ajax({
                    type: "PUT",
                    url: this.route,
                    data: data,
                    cache: false,
                    success: function(response){ 
                        window.location.reload();
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
    }


</script>