<template>
	<div class="col-xs-12">
		<h4>
			<b>{{venueName}}</b>
			<a href="{{link}}">
				<i class="pull-right fa fa-wrench"></i>
			</a>
		</h4>
	</div>
</template>

<script>
	import store from '../../stores/store.js'
	var moment = require('moment');

	export default {
		store: store,
		props: ['venueName', 'link'],
		methods:{
			edit_link: function(date){
				return moment(date).format('MMM Do YYYY');
			}
		}
	};
</script>