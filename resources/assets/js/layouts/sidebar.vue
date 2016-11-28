<template>
	<div style="color:#fff">
		<div class="col-xs-12">
			<h3>Shop</h3>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products')">Everything</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Tees')">Tees</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Tanks')">Tanks</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Hoodies')">Hoodies</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Pants')">Legwear</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Accessories')">Accessories</a>
			<a class="btn col-xs-12" style="border:1px solid #fff;font-size:1.3em;color:#fff" :href="baseUrl('/products/sort/Ticket')">Tickets</a>
		</div>
		<div class="col-xs-12">
			<h3>Upcoming Shows</h3>
			<div class="col-xs-12" v-for="show in shows">

				{{show.name}} <span class="pull-right">{{fixDate(show.event_date)}}</span>
			
			</div>
		</div>
		<div class="col-xs-12">
			<h3>Sponsored Bands</h3>
			<div class="col-xs-12" v-for="band in bands" style="overflow-x:hidden">

				{{band.band_name}}
			
			</div>
		</div>
	</div>
</template>


<script>
	var moment = require('moment');

	export default{
		props: ['url'],
		data(){
			return {
				shows: etnoc.shows,
				bands: etnoc.bands,
			}
		},
		methods: {
			fixDate(date){
				return moment(date).format('M/d/Y');
			},
			baseUrl(url){
				return this.url+url;
			}
		}
	}


</script>