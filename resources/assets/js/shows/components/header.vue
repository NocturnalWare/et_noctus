<template>
	<div>
		<center>
			<h3>
				{{ name }}
			</h3>
			<i>
				{{ event_date(date) }}
			</i>
		</center>
	</div>
</template>

<script>
	import store from '../../stores/store.js'
	var moment = require('moment');

	export default {
		store: store,
		props: ['name', 'date'],
		methods:{
			event_date: function(date){
				return moment(date).format('MMM Do YYYY');
			}
		}
	};
</script>