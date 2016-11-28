@extends('layouts.master')

@section('content')
	<inventory-index route="{{route('inventory.update')}}" token="{{csrf_token()}}"></inventory-index>
@stop

@section('javascript')
	<script>
		
	</script>
@stop