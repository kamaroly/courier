<?php

class RoutesModel extends \Eloquent {
    
    protected $table	= 'routes';
   	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
        'start_route' => 'required',
        'end_route' => 'required',
        'price' => 'required|numeric',
        'numseats' => 'required|numeric',
        'time' => 'required',
        'travelling_company' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['start_route','end_route','price','numseats','time','travelling_company',];

}