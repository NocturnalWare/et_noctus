@extends('layouts.master')

@section('content')


IGTEST

@foreach($ig as $image)
<div class="col-md-4 col-xs-12">
	<img class="img-responsive" style="height:300px" src="{{$image->link}}">
</div>
@endforeach


@stop