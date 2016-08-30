<template>
	<div class=" col-xs-12">
		<check-shipping-rate :route="route" :xss-token="xssToken"></check-shipping-rate>
		<check-promo-code :route="route" :xss-token="xssToken"></check-promo-code>
		<div class="row well">
			<div style="border-radius:35px">
				<div class="col-sm-11">
					<div class="col-xs-11 col-xs-offset-1">
						<label>
							Cart Total:
						</label>
						 <span class="pull-right">
							{{correctStripePrice(cartAmount)}}
						 </span>
					</div>
					<div class="col-xs-11 col-xs-offset-1" v-if="hasPromoRate">
						<label>
							Promo Discount:
						</label>
						 <span class="pull-right" v-text="correctPrice(checkoutCartFormObj.promo_rate)"></span>
					</div>
					<div class="col-xs-11 col-xs-offset-1">
						<label>
							Shipping Price:
						</label>
					 	<span class="pull-right" v-if="hasShippingRate" v-text="correctPrice(checkoutCartFormObj.shipping_rate)"></span>
					 	<i class="text-danger pull-right" v-if="!hasShippingRate">Please Enter Your Zip Code Above</i>
					</div>
					<hr style="background-color:#000">
					<div class="col-xs-12" v-if="checkoutCartFormObj.shipping_rate > 0">
						<h3>Total: 
							<span  class="pull-right" v-text="correctPrice(checkoutCartFormObj.total)"></span>
						</h3>
					</div>
				</div>
			</div>
			<a href="{{checkoutRoute}}" v-bind:class="['', hasShippingRate ? 'btn-info' : 'btn-default']" v-bind:disabled="!hasShippingRate" class="btn btn-lg col-xs-12">
				Checkout <i v-bind:class="['', hasShippingRate ? 'fa-rocket' : 'fa-ban']" class="fa pull-right"></i>
			</a>
		</div>
	</div>
</template>

<script>
	import store from '../../stores/store.js';
	import checkShippingRate from './check-shipping-rate.vue';
	import checkPromoCode from './check-promo-code.vue';

	export default{

		props: ['cartAmount', 'xssToken', 'route', 'checkoutRoute'],
		components:{
			checkShippingRate,
			checkPromoCode,
		},
		computed:{
		    cart: function(){
		    	return store.state.cart;
		    },
		    checkoutCartFormObj: function(){
		    	return store.state.checkoutCartFormObj;
		    },
		    hasShippingRate: function(){
		    	return this.checkoutCartFormObj.shipping_rate > 0;
		    },
		    hasPromoRate: function(){
		    	return this.checkoutCartFormObj.promo_rate > 0;
		    }
		},
	    methods:{
	    	logToken: function(){
	    		console.log(this.xssToken);
	    	},
	    	correctStripePrice: function(price){
	    		var newprice = parseFloat(price) / 100;
	    		return '$'+newprice.toFixed(2)
	    	},
	    	correctPrice: function(price){
	    		var newprice = parseFloat(price);
	    		return '$'+newprice.toFixed(2)
	    	},
	    }
	}
</script>
