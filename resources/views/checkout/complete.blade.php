@extends('layouts.master')

@section('content')
<div class="col-md-3">&nbsp</div>
<div style="color:#000;text-align:center" class="well well-sm col-sm-12 col-md-6">
<h1>Thank you!</h2>


	We <b>really</b> appreciate your business and hope you check back soon for new products!<br>

	We support local music! Check out our sponsored bands!

</div>

<div class="col-sm-12">
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', '5')}}" ><img src="//eternallynocturnal.com/images/storiesuntold.jpg" class="img-responsive"></a>
		<a href="{{route('bands.show', '1')}}" ><img src="//eternallynocturnal.com/images/adventurer.png" class="img-responsive"></a>
	</div>

	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', '2')}}" ><img src="//eternallynocturnal.com/images/logoBanshee.jpg" class="img-responsive"></a>
	</div>

	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', '4')}}" ><img src="//eternallynocturnal.com/images/spotlight/shapesandcolors-05-2016/shapesalbum.jpg" class="img-responsive"></a>
	</div>

	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', '3')}}" ><img src="//eternallynocturnal.com/images/theillustrator.jpg" class="img-responsive"></a>
	</div>


@stop
