<?php

class Transporter extends \Eloquent {

	// Validation rules for create
	public static $rules = [
				'type' 					=>'required',
				'name' 					=>'required',
				'NID' 					=>'required|unique:transporters',
				'driving_license' 		=>'required|unique:transporters',
				'jacket_number' 		=>'required|unique:transporters',
				'phone' 				=>'required|unique:transporters',
				'alternative_phone' 	=>'required',
				'location' 				=>'required',
	];
   
   // Validation rules for update
	public static $rulesUpdate = [
				'type' 					=>'required',
				'name' 					=>'required',
				'NID' 					=>'required',
				'driving_license' 		=>'required',
				'jacket_number' 		=>'required',
				'phone' 				=>'required',
				'location' 				=>'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['type','name','NID','driving_license','jacket_number','phone','alternative_phone','location'];

	/** Relationship to courrier */
	
	public function courriers()
	{
		return $this->hasMany('Courrer');
	}

}