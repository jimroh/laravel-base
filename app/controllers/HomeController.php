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
				->with('pageTitle', 'Laravel Base')
				->with('metaDescription', 'This is a base Laravel set up using Twitter Bootstrap 3.0, jQuery and AngularJS.')
			;
	}
}
