<template>
	<div class="row well">
		<div v-for="show in shows" class="col-xs-12 col-md-4 well">
			<show-header :name="show.name" :date="show.event_date"></show-header>

			<div class="well col-xs-12">
				<venue-title :venue-name="show.venue.name" :link="'shows/'+show.id+'/edit'"></venue-title>
			</div>

			<div class="well col-xs-12">
				<div class="col-xs-12 col-md-6">
					<venue-address :venue="show.venue"></venue-address>
					<band-list :bands="show.bands" :show-band="false"></band-list>
				</div>
				<div class="well col-xs-12 col-md-6">
					<venue-contact :venue="show.venue"></venue-contact>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import store from '../stores/store.js'
	import showHeader from './components/header.vue'
	import venueTitle from './components/venue-title.vue'
	import venueAddress from './components/venue-address.vue'
	import bandList from './components/band-list.vue'
	import venueContact from './components/venue-contact.vue'

	export default {
		props: ['show'],
		computed: {
			shows: function(){
				return store.state.shows;
			}
		},
		components: {
			showHeader,
			venueTitle,
			bandList,
			venueAddress,
			venueContact
		},
		methods:{
			
		},
		ready: function(){
		}
	}
</script>