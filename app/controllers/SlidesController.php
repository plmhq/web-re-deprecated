<?php

class SlidesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = Slide::paginate(10);
		return $this->respondOK($slides);
	}


	/**
	 *  the form for creating a new resource.
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
		$slide = new Slide;
		$slide->fill();
		$slide->save();

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
		$slide = Slide::findOrFail($id);

		return $this->respondOK($slide);
	}


	/**
	 *  the form for editing the specified resource.
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
		$slide = Slide::findOrFail($id);
		$slide->save();

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
		$slide = Slide::findOrFail($id);
		$slide->delete();

		return $this->respondOK();
	}

}
