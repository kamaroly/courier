<?php

class TransportersController extends \BaseController {

	/**
	 * Display a listing of transporters
	 *
	 * @return Response
	 */
	public function index()
	{
		$transporters = Transporter::paginate(10);

		return View::make('transporters.index', compact('transporters'));
	}

	/**
	 * Show the form for creating a new transporter
	 *
	 * @return Response
	 */
	public function create()
	{
		$transporter 	= new Transporter;
		return View::make('transporters.create',compact('transporter'));
	}

	/**
	 * Store a newly created transporter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Transporter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Transporter::create($data);

		return Redirect::route('admin.courriers.transporters.index');
	}

	/**
	 * Display the specified transporter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transporter = Transporter::findOrFail($id);

		return View::make('transporters.show', compact('transporter'));
	}

	/**
	 * Show the form for editing the specified transporter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transporter = Transporter::find($id);

		return View::make('transporters.edit', compact('transporter'));
	}

	/**
	 * Update the specified transporter in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$transporter = Transporter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Transporter::$rulesUpdate);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$transporter->update($data);

		return Redirect::route('admin.courriers.transporters.index');
	}

	/**
	 * Remove the specified transporter from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Transporter::destroy($id);

		return Redirect::route('admin.courriers.transporters.index');
	}

}
