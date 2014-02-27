<?php

class BooksController extends BaseController {

	/**
	 * Book Repository
	 *
	 * @var Book
	 */
	protected $book;

	public function __construct(Book $book)
	{
		$this->book = $book;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = $this->book->all();

		return View::make('books.index', compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Book::$rules);

		if ($validation->passes())
		{
			$this->book->create($input);

			return Redirect::route('books.index');
		}

		return Redirect::route('books.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = $this->book->findOrFail($id);

		return View::make('books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = $this->book->find($id);

		if (is_null($book))
		{
			return Redirect::route('books.index');
		}

		return View::make('books.edit', compact('book'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Book::$rules);

		if ($validation->passes())
		{
			$book = $this->book->find($id);
			$book->update($input);

			return Redirect::route('books.show', $id);
		}

		return Redirect::route('books.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->book->find($id)->delete();

		return Redirect::route('books.index');
	}

}
