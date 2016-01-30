@extends('layout')

@section('content')
	<h1>Selling your home?</h1>

	<hr>

	<div class="row">
		<form method="POST" action="{{ URL::to('/') }}/flyers" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('flyers.form')
		</form>
	</div>
@stop