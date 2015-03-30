<?php

class ReservesController extends \BaseController {

	/**
	 * Display a listing of reserves
	 *
	 * @return Response
	 */
	public function index()
	{
		$reserves = Reserve::orderBy('created_at', 'DESC')->paginate(20);

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

		$reserve->approved	=	($status==0)?1:0;
        
        $reserve->save();

	Session::flash('notification.level','success');
    	Session::flash('notification.message','Route Status modified');

    	return Redirect::back();
	}
    

    public function confirm()
    {
	    $data = Input::only('names','date','time','email','telephone','start_route','end_route','travelling_company','count_seat');

		$validator = Validator::make($data, Reserve::$rules);
       
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        if($data['travelling_company'] =='Hitamo i kompanyi')
        {
          Session::flash('notification.level','danger');
          Session::flash('notification.message','Ugomba guhitamo i kompanyi ushaka kujyana nayo.');
        	// Take him back and display error
            return Redirect::back();
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
		Reserve::create(Session::get('reservation'));
        
        // Remove reservation from the sessiosn 
        Session::forget('reservation');

    	Session::flash('notification.level','success');
    	Session::flash('notification.message','Murakoze kugura itike yanyu!Turabahamagara tubamenyesha niba yabonetse.');

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

}