@extends('layouts.master')

@section('content')
	<div id="promotionAdminEdit" class="well col-xs-12" style="color:#000">
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
			<div class="well col-xs-12">
			<table class="table table-hover" style="color:#000">
				<thead>
					<th>Code</th>
					<th>Owner</th>
					<th>Emailed To</th>
					<th>Total Quantity</th>
					<th>Used</th>
					<th>Expires</th>
				</thead>
				<tbody>
					<tr v-for="code in promotion.codes" v-bind:class="
						code.used === 0 && code.expires > todaysDate ? 'bg-success' : 'bg-danger'">
						<td v-text="code.code"></td>
						<td v-text="code.owner"></td>
						<td v-text="code.email"></td>
						<td v-text="code.total"></td>
						<td v-text="code.used"></td>
						<td>
							<span v-text="code.expires"></span>
							<i class="pull-right" v-bind:class="code.expires > todaysDate ? 'fa fa-circle text-success' : 'fa fa-ban  text-danger'"></i>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

@stop

@section('javascript')

	<script>
	
	var promotionAdminEdit = new Vue({
	    el: '#promotionAdminEdit',
	    data:{
	    	promotion: etnoc.promotion,
	    	discount: '',
	    	todaysDate: '',
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