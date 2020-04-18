<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Order;
use Auth;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('panel.overview');
    }

    public function getProfile() {
      return view('panel.profile');
    }

    public function getOrders()
    {
      $orders = DB::table('products')
                  ->join('order_product','order_product.product_id','=','products.id')
                  ->join('orders','orders.id','=','order_product.order_id')
                  ->where('orders.id','=',Auth::user()->id)
                  ->select('products.*','order_product.quantity')
                  ->get();

      return view('panel.orders')->with('orders',$orders);
    }

    public function updateUsername(Request $request)
    {
      $username = $request->input('username');
      $validatedData = $request->validate([
        'username'=>['required', 'string', 'max:255','unique:users'],
      ]);
        $tab = DB::table('users')
              ->where('username', '=', Auth::user()->username)
              ->where('email', '=', Auth::user()->email)
              ->update(['username' => $username]);

        return redirect()->route('profile')->with('alert-success','Username successfully');
    }

    public function updatefName(Request $request)
    {
      $name = $request->input('fname');
        $tab = DB::table('users')
              ->where('first_name', '=', Auth::user()->first_name)
              ->where('email','=', Auth::user()->email)
              ->update(['first_name' => $name]);


        return redirect()->route('profile')->with('alert-success','First name changed successfully');
    }

    public function updatelName(Request $request)
    {
      $name = $request->input('lname');
        $tab = DB::table('users')
              ->where('last_name', '=', Auth::user()->last_name)
              ->where('email','=', Auth::user()->email)
              ->update(['last_name' => $name]);


        return redirect()->route('profile')->with('alert-success','Last name changed successfully');
    }

    public function updateEmail(Request $request)
    {
      $email = $request->input('email');
      $validatedData = $request->validate([
        'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
      ]);
        $tab = DB::table('users')
              ->where('email', '=', Auth::user()->email)
              ->update(['email' => $email]);

        return redirect()->route('profile')->with('alert-success','Email changed successfully');
    }

    public function updatePhone(Request $request)
    {
      $phone = $request->input('phone');
        $tab = DB::table('users')
              ->where('phone', '=', Auth::user()->phone)
              ->where('email','=', Auth::user()->email)
              ->update(['phone' => $phone]);


        return redirect()->route('profile')->with('alert-success','Phone Number changed successfully');
    }


    public function updateBirth(Request $request)
    {
      $birth = $request->input('birthday');
        $tab = DB::table('users')
              ->where('birth', '=', Auth::user()->birth)
              ->where('email','=', Auth::user()->email)
              ->update(['birth' => $birth]);


        return redirect()->route('profile')->with('alert-success','Phone Number changed successfully');
    }






    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
