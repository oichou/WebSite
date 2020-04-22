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
              'quantity'          => ['required', 'numeric', 'max:255','min:1'],
              'category'          => ['required', 'string', 'max:255'],
              'brand'             => ['required', 'string', 'email', 'max:255'],
              'description'       => ['required', 'string', 'min:255'],
              'basic_price'       => ['required', 'numeric'],
              'price'             => ['required', 'numeric','min:1'],
              'promo'             => ['required', 'boolean'],
              'promo_percentage'  => ['required', 'numeric','min:0','max:100'],
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
      protected function create(Request $request) {
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
    public function index() {
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
        $product = Product::find($id);
        $product->update(request()->all());
        // $product->name              = $request->input('name');
        // $product->path              = $request->input('name').'.jpg';
        // $product->quantity          = $request->input('quantity');
        // $product->category          = $request->input('category');
        // $product->brand             = $request->input('brand');
        // $product->description       = $request->input('description');
        // $product->basic_price       = $request->input('basic_price');
        // $product->price             = $request->input('price');
        // $product->promo             = $promo;
        // $product->promo_percentage  = $request->input('promo_percentage');
        // $product->save();
        return redirect()->route('admin.showtable', ['table' => 'Product']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createform($id)
    {
        $product = Product::find($id);
        $photos  = Productphoto::select()->where('product_id','=',$id)->get();
        // dd($product);
        return view('editproduct')->with([
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
