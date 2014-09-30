<?php

class AuthController extends \APIController {

	/**
	 * Returns user auth status && its data
	 * 
	 * @return Response
	 */
	public function data()
	{
		$auth = new \StdClass;

		if ( $status = Auth::check() )
		{
			$auth->status 	= $status;
			$auth->data 	= Auth::data();
		}
		else
		{
			$auth->status 	= $status;
		}

		return $this->respondOK($auth);
	}

	/**
	 * Attempts to login the user
	 * 
	 * @return Response
	 */
	public function attempt()
	{
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		if ( Auth::attempt($credentials) )
		{
			return $this->respondOK();
		}

		return $this->respondWithErrors();
	}

	/**
	 * Logouts the authenticaated user
	 * 
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();

		return $this->respondOK();
	}

}