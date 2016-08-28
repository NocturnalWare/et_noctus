<template>
	<div class="row well">
		<dt style="text-align:center">Venue Address</dt>
		<div class="col-xs-12" style="text-align:center">{{venue.address1}} {{venue.address2}}</div>
		<div class="col-xs-12" style="text-align:center">{{venue.city}}, {{venue.state}} {{venue.zip}}</div>
		<div class="col-xs-12">&nbsp</div>
		<div class="col-xs-12" style="text-align:center"><b>Capacity</b> {{venue.capacity}}</div>
	</div>
</template>

<script>
	import store from '../../stores/store.js'
	var moment = require('moment');

	export default {
		store: store,
		props: ['venue'],
	};
</script>