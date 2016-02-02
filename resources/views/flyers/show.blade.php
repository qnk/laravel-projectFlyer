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
			@foreach ($flyer->photos->chunk(4) as $set)
				<div class="row">
				@foreach ($set as $photo)
					<div class="col-md-3 gallery_image">	
						<form method="POST" action="{{URL::to('/')}}/photos/{{ $photo->id }}">
							{!! csrf_field() !!}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit">Delte</button>
						</form> 
						<img src="{{URL::to('/')}}/{{ $photo->path }}" alt="alt">
					</div>
				@endforeach
				</div>
			@endforeach

			@can('upload-images',$flyer)
				<form
					action="{{ route('store_photo_path',['zip' => $flyer->zip, 'street' => $flyer->street]) }}"
					class="dropzone"
				>
					{{ csrf_field() }}
				</form>
			@endcan 
		</div>
	</div>
@stop
