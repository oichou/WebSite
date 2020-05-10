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
        'user_id'           => 1,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'method'            => 'PayPal',
        'statut'            => 'Received',
      ]);
      Order::create([
        'user_id'           => 2,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Echec',
      ]);
      Order::create([
        'user_id'           => 2,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Delivered',
      ]);
      Order::create([
        'user_id'           => 2,
        'price'             => 1234,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Shipped',

      ]);
      Order::create([
        'user_id'           => 2,
        'price'             => 4353,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Delay',

      ]);
      Order::create([
        'user_id'           => 2,
        'price'             => 2345.45,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Refund',

      ]);
      Order::create([
        'user_id'           => 3,
        'price'             => 2345.45,
        'date_order'        => now(),
        'date_delivery'     => "2020-06-20 21:11:29",
        'statut'            => 'Refund',
      ]);
    }
}
