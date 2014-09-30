<?php

class APIController extends Controller {

	/**
	 * Status code
	 * @var int
	 */
	protected $statusCode = 200;

	/**
	 * HTTP code constants
	 */
    const HTTP_OK = 200; //Response to a successful GET, PUT, PATCH or DELETE. Can also be used for a POST that doesn't result in a creation.
    const HTTP_CREATED = 201; //Response to a POST that results in a creation. Should be combined with a Location header pointing to the location of the new resource
    const HTTP_NO_CONTENT = 204; //Response to a successful request that won't be returning a body (like a DELETE request)
    const HTTP_NOT_MODIFIED = 304; //Used when HTTP caching headers are in play
    const HTTP_BAD_REQUEST = 400; //The request is malformed, such as if the body does not parse
    const HTTP_UNAUTHORIZED = 401; //When no or invalid authentication details are provided. Also useful to trigger an auth popup if the API is used from a browser
    const HTTP_FORBIDDEN = 403; //When authentication succeeded but authenticated user doesn't have access to the resource
    const HTTP_NOT_FOUND = 404; //When a non-existent resource is requested
    const HTTP_INTERNAL_SERVER_ERROR = 500; //Internal Server Error

	/**
	 * Returns a successful response
	 *  
	 * @param  [type] $data
	 * @return [type]
	 */
	protected function respondOK($data)
	{
		return $this->setStatusCode(self::HTTP_OK)
			->respond($data);
	}

	/**
	 * Returns a successful response
	 *  
	 * @param  [type] $data
	 * @return [type]
	 */
	protected function respondWithErrors($data)
	{
		return $this->setStatusCode(self::HTTP_BAD_REQUEST)
			->respond($data);
	}

	/**
	 * Sets status code
	 * 
	 */
	private function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		
		return $this;
	}

	/**
	 * Actual response implementation
	 * 
	 * @param  array|object $data
	 * @return Response
	 */
	protected function respond($data, $headers = [])
	{
		return Response::json(
			$data,
			$this->statusCode,
			$headers
		);
	}

}