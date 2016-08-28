<template>
	<div class="row well">
		<div class="col-xs-8">
			<dt>Bands</dt>
		</div>
		<div class="col-xs-4">
			<button @click="toggleShowBand" class="btn btn-sm pull-right">
				<span v-if="!showBand"><i class="fa fa-arrow-down"></i>Show</span>
				<span v-if="showBand"><i class="fa fa-arrow-up"></i> Hide</span>
			</button>
		</div>
		<div v-if="showBand">
			<a  v-for="band in bands" class="btn btn-lg col-xs-12" href="">
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
		props: ['bands', 'showBand'],
		methods:{
			toggleShowBand: function(){
				console.log(this.showBand);
				this.showBand = !this.showBand;
				console.log(this.showBand);
			}
		},
		ready: function(){
		}
	};
</script>