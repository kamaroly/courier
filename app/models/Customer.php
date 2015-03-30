<?php

class Customer extends \Eloquent {

	// Add your validation rules here
	public static $rules = 
	[
		'names' 		    => 	'required',
		'telephone'		  => 	'required|numeric',
		'email'			    => 	'required|email',	
		'street_number'	=>	'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['names','telephone','email','street_number'];

// Put this in any model and use
// Modelname::findOrCreate($id);
public static function findOrCreate($data)
{
    $customer = static::where(['telephone'=>$data['telephone'],'email'=>$data['email']])->get();

    return !$customer->isEmpty() ?$customer->first() : static::create($data)->first();
}
/**
 * Validate the phone number
 * @param  [type] $phone [description]
 * @return [type]        [description]
 */
public static function phoneValidator($phone)
   {
   	    // Check if it's numeric
   	    if ( ! is_numeric($phone) ) 
   	    {
   	    	return false; 
   	    }

   	    $phone_sufix = substr($phone,0,3);

   	    $phone_length = strlen($phone);

   		return (($phone_sufix == '072' || $phone_sufix == '073' || $phone_sufix == '078') AND $phone_length==10);
   }
}