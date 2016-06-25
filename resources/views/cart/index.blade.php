@extends('layouts.master')

@section('content')
	@foreach($carts as $cart)
		<div class="row well en-cart-container">
			<div class="col-xs-12 col-md-3">
				<center>
					<img  style="height:200px" class="img-responsive" src="{{$cart->product->getMainImage()}}" />
				</center>
			</div>
			<div class="col-xs-12 col-md-9 padding-large-vertical">
				<h3>
					<center style="margin-top:5%;">
						<div class="col-xs-12 col-md-3">
								<label>{{$cart->product->name}}<label><br>
						</div>
						<div class="col-xs-6 col-md-2" style="border:1px solid #000;">
							<label>Size:</label>
							{{studly_case($cart->size)}}
						</div>
						<div class="col-xs-6 col-md-2" style="border:1px solid #000;">
							<label>Quantity:</label>
							{{$cart->quantity}}
						</div>
					</center>
					<div class="col-xs-12 col-md-2 pull-right">
						<div class="col-xs-3 col-xs-offset-6"><br>
							<form action="{{route('cart.destroy', $cart->id)}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn btn-danger">Remove <i class="fa fa-times"></i></button>
							</form>
						</div>
					</div>
				</h3>
				<hr>
			</div>
		</div>
	@endforeach
	
	<div class="en-total-container col-xs-12 col-md-3 col-md-offset-8 well">
		<div id="totalContainer">
			<center>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						Zip Code <input class="form-control" v-model="formObj.zip">
					</div>
					<div class="col-xs-11 col-md-6">
						<br><button @click="checkShipping" class="pull-right row btn btn-primary">Check Shipping Rate</button>
					</div>
				</div>
			</center>
			<br>
			<div v-if="formObj.shipping_rate > 0">
				<div style="border-radius:35px">
					<div class="col-sm-11">
						<div class="row col-xs-offset-1">
							<label>
								Cart Total:
							</label>
							 <span class="pull-right">
								${{$cart_amount / 100}}
							 </span>
						</div>
						<div class="row col-xs-offset-1">
							<label>
								Shipping Price:
							</label>
							 <span class="pull-right">
							 	$<span v-text="formObj.shipping_rate"></span>
							 </span>
						</div>
						<hr style="background-color:#000">
						<div class="row">
							<h3>Total:<span class="pull-right" v-text="formObj.total"></span></h3>
						</div>
					</div>
				</div>
				<a class="btn btn-lg btn-primary col-xs-12" href="">Checkout <i class="fa fa-arrow-right pull-right"></i></a>
			</div>
		</div>
	</div>
@stop

@section('javascript')
	<script>
	var totalContainer = new Vue({
	    el: '#totalContainer',
	    data:{
	    	products: etnoc.products,
	    	cart: etnoc.cart,
	    	formObj:{'zip':'', '_token':'{{csrf_token()}}', 'shipping_rate':'0', 'total':''},
	    },
	    methods:{
	    	checkShipping: function(){
	    		if(this.formObj.zip.length == 5){
		    		var response = this.$http.post("{{route('shipping.rates.check')}}", this.formObj);
					response.then(function(response){
						totalContainer.$set('formObj.shipping_rate', response.data.rate);
						totalContainer.$set('formObj.total', response.data.total);
					});
	    		}
	    	},
	    },
	    ready: function(){
	    },
	});
	</script>
@stop