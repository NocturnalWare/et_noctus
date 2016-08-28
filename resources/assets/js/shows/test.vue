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
					<band-list :bands="show.bands"></band-list>
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
			venueAddress
		},
		methods:{
			
		},
		ready: function(){
		}
	}
</script>




<!-- 



				

				<div class="well col-xs-12">
					<div class="col-xs-12">
						<h4>
							<b>{{$show->venue->name}}</b>
							<a href="{{route('control.shows.edit', $show->id)}}">
								<i class="pull-right fa fa-wrench"></i>
							</a>
						</h4>
						<div class="col-xs-6">
							<div class="row pull-right">
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="col-xs-12 col-md-6">
							<div class="row well">
								<dt style="text-align:center">Venue Address</dt>
								<div class="col-xs-12" style="text-align:center">{{$show->venue->address1}} {{$show->venue->address2}}</div>
								<div class="col-xs-12" style="text-align:center">{{$show->venue->city}}, {{$show->venue->state}} {{$show->venue->zip}}</div>
								<div class="col-xs-12">&nbsp</div>
								<div class="col-xs-12" style="text-align:center"><b>Capacity</b> <i >{{$show->venue->capacity}}</i></div>

							</div>

							<div class="row well">
								<div class="col-xs-8">
									<dt>Bands</dt>
								</div>
								<div class="col-xs-4">
									<button @click="toggleShowBands" class="btn btn-sm pull-right">Show</button>
								</div>
								@foreach($show->bands as $band)
									<a v-if="showBands" class="btn btn-lg col-xs-12" href="{{route('bands.edit', $band->id)}}">
										<b>{{$band->band()->name}}</b>
									</a>
								@endforeach
							</div>
						</div>
						<div class="well col-xs-12 col-md-6">
							<div class="col-xs-12" style="padding:5px;border-bottom:1px solid #000;">
								<dt style="text-align:center;">Primary Venue Contact</dt>
								<div class="col-xs-12">
									<center>
										<a class="btn btn" href="{{route('contacts.edit', $show->venue->mainContact->id)}}">
											{{$show->venue->mainContact->fullName()}}
										</a>
									</center>
									<div class="row">
										<div class="col-xs-4">
											<a target="_blank" href="" class="btn btn-lg">
												<i class="fa fa-phone"></i>
											</a>
										</div>
										<div class="col-xs-4">
											<a target="_blank" href="" class="btn btn-lg">
												<i class="fa fa-envelope"></i>
											</a>
										</div>
										<div class="col-xs-4">
											<a target="_blank" href="" class="btn btn-lg">
												<i class="fa fa-facebook-official"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12" style="padding:5px;">
								<dt style="text-align:center">Venue Links</dt>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-facebook-official"></i>
									</a>
								</div>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-twitter"></i>
									</a>
								</div>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-instagram"></i>
									</a>
								</div>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-yelp"></i>
									</a>
								</div>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-globe"></i>
									</a>
								</div>
								<div class="col-xs-4">
									<a target="_blank" href="" class="btn btn-lg">
										<i class="fa fa-envelope"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div> -->