@extends('layouts.master')


@section('content')
	
	<div id="contactManager">
		<div class="col-xs-12 col-md-5 col-md-offset-1">
			<span class="input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
				<input type="text" class="search-input form-control" v-model="search_input.input" style="background-color:#fff; width:100%">
			</span>
			<div v-for="contact in contacts">
				<div class="col-xs-12 well" v-if="contact.f_name+' '+contact.l_name == search_input.input || search_input.input == ''">
					<h3><span v-text="contact.f_name"></span> <span v-text="contact.l_name"></span></h3><br>
					<span v-for="phone in contact.phones" v-text="phone.number"></span><br>
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