@extends('layouts.master')

@section('content')
	<edit-product route="{{route('products.update', $product->id)}}" token="{{csrf_token()}}"></edit-product>
@stop
