<?php

class Reserve extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
	            'names'	=>	'required',
				'time' =>'required',
				'email'	=>	'email',
				'price'	=>	'numeric',
				'totalprice'	=>	'numeric',
				'telephone'	=>	'required|numeric:phone:RW',
				'start_route' =>'required',
				'end_route' =>'required',
				'travelling_company' =>'required',
				'count_seat' =>'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['names','date','time','email','telephone','price','totalprice','start_route','end_route','travelling_company','count_seat'];

  public function scopeSearch($query,$keyword)
  {
  	return $query->where("names","like","%$keyword%")
  				 ->orWhere('telephone','like',"$keyword%")
  				 ->orWhere('email','like',"%keyword%");
  }
}