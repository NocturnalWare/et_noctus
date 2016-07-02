
	<div class="hidden-xs hidden-sm">
		<div id="ig-carousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->


		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">

		    <div class="item active">
			    @foreach($resp1 as $igram)
					<div class="col-md-3 col-xs-12" style="padding-bottom:15px;color:#000;">
			      		<div class="well">
							<img class="img-responsive" src="{{$igram['images']['standard_resolution']['url']}}">
							<p>{{$igram['caption']['text']}}</p>
						</div>
					</div>
				@endforeach
		    </div>

			@foreach($images as $image)
			    <div class="item">
			    	@foreach($image as $igram)
					<div class="col-md-3 col-xs-12" style="padding-bottom:15px;color:#000;">
						<div class="well">
							<img class="img-responsive" src="{{$igram['images']['standard_resolution']['url']}}">
							<p>{{$igram['caption']['text']}}</p>
						</div>
					</div>
					@endforeach
				</div>
			@endforeach
		    </div>
		</div>
		<div class="col-xs-12">
			<div class="pull-left">
				<h1><i class="fa fa-lg fa-arrow-left"></i></h1>
			</div>
			<div class="pull-right">
				<h1><i class="fa fa-lg fa-arrow-right"></i></h1>
			</div>
		</div>
		  <ol class="carousel-indicators" style="padding-top:500px;">
		    <li data-target="#ig-carousel" data-slide-to="0" class="active"></li>
		    <li data-target="#ig-carousel" data-slide-to="1" class="active"></li>
		    <li data-target="#ig-carousel" data-slide-to="2" class="active"></li>
		    <li data-target="#ig-carousel" data-slide-to="3" class="active"></li>
		    <li data-target="#ig-carousel" data-slide-to="4" class="active"></li>
		  </ol>
		  		  <!-- Controls -->
		  <a class="left carousel-control" href="#ig-carousel" role="button" data-slide="prev">
		  </a>

		  <a class="right carousel-control" href="#ig-carousel" role="button" data-slide="next">
		  </a>
	</div>
	<div class="hidden-md hidden-lg">
		@foreach($ig as $igram)
			<div class="col-md-3 col-xs-12" style="padding-bottom:15px;color:#000;">
				<div class="well">
					<img class="img-responsive" src="{{$igram['images']['standard_resolution']['url']}}">
					<p>{{$igram['caption']['text']}}</p>
				</div>
			</div>
		@endforeach
	</div>
