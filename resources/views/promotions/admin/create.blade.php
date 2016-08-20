@extends('layouts.master')

@section('content')
	<div id="promotionAdminCreate" class="well col-xs-12 col-md-4 col-md-offset-2" style="color:#000">
		<form action="{{route('promotion.store')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<span class="col-xs-12 form-group">
				<label>Name</label>
				<input name="promotion_name" class="form-control" placeholder="Name">
			</span>
			<span class="col-xs-12 form-group">
				<label>Amount <i>Leave empty if using percentage</i></label>
				<span class="input-group">
					<span class="input-group-addon">$</span>
					<input name="price_flat" class="form-control" placeholder="0.00">
				</span>
			</span>
			<span class="col-xs-12 form-group">
				<label>Percentage <i>Leave empty if using flat amount</i></label>
				<span class="input-group">
					<input name="price_percent" class="form-control" placeholder="15">
					<span class="input-group-addon">%</span>
				</span>
			</span>
			<button class="btn btn-primary col-xs-12">Create</button>
		</form>
	</div>
@stop

@section('javascript')

	<script>
	
	var promotionAdminCreate = new Vue({
	    el: '#promotionAdminCreate',
	    data:{
	    	discount: '',
	    	formObj:{'promotion_name':'', 'price_flat':'', 'price_percent':''},
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