@extends('layouts.master')


@section('content')
	<div class="col-xs-12 col-md-6 col-md-offset-1 well">
		<h3>
			{{$bandmember->contact->f_name}} {{$bandmember->contact->l_name}} 
		</h3>
		<h4>
			Plays {{$bandmember->mainInstrument->instrument}} in 
			<a href="{{route('bands.edit', $bandmember->currentBand->id)}}">{{$bandmember->currentBand->name}}</a>
		</h4>
		<div class="col-xs-12 well">
			<div id="contactManager">
				<div class="col-xs-12">
					<div class="col-xs-12 well">
						<h4>Location</h4>
						<span v-text="contacts.city"></span>, 
						<span v-text="contacts.state"></span>
						<span v-text="contacts.zip"></span>
					</div>
					<div class="col-xs-12 well">
						<a class="btn col-xs-1" target="_blank" v-if="contacts.facebook" href="@{{contacts.facebook}}"><i class="fa fa-lg fa-facebook-official"></i></a>
						<a class="btn col-xs-1" target="_blank" v-if="contacts.twitter" href="@{{contacts.twitter}}"><i class="fa fa-lg fa-twitter"></i></a>
						<a class="btn col-xs-1" target="_blank" v-if="contacts.linkedin" href="@{{contacts.linkedin}}"><i class="fa fa-lg fa-linkedin"></i></a>
						<a class="btn col-xs-1" target="_blank" v-if="contacts.instagram" href="@{{contacts.instagram}}"><i class="fa fa-lg fa-instagram"></i></a>
						<a class="btn col-xs-1" target="_blank" v-if="contacts.snapchat" href="@{{contacts.snapchat}}"><i class="fa fa-lg fa-snapchat"></i></a>
						<a class="btn col-xs-1" target="_blank" v-if="contacts.website" href="@{{contacts.website}}"><i class="fa fa-lg fa-globe"></i></a>
					</div>
					<br>
					<div v-if="contacts.phones.length > 0 || contacts.emails.length > 0">
						<div class="col-xs-12 col-md-6 well" v-if="contacts.phones.length > 0">
							<h4 class="col-xs-12">Phone Numbers</h4>
							<span v-for="phone in contacts.phones">
								<span class="col-xs-12">
									<label v-text="phone.label"></label><br>
									<span v-text="phone.number"></span> <a href="tel:@{{phone.number}}"><i class="fa fa-phone"></i></a>
									</br>
								</span>
							</span>
						</div>
						<div class="col-xs-12 col-md-6 well" v-if="contacts.emails.length > 0">
							<h4 class="col-xs-12">Email Addresses</h4>
							<span v-for="email in contacts.emails">
								<span class="col-xs-12">
									<label><span v-text="email.label"></span></label><br>
									<span v-text="email.email"></span>
									<a href="mailto:@{{email.email}}"><i class="fa fa-envelope"></i></a>
									<br>
								</span>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				@if(count($bandmember->instruments) > 1)
					<div class="col-xs-12 col-md-6 well">
						<b>Other Instruments</b>
						@foreach($bandmember->instruments as $instrument)
							<div class="col-xs-12">
								{{$instrument->instrument}}
							</div>
						@endforeach
					</div>
				@endif

				@if(count($bandmember->previousBands) > 0)
					<div class="col-xs-12 col-md-6 well">
						<b>Previous Bands</b>
						@foreach($bandmember->previousBands as $band)
							<div class="col-xs-12">
								<a class="btn" href="{{route('bands.edit', $band->band_id)}}">
									{{$band->oldBand()->name}} <i>{{$band->oldBand()->instrument}}</i>
								</a>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
@stop