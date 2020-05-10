<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

Use App\User;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * overwrite
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $login = request()->input('Login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $x=request()->merge([$fieldType => $login]);
        // dd($x);
        return $fieldType;
    }


    protected function authenticated(Request $request, $user)
    {
        if ( $user->is_admin ) {
            return redirect('/admin');
        }

        return redirect('/');
    }
    /**
     * overwrite
     * Get the authenticate method to be used by the controller.
     *
     * @return string
     */
    // public function authenticate(Request $request)
    // {
    //   $user = $this->username();
    //   dd('user');
    //   $salt = User::where('username', $user)
    //                 ->orWhere('email', $user)
    //                 ->select('salt');
    //   // $password =
    //     $credentials = $request->only('email', 'password');
    //
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }
    protected function credentials(Request $request)
    {
      $login    = request()->input('Login');
      $user     = $this->username();
      try {
        $salt     = User::select()->where($user,$login)->pluck('salt')->toArray();
        $password = $salt[0].request()->input('password');
        return [
          $user      => $login,
          'password' => $password,
        ];

      } catch (\Exception $e) {
        // dd(',;n');
        // dd($e);
        return [
          $user      => '',
          'password' => '',
        ];
    }

    }
    public function authenticate()
    {
        $credentials = $this->credentials();
        if (Auth::attempt($credentials) ) {
          // Authentication passed...
          return redirect()->intended('dashboard');
        }
        else {
          // return redirect()->back()->withErrors(array('login' => 'please check again your credentials'));
          return back();
        }

    }
}
