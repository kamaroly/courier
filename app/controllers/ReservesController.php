<?php

class ReservesController extends \BaseController {

	/**
	 * Display a listing of reserves
	 *
	 * @return Response
	 */
	public function index()
	{   
		$reserves = Reserve::orderBy('created_at', 'desc')->paginate(10);

		if (Input::has('search'))
	    {
			$reserves = Reserve::search(Input::get('search'))
							   ->paginate(40);
		}

		return View::make('reserves.list')
		           ->with('reserves',$reserves);
	}

	/**
	 * Show the form for creating a new reserve
	 *
	 * @return Response
	 */
	public function approve($reserveid,$status)
	{
		$reserve = Reserve::find($reserveid);

		$reserve->approved	=	Input::get('status');
        
        $reserve->save();

		Session::flash('notification.level','success');
    	Session::flash('notification.message','Route Status modified');

    	return Redirect::back();
	}
    

    public function confirm()
    {
	   $data = Input::only('names','date','time','email','telephone','start_route','end_route','travelling_company','count_seat');
	   $rules = Reserve::$rules;

		$validator = Validator::make($data, $rules);
       
		if ($validator->fails())
		{	
			return Redirect::back()->withErrors($validator)->withInput();
		}
		//Validates time
		if (! $this->bookTimeValidator($data))
		{	
			Session::flash('notification.level','danger');
	    	Session::flash('notification.message','Ntago dushoboye gukatisha itike yanyu kuko muri gusaba itike yigihe cyashize.');
			return Redirect::back()->withErrors($validator)->withInput();
		}

        //Validates entered phone
        if ( ! $this->phoneValidator($data['telephone'])) 
        {

	    	Session::flash('notification.level','danger');
	    	Session::flash('notification.message','Telefone '.$data['telephone'].' utanze ntago ariyo , shyiramo telephone itangizwa na 07.');

        	return Redirect::back()->withInput();
        }
        
        if($data['travelling_company'] =='Hitamo i kompanyi')
        {
          Session::flash('notification.level','danger');
          Session::flash('notification.message','Ugomba guhitamo i kompanyi ushaka kujyana nayo.');
        	// Take him back and display error
            return Redirect::back()->withInput();
        }
       // first Get the price for the current route
        $routePrice  = RoutesModel::select('price')
		                          ->where('start_route','=',$data['start_route'])
		                          ->where('end_route','=',$data['end_route'])
		                          ->where('travelling_company','=',$data['travelling_company'])
		                          ->first();

   // Does this route exists ?		                          
        if(is_null($routePrice))
        {  
        	Session::flash('notification.level','danger');
        	Session::flash('notification.message','Mutwihanganire! Ntago <strong>'.$data['travelling_company'].' </strong>yari yatangira ingendo za <strong>'.$data['start_route'].'-'.$data['end_route'].'</strong> mugerageze indi kompanyi.');
        	// Take him back and display error
            return Redirect::back();
        }
        $data['price']		=	$data['count_seat']*$routePrice->price;

        $data['totalprice']	= 	$data['price']+200;
        
        // All goes well so far , let's keep this info in the session 
        Session::put('reservation',$data);

		// Display information and let use confirm               
		if (Session::has('reservation')) 
		{
			return View::make('reserves.index');
		}

		return Redirect::back();
    }
	/**
	 * Store a newly created reserve in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( ! Session::has('reservation'))
	    {
			return Redirect::back();
		}
		
		Reserve::create($data=Session::get('reservation'));
        
        // Remove reservation from the sessiosn 
        Session::forget('reservation');

        //If user has provided email , send notification to him
        if(isset($data['email']))
        {
        	//send notification
            $this->email($data);
        }

    	Session::flash('notification.level','success');
    	Session::flash('notification.message','Murakoze kugura itike! Turabahamagara tubamenyesha niba yabonetse.');

 		return Redirect::home();
	}

	/**
	 * Display the specified reserve.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reserve = Reserve::findOrFail($id);

		return View::make('reserves.show', compact('reserve'));
	}

	/**
	 * Show the form for editing the specified reserve.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reserve = Reserve::find($id);

		return View::make('reserves.edit', compact('reserve'));
	}

	/**
	 * Update the specified reserve in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reserve = Reserve::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Reserve::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$reserve->update($data);

		return Redirect::route('reserves.index');
	}

	/**
	 * Remove the specified reserve from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Reserve::destroy($id);

		return Redirect::route('reserves.index');
	}
   
   /**
    * Validates Phone
    */
   
   protected function phoneValidator($phone)
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
   /**
    * Validates booking time
    * @param  array  $data 
    * @return boolean
    */
   protected function bookTimeValidator(array $data)
   {
   	  return strtotime($data['date'].' '.$data['time']) > strtotime(date('Y-m-d H:i')) ;
   }

   /**
    * Send mail to the client after booking
    * @param  [type] $emailAdress [description]
    * @return [type]              [description]
    */
   public function email($data)
   {
   	 Mail::send('emails.booking',$data, function($message) use ($data)
            {
                $message->to($data['email'])
                        ->subject('Itike wakatishije');
            });
   }
}