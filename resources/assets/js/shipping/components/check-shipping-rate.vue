<template>
	<div class="row">
		<div class="from-group">
			<div class="input-group">
				<input class="form-control" @keyup.enter="checkShipping" v-model="checkoutCartFormObj.zip" placeholder="Zip Code">
				<div v-if="!checking" class="input-group-addon">
					<button @click="checkShipping" class="btn btn-xs btn-primary">
						Check Shipping Rate
					 	&nbsp&nbsp<i class="fa fa-send"></i> 
					</button>
				</div>
				<span v-if="checking" class="input-group-addon btn btn-xs btn-info">
					<i class="fa fa-spin fa-spinner"></i>
				</span>
			</div>
		</div>
	</div>
</template>

<script>
	import store from '../../stores/store.js';

	export default{
		props: ['route', 'xssToken'],
		computed:{
		    checkoutCartFormObj: function(){
		    	return store.state.checkoutCartFormObj;
		    },
		    checking: function(){
		    	return store.state.checkingServerForUpdate;
		    }
		},
	    methods:{
	    	checkShipping: function(){
	    		this.checkoutCartFormObj._token = this.xssToken;
	    		if(this.checkoutCartFormObj.zip.length == 5){
		    		store.dispatch('TOGGLE_CHECKING_FOR_SERVER_UPDATE');
		    		let call = this.$http.post(this.route, this.checkoutCartFormObj);
					call.then(function(response){
						store.dispatch('UPDATE_CHECKOUT_PRICES', response.data)
		    			store.dispatch('TOGGLE_CHECKING_FOR_SERVER_UPDATE');
					});
	    		}
	    	},
	    }
	}
</script>
