@extends('layouts.master')

@section('content')
<div style="color:#000" class="well col-xs-12 col-md-4 col-md-offset-4">
	<center>
		<h3>Where would you like us to deliver this?</h3><br>
		<i>United States Only. Please contact us for international shipping.</i>
	</center>
	<div class="text-danger">
		@foreach($errors->all() as $error)
			{{$error}}
		@endforeach
	<form action="{{route('shipping.store')}}" method="POST">
		<input name="_token" type="hidden" value="{{csrf_token()}}"> <br>
		<label>Email Address*</label>
		<input class="form-control" name="email" value="{{old('email')}}" required type="email"> <br>
		<label>First Name*</label>
		<input class="form-control" name="ship_f_name" required> <br>
		<label>Last Name</label>
		<input class="form-control" name="ship_l_name"> <br>
		<label>Street Address*</label>
		<input class="form-control" name="ship_address1" required> <br>
		<label>Street Address 2</label>
		<input class="form-control" name="ship_address2"> <br>
		<label>City*</label>
		<input class="form-control" name="ship_city" required> <br>
		<label>State*</label>
		<input class="form-control" name="ship_state" required> <br>
		<label>Zip Code*</label>
		<input class="form-control" name="ship_zip" required> <br>
		<button class="btn btn-primary col-xs-12">Next <i class="fa fa-arrow-right pull-right"></i></button>
	</form>
</div>
@stop

