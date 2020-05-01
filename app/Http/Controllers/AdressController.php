<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
Use App\User;
use App\Cart;
Use App\Address;
use Session;
class AdressController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'street'  => ['required', 'string' , 'max:255'],
            'country' => ['required', 'string' , 'max:255'],
            'city'    => ['required', 'string' , 'max:255'],
            'state'   => ['required', 'string' , 'max:255'],
            'cp'      => ['required', 'numeric', 'max:5'  ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Address
     */
    protected function create(Request $request,$for) {

        $currentuser = Auth::user();
        $adress = Address::create([
            'street'  => $request->input('street'),
            'country' => $request->input('country'),
            'city'    => $request->input('city'),
            'state'   => $request->input('state'),
            'cp'      => $request->input('cp'),
        ]);
        $currentuser->adress_id  = $adress->id;
        $currentuser->save();
        if($for == 'checkout')
          return redirect()->route('checkout');
        else
          return redirect()->route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($for)
    {
      $currentuser = Auth::user();
      $products = [];
      $total    = 0;
      $items    = 0;
      $bool     = false;
      if($for === 'checkout'){
        $bool = true;
        $cart     = Session::has('cart') ? Session::get('cart') : null;
        if($cart){
          foreach ($cart->products_id as $key => $value) {
            $qty = $value;
            $product = Product::find(intval($key));
            $products [] = [$product,$qty];
          }
          $total = $cart->total_price;
          $items = $cart->total_product;
        }
      }
      return view('addressform')->with([
        'forcheckout' => $bool,
        'products'    => $products,
        'total'       => $total,
        'items'       => $items,
        'user'        => $currentuser,
      ]);
  }
}
