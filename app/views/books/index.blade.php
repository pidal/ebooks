@extends('layouts.default')
@section('main')

<h1>All Books</h1>

<p>{{ link_to_route('books.create', 'Add new book') }}</p>

@if ($books->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Image</th>
				<th>Description</th>
				<th>Isbn</th>
				<th>Year</th>
				<th>Pages</th>
				<th>Lang</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($books as $book)
				<tr>
					<td>{{{ $book->title }}}</td>
					<td>{{{ $book->image }}}</td>
					<td>{{{ $book->description }}}</td>
					<td>{{{ $book->isbn }}}</td>
					<td>{{{ $book->year }}}</td>
					<td>{{{ $book->pages }}}</td>
					<td>{{{ $book->lang }}}</td>
                    <td>{{ link_to_route('books.edit', 'Edit', array($book->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('books.destroy', $book->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no books
@endif

@stop
