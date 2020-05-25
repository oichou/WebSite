<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
          // $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
          return Validator::make($data, [
              'name'              => ['required', 'string', 'Max:255','unique:products'],
              'quantity'          => ['required', 'numeric', 'Max:255','Min:1'],
              'category'          => ['required', 'string', 'Max:255'],
              'brand'             => ['required', 'string', 'Max:255'],
              'description'       => ['required', 'string', 'Max:255'],
              'basic_price'       => ['required', 'numeric', 'Min:1'],
              'price'             => ['required', 'numeric', 'Min:1'],
              'promo'             => ['required', 'boolean'],
              'promo_percentage'  => ['required', 'numeric','Min:0','Max:100'],
              'photo1'            => ['required','image','mimes:jpeg,png,jpg','Max:5000'],
              'photo2'            => ['required','image','mimes:jpeg,png,jpg','Max:5000'],
              'photo3'            => ['required','image','mimes:jpeg,png,jpg','Max:5000'],
          ]);
      }
      /**
       * Get a validator for an incoming registration request.
       *
       * @param  array  $data
       * @return \Illuminate\Contracts\Validation\Validator
       */
      protected function validatorforupdate(array $data)
      {
          return Validator::make($data, [
              'name'              => ['required', 'string', 'Max:255'],
              'quantity'          => ['required', 'numeric','Min:1'],
              'category'          => ['required', 'string', 'Max:255'],
              'brand'             => ['required', 'string', 'Max:255'],
              'description'       => ['required', 'string', 'Max:255'],
              'basic_price'       => ['required', 'numeric', 'Min:1'],
              'price'             => ['required', 'numeric', 'Min:1'],
              'promo'             => ['required', 'boolean'],
              'promo_percentage'  => ['required', 'numeric','Min:0','Max:100'],
          ]);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return \App\Product
       */
      protected function create(Request $request) {
        $admin = Auth::user();
        if(!$admin->is_admin)
          return redirect()->route('error',['whichone' => '403' ]);
          $promo = $request->input('promo') ? true : false;
          $request['promo'] = $request->input('promo') ? true : false;
          $validator = $this->validator($request->all());
          if($validator->fails())
              $validator->validate();
          else{

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
          $request->photo2->move(public_path('images'), $request->input('name').'1.jpg');
          $request->photo3->move(public_path('images'), $request->input('name').'2.jpg');
          return redirect()->route('admin.showtable',['table'=>'Product']);
        }
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      if (request()->id){
        $product = Product::select()->where('id','=',request()->id)->get();
        return view('product')->with([
          'product'   => $product,
        ]);
      }
      return redirect()->route('error',['whichone' => 'outofstock' ]);
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
    public function createform($id)
    {
      $admin = Auth::user();
      if(!$admin->is_admin)
        return redirect()->route('error',['whichone' => '403' ]);
        $product = Product::find($id);
        $photos  = Productphoto::select()->where('product_id','=',$id)->get();
        return view('dashboard/edit/editproduct')->with([
            'admin'   => $admin,
            'product' => $product,
            'photo'   => $photos,
        ]);
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
      $admin = Auth::user();
      if(!$admin->is_admin)
        return redirect()->route('error',['whichone' => '403' ]);

      $request['promo'] = $request->input('promo') ? true : false;
      $validator = $this->validatorforupdate($request->all());
      if($validator->fails())
          $validator->validate();
      else{
        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('admin.showtable', ['table' => 'Product']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $admin = Auth::user();
      if(!$admin->is_admin)
        return redirect()->route('error',['whichone' => '403' ]);
    }
}
