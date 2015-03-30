<?php

class City extends \Eloquent {

	// Add the table name
	protected $table = 'cities';

	// Add your validation rules here
	public static $rules = [
	 	 'name' => 'required|alpha_spaces'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

}