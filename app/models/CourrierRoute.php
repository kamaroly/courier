<?php

class CourrierRoute extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'from_area' => 	'required|numeric',
		'to_area'   => 	'required|numeric',
		'courrier_type'=>	'required',
		'fees'		   =>	'required|numeric'
	];

	// Don't forget to fill this array
	protected $fillable = ['from_area_id','to_area_id','courrier_type','fees'];

	/** Relationship with  Area */
	public function fromArea()
	{
		return $this->belongsTo('Area','from_area_id');
	}

	/** Relationship with Area */
	public function toArea()
	{
		return $this->belongsTo('Area','to_area_id');
	}

	

}