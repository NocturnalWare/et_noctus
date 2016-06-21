@extends('layouts.master')

@section('content')
	@foreach($carts as $cart)
		
		<div class="row" style="margin-top:70px;margin-left:40px;width:80%;border:1px #ffffff solid;border-radius:35px;border-left:transparent;border-right:transparent;padding:15px;">
				<div class="col-xs-12 col-md-3">
					<center>
						<img  style="height:100px" class="img-responsive" src="{{$cart->product->getMainImage()}}" />
					</center>
				</div>
				<div class="col-xs-12 col-md-3">
					{{$cart->product->name}}<br>
				</div>
				<div class="col-xs-4 col-md-2">
					{{studly_case($cart->size)}}
				</div>
				<div class="col-xs-4 col-md-2">
					{{$cart->quantity}}
				</div>
				<div class="col-xs-4 col-md-2">
					<div class="col-xs-6">
						
					</div>
					<div class="col-xs-6">
						<form action="{{route('removeFromCart')}}" method="post">
							<input type="hidden" name="product" value="{{$cart->id}}" />
							<input type="hidden" name="_token" value="{{csrf_token()}}">

							<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
						</form>
					
					</div>
				</div>
				
		</div>


	@endforeach
@if($pricetag > 0)
<div class="col-xs-9" style="text-align:right;">
<div style="color:#f0f0f0;font-size:16px">Item total: ${{substr($pricetag-$shipping,0,-2)}}.{{substr($pricetag-$shipping,-2)}}</div>

<div style="color:#f0f0f0;font-size:16px">Shipping total: ${{substr($shipping,0,-2)}}.{{substr($shipping,-2)}}</div>
<form action="{{route('createShipping')}}" method="post">
<input type="hidden" name="checkoutAmt" value="{{$pricetag}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<button type="submit" class="btn btn-sm btn-primary">${{number_format(($pricetag)/100, 2)}}<br>Check Out</button>
</form>

<br><br>

<form action="{{route('emptyCart')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit" class="btn btn-danger btn-xs" style="border-radius:35px;background-color:#700000">Empty Cart</button>
</form>
</div>

@else
<div style="min-height:800px">
THERE DOESNT SEEM TO BE ANYTHING IN YOUR CART!

@endif


@stop