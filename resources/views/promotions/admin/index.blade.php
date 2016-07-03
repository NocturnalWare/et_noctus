@extends('layouts.master')


@section('content')
	<div id="promotionAdminIndex">
		
		<div class="col-xs-10 col-md-10 col-md-offset-1" style="background-color:#fff">
				<div v-for="promotion in promotions">
					<button class="btn btn-lg btn-primary col-xs-10" @click="showTable(promotion)"> 
						<span v-text="promotion.promotion_name" class="col-xs-6"></span>
						<span class="col-xs-5" v-if="promotion.price_flat > 0">
							<span v-text="'$'+promotion.price_flat+' DISCOUNT'" class="pull-left"></span>
							<i class="btn btn-default fa fa-lg fa-arrows-v pull-right"></i>
						</span>
						<span class="col-xs-5" v-if="promotion.price_percent" >
							<span v-text="promotion.price_percent+'% DISCOUNT'" class="pull-left"></span>
							<i class="btn btn-default fa fa-lg fa-arrows-v pull-right"></i>
						</span>
					</button>
					<div class="col-xs-2 col-md-2">
						<button @click="editPromo(promotion)" class="col-sm-12 btn btn-lg btn-default"><i class="fa fa-lg fa-pencil-square"></i></button>
					</div>
					<div v-show="promotion.show_table === true" class="well col-xs-12">
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
		</div>

	</div>

@stop
@section('javascript')
	<script>
	
	var promotionAdminIndex = new Vue({
	    el: '#promotionAdminIndex',
	    data:{
	    	todaysDate: etnoc.todaysDate,
	    	promotions: etnoc.promotions,
	    	formObj:{},
	    },
	    computed: {
	    },
	    methods:{
	    	showTable: function(promotion){
	    		promotion.show_table = !promotion.show_table;
	    	},
	    	editPromo: function(promotion){
	    		window.location = "{{route('promotion.index')}}/edit/"+promotion.id;
	    	},
	    },
	    ready: function(){
	    },
	});
	</script>
@stop