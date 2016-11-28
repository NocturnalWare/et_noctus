@extends('layouts.master')
@section('facebook-tags')
	<meta property="og:image" content="http://54.149.181.47/etnoc/{{$product->main_image}}" />
	<meta property="og:description" content="{{$product->description}}" />
	<meta property="og:title" content="{{$product->name}}" />
@stop
@section('content')


<center>
	<div class="col-xs-12 col-md-5">
		<legend style="color:#fff">
			{{$product->name}}
		</legend>
		<img class="img-responsive" style="height:550px;" src="{{$product->getMainImage()}}" />
		<div class="row">
			<div class="col-xs-4">
				<img class="img-responsive" style="height:150px;" src="{{$product->getMainImage()}}">
			</div>
			<div class="col-xs-4">
				<img class="img-responsive" style="height:150px;" src="{{$product->getMainImage()}}">
			</div>
			<div class="col-xs-4">
				<img class="img-responsive" style="height:150px;" src="{{$product->getMainImage()}}">
			</div>
		</div>
	</div>
	<div class="well col-xs-12 col-md-2" style="color:#000;">
		{{$product->description}}
		<span v-text="products.description"></span>
		<br>

		<div id="checkCart"></div> 
		<br>
		@if($product->id !== 39)
			<add-to-cart-button
				cart-id="{{\Session::get('cart_id')}}"
				product="{{$product}}"
				token="{{csrf_token()}}"
				route="{{route('cart.store')}}"
			>
			</add-to-cart-button>
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
</center>
@stop