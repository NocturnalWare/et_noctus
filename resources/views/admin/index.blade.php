@extends('layouts.master')

@section('content')

	<div class="well col-xs-12 col-md-10 col-md-offset-1">
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-rocket"></i> Shipping & Sales</h1>
			<a class="btn btn-danger col-xs-12" href="{{route('sales.index')}}"><i class="pull-left fa fa-exclamation-triangle"></i> New Sales</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-truck"></i> Shipped Sales</a>
			
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-gift"></i> Products</h1>
			<a class="btn btn-info col-xs-12" href="{{route('control.products.index')}}"><i class="pull-left fa fa-wrench"></i> Edit Products</a>
			<a class="btn btn-info col-xs-12" href="{{route('inventory.index')}}"><i class="pull-left fa fa-cube"></i> Inventory</a>
			<a class="btn btn-info col-xs-12" href="{{route('products.create')}}"><i class="pull-left fa fa-plus"></i> Add Product</a>
			<a class="btn btn-danger col-xs-12" href="{{route('products.create')}}"><i class="pull-left fa fa-cogs"></i> Plan Orders</a>
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-users"></i> Contacts</h1>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-users"></i> View Contacts</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-user-plus"></i> Add Contact</a>
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-volume-up"></i> Shows</h1>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-wrench"></i> Edit Shows</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-university"></i> Edit Venues</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-plus"></i> Add Show</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-plus"></i> Add Venue</a>
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-music"></i> Bands</h1>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-wrench"></i> Edit Bands</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-wrench"></i> Edit Sponsorships</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-plus"></i> Add Band</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-plus"></i> Add Sponsorship</a>
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-sun-o"></i> Spotlights</h1>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-wrench"></i> Edit Spotlights</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-plus"></i> Add Spotlight</a>
		</div>
		<div class=" col-md-3 col-xs-12" >
			<h1><i class="fa fa-line-chart"></i> Reports</h1>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-cubes"></i> Inventory Reports</a>
			<a class="btn btn-danger col-xs-12" href=""><i class="pull-left fa fa-dollar"></i> Expense Reports</a>
		</div>
	</div>



@stop