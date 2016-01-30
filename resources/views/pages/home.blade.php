@extends('layout')

@section('content')
    <div class="container theme-showcase" role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Theme example</h1>
            <p>
                This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.
            </p>
            <a href="{{ URL::to('/') }}/flyers/create" class="btn btn-primary">Create a flyer</a>
        </div>
    </div>
@stop