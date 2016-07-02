@extends('layouts.master')

@section('content')

@foreach($ig as $image)
	<div class="col-md-3 col-xs-12" style="padding-bottom:10px;">
		<img class="img-responsive" src="{{$image['images']['standard_resolution']['url']}}&scope=public_content">
	</div>
@endforeach


@stop