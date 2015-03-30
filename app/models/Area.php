<?php
class Area extends \Eloquent {

	// Add the table name
	protected $table = 'areas';

	// Add your validation rules here
	public static $rules = [
	 	 'name' => 'required|alpha_spaces'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','city_id'];

	public function city()
	{
		return $this->belongsTo('City');
	}
}