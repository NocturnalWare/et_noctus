@extends('layouts.master')

@section('content')

	<div class="col-xs-12">
		<div class="col-xs-12 col-md-4 col-md-offset-2 well" style="color:#000">
			<h2>Contact Us!</h2>
			<form action="{{route('contact.store')}}" method="POST">
				<input type="hidden" value="{{csrf_token()}}" name="_token">
				<div class="col-xs-12">
					<label>I'm a...</label>
					<select class="form-control" name="reason">
						<option value="customer">Customer</option>
						<option value="band">Band</option>
						<option value="show">Show Promoter or Venue</option>
					</select>
				</div>
				<div class="col-xs-12">
					<label>Contact Email</label>
					<input name="email" class="form-control">
				</div>
				<div class="col-xs-12">
					<label>Name</label>
					<input name="name" class="form-control">
				</div>
				<div class="col-xs-12">
					<label>Message</label>
					<textarea name="message" class="form-control" style="height:300px"></textarea>
				</div>
				<div class="col-xs-12">&nbsp</div>
				<button class="btn btn-primary col-xs-12">SEND <i class="btn fa fa-location-arrow pull-right"></i></button>
			</div>
		</form>
	</div>

@stop