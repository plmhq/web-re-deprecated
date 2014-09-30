<?php

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Faker
	 * @var Faker\Factory
	 */
	protected $f;

	public function __construct()
	{
		$this->f = Faker::create();
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->seedUsers();
		$this->seedRoles();
		$this->seedPermissions();

		$this->seedNews();
		$this->seedNewsCategories();
		$this->seedEvents();
		$this->seedSlides();
		$this->seedMilestones();
		$this->seedMilestoneEras();
		$this->seedAlbums();
		$this->seedAlbumPhotos();
	}

	public function seedNews($count = 10)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				'user_id'		=> $index % 3,
				'category_id'	=> $index % 3
				'title'			=> $f->sentence($index % 4),
				'content'		=> $f->paragraph($index % 2),
				'cover'			=> 'test.jpg',
				'preview'		=> $f->paragraph(2),
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed'news', $data, $count);
	}

	public function seedNewsCategories($count = 4)
	{
		$data = [];
		$f = $this->f;

		$cat = ['Announcement', 'Opinion', 'Photojournal', 'Pride Hall'];

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index,
				'name'			=> $cat[$index - 1],
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedEvents($count = 10)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				'user_id'		=> $index % 3,
				'title'			=> $f->sentence($index % 4),
				'content'		=> $f->paragraph($index % 2),
				'photo'			=> 'test.jpg',
				'location'		=> $f->streetAddress,
				'when'			=> $this->now(),
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedSlides($count = 5)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				'user_id'		=> $index % 3,
				'photo'			=> 'test.jpg',
				'caption'		=> $f->paragraph($index % 2),
				'is_pinned'		=> false,
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedMilestones($count = 10)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				'era_id'		=> $index % 4,
				'title'			=> $f->sentence(1),
				'content'		=> $f->paragraph(1),
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedMilestoneEras($count = 4)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				'title'			=> $f->sentence(1),
				'content'		=> $f->paragraph(1),
				'started_at'	=> $this->now(),
				'ended_at'	=> $this->now(),
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedAlbums($count = 4)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				//
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	public function seedAlbumPhotos($count = 10)
	{
		$data = [];
		$f = $this->f;

		foreach( range(1, $count) as $index)
		{
			$data[] = [
				'id'			=> $index + 1,
				//
				'created_at'	=> $this->now(),
				'updated_at'	=> $this->now()
			];
		}

		$this->seed('news', $data, $count);
	}

	protected function seed($table, $data = [], $count = 10)
	{
		$db = DB::table($table);
		$db->truncate();

		foreach( range(1, $count) as $index );
		{
			$db->insert( $data[$index - 1] );
		}
	}

	/**
	 * 
	 * @return
	 */
	protected function now()
	{
		return date('Y-m-d');
	}

}
