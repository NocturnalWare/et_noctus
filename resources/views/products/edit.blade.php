@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-xs-6 col-xs-offset-1">
			<button class="btn btn-info active col-xs-6">Product</button>
			<a href="{{route('products.images.edit', $product->id)}}" class="btn btn-info col-xs-6">Images</a>
		</div>
	</div>
	<edit-product route="{{route('products.update', $product->id)}}" token="{{csrf_token()}}"></edit-product>

@stop
