<?php

class MilestoneErasController extends \APIController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$era = MilestoneEra::paginate(10);
		return $this->respondOK($era);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$era = new MilestoneEra;
		$era->fill();
		$era->save();

		return $this->respondOK();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$era = MilestoneEra::findOrFail($id);

		return $this->respondOK($era);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$era = MilestoneEra::findOrFail($id);
		$era->save();

		return $this->respondOK();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$era = MilestoneEra::findOrFail($id);
		$era->delete();

		return $this->respondOK();
	}


}
