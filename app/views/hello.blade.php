@extends('layouts.default')

@section('main')

	<h2>Últimos añadidos</h2>
	<div class="row">
		@foreach($latest as $l)
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="thumbnail">
			  <img src="{{$l->image}}">
			  <div class="caption">
			    <h4>{{$l->title}}</h4>
			  </div>
			</div>
		</div>
		@endforeach
	</div>
	<h2>Mas descargados</h2>
	<div class="row">
		@foreach($popular as $p)
		<div class="col-sm-6 col-md-4 col-lg-3">
			<a href="{{route('books.show', $p->id)}}">
				<div class="thumbnail">
				  <img src="{{$p->image}}">
				  <div class="caption">
				    <h4>{{$p->title}}</h4>
				  </div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
@stop