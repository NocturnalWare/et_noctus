@extends('layouts.master')

@section('content')
	<div id="promotionAdminEdit">
		<div class="well col-xs-12 col-md-4 col-md-offset-1" style="color:#000">
			<form action="{{route('promotion.update', $promotion->id)}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="_method" value="PUT">
				<h1>Update Promotion</h1>
				<span class="col-xs-12 form-group">
					<label>Name</label>
					<input name="promotion_name" class="form-control" value="{{$promotion->promotion_name}}">
				</span>
				<span v-if="discount == 'flat'" class="col-xs-12 form-group">
					<label>Amount</label>
					<span class="input-group">
						<span class="input-group-addon">$</span>
						<input name="price_flat" class="form-control" value="{{number_format($promotion->price_flat, 2)}}">
					</span>
				</span>
				<span v-if="discount == 'percent'" class="col-xs-12 form-group">
					<label>Percentage</label>
					<span class="input-group">
						<input name="price_percent" class="form-control" value="{{$promotion->price_percent}}">
						<span class="input-group-addon">%</span>
					</span>
				</span>
				<button class="btn btn-primary col-xs-12">Update</button>
			</form>
		</div>
		<div class="well col-xs-12 col-md-10 col-md-offset-1" style="color:#000">
			<h1>Add Promotion Code</h1>
			@include('promotions.admin.edit-add-code')
		</div>
		<div class="well">
			<table class="table table-striped table-hover" style="color:#000">
				<thead>
					<th>Codeeeee</th>
					<th>Quantity</th>
					<th>Used</th>
					<th>Email</th>
					<th>Owner</th>
					<th>Expires</th>
					<th></th>
				</thead>
				<tbody>
					<tr v-for="code in promotion.codes">
						<td v-text="code.code"></td>
						<td v-text="code.total"></td>
						<td v-text="code.used"></td>
						<td v-text="code.email"></td>
						<td v-text="code.owner"></td>
						<td v-text="expirationDate(code.expires)"></td>
						<td><i @click="deleteCode(code)" class="fa fa-trash btn btn-sm btn-danger"></i></td>
					</tr>
				</tbody>
			</table>
		</well>
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
	    	generic: true,
	    },
	    computed: {
	    },
	    methods:{
	    	expirationDate: function(date){
	    		return moment(date).format('MMM DD, YYYY');
	    	},
	    	toggleGenericCode: function(){
	    		this.generic = !this.generic;
	    	},
	    	deleteCode: function(promoCode){
	    		var data = {};
	    		data._token = "{{csrf_token()}}";
	    		var call = this.$http.post("{{route('promotioncode.index')}}/destroy/"+promoCode.id, data);
				call.then(function(response){
					promotionAdminEdit.promotion.codes.$remove(promoCode);
				});
	    	}
	    },
	    components:{

	    },
	    ready: function(){
	    	if(this.promotion.price_flat < .01){
	    		this.discount = 'percent';
	    	}else{
	    		this.discount = 'flat';
	    	}
	    	this.generic = true;
	    },
	});

	</script>

@stop