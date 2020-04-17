<?php

use Illuminate\Database\Seeder;
use App\Ordersproduct;
class OrdersproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Ordersproduct::create([
        'order_id' => 1,
        'product_id' => 1,
        'quantity' => 3,
      ]);
      Ordersproduct::create([
        'order_id' => 3,
        'product_id' => 1,
        'quantity' => 1,
      ]);
      Ordersproduct::create([
        'order_id' => 1,
        'product_id' => 2,
        'quantity' => 3,
      ]);
      Ordersproduct::create([
        'order_id' => 1,
        'product_id' => 3,
        'quantity' => 3,
      ]);
      Ordersproduct::create([
        'order_id' => 2,
        'product_id' => 1,
        'quantity' => 3,
      ]);
      Ordersproduct::create([
        'order_id' => 2,
        'product_id' => 2,
        'quantity' => 3,
      ]);
      Ordersproduct::create([
        'order_id' => 2,
        'product_id' => 3,
        'quantity' => 3,
      ]);
    }
}
