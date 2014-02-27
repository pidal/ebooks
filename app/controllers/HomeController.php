<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$latest = Book::orderBy('created_at', 'desc')->limit(6)->get();
		$popular = Book::orderBy('title', 'desc')->limit(6)->get();
		return View::make('hello', compact('latest', 'popular'));
	}

}