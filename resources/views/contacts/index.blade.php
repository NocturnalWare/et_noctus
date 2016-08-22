@extends('layouts.master')


@section('content')
	
	<div id="contactManager">
		<div class="well col-xs-12 col-md-5 col-md-offset-1">
			<span class="input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
				<input type="text" class="search-input form-control" v-model="search_input.input" style="background-color:#fff; width:100%">
			</span>
			<div class="col-xs-12" v-for="contact in contacts"  style="border:1px solid #000;padding:10px;">
				<div class="col-xs-11">
					<h3><span v-text="contact.f_name"></span> <span v-text="contact.l_name"></span></h3>
				</div>
				<div class="col-xs-1">
					<a href="{{route('contacts.index')}}/edit/@{{contact.id}}" class="pull-right"><i class="fa fa-wrench"></i></a>
				</div>
				<div class="col-xs-12 well">
					<h4>Location</h4>
					<span v-text="contact.city"></span>, 
					<span v-text="contact.state"></span>
					<span v-text="contact.zip"></span>
				</div>
				<div class="col-xs-12 well">
					<a class="btn col-xs-1" target="_blank" v-if="contact.facebook" href="@{{contact.facebook}}"><i class="fa fa-lg fa-facebook-official"></i></a>
					<a class="btn col-xs-1" target="_blank" v-if="contact.twitter" href="@{{contact.twitter}}"><i class="fa fa-lg fa-twitter"></i></a>
					<a class="btn col-xs-1" target="_blank" v-if="contact.linkedin" href="@{{contact.linkedin}}"><i class="fa fa-lg fa-linkedin"></i></a>
					<a class="btn col-xs-1" target="_blank" v-if="contact.instagram" href="@{{contact.instagram}}"><i class="fa fa-lg fa-instagram"></i></a>
					<a class="btn col-xs-1" target="_blank" v-if="contact.snapchat" href="@{{contact.snapchat}}"><i class="fa fa-lg fa-snapchat"></i></a>
					<a class="btn col-xs-1" target="_blank" v-if="contact.website" href="@{{contact.website}}"><i class="fa fa-lg fa-globe"></i></a>
				</div>
				<br>
				<div v-if="contact.phones.length > 0 || contact.emails.length > 0">
					<div class="col-xs-12 col-md-6 well" v-if="contact.phones.length > 0">
						<h4 class="col-xs-12">Phone Numbers</h4>
						<span v-for="phone in contact.phones">
							<span class="col-xs-12">
								<label v-text="phone.label"></label><br>
								<span v-text="phone.number"></span> <a href="tel:@{{phone.number}}"><i class="fa fa-phone"></i></a>
								</br>
							</span>
						</span>
					</div>
					<div class="col-xs-12 col-md-6 well" v-if="contact.emails.length > 0">
						<h4 class="col-xs-12">Email Addresses</h4>
						<span v-for="email in contact.emails">
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
	</div>

@stop

@section('javascript')
	<script>
		jQuery(document).ready(function($) {
    		var engine = new Bloodhound({
				local: etnoc.names,
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				datumTokenizer: Bloodhound.tokenizers.whitespace
		    });
    
			var promise = engine.initialize();

			promise
			.done(function() {})
			.fail(function() { console.log('err, something went wrong :('); });
		    $(".search-input").typeahead(
		      {
		        hint: true,
		        highlight: true
		      },
		      {
		        name: 'my-dataset',
		        source:engine.ttAdapter(),
		      	templates: {
		            empty: [
		                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
		            ],
		            header: [
		                '<div class="list-group search-results-dropdown">'
		            ],
		            suggestion: function (data) {
		                return '<div class="row" @click="alert()" style="background-color:#fff"><button class="btn col-xs-12" style="background-color:#fff">'+data+'</button></div>'
		      	  	}
	      	    }

	  		});
  		});
	</script>
@stop