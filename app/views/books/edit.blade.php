@extends('layouts.default')
@section('main')

<h1>Edit Book</h1>
{{ Form::model($book, array('method' => 'PATCH', 'route' => array('books.update', $book->id))) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('isbn', 'Isbn:') }}
            {{ Form::text('isbn') }}
        </li>

        <li>
            {{ Form::label('year', 'Year:') }}
            {{ Form::input('number', 'year') }}
        </li>

        <li>
            {{ Form::label('pages', 'Pages:') }}
            {{ Form::input('number', 'pages') }}
        </li>

        <li>
            {{ Form::label('lang', 'Lang:') }}
            {{ Form::text('lang') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('books.show', 'Cancel', $book->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
