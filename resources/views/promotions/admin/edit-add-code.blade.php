<form action="{{route('promotioncode.store', $promotion->id)}}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="generic" v-model="generic">

	<span class="col-xs-12 col-md-3">
		<label>
			<span v-if="generic === false"> Email Address</span>
		</label>
		<label class="pull-right">
			Generic Code
		</label>
		<span class="pull-right">
			<i class="fa btn" :class="['', generic === true ? 'fa-check-square-o' : 'fa-square-o']" @click="toggleGenericCode"></i> 
		</span>
		<div v-if="generic === true">
			Generic Codes are randomly generated and won't be attached to a specific email address.
		</div>
		<input v-if="generic === false" name="email" class="form-control" placeholder="email@address.com">
		<span class="form-group">
			<label>
				<span v-if="generic === false">Owner's Name</span>
			</label>
			<input v-if="generic === false" name="owner" class="form-control" placeholder="Jason Putnam">
		</span>
		<span class="form-group">
			<label>
				<span v-if="generic === false">Code (letters & numbers only, no spaces)</span>
			</label>
			<input v-if="generic === false" name="code" class="form-control" placeholder="FREEDOM35 (14 character limit)">
		</span>
	</span>
	<span class="col-xs-12 col-md-3 form-group">
		<label>Quantity</label>
		<input name="total" class="form-control">
	</span>
	<span class="col-xs-12 col-md-3 form-group"  style="color:#000">
		<label>Expires</label>
		<input name="expires" class="datepicker form-control">
	</span>
	<span class="form-group">
		<label>&nbsp</label>
		<button class="btn btn-primary col-xs-12 col-md-3">Add Codes</button>
	</span>
</form>