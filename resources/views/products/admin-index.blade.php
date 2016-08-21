@extends('layouts.master')

@section('content')
<div class="col-sm-12"style="background-color:#000;color:#fff;padding:20px;">
	@foreach($products as $pro)
		@if($pro->inventories->checkStock() !== 0)
			<center>
				<a href="{{route('products.edit', $pro->id)}}">
					<div class=" col-sm-6 col-md-4" style="border:20px solid #000;border-radius:10px;">
						<div style="width:90%">
							<div style="background-color:#000;">
								<img class="img-responsive" style="max-height:600px;" src="{{$pro->getMainImage()}}">
							</div>	
							<label class="en-label-bl" style="color:#000;font-weight:bold;font-size:1.2em;background-color:#aaa;width:100%;">
								{{$pro->name}} ${{$pro->display_price_min}}
								@if($pro->display_price_max > $pro->display_price_min)
									{{$pro->display_price_max}}
								@endif
							</label><br>
						</div>	
					</div>
				</a>
			</center>
		@endif
	@endforeach
</div>
@stop