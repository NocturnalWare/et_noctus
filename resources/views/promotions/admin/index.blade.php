@extends('layouts.master')


@section('content')
	<div id="promotionAdminIndex">
		
		<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div v-for="promotion in promotions">
					<button class="btn btn-lg btn-primary col-xs-12 col-md-6" @click="editPromo(promotion)"> 
						<span v-text="promotion.promotion_name" class="col-xs-6"></span>
						<span class="col-xs-5" v-if="promotion.price_flat > 0">
							<span v-text="'$'+promotion.price_flat+' DISCOUNT'" class="pull-left"></span>
						</span>
						<span class="col-xs-5" v-if="promotion.price_percent" >
							<span v-text="promotion.price_percent+'% DISCOUNT'" class="pull-left"></span>
						</span>
					</button>
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