<?php

class CourriersController extends \BaseController {

	/**
	 * Display a listing of courriers
	 *
	 * @return Response
	 */
	public function index()
	{
		$courriers = Courrier::orderBy('created_at','DESC')->paginate(10);

		$transporters = Transporter::lists('name','id');
		
        $transporters[0] = 'None so far';

		return View::make('courriers.index', compact('courriers','transporters'));
	}

	/**
	 * Show the form for creating a new courrier
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courriers.create');
	}

	/**
	 * Store a newly created courrier in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Courrier::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Courrier::create($data);

		return Redirect::route('courriers.index');
	}

	/**
	 * Display the specified courrier.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$courrier = Courrier::findOrFail($id);

		$data = Input::except('_token');
		foreach ($data as $key => $value) 
	    {
			$courrier->$key = $value;
		}

		$courrier->save();

		return Redirect::route('admin.courriers.index');
	}

	/**
	 * Show the form for editing the specified courrier.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$courrier = Courrier::find($id);

		return View::make('courriers.edit', compact('courrier'));
	}

	/**
	 * Update the specified courrier in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$courrier = Courrier::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Courrier::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$courrier->update($data);

		return Redirect::route('courriers.index');
	}

	/**
	 * Remove the specified courrier from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Courrier::destroy($id);

		return Redirect::route('admin.courriers.index');
	}

}
