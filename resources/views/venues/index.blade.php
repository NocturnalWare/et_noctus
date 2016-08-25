@extends('layouts.master')


@section('content')

<div class="well">
	@foreach($venues as $venue)
		{{$venue}}
	@endforeach
</div>
@stop