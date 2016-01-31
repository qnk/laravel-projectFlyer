@extends('layout')

@section('content')
	<h1>{{ $flyer->street }}</h1>
	<h2>{{ $flyer->price }}</h2>

	<hr>

	<div class="description">{!! nl2br($flyer->description) !!}</div>

	@can('upload-images',$flyer)
		<form action="{{ URL::to('/') }}/{{ $flyer->zip }}/{{ $flyer->street }}/photos" method="POST" class="dropzone" enctype="multipart/form-data">
			{{ csrf_field() }}
		</form>
	@endcan 
@stop