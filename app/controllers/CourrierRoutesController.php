<?php

class CourrierRoutesController extends \BaseController {

	/**
	 * Display a listing of courrierroutes
	 *
	 * @return Response
	 */
	public function index()
	{
		$courrierroutes = CourrierRoute::paginate(10);

		return View::make('courrierroutes.index', compact('courrierroutes'));
	}

	/**
	 * Show the form for creating a new courrierroute
	 *
	 * @return Response
	 */
	public function create()
	{
		$courrierroute = new CourrierRoute;

		return View::make('courrierroutes.create',compact('courrierroute'));
	}

	/**
	 * Store a newly created courrierroute in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), CourrierRoute::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['from_area_id'] 	= $data['from_area'];
		$data['to_area_id'] 	= $data['to_area'];
		
		CourrierRoute::create($data);

		return Redirect::route('admin.courriers.routes.index');
	}

	/**
	 * Display the specified courrierroute.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$courrierroute = CourrierRoute::findOrFail($id);

		return View::make('courrierroutes.show', compact('courrierroute'));
	}

	/**
	 * Show the form for editing the specified courrierroute.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$courrierroute = CourrierRoute::find($id);

		return View::make('courrierroutes.edit', compact('courrierroute'));
	}

	/**
	 * Update the specified courrierroute in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$courrierroute = CourrierRoute::findOrFail($id);

		$validator = Validator::make($data = Input::all(), CourrierRoute::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
        if ($data['from_area']) 
        {
        	$data['from_area_id'] 	= $data['from_area'];
        }

        if($data['to_area'])
        {
        	$data['to_area_id'] 	= $data['to_area'];
        }
		

		$courrierroute->update($data);

		return Redirect::route('admin.courriers.routes.index');
	}

	/**
	 * Remove the specified courrierroute from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CourrierRoute::destroy($id);

		return Redirect::route('admin.courriers.routes.index');
	}

}
