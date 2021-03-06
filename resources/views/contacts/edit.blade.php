@extends('layouts.master')


@section('content')
	
	<div id="editContact" route="{{route('contacts.update', $contact->id)}}" token="{{csrf_token()}}">
		<div class="col-xs-12 col-md-4 col-md-offset-1 well">
			<span class="input-group col-xs-12">
				<label>First Name</label>
				<input class="form-control" v-model="contact.f_name">
			<span class="input-group col-xs-12">
				<label>Last Name</label>
				<input class="form-control" v-model="contact.l_name">
			</span>
			<span class="input-group col-xs-12">
				<label>City</label>
				<input class="form-control" v-model="contact.city">
			</span>
			<span class="input-group col-xs-12">
				<label>State</label>
				<input class="form-control" v-model="contact.state">
			</span>
			<span class="input-group col-xs-12">
				<label>Zip Code</label>
				<input class="form-control" v-model="contact.zip">
			</span>
			<span class="input-group col-xs-12">
				<label>Facebook</label>
				<input class="form-control" v-model="contact.facebook">
			</span>
			<span class="input-group col-xs-12">
				<label>Twitter</label>
				<input class="form-control" v-model="contact.twitter">
			</span>
			<span class="input-group col-xs-12">
				<label>LinkedIn</label>
				<input class="form-control" v-model="contact.linkedin">
			</span>
			<span class="input-group col-xs-12">
				<label>Instagram</label>
				<input class="form-control" v-model="contact.instagram">
			</span>
			<span class="input-group col-xs-12">
				<label>Snapchat</label>
				<input class="form-control" v-model="contact.snapchat">
			</span>
			<span class="input-group col-xs-12">
				<label>Website</label>
				<input class="form-control" v-model="contact.website">
			</span>
			<span class="input-group col-xs-12">
				<label>Notes</label>
				<textarea class="form-control" v-model="contact.notes" style="height:150px;"></textarea>
			</span>
			<div class="col-xs-12">&nbsp<div>

			<button @click="saveContact" v-bind:class="['', saved === false ? 'btn-warning' : 'btn-success']"  class="btn btn-lg col-xs-12">
				<i v-bind:class="['', saved === false ? 'fa-save' : 'fa-check']" class="fa fa-check"></i> SAVE<span v-if="saved === true">D</span>
			</button>
		</div>

	</div>

@stop