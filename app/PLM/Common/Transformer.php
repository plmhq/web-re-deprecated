<?php namespace PLM\Common;

class Transformer {

	/**
	 * Transformed data
	 * 
	 * @var StdClass
	 */
	protected $transformed;

	/**
	 * Transformed pagination data
	 *
	 * @var StdClass
	 */
	protected $pagination;

	/**
	 * Transformation model of each data
	 * 
	 * @var [type]
	 */
	protected $model;

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		$this->transformed = new \StdClass;
		$this->pagination = new \StdClass;
	}

	/**
	 * Transforms pagination / collection
	 * 
	 * @param  [type] $collection [description]
	 * @return [type]             [description]
	 */
	public function transformPagination($collection)
	{
		$this->pagination->current_page = $collection->current_page;

		$transformed = $this->transformed;
		$transformed->data = $this->transformCollection($collection->data);
		$transformed->pagination = $this->pagination;

		return $this->pagination;
	}

	/**
	 * Transforms collection
	 * 
	 * @param  [type] $collection [description]
	 * @return [type]             [description]
	 */
	public function transformCollection($collection)
	{
		$newCollection = [];

		foreach($collection as $data => $index)
		{
			$newCollection = $this->transform($data);
		}

		return $newCollection;
	}

	/**
	 * Transforms given data
	 * 
	 * @param  [type] $collection [description]
	 * @return [type]             [description]
	 */
	public function transform($data)
	{
		$model = new \StdClass;

		foreach($this->model as $key => $value)
		{
			$model->{$key} = $data->{$value};
		}

		return $model;
	}

}