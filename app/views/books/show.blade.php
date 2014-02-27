@extends('layouts.default')
@section('main')

<div class="row">

	<div class="col-lg-4">
		<img src="{{{ $book->image }}}">
	</div>

	<div class="col-lg-8">

		<div class="description">
			<h1>{{{ $book->title }}}</h1>
			{{{ $book->description }}}
			<hr>
			<h4>Información Adicional</h4>
			<ul>
				<li><span>ISBN</span>{{{ $book->isbn }}}</li>
				<li><span>Páginas</span>{{{ $book->pages }}}</li>
				<li><span>Año</span>{{{ $book->year }}}</li>
				<li><span>Idioma</span>{{{ $book->lang }}}</li>
			</ul>
			<hr>
			<h4>Descargar</h4>
			<ul>
				<li><a href="#">MEGA</a></li>
				<li><a href="#">Uploaded</a></li>
				<li><a href="#">ZippyShare</a></li>
			</ul>
			<hr>
			<h4>Comprar</h4>
			<ul>
				<li><a href="#">Amazon</a></li>
				<li><a href="#">Fnac</a></li>
			</ul>
		</div>
	</div>

</div>



{{ link_to_route('books.edit', 'Edit', array($book->id), array('class' => 'btn btn-info')) }}

{{ Form::open(array('method' => 'DELETE', 'route' => array('books.destroy', $book->id))) }}
{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
                    


<p>{{ link_to_route('books.index', 'Volver') }}</p>
@stop
