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
						<form action="{{route('cart.destroy', $cart->id)}}" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="_method" value="DELETE">

							<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
						</form>
					
					</div>
				</div>
				
		</div>


	@endforeach



@stop