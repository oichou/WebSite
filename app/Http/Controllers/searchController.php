<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Product;
use App\Productphoto;
use Auth;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($search = $request->input('search'))
      {
        $articles = Product::inRandomOrder()->select()
                    ->where('category','like','%'.$search.'%')
                    ->orWhere('brand', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->get();
      }else {
        $articles = Product::all();
      }

      $categories = Product::select('category')->distinct()->pluck('category');
      $brands = Product::select('brand')->distinct()->pluck('brand');
        return view('search')->with([
          'articles'   =>   $articles,
          'categories' =>   $categories,
          'brands'     =>   $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    //
    // public function sidebar()
    // {
    //   if (request()->category) {
    //     $prod = Product::inRandomOrder()->select()->where('category','=',request()->category)->get();
    //     // code...
    //   }else if (request()->brand) {
    //     $prod  = Product::inRandomOrder()->select()->where('brand','=',request()->brand)->get();
    //   }else {
    //     $prod = Product::all();
    //   }
    //     $categories = Product::select('category')->distinct()->pluck('category');
    //     $brands = Product::select('brand')->distinct()->pluck('brand');
    //     return view('search')->with([
    //       'categories' => $categories,
    //       'brands'     => $brands,
    //     ]);
    //
    // }

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
