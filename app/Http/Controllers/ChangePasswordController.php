<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('panel.changePassword');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
      $this->validate($request,[
          'current_password'   => 'required',
          'new_password' => 'required|min:6|string',
          'new_confirm_password' => 'same:new_password',
      ]);

      $password = User::where('id','=',Auth::user()->id)
                ->select('password')
                ->get();




      $hashedPassword = Auth::user()->password;
      if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
        return back()->with('error', 'Your current password cannot be the same with the old password');
      }
      if(Hash::check($request->get('current_password'),Auth::user()->password)) {
        $user = find(Auth::id());
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('successMsg','Password changed successfully');
      } else {
        return redirect()->back()->with('error','Password is wrong');
      }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
