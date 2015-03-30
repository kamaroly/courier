<?php

class CourrierBookController extends \BaseController
{
	/**
	 * show welcome form for booking 
	 * 
	 * @return [type] 
	 */
	public function welcome()
	{
	       
	        
		return View::make('courriers.new');
	}

	/**
	 * Recieve route submitted information and show the customer form
	 *
	 * @return [type] [description]
	 */
  public function registerCustomer()
  {	
  	 
  	//Get submitted information and register them to the session 
  	$routedata = Input::only('from_city','from_area','to_city','to_area','type','pickup_date','time_hours','time_minutes');

        $routedata['pickup_time'] = $routedata['time_hours'].':'.$routedata['time_minutes'];
   
    // first check if the Courrier route exists
    if(!$this->routeExists($routedata['from_area'],$routedata['to_area']))
    {
      Session::flash('notification.level','danger');
      Session::flash('notification.message','Mutwihanganire, Aho ubutumwa bwanyu buva naho bujya ntago twari twatangira kuhakorera.');

      return Redirect::back()->withInput();
     
    }

    
    $validator = Validator::make($routedata, Courrier::$rules);
    
    //Initial validation errors?
    if ($validator->fails())
    {
      return Redirect::back()->withErrors($validator)->withInput();
    }
    
    //Advanced validation errors
    if(!Courrier::validateRoute($routedata['from_area'],$routedata['to_area']))
    {
      Session::flash('notification.level','danger');
      Session::flash('notification.message','Kosora aho ubutumwa buva naho bujya, ubone gukomeza.');
       
      return Redirect::back()->withErrors($validator)->withInput();
    }

       //Get the price for this route
        $routedata['price']   = $this->routePrice($routedata['from_area'],$routedata['to_area']);

  	Session::put('routedata', $routedata);
  	
  	//Show the view for the customer information
  	return View::make('courriers.customer',['sender' => new Customer,'receiver' => new Customer]);
  }

  /**
   * show customer informatio he has booked before confirming the booking
   * 
   * @return [type] [description]
   */
  public function preConfirm()
  {


    if(!(Customer::phoneValidator(Input::get('sender_telephone'))
         && 
         Customer::phoneValidator(Input::get('receiver_telephone')))
      )
    {
      Session::flash('notification.level','danger');
      Session::flash('notification.message','Telephone wanshyizemo ntago ariyo.');
      
      return View::make('courriers.customer');
    }
    // Check if we have route information before continuing
    /** fixins backward compatibility with php5.4 */
    $routedata = Session::get('routedata');
    
  	if(!empty($routedata))
  	{   
  	
	   	// Let's get previous submitted data
  		$senderData   = $this->getCustomerData(Input::all(),'sender_');

  		$sender       = Customer::findOrCreate($senderData);
             
                //first clean any existing session
                Session::forget('sender');
         
                Session::put('sender',$sender);

  		$receiverData = $this->getCustomerData(Input::all(),'receiver_');
        
                $receiver     = Customer::findOrCreate($receiverData);
                //first clean any existing session
                Session::forget('sender');
                
                Session::put('receiver',$receiver);

  		$routedata 	  = Session::get('routedata');

      $routedata['details'] = Input::get('details');
      $routedata['sender_id'] = $sender->id;
      $routedata['receiver_id'] = $receiver->id;

      // Re-save Route information
      Session::put('routedata',$routedata);

      return View::make('courriers.confirm', compact('sender','receiver','routedata'));

  	}
  }

  /**
   * Method to register the booking
   * @return [type] [description]
   */
  
  public function confirm()
  {
    //Get courrier data from the session
    $data = Session::get('routedata');

    $courrier   =   Courrier::create($data);



    // Save the courrier
    if ($courrier)
    {
      Session::flash('notification.level','success');
      Session::flash('notification.message',Lang::get('courriers.confirmation_mail'));
    }
    else
    {
      Session::flash('notification.level','danger');
      Session::flash('notification.message','Habaye ikibazo igihe twageragezaga kwakira ubusabe bwanyu, Mungere mukanya.');

    }

    return Redirect::to('/courriers');
  }

  /**
   * Get customer data as per his type, Sender or Receiver
   * @param  array  $data 
   * @param  [type] $type 
   * @return array       
   */
  public function getCustomerData(array $data,$type)
  {
  	$customerData = [];

  	foreach ($data as $key => $value) 
  	{
  		// if it doesn't belong to the current type then continue the loop
  		$newKey=str_replace($type, '',$key);
  		
  		if($newKey == $key)
  		{
  			continue;
  		}

  	    $customerData[$newKey] = $value;
  	}

  	return $customerData;
  }


  private function routeExists($fromArea,$toArea)
  {
    return !CourrierRoute::where(['from_area_id'=>$fromArea,'to_area_id'=>$toArea])->get()->isEmpty();
  }

 private function routePrice($fromArea,$toArea)
  {
    return (float) CourrierRoute::where(['from_area_id'=>$fromArea,'to_area_id'=>$toArea])->first()->fees;
  }


}