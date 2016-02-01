@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h1>{{ $flyer->street }}</h1>
			<h2>{{ $flyer->price }}</h2>

			<hr>

			<div class="description">{!! nl2br($flyer->description) !!}</div>
		</div>

		<div class="col-md-9">
			@foreach ($flyer->photos as $photo)
				<img src="{{URL::to('/')}}/{{ $photo->path }}" alt="alt">
			@endforeach

			@can('upload-images',$flyer)
				<form action="{{ URL::to('/') }}/{{ $flyer->zip }}/{{ $flyer->street }}/photos" class="dropzone">
					{{ csrf_field() }}
				</form>
			@endcan 
		</div>
	</div>
@stop
