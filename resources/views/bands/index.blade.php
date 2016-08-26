@extends('layouts.master')


@section('content')

	<div class="well row">
		@foreach($bands as $band)
			<div class="col-xs-12 col-md-4 well" style="height:225px;">
				<h3>
					{{$band->name}}
					<a href="{{route('bands.edit', $band->id)}}" class="btn pull-right">
						<i class="fa fa-gears"></i>
					</a>
				</h3>
				<h4>Members:</h4>
				@foreach($band->members as $member)
					<a href="{{route('bandmember.edit', $member->id)}}" class="btn">
						<b>{{$member->contact->f_name}} {{$member->contact->l_name}}</b> - <i>{{$member->mainInstrument->instrument}}</i><br>
					</a>
				@endforeach
			</div>
		@endforeach

	</div>

@stop