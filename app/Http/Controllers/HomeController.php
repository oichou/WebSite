<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function categories()
    {
        return view('categories');
    }

    public function product()
    {
      return view('product');
    }

    public function cart()
    {
      return view('cart');
    }

    public function check()
    {
      return view('check');
    }
    public function contact()
    {
      return view('contact');
    }

}
