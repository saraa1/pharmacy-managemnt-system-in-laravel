<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    protected function redirectTo()
    {
        if (Auth::user()->isAdmin()) {

            return $this->redirectTo = '/admin';

        } elseif (Auth::user()->isCustomer()) {

            return $this->redirectTo = '/';

        } elseif (Auth::user()->isStaff()) {

            return $this->redirectTo = '/admin';

        } else
            return $this->redirectTo = '404';

    }


        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
