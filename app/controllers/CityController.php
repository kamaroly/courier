<?php

class CityController extends \BaseController {

	public $city;

	function __construct(City $city) {
		$this->city = $city;
		
	}
	/**
	 * Display a listing of the resource.
	 * GET /city
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities	= $this->city->paginate(20);

		return View::make('cities.index', compact('cities'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /city/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$city = new $this->city;

		return View::make('cities.create', compact('city'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /city
	 *
	 * @return Response
	 */
	public function store()
	{
	    $validator = Validator::make($data = Input::all(), City::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		City::create($data);

		return Redirect::route('admin.cities.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET /city/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$city = $this->city->findOrFail($id);

		return View::make('cities.edit', compact('city'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /city/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$city = $this->city->findOrFail($id);

		$validator = Validator::make($data = Input::all(), City::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        
       

		$city->update($data);

		return Redirect::route('admin.cities.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /city/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->city->destroy($id);

		return Redirect::route('admin.cities.index');
	}

}