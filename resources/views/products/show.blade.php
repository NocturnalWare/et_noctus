@extends('layouts.master')
@section('facebook-tags')
	<meta property="og:image" content="http://54.149.181.47/etnoc/{{$product->main_image}}" />
	<meta property="og:description" content="{{$product->description}}" />
	<meta property="og:title" content="{{$product->name}}" />
@stop
@section('content')


<center>
	<div id="productShow">
		<div class="col-xs-12 col-md-7">
			<legend>
				<h3 v-text="products.name"></h3>
			</legend>
			<img class="img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}" />
		</div>
		<div class="well col-xs-12 col-md-2" style="color:#000;">
			<span v-text="products.description"></span>
			<br><br>
			<span v-if="products.onesize === 1">
				One Size Only $<span v-text="parseInt(products.prices.onesize)/100"></span>
			</span>
			<select v-if="products.onesize === 0" class="col-sm-12 form-control" v-model="formObj.size">
				<option v-if="products.inventories.xsmall > 0 && products.prices.xsmall > 0" value="xsmall" v-text="'X-Small $'+parseInt(products.prices.xsmall)/100"></option>
				<option v-if="products.inventories.small > 0 && products.prices.small > 0" value="small" v-text="'Small $'+parseInt(products.prices.small)/100"></option>
				<option v-if="products.inventories.medium > 0 && products.prices.medium > 0" value="medium" v-text="'Medium $'+parseInt(products.prices.medium)/100"></option>
				<option v-if="products.inventories.large > 0 && products.prices.large > 0" value="large" v-text="'Large $'+parseInt(products.prices.large)/100"></option>
				<option v-if="products.inventories.xlarge > 0 && products.prices.xlarge > 0" value="xlarge" v-text="'X-Large $'+parseInt(products.prices.xlarge)/100"></option>
				<option v-if="products.inventories.xxlarge > 0 && products.prices.xxlarge > 0" value="xxlarge" v-text="'XX-Large $'+parseInt(products.prices.xxlarge)/100"></option>
				<option v-if="products.inventories.xxxlarge > 0 && products.prices.xxxlarge > 0" value="xxxlarge" v-text="'XXX-Large $'+parseInt(products.prices.xxxlarge)/100"></option>
			</select>
			<br>
			<button @click="testSize">sizer</button>
			<div id="checkCart"></div> 
			<br>
			@if($product->id !== 39)
				<button id="cart" type="button" class="col-sm-12 btn btn-sm btn-default"><i class="fa fa-plus"></i> Add to Cart</button>
			@else
				<h3> This item is sold out :( </h3>
			@endif
				<br><br>
			<a href="{{route('cart.index')}}" class="col-sm-12 btn btn-sm btn-default"><i class="fa fa-shopping-cart"></i> View Cart</a>
			<div class="row">
				<div class="col-sm-6 btn" style="color:transparent">
					<div class="fb-like" 
						data-href="http://store.eternallynocturnal.com/products/{{$product->id}}"
						data-layout="button_count" 
						data-action="like">
					</div>
				</div>
				<div class="col-sm-6 btn">
					<div>
						<div class="fb-share-button" data-href="http://store.eternallynocturnal.com/products/{{$product->id}}" data-layout="button"></div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</center>
	<div class="col-md-3"></div>

	@section('javascript')
		<script>


		var warehouse = new Vue({
		    el: '#wareHouse',
		    data:{
		    	thisworks: etnoc.cart,
		    },
		    ready: function(){
		    	console.warn('thisworks')
		    },

		});

		new Vue({
		    el: '#productShow',
		    data:{
		    	products: etnoc.products,
		    	formObj:{'product_id':etnoc.products.id, 'cart_id':"{{ Session::get('cart_id') }}", 'quantity':'1', 'size': etnoc.products.onesize === 1 ? 'onesize' : '', 'color':'base', '_token':'{{csrf_token()}}' },
		    },
		    methods:{
		    	testSize: function(){
		    		let response = this.$http.post("{{route('cart.store')}}", this.formObj);
					response.then(function(response){
						console.log(response.data);
					});
		    	},
		    },
		    ready: function(){
		    },
		});


		// checkCart();
		// function checkCart(){
		// 	var $post = {};
	 //        var url = "{{route('cart.check')}}";
	 //        $post.product = jQuery(".product:first").val();
	 //        $post._token = "{{csrf_token()}}";
	 //        jQuery.ajax({
	 //            type: "POST",
	 //            data: $post,
	 //            url: url,
	 //            cache: false,
	 //            success: function(data){
		// 			jQuery('#checkCart').html('');
		// 			jQuery.each(data, function(val, text){
		// 				if(text.size == 'onesize'){
		// 					jQuery('#checkCart').append(text.quantity+' Currently in your cart.<br>');
		// 				}else{
		// 					jQuery('#checkCart').append(text.quantity+" "+text.size+' Currently in your cart.<br>');
		// 				}
		// 			});
		// 			if(data > ''){
		// 				jQuery('#showCartIcon').removeClass('hidden');
		// 				jQuery('#hideCartIcon').addClass('hidden');					
		// 			}
	 //               return;
	 //            }
	 //        });
		// 	return false;	
		// }

			
		// jQuery('#cart').on('click', function(){
		// 	var $post = {};
	 //    	var url = "{{route('cart.store')}}";
	 //        $post.size = jQuery(this).parent().find('.size').val(); 
	 //        $post.product = jQuery(this).parent().find('.product').val(); 
	 //        $post._token = "{{csrf_token()}}";
	 //        jQuery.ajax({
	 //        type: "POST",
	 //        url: url,
	 //        data: $post,
	 //        cache: false,
	 //        success: function(data){            	

	 //            	if(data['failure']){
	 //            		return jQuery('#checkCart').append(data['failure']+'<br>');
	 //            	}

		// 		jQuery('.ajaxCart').html(data);
	 //           	checkCart();
	 //           	return;
	 //        }
	 //        });
	 //        return false;
		// });
		</script>
	@stop
@stop