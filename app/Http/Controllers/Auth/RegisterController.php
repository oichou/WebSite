<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use DB;
use Mail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname'      => ['required', 'string', 'max:255'],
            'lname'      => ['required', 'string', 'max:255'],
            'username'   => ['required', 'string', 'max:255','unique:users'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/(.*)@gmail\.com|(.*)@outlook\.com|(.*)@hotmail\.com|(.*)@hotmail\.fr|(.*)@hotmail\.fr/'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $salt = substr(str_shuffle($permitted_chars), 8, 8);
        return User::create([
            'first_name'  => $data['fname'],
            'last_name'   => $data['lname'],
            'username'    => $data['username'],
            'email'       => $data['email'],
            'salt'        => $salt,
            'password'    => Hash::make($salt.$data['password']),
        ]);

    }

    // public function register(Request $request)
    // {
    //   $input = $request->all();
    //   $validator = $this->validator($input);
    //
    //   if ($validator->passes()){
    //     $user = $this->create($input)->toArray();
    //     $user['link'] = Str::random(30);
    //
    //     DB::table('users_activations')->insert(['id_user' => $user['id'],'token' =>$user['link']]);
    //     Mail::send('emails.activation', $user, function($message) use ($user) {
    //       $message->to($user['email']);
    //       $message->subject('Activation of your account');
    //     });
    //     redirect()->to('login')->with('success', 'We sent activation code, please check your email');
    //
    //   }
    //   return back()->with('error', $validator->errors());
    // }
    //
    //
    //
    // public function userActivation($token)
    // {
    //   $check = DB::table('users_activations')->where('token', $token)->first();
    //   if(!is_null($check)) {
    //     $user = User::find($check->id_user);
    //     if ($user->is_activated == 1){
    //       return redirect()->to('login')->with('success','user already activated');
    //     }
    //     $user->update(['is_activated' => 1]);
    //     DB::table('users_activations')->where('token', $token)->delete();
    //     return redirect()->to('login')->with('success', 'user activated successfully');
    //   }
    //   return redirect()->to('login')->with('warning','your token is invalid');
    // }

}
