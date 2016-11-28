<template>
    <div class="col-xs-12 col-md-3 col-md-offset-1 well">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="search-input col-xs-12 form-control" v-model="search_input.input" style="background-color:#fff; width:100%">
        </div>
        <div v-for="product in products" class="row " v-show="product.name == search_input.input || search_input.input == ''">
            <button class="col-xs-12 btn" v-bind:class="['', product.updated === false ? 'btn-info' : 'btn-success']" @click="showInventory(product)">
                <span v-text="product.name"></span> <i class="fa fa-check fa-lg pull-right" v-if="product.updated === true"></i>
            </button>
            <div v-if="product.show_table === true">
                <div v-if="product.onesize === 1">
                    <span class="col-xs-12 input-group">
                        <label>One Size</label>
                        <span class="pull-right" v-text="'Last Updated at '+updated_at(product)"></span>
                        <input class="form-control" v-model="product.inventories.onesize">
                    </span>
                </div>
                <div v-if="product.onesize === 0">
                    <span class="col-xs-12 input-group">
                        <label>X-small</label>
                        <span class="pull-right" v-text="'Last Updated at '+updated_at(product)"></span>
                        <input class="form-control" v-model="product.inventories.xsmall">
                    </span>

                    <span class="col-xs-12 input-group">
                        <label>Small</label>
                        <input class="form-control" v-model="product.inventories.small">
                    </span>

                    <span class="col-xs-12 input-group">
                        <label>Medium</label>
                        <input class="form-control" v-model="product.inventories.medium">
                    </span>

                    <span class="col-xs-12 input-group">
                        <label>Large</label>
                        <input class="form-control" v-model="product.inventories.large">
                    </span>

                    <span class="col-xs-12 input-group">
                        <label>X-Large</label>
                        <input class="form-control" v-model="product.inventories.xlarge">
                    </span>
                    
                    <span class="col-xs-12 input-group">
                        <label>XX-Large</label>
                        <input class="form-control" v-model="product.inventories.xxlarge">
                    </span>

                    <span class="col-xs-12 input-group">
                        <label>XXX-Large</label>
                        <input class="form-control" v-model="product.inventories.xxxlarge">
                    </span>

                </div>
                <br>
                    <button class="btn btn-lg col-xs-12" @click="saveInventory(product)" v-bind:class="['', product.updated === false ? 'btn-warning' : 'btn-success']"><i class="fa fa-save"></i> Save</button>
                <br>
                <br>
            
            </div>
        </div>
    </div>
</template>
<script>
    var jQuery = require('../../jquery.min.js');
    import store from '../../stores/store.js';
    export default{
        props: ['route', 'token'],
        computed: {
            products: function(){
                return store.state.products;
            },
            search_input: function(){
                return store.state.search_input;
            }
        },
        methods:{
            updateSearch: function(){
                store.dispatch('UPDATE_SEARCH');
            },
            updated_at: function(product){
                return moment(product.inventories.updated_at).format('h:mA MM/DD/YYYY');
            },
            showInventory: function(product){
                this.products.forEach(function(product){
                    product.show_table = false;
                });

                product.show_table = !product.show_table;
            },
            saveInventory: function(product){
                var data = {};
                data.product = product; 
                data._token = this.token;
                jQuery.ajax({
                    type: "POST",
                    url: this.route,
                    data: data,
                    cache: false,
                    success: function(response){ 
                        product.updated = true;
                    }
                });
                return false;
            },
        },
    }

    jQuery(document).ready(function($) {
            var engine = new Bloodhound({
                local: store.state.productNames,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                datumTokenizer: Bloodhound.tokenizers.whitespace
            });
    
            var promise = engine.initialize();

            promise
            .done(function() {})
            .fail(function() { console.log('err, something went wrong :('); });
            $(".search-input").typeahead(
              {
                hint: true,
                highlight: true
              },
              {
                name: 'my-dataset',
                source:engine.ttAdapter(),
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<div class="row" @click="alert()" style="background-color:#fff"><button class="btn col-xs-12" style="background-color:#fff">'+data+'</button></div>'
                    }
                }

            });
        });
</script>