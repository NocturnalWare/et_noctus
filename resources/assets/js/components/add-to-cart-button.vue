<template>
  <span>
    <span v-if="product.onesize === 1">
        <dt>One Size Only $<span v-text="displayPrice(product.prices.onesize)"></span></dt>
    </span>
    <select v-if="product.onesize === 0" class="col-sm-12 form-control" v-model="addToCartformObj.size">
      <option value="" selected>Choose Size</option>
      <option v-if="showXsmall" value="xsmall" v-text="'X-Small $'+displayPrice(product.prices.xsmall)"></option>
      <option v-if="showSmall" value="small" v-text="'Small $'+displayPrice(product.prices.small)"></option>
      <option v-if="showMedium" value="medium" v-text="'Medium $'+displayPrice(product.prices.medium)"></option>
      <option v-if="showLarge" value="large" v-text="'Large $'+displayPrice(product.prices.large)"></option>
      <option v-if="showXlarge" value="xlarge" v-text="'X-Large $'+displayPrice(product.prices.xlarge)"></option>
      <option v-if="showXxlarge" value="xxlarge" v-text="'XX-Large $'+displayPrice(product.prices.xxlarge)"></option>
      <option v-if="showXxxlarge" value="xxxlarge" v-text="'XXX-Large $'+displayPrice(product.prices.xxxlarge)"></option>
    </select>
    <div v-for="c in cart">
      <div v-if="c.product_id == product.id">
        <span v-if="c.size !== 'onesize'">
          <span v-text="c.quantity"></span> 
          <span v-text="c.size | capitalize"></span> currently in your cart.
        </span>
        <span v-if="c.size == 'onesize'">
          <span v-text="c.quantity"></span> Currently in your cart.
        </span>
      </div>
    </div>
    <button @click="addToCart" type="button" class="col-sm-12 btn btn-sm btn-default"><i class="fa fa-plus"></i> Add to Cart</button>
  </span>
</template>

<script>
  import store from '../stores/store.js';

  export default{
    props: ['cartId', 'token', 'route'],
    computed: {
      product: function(){
        return store.state.product;
      },
      cart: function(){
        return store.state.cart;
      },
      addToCartformObj: function(){
        return {'product_id':this.product.id, 'cart_id':'', 'quantity':'1', 'size':'', 'color':'base'};
      },
      showXsmall: function(){return this.product.inventories.xsmall > 0 && this.product.prices.xsmall > 0},
      showSmall: function(){return this.product.inventories.small > 0 && this.product.prices.small > 0},
      showMedium: function(){return this.product.inventories.medium > 0 && this.product.prices.medium > 0},
      showLarge: function(){return this.product.inventories.large > 0 && this.product.prices.large > 0},
      showXlarge: function(){return this.product.inventories.xlarge > 0 && this.product.prices.xlarge > 0},
      showXxlarge: function(){return this.product.inventories.xxlarge > 0 && this.product.prices.xxlarge > 0},
      showXxxlarge: function(){return this.product.inventories.xxxlarge > 0 && this.product.prices.xxxlarge > 0},
    },
    data:{
    },
    methods: {
      displayPrice: function(product){
        return parseInt(product)/100;
      },
      addToCart: function(){
        var data = this.addToCartformObj;
        data.size = this.addToCartformObj.size;

        if(this.product.onesize === 1){
          data.size = 'onesize';
        }

        data._token = this.token;
        data.route = this.route;
        data.cart_id = this.cartId;

        if(data.size){
          var call = this.$http.post(this.route, data);
          call.then(function(response){
            store.dispatch('ADD_TO_CART', response.data.cart);
          });
        }
      },
    }
  }
</script>