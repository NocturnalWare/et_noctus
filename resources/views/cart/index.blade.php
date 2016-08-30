@extends('layouts.master')

@section('content')
	@foreach($carts as $cart)
		<div class="row well en-cart-container">
			<div class="col-xs-12 col-md-3">
				<center>
					<img  style="height:200px" class="img-responsive" src="{{$cart->product->getMainImage()}}" />
				</center>
			</div>
			<div class="col-xs-12 col-md-9">
				<center style="margin-top:5%;">
					<h3>
							<div class="col-xs-12 col-md-3">
									<label>{{$cart->product->name}}<label><br>
							</div>
						</h3>

						<div class="col-xs-6 col-md-4" style="border:1px solid #000;">
							<label>Size:</label>
							{{studly_case($cart->size)}}
						</div>
						<div class="col-xs-6 col-md-5" style="border:1px solid #000;">
							<label>Quantity:</label>
							{{$cart->quantity}}
						</div>
					</center>
					<div class="col-xs-12 pull-right">
						<div class="col-xs-3 col-xs-offset-6"><br>
							<form action="{{route('cart.destroy', $cart->id)}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn btn-danger">Remove <i class="fa fa-times"></i></button>
							</form>
						</div>
					</div>
				<hr>
			</div>
		</div>
	@endforeach
	<div class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-6 well" style="color:#000;">
			<total-container cart-amount="{{$cart_amount}}" xss-token="{{csrf_token()}}" route="{{route('shipping.rates.check')}}"></total-container>
		</div>
	</div>
	<br><br>
	<div class="row">
		<form action="{{route('cart.empty')}}" method="POST">
			<input type="hidden" value="{{csrf_token()}}" name="_token">
			<button class="col-xs-offset-1 pull-left btn btn-xs btn-danger">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-shopping-cart fa-stack-1x"></i>
				  <i class="fa fa-ban fa-stack-2x"></i>
				</span>
				Empty Cart
			</button>
		</form>
	</div>
	<br><br>
@stop

@section('javascript')
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
@stop