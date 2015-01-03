<?php

namespace Controllers;

use Controllers\BaseController;

use Illuminate\Support\Facades\View;

class HomeController extends BaseController 
{
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Get action for the home view
	 *
	 * @return void
	 */
	public function getHome()
	{
		return 
			View::make('home.home')
				->with('pageTitle', 'National Fishing Network')
				->with('metaDescription', 'Welcome to Game Fish Nation, providing fishing knowledge, lake and river information, and the ability to record and review fishing trips to help catch more fish.')
			;
	}
}
