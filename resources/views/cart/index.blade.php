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
		<div class="col-xs-12 col-md-3 col-md-offset-6 well" style="color:#000">
<total-container cart-amount="{{$cart_amount}}" xss-token="{{csrf_token()}}" route="{{route('shipping.rates.check')}}"></total-container>

			<div id="totalContainer" class="col-md-9 col-md-offset-2" >
				<center>
					<div class="row">
						<div class="from-group">
							<div class="input-group">
								<input class="form-control" @keyup.enter="checkShipping" v-model="formObj.zip" placeholder="Zip Code">
								<div v-if="checking == false" class="input-group-addon">
									<button @click="checkShipping" class="btn btn-xs btn-primary">
										Check Shipping Rate
									 	&nbsp&nbsp<i class="fa fa-send"></i> 
									</button>
								</div>
								<span v-if="checking == true" class="input-group-addon btn btn-xs btn-info">
									<i class="fa fa-spin fa-spinner"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control" @keyup.enter="checkShipping" v-model="formObj.code" placeholder="Code">
								<div v-if="checking == false" class="input-group-addon">
									<button @click="checkShipping" class="btn btn-xs btn-primary">
										Use Promo Code
									 	&nbsp&nbsp<i class="fa fa-send"></i> 
									</button>
								</div>
							<span v-if="checking == true" class="input-group-addon btn btn-xs btn-info">
								<i class="fa fa-spin fa-spinner"></i>
							</span>
						</div>
					</div>
				</center>
				<br>
				<div class="row">
					<div style="border-radius:35px">
						<div class="col-sm-11">
							<div class="col-xs-11 col-xs-offset-1">
								<label>
									Cart Total:
								</label>
								 <span class="pull-right">
									${{$cart_amount / 100}}
								 </span>
							</div>
							<div class="col-xs-11 col-xs-offset-1" v-if="formObj.promo_rate > 0">
								<label>
									Promo Discount:
								</label>
								 <span v-if="formObj.promo_rate > 0" class="pull-right">
								 	$<span v-text="formObj.promo_rate"></span>
								 </span>
							</div>
							<div class="col-xs-11 col-xs-offset-1">
								<label>
									Shipping Price:
								</label>
								 <span v-if="formObj.shipping_rate > 0" class="pull-right">
								 	$<span v-text="formObj.shipping_rate"></span>
								 </span>
								 <span v-if="formObj.shipping_rate < 0.01" class="pull-right">
								 	<i>Please Enter Your Zip Code Above</i>
								 </span>
							</div>
							<hr style="background-color:#000">
							<div class="col-xs-12">
								<h3>Total: 
									<span v-if="formObj.shipping_rate > 0" class="pull-right" v-text="'$'+formObj.total"></span>
									<span v-if="formObj.shipping_rate < 0.01" class="pull-right">${{$cart_amount / 100}}</span>
								</h3>
							</div>
						</div>
					</div>
					
					<a v-if="formObj.shipping_rate > 0" class="btn btn-lg btn-primary col-xs-12" href="{{route('shipping.create')}}">
						Checkout <i class="fa fa-arrow-right pull-right"></i>
					</a>

					<span v-if="formObj.shipping_rate < 0.01" class="btn btn-lg btn-default col-xs-12" disabled>
						Checkout <i class="fa fa-ban pull-right"></i>
					</span>
				</div>
			</div>
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