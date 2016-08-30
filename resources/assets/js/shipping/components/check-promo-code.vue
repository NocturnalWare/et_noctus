<template>
	<div class="row">
		<div class="form-group">
			<div class="input-group">
				<input class="form-control" @keyup.enter="checkShipping" v-model="checkoutCartFormObj.code" placeholder="Code">
				<div v-if="!checking" class="input-group-addon">
					<button @click="checkShipping" class="btn btn-xs btn-primary">
						Use Promo Code
					 	&nbsp&nbsp<i class="fa fa-lg fa-gift"></i> 
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
	    		store.dispatch('TOGGLE_CHECKING_FOR_SERVER_UPDATE');
	    		let call = this.$http.post(this.route, this.checkoutCartFormObj);
				call.then(function(response){
					store.dispatch('UPDATE_CHECKOUT_PRICES', response.data)
	    			store.dispatch('TOGGLE_CHECKING_FOR_SERVER_UPDATE');
				});
	    	},
	    }
	}
</script>
