<?php

class AreaController extends \BaseController 
{

	/**
	 * Display a listing of Areas
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = Area::paginate(10);

		return View::make('areas.index', compact('areas'));
	}

	/**
	 * Show the form for creating a new Area
	 *
	 * @return Response
	 */
	public function create()
	{
		$area 	= new Area;
		$cities 	= City::lists('name','id');

		return View::make('areas.create',compact('area','cities'));
	}

	/**
	 * Store a newly created Area in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Area::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Area::create($data);

		return Redirect::route('admin.areas.index');
	}

	/**
	 * Display the specified Area.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$area = Area::findOrFail($id);

		return View::make('areas.show', compact('Area'));
	}

	/**
	 * Show the form for editing the specified Area.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$area = Area::find($id);
		$cities 	= City::lists('name','id');

		return View::make('areas.edit', compact('area','cities'));
	}

	/**
	 * Update the specified Area in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$area = Area::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Area::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$area->update($data);

		return Redirect::route('admin.areas.index');
	}

	/**
	 * Remove the specified Area from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Area::destroy($id);

		return Redirect::route('admin.areas.index');
	}

}
