<?php

class MilestonesController extends \APIController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$milestones = Milestone::paginate(10);
		return $this->respondOK($milestones);
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
		$milestone = new Milestone;
		$milestone->fill();
		$milestone->save();

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
		$milestone = Milestone::findOrFail($id);

		return $this->respondOK($milestone);
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
		$milestone = Milestone::findOrFail($id);
		$milestone->save();

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
		$milestone = Milestone::findOrFail($id);
		$milestone->delete();

		return $this->respondOK();
	}

}
