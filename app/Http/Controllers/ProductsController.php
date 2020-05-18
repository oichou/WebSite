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
     * Display a listing of the resource where promo = true.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function offers(Request $request)
     {


       $cat = $request->input('category');
       $bran = $request->input('brand');
       $prom = $request->input('promotion');
         if($cat =="" && $bran =="" && $prom=="") {
           $products = Product::inRandomOrder()
                       ->select()
                       ->where('promo','=',true)
                       ->get();
         } else if($bran =="" && $prom=="") {
         $products = Product::inRandomOrder()
                       ->select()
                       ->where('promo','=',true)
                       ->where('category','=',$cat)
                       ->get();
         } else if($cat=="" && $prom=="") {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('brand','=',$bran)
                         ->get();
         } else if($cat =="" && $bran =="") {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('promo_percentage','=',$prom)
                         ->get();
         }else if($cat =="") {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('brand','=',$bran)
                         ->where('promo_percentage','=',$prom)
                         ->get();
         }else if($bran =="") {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('category','=',$cat)
                         ->where('promo_percentage','=',$prom)
                         ->get();
         }else if($prom =="") {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('category','=',$cat)
                         ->where('brand','=',$bran)
                         ->get();
         } else {
           $products = Product::inRandomOrder()
                         ->select()
                         ->where('promo','=',true)
                         ->where('category','=',$cat)
                         ->where('brand','=',$bran)
                         ->where('promo_percentage','=',$prom)
                         ->get();

         }

         // $cat = $request->input('category');
         // $bran = $request->input('brand');
         // $prom = $request->input('promotion');
         // if($cat == "" && $bran =="" && $prom == "") {
         //   $products = Product::inRandomOrder()
         //               ->select()
         //               ->where('promo','=',true)
         //               ->get();
         // }else {
         // $products = Product::inRandomOrder()
         //               ->select()
         //               ->where(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('category','=',$cat)
         //                        ->where('brand','=',$bran)
         //                        ->where('promo_percentage','=',$prom);
         //                })
         //                ->orWhere(function ($query)
         //                {  $query->where('promo','=',true)
         //                         ->where('category','=',$cat)
         //                         ->where('brand','=',$bran);
         //                })
         //                ->orWhere(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('category','=',$cat)
         //                        ->where('promo_percentage','=',$prom);
         //                })
         //                ->orWhere(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('brand','=',$bran)
         //                        ->where('promo_percentage','=',$prom);
         //                })
         //                ->orWhere(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('promo_percentage','=',$prom);
         //                })
         //                ->orWhere(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('brand','=',$bran);
         //                })
         //                ->orWhere(function ($query)
         //                {
         //                  $query->where('promo','=',true)
         //                        ->where('category','=',$cat);
         //                })
         //               ->get();
                     // }



         $categories = Product::select('category')->distinct()->pluck('category');
         $brands = Product::select('brand')->distinct()->pluck('brand');
         $promos = Product::select('promo_percentage')->distinct()->pluck('promo_percentage');
         return view('offers')->with([
           'products'   => $products,
           'categories' => $categories,
           'brands'     => $brands,
           'promos'     => $promos,
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
        $product         = Product::find($id);
        $images          = Productphoto::where('product_id','=',$id)->pluck('path');
        $cat             = $product->category;
        $mightAlsoLike   = Product::inRandomOrder()->where([['category','=',$cat],['id','<>',$id],])->paginate(4);
        $theid           = Ordersproduct::where('product_id',$id);
        $mightAlsoBuy    = [];
        if($theid->exists()){
            $theid       =  $theid->pluck('order_id');
            $alsobought  = Ordersproduct::inRandomOrder()->where([['order_id','=',$theid],['product_id','<>',$id],])->paginate(4)->pluck('product_id');
            // dd($alsobought);
          if($alsobought){

          foreach ($alsobought as $ab) {
            $p = Product::find($ab);
            if($p)
              $mightAlsoBuy [] = $p;
          }
        }
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
