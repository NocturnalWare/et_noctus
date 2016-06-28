@extends('layouts.master')

@section('content')
	<div class="row" style="margin-top:70px;">
		<iframe style="overflow:hidden;width:100%;height:100%;" src="{{$band->url}}"></iframe>
	</div>
@stop