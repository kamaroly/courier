<?php

class RoutesController extends \BaseController {

	/**
	 * Display a listing of routes
	 *
	 * @return Response
	 */
	public function index()
	{
		$routes = RoutesModel::paginate(20);

		return View::make('routes.index', compact('routes'));
	}

	/**
	 * Show the form for creating a new route
	 *
	 * @return Response
	 */
	public function create()
	{
	 $old['start_route']  =null;
	 $old['end_route']  =null;
	 $old['price']  =null;
	 $old['numseats']  =null;
	 $old['time']  =null;
	 $old['travelling_company']  =null;
		return View::make('routes.create',compact('old'));
	}

	/**
	 * Store a newly created route in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), RoutesModel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		RoutesModel::create($data);
        
        Session::flash('success','Route '.$data['start_route'].' - '.$data['end_route'].' has been added to our database.');
		return Redirect::to('/admin/routes');
	}

	/**
	 * Display the specified route.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$route = RoutesModel::findOrFail($id);

		return View::make('routes.show', compact('route'));
	}

	/**
	 * Show the form for editing the specified route.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$old = RoutesModel::find($id)->toArray();

		return View::make('routes.create', compact('old'));
	}

	/**
	 * Update the specified route in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$route = RoutesModel::findOrFail($id);

		$validator = Validator::make($data = Input::all(), RoutesModel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        // Success!
        Session::flash('success', 'Route has been updated successfull !');

		$route->update($data);

		return Redirect::to('admin/routes');
	}

	/**
	 * Remove the specified route from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		RoutesModel::destroy($id);
       
        Session::flash('success','Route has been deleted successfull');

        return Redirect::back();
	}

}
