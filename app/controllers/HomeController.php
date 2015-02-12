<?php

namespace Controllers;

use Controllers\BaseController;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

	/**
	 * Get action for the login view
	 *
	 * @return void
	 */
	public function getLogin()
	{
		if (Auth::check()) {
			return
				Redirect::intended(Auth::user()->landing_page);
		}

		return 
			View::make('home.login')
				->with('pageTitle', 'Login')
				->with('metaDescription', 'Login Page.')
				->with('active', 'login')
			;
	}

	/**
	 * Post action for the login view.
	 *
	 * @return Redirect
	 */
	public function postLogin()
	{
		if (Auth::check()) {
			return
				Redirect::intended(Auth::user()->landing_page);
		}

		$data = 
			Input::only(
				'username', 
				'password', 
				'remember_me'
			);

		// Try to log in
		if($this->user->login($data['username'], $data['password'], $data['remember_me'])) {
			return 
				Redirect::intended(Auth::user()->landing_page);
		}

		return 
			Redirect::back()->with('error', $this->user->getMessages());
	}

	/**
	 * Get action to log out the user
	 *
	 * @return void
	 */
	public function getLogout()
	{
		Auth::Logout();

		return 
			Redirect::to('/');
	}
}
