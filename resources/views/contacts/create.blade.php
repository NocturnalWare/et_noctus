@extends('layouts.master')


@section('content')
	
	<div id="createContact" route="{{route('contacts.store')}}" token="{{csrf_token()}}">
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
			<div v-if="contact.phones.length > 0 || contact.emails.length > 0" class="well row">
				<div class="col-xs-12 col-md-6">
					<h4>Phone Numbers</h4>
					<span v-for="phone in contact.phones">
						<span class="input-group col-xs-12">
							<label>Label</label>
							<input class="form-control" v-model="phone.label"></label><br>
						</span>
						<span class="input-group col-xs-12">
							<label>Number</label>
							<input class="form-control" v-model="phone.number"></span>
						</span>
						<hr>
					</span>
				</div>
				<div class="col-xs-12 col-md-6">
					<h4>Emails</h4>
					<span v-for="email in contact.emails">
						<span class="input-group col-xs-12">
							<label>Label</label>
							<input class="form-control" v-model="email.label"><br>
						</span>
						<span class="input-group col-xs-12">
							<label>Email</label>
							<input class="form-control" v-model="email.email">
						</span>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<label>Add Phone Number</label>
					<span class="input-group">
						<input class="form-control" v-model="newPhone.label" @keyup.enter="addNewPhone" placeholder="313-515-5094">
						<input class="form-control" v-model="newPhone.number" @keyup.enter="addNewPhone" placeholder="Work, Home, Private, etc.">
						<span class="input-group-addon" @click="addNewPhone"><i class="fa fa-plus"></i></span>
					</span>
				</div>
				<div class="col-xs-12 col-md-6">
					<label>Add Email Address</label>
					<span class="input-group">
						<input class="form-control" v-model="newEmail.label" @keyup.enter="addNewEmail" placeholder="email@address.com">
						<input class="form-control" v-model="newEmail.email" @keyup.enter="addNewEmail" placeholder="Work, Home, Private, etc.">
						<span class="input-group-addon" @click="addNewEmail"><i class="fa fa-plus"></i></span>
					</span>
				</div>
			</div>

			<div class="col-xs-12">&nbsp<div>

			<button @click="saveContact" v-bind:class="['', saved === false ? 'btn-warning' : 'btn-success']"  class="btn btn-lg col-xs-12">
				<i v-bind:class="['', saved === false ? 'fa-save' : 'fa-check']" class="fa fa-check"></i> SAVE<span v-if="saved === true">D</span>
			</button>
		</div>

	</div>

@stop