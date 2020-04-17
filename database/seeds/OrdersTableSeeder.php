<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Order::create([
        'user_id' => 1,
        'date_order' => now(),
        'date_delivery' => now(),
      ]);
      Order::create([
        'user_id' => 2,
        'date_order' => now(),
        'date_delivery' => now(),
      ]);
      Order::create([
        'user_id' => 2,
        'date_order' => now(),
        'date_delivery' => now(),
      ]);
      Order::create([
        'user_id' => 2,
        'price' => 1234,
        'date_order' => now(),
        'date_delivery' => now(),

      ]);
      Order::create([
        'user_id' => 2,
        'price' => 4353,
        'date_order' => now(),
        'date_delivery' => now(),

      ]);
      Order::create([
        'user_id' => 2,
        'price' => 2345.45,
        'date_order' => now(),
        'date_delivery' => now(),

      ]);
      Order::create([
        'user_id' => 3,
        'date_order' => now(),
        'date_delivery' => now(),
      ]);
    }
}
