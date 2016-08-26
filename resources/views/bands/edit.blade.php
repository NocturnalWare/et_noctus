@extends('layouts.master')


@section('content')
	<div class="col-xs-12 col-md-6 col-md-offset-1 well">
		<h3>{{$band->name}}</h3>
		<div class="col-xs-12 well">
			<dt>
				Members
				<button class="btn btn-xs btn-success pull-right">
					<i class="fa fa-plus"></i> ADD
				</button>
				<button class="btn btn-xs btn-success pull-right">
					<i class="fa fa-wrench"></i> EDIT
				</button>
			</dt>
			<hr style="border-color:#000">
			@foreach($band->members as $member)
				<dd class="band-members col-xs-12">
					<div class="col-xs-6 col-md-6">
						{{$member->contact->f_name}} {{$member->contact->l_name}}
					</div>
					<div class="col-xs-6 col-md-5">
						{{$member->mainInstrument->instrument}}
					</div>
					<div class="col-xs-12 col-md-1">
						<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
					</div>
				</dd>
			@endforeach
		</div>
		<div class="col-xs-12 well">
			<dt>Upcoming Shows</dt>
			@foreach($band->shows as $show)
				@if(\Carbon::parse($show->show->event_date) > \Carbon::parse())
					<dd class="band-members col-xs-12">
						<a href="{{route('control.shows.edit', $show->show->id)}}">{{$show->show->name}}</a>
						<span class="pull-right">{{\Carbon::parse($show->show->event_date)->format('M d, Y')}}</span>
					</dd>
				@endif
			@endforeach
		</div>

		<div class="col-xs-12 well">
			<dt>Previous Shows</dt>
			@foreach($band->shows as $show)
				@if(\Carbon::parse($show->show->event_date) < \Carbon::parse())
					<dd class="band-members col-xs-12">
						<a href="{{route('control.shows.edit', $show->show->id)}}">{{$show->show->name}}</a>
						<span class="pull-right">{{\Carbon::parse($show->show->event_date)->format('M d, Y')}}</span>
					</dd>
				@endif
			@endforeach
		</div>
	
	</div>

@stop