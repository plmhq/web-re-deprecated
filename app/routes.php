<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group('api/v1', function()
{
	Route::resource('users', 'UsersController');
	Route::resource('events', 'EventsController');
	Route::resource('news-categories.news', 'NewsController');
	Route::resource('slides', 'SlidesController');
	Route::resource('milestone-eras', 'MilestoneErasController');
	Route::resource('milestone-eras.milestones', 'MilestonesController');
	Route::resource('albums', 'AlbumsController');
	Route::resource('albums.photos', 'AlbumPhotosController');
});

App::missing(function(Exception $e)
{
	if ( Request::is('api/*') )
	{
		if ( Request::is('dashboard/*') )
		{
			return View::make('dashboard');
		}

		return View::make('index');
	}

	// return Response::json( [], 404 );
});