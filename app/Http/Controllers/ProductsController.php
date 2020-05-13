<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productphoto;
use App\Ordersproduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->category) {
        $products = Product::inRandomOrder()->select()->where('category','=',request()->category)->get();
        // code...
      }else if (request()->brand) {
        $products = Product::inRandomOrder()->select()->where('brand','=',request()->brand)->get();
      }else {
        $products = Product::all();
      }
        $categories = Product::select('category')->distinct()->pluck('category');
        $brands = Product::select('brand')->distinct()->pluck('brand');
        return view('products')->with([
          'products'   => $products,
          'categories' => $categories,
          'brands'     => $brands,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $product        = Product::find($id);
        $images         = Productphoto::select('path')->where('product_id','=',$id)->get();
        $cat            = $product->category;
        // dd($cat);
        $mightAlsoLike  = Product::inRandomOrder()->where([['category','=',$cat],['id','<>',$id],])->paginate(4);
        // dd($mightAlsoLike);
        $theid          = Ordersproduct::where('product_id',$id)->pluck('order_id');
        // dd($theids);
        if($theid){
            $alsobought  = Ordersproduct::inRandomOrder()->where('order_id','=',$theid)->paginate(4)->pluck('product_id');
          }
          // dd($alsobought);
          $mightAlsoBuy = [];
          foreach ($alsobought as $ab) {
            $p = Product::find($ab);
            if($p)
              $mightAlsoBuy [] = $p;
          }
        return view('product')->with([
          'product'       => $product,
          'mightAlsoLike' => $mightAlsoLike,
          'mightAlsoBuy'  => $mightAlsoBuy,
          'images'        => $images

        ]);
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
