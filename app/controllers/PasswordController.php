<?php

namespace Controllers;

use Controllers\BaseController;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class PasswordController extends BaseController 
{
    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function getRemind()
    {
        return 
            View::make('password.remind')
                ->with('pageTitle', 'Password Reminder')
                ->with('metaDescription', 'Password reminder page.')
            ;
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        switch ($response = Password::remind(Input::only('email')))
        {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));
                break;
            case Password::REMINDER_SENT:
                return Redirect::back()->with('status', Lang::get($response));
                break;
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return 
            View::make('password.reset')
                ->with('token', $token)
                ->with('pageTitle', 'Password Reset')
                ->with('metaDescription', 'Password reset page.')
            ;
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/');
        }
    }
}