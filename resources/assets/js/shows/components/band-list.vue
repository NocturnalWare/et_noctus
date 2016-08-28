<template>
	<div class="row well">
		<div class="col-xs-8">
			<dt>Bands</dt>
		</div>
		<div class="col-xs-4">
			<button class="btn btn-sm pull-right">Show</button>
		</div>
		<div v-for="band in bands">
			<a class="btn btn-lg col-xs-12" href="">
				<b>{{band.band.name}}</b>
			</a>
		</div>
	</div>
</template>

<script>
	import store from '../../stores/store.js'
	var moment = require('moment');

	export default {
		store: store,
		props: ['bands'],
		methods:{
		},
		ready: function(){
			console.log(this.bands);
		}
	};
</script>