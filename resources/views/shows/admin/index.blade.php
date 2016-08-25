@extends('layouts.master')


@section('content')

	<div class="well">
		@foreach($shows as $show)
			{{$show}}
		@endforeach

	</div>

@stop