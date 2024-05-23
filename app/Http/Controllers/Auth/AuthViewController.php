<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * The AuthViewController class handles the authentication related views.
 */
class AuthViewController extends Controller
{
    /**
     * Create a new AuthViewController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display the login form view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function loginFormView()
    {
        return view('auth.layout.app');
    }
}