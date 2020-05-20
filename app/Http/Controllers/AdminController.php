<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;
use App\User;
use App\Ordersproduct;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
      $admin = Auth::user();
      if(!$admin->is_admin)
        return redirect()->route('error',['whichone' => '403' ]);
       // return redirect('/dashboard');
       $recent_orders  = Order::join('users','users.id','=','orders.user_id')
                        ->orderByDesc('date_order')->select('orders.id','first_name','last_name','orders.id')->paginate(4);
       $recent_order = [];
       foreach ($recent_orders as $ro) {
         $pid = Ordersproduct::where('order_id',$ro->id)->pluck('product_id');
         $paths = Product::find($pid)->pluck('path');
         $recent_order [] = [$ro, $paths];
       }
      $total_order   = Order::count();
      $total_income  = Order::sum('price');
      $total_user    = User::count();
      $total_product = Product::count();
      $big_numbers   = Order::orderByDesc('price')->select('price','first_name','last_name','date_order','statut')->join('users','users.id','=','orders.user_id')->paginate(6);
      return view('/dashboard/admin')->with([
        'admin'         => $admin,
        'recent_order'  => $recent_order,
        'total_order'   => $total_order,
        'total_user'    => $total_user,
        'total_product' => $total_product,
        'total_income'  => $total_income,
        'big_numbers'   => $big_numbers,
      ]);
  }
  public function showtable(Request $request){
    $admin = Auth::user();
    if(!$admin->is_admin)
      return redirect()->route('error',['whichone' => '403' ]);
    switch ($request->table) {
      case 'Product':
        $table= new Product;
        $table = $table->getTable();
        $columns  = \Schema::getColumnListing($table);
        $items = Product::get();
        break;
      case 'Order':
      $table= new Order;
      $table = $table->getTable();
      $columns  = \Schema::getColumnListing($table);
      $items = Order::get();
        break;
      case 'User':
      $table= new User;
      $table = $table->getTable();
      $columns  = \Schema::getColumnListing($table);
      $items = User::get();
        break;

      default:
        // return redirect()->route('error',['whichone' => '404' ]);
        break;
    }
    return view('/dashboard/table')->with([
      'admin'   => $admin,
      'columns' => $columns,
      'items'   => $items,
      'table'   => $request->table,
    ]);
  }
  public function removefrom(Request $request){
    $user = Auth::user();
    if(!$user->is_admin)
      return redirect()->route('error',['whichone' => '403' ]);
    $id = $request->id;
    switch ($request->table) {
      case 'Product':
        Product::find($id)->delete();
        return redirect()->route('admin.showtable', ['table' => 'Product']);
      break;
      case 'Order':
        Order::find($id)->delete();
        return redirect()->route('admin.showtable', ['table' => 'Order']);
      break;
      case 'User':
        User::find($id)->delete();
        return redirect()->route('admin.showtable', ['table' => 'User']);
      break;

      default:
        // return redirect()->route('error',['whichone' => '404' ]);
        break;
    }
  }
  public function productdiscount() {
    $user = Auth::user();
    if(!$user->is_admin)
      return redirect()->route('error',['whichone' => '403' ]);
    $type       = !filter_var(request()->type, FILTER_VALIDATE_BOOLEAN);
    // dd($converted_res = !$type ? 'true' : 'false');
    $id         = request()->id;
    $promo      = request()->promo;
    $product    = Product::find($id);
    if($product == null || $product->quantity <= 0){
      return [
        "error" => "Product no longer available",
        // 'type' => $type ? 'false' : 'true',
      ];
    }
    if($promo < 0 || $promo >= 100){
      return [
        "error" => "Error percentage",
        // 'type' => $type ? 'false' : 'true',
      ];
    }
    // $new_price = $product->basic_price - ($product->basic_price * $promo / 100 );
    // dd($product);
    $product->setpromotion($promo,$type);
    $product->save();
    return [
      'new_price' => $product->price,
      'type'      => $type ? "true" : "false",
      'promo'     => "$product->promo_percentage",
    ];
  }
  public function chmod() {
    $user = Auth::user();
    if(!$user->is_admin)
      return redirect()->route('error',['whichone' => '403' ]);
    // exemple de code a definir plus tard
    $type           = !filter_var(request()->type, FILTER_VALIDATE_BOOLEAN);
    if(request()->code == 1234)
    {
        $id         = request()->id;
        $user       = User::find($id);
        if($user == null){
          return [
            "error" => "Wrong User id",
          ];
        }
        $user->setisadminattribute($type);
        $user->save();
        return [
          'type' => $type ? 'true' : 'false',
        ];
    }
    else {
      return [
        "error" => "Error Code !!",
      ];
    }
  }

}
