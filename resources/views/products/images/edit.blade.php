@extends('layouts.master')


@section('content')

@foreach($product->images as $image)
	<img src="https://s3-us-west-2.amazonaws.com/etnoc/images/products/{{$image->url}}">
@endforeach

@Stop