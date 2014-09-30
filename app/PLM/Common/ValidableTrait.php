<?php namespace PLM\Common;

use PLM\Common\Exceptions\ValidationException;

trait ValidableTrait {

	/**
	 * Validates
	 * @param  [type] $input [description]
	 * @return [type]        [description]
	 */
	public function validate($input)
	{
		$rules = $this->getRules();
		$messages = $this->getMessages();
		$validation = Validator::make($input, $rules, $messages);

		// If it fails, sho.
		if ( $validation->fails() )
		{
			throw new ValidationException( $validation->messages() );
		}
	}

	/**
	 * [getRules description]
	 * @return array
	 */
	protected function getRules()
	{
		return isset($rules = $this->rules) ? $rules : [];
	}

	/**
	 * [getMessages description]
	 * @return array
	 */
	protected function getMessages()
	{
		return isset($messages = $this->messages) ? $messages : [];
	}

}