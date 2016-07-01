@extends('layouts.master')

@section('content')


IGTEST

@forach($ig->data as $image)
<div class="col-md-4 col-xs-12">
	<img class="img-responsive" style="height:300px" src="{{$image->link}}">
</div>
@endforeach


@stop