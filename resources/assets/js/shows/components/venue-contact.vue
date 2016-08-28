<template>
	<div class="col-xs-12" style="padding:5px;border-bottom:1px solid #000;">
		<dt style="text-align:center;">Primary Venue Contact</dt>
		<div class="col-xs-12">
			<center>
				<a class="btn btn" href="">
					{{contactName}}
				</a>
			</center>
			<div class="row">
				<div class="col-xs-4">
					<a target="_blank" href="tel:{{venue.main_contact.main_phone.number}}" class="btn btn-lg">
						<i class="fa fa-phone"></i>
					</a>
				</div>
				<div class="col-xs-4">
					<a target="_blank" href="mailto:{{venue.main_contact.main_email.email}}" class="btn btn-lg">
						<i class="fa fa-envelope"></i>
					</a>
				</div>
				<div class="col-xs-4">
					<a target="_blank" href="{{venue.main_contact.facebook}}" class="btn btn-lg">
						<i class="fa fa-facebook-official"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12" style="padding:5px;">
		<dt style="text-align:center">Venue Links</dt>
		<div class="col-xs-4">
			<a target="_blank" href="{{venue.facebook}}" class="btn btn-lg">
				<i class="fa fa-facebook-official"></i>
			</a>
		</div>
		<div class="col-xs-4">
			<a target="_blank" href="{{venue.twitter}}" class="btn btn-lg">
				<i class="fa fa-twitter"></i>
			</a>
		</div>
		<div class="col-xs-4">
			<a target="_blank" href="{{venue.instagram}}" class="btn btn-lg">
				<i class="fa fa-instagram"></i>
			</a>
		</div>
		<div class="col-xs-4">
			<a target="_blank" href="{{venue.yelp}}" class="btn btn-lg">
				<i class="fa fa-yelp"></i>
			</a>
		</div>
		<div class="col-xs-4">
			<a target="_blank" href="{{venue.website}}" class="btn btn-lg">
				<i class="fa fa-globe"></i>
			</a>
		</div>
		<div class="col-xs-4">
			<a target="_blank" href="mailto:{{venue.email}}" class="btn btn-lg">
				<i class="fa fa-envelope"></i>
			</a>
		</div>
	</div>
</template>

<script>
	import store from '../../stores/store.js'
	var moment = require('moment');

	export default {
		store: store,
		props: ['venue'],
		methods:{ },
		computed:{
			contactName: function(){
				return this.venue.main_contact.f_name+' '+this.venue.main_contact.l_name;
			}
		},
		ready: function(){
		}
	};
</script>