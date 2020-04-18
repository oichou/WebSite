<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Product;
use App\Productphoto;


class ProductController extends Controller
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
              'name'              => ['required', 'string', 'max:255','unique:products'],
              'quantity'          => ['required', 'integer', 'max:255'],
              'category'          => ['required', 'string', 'max:255'],
              'brand'             => ['required', 'string', 'email', 'max:255'],
              'description'       => ['required', 'string', 'min:255'],
              'basic_price'       => ['required', 'integer'],
              'price'             => ['required', 'integer'],
              'promo'             => ['required', 'boolean'],
              'promo_percentage'  => ['required', 'integer'],
              'photo1'            => ['required|image|mimes:jpeg,png,jpg|max:5000'],
              'photo2'            => ['required|image|mimes:jpeg,png,jpg|max:5000'],
              'photo3'            => ['required|image|mimes:jpeg,png,jpg|max:5000'],
          ]);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return \App\Product
       */
      protected function create(Request $request)
      {
        // dd($request->input('promo'));
        $promo = $request->input('promo') ? true : false;
          $produit = Product::create([
              'name'              => $request->input('name'),
              'path'              => $request->input('name').'.jpg',
              'quantity'          => $request->input('quantity'),
              'category'          => $request->input('category'),
              'brand'             => $request->input('brand'),
              'description'       => $request->input('description'),
              'basic_price'       => $request->input('basic_price'),
              'price'             => $request->input('price'),
              'promo'             => $promo,
              'promo_percentage'  => $request->input('promo_percentage'),
          ]);
          Productphoto::create([
            'product_id' => $produit->id,
            'path'       => $request->input('name').'1.jpg'
          ]);
          Productphoto::create([
            'product_id' => $produit->id,
            'path'       => $request->input('name').'2.jpg'
          ]);
          $request->photo1->move(public_path('images'), $request->input('name').'.jpg');
          // $request->('image')->move(public_path('images'), $request->input('name').'jpg');
          $request->photo2->move(public_path('images'), $request->input('name').'1.jpg');
          $request->photo3->move(public_path('images'), $request->input('name').'2.jpg');
          return redirect()->route('admin.showtable',['table'=>'Product']);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->id)
        $product = Product::select()->where('id','=',request()->id)->get();
        // dd($product);
        return view('product')->with([
          'product'   => $product,
        ]);
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
        // $product = Product::find($id)->firstOrFail();
        // return view('product')->with([
        //   'product'   => $product,
        // ]);
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
