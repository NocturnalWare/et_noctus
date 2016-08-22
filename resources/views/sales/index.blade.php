@extends('layouts.master')

@section('content')

	<div class="row">
		@foreach($sales as $sale)
			<div class="col-xs-12 col-md-6 col-md-offset-1 well">
				<div class="">
					<div class="col-xs-12 col-md-6">
						{{$sale->ship_f_name}} {{$sale->ship_l_name}}<br>
						{{$sale->ship_address1}} {{$sale->ship_address2}}<br>
						{{$sale->ship_city}} {{$sale->ship_state}}, {{$sale->ship_zip}}<br>
					</div>
					<div class="col-xs-12 col-md-6">
						<h2>Sale Price {{$sale->cart_amt}}</h2>
					</div>
				</div>
				<center>
					@if(!empty($sale->carts->first()))
						<div class="col-xs-12 well">
							<span class="col-xs-4"><b>Product</b></span>
							<span class="col-xs-4"><b>Size</b></span>
							<span class="col-xs-4"><b>Quantity</b></span>
							@foreach($sale->carts as $cart)
								<div class="col-xs-12">
									<div class="col-xs-4">
										{{$cart->product->name}}
									</div>
									<div class="col-xs-4">
										{{$cart->size}}
									</div>
									<div class="col-xs-4">
										{{$cart->quantity}}
									</div>
								</div>
							@endforeach
						</div>
					@endif
				</center>
			</div>
		@endforeach
	</div>
@stop