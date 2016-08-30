	<script>
	var totalContainer = new Vue({
	    el: '#totalContainer',
	    data:{
	    	checking: false,
	    	products: etnoc.products,
	    	cart: etnoc.cart,
	    	formObj:{'zip':'', '_token':'{{csrf_token()}}', 'promo_rate':'0', 'shipping_rate':'0', 'total':'', 'code':''},
	    },
	    methods:{
	    	checkShipping: function(){
	    		if(this.formObj.zip.length == 5){
		    		var response = this.$http.post("{{route('shipping.rates.check')}}", this.formObj);
		    		this.checking = true;
					response.then(function(response){
						totalContainer.$set('formObj.shipping_rate', response.data.rate);
						totalContainer.$set('formObj.promo_rate', response.data.promo_rate);
						totalContainer.$set('formObj.total', response.data.total);
						totalContainer.$set('checking', false);
					});
	    		}
	    	},
	    },
	    ready: function(){
	    },
	});
	</script>