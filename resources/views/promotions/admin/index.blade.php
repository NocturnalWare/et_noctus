@extends('layouts.master')


@section('content')
	<div id="promotionAdminIndex">
		
		<div class="col-xs-12 col-md-8 col-md-offset-2" >
			<div class="well">
				<div v-for="promotion in promotions">
					<h3><button class="btn btn-lg btn-primary" @click="showTable(promotion)"> <span v-text="promotion.promotion_name" class="col-sm-12"><i class="fa fa-lg fa-arrows-v"></i></button></h3>
					<div v-show="promotion.show_table === true" class="col-xs-12">
						<table class="table table-hover" style="color:#000">
							<thead>
								<th>Code</th>
								<th>Owner</th>
								<th>Emailed To</th>
								<th>Used</th>
								<th>Expires</th>
							</thead>
							<tbody>
								<tr v-for="code in promotion.codes" v-bind:class="
									code.used === 0 && code.expires > todaysDate ? 'bg-success' : 'bg-danger'">
									<td v-text="code.code"></td>
									<td v-text="code.owner"></td>
									<td v-text="code.email"></td>
									<td v-bind:class="code.used === 1 ? 'fa fa-ban text-danger' : 'fa fa-circle text-success'"></td>
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
	    },
	    ready: function(){
	    },
	});
	</script>
@stop