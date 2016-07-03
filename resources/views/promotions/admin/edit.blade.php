@extends('layouts.master')

@section('content')
	<div id="promotionAdminEdit" class="well col-xs-12 col-md-4 col-md-offset-2" style="color:#000">
		<form action="{{route('promotion.update', $promotion->id)}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="_method" value="PUT">

			<span class="col-xs-12 form-group">
				<label>Name</label>
				<input name="promotion_name" class="form-control" value="{{$promotion->promotion_name}}">
			</span>
			<span v-if="discount == 'flat'" class="col-xs-12 form-group">
				<label>Amount</label>
				<input name="price_flat" class="form-control" value="{{$promotion->price_flat}}">
			</span>
			<span v-if="discount == 'percent'" class="col-xs-12 form-group">
				<label>Percentage</label>
				<input name="price_percent" class="form-control" value="{{$promotion->price_percent}}">
			</span>
			<button class="btn btn-primary col-xs-12">Update</button>
		</form>
	</div>
@stop

@section('javascript')

	<script>
	
	var promotionAdminEdit = new Vue({
	    el: '#promotionAdminEdit',
	    data:{
	    	promotion: etnoc.promotion,
	    	discount: '',
	    	formObj:{},
	    },
	    computed: {
	    },
	    methods:{
	    },
	    ready: function(){
	    	if(this.promotion.price_flat < .01){
	    		this.discount = 'percent';
	    	}else{
	    		this.discount = 'flat';
	    	}
	    },
	});
	</script>

@stop