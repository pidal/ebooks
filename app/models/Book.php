<?php

class Book extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'image' => 'required',
		'description' => 'required',
		'isbn' => 'required',
		'year' => 'required',
		'pages' => 'required',
		'lang' => 'required'
	);
}
