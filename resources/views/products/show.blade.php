@extends('layouts.master')
@section('facebook-tags')
          <meta property="og:image" content="http://54.149.181.47/etnoc/{{$product->main_image}}" />
          <meta property="og:description" content="{{$product->description}}" />
          <meta property="og:title" content="{{$product->name}}" />
@stop
@section('content')


<center>
	<div id="productShow">
			<span v-text="products.name">@{{name}}</span> <br><br><br><br><br><br>

		</div>











		<br><br><br><br><br><br>
		<legend style="margin-top:70px;text-align:center;color:#fff" class="product-header-etnoc">{{$product->name}}</legend>
		<div class="col-xs-12 col-md-7">
			<img class="img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}" />
		</div>
		<div class="well col-xs-12 col-md-2" style="color:#000;">
			{{$product->description}}
			<br><br>
			<input type="hidden" value="{{$product->id}}" name="product" class="product" />

			@if($product->onesize == 1)One Size Only ${{substr($product->prices->onesize,0,-2)}}.{{substr($product->prices->onesize,-2)}}
				<input type="hidden" value="onesize" name="size" class="size" />
				@else
				<select class="size col-sm-12" name="size" style="color:#000000;">
					@if($product->xsmall == 1 && $product->inventories->xsmall)
						<option value="xsmall">X-Small ${{substr($product->prices->xsmall,0,-2)}}.{{substr($product->prices->xsmall,-2)}}</option>
					@endif
					@if($product->small == 1 && $product->inventories->small)
						<option value="small">Small ${{substr($product->prices->small,0,-2)}}.{{substr($product->prices->small,-2)}}</option>
					@endif

					@if($product->medium == "1" && $product->inventories->medium)
						<option value="medium">Medium ${{substr($product->prices->medium,0,-2)}}.{{substr($product->prices->medium,-2)}}</option>
					@endif

					@if($product->large == "1" && $product->inventories->large)
						<option value="large">Large ${{substr($product->prices->large,0,-2)}}.{{substr($product->prices->large,-2)}}</option>
					@endif

					@if($product->xlarge == "1" && $product->inventories->xlarge)
						<option value="xlarge">X-Large ${{substr($product->prices->xlarge,0,-2)}}.{{substr($product->prices->xlarge,-2)}}</option>
					@endif

					@if($product->xxlarge == "1" && $product->inventories->xxlarge)
						<option value="xxlarge">XX-Large ${{substr($product->prices->xxlarge,0,-2)}}.{{substr($product->prices->xxlarge,-2)}}</option>
					@endif

					@if($product->xxxlarge == "1" && $product->inventories->xxxlarge)
						<option value="xxxlarge">XXX-Large ${{substr($product->prices->xxxlarge,0,-2)}}.{{substr($product->prices->xxxlarge,-2)}}</option>
					@endif
				</select>
			@endif	
				<br>
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
	</center>
	<div class="col-md-3"></div>

	@section('javascript')
		<script>

		new Vue({
		    el: '#productShow',
		    data:{
		    	products: etnoc.products,
		    },
		    methods:{
		    	thisworks: function(){
		    		console.log('oh yeah. this fuckin works.', warehouse.$data.thisworks);
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
	 //    	var url = "{{route('cart.add')}}";
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