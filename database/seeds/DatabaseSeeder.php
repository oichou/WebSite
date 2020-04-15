<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsTableSeeder::class);

        DB::table('orders')->insert([
          'user_id' => 1,
          'date_order' => '2020-04-08',
          'date_delivery' => '2020-04-15',
        ]);

        DB::table('order_product')->insert([
          'order_id' => 1,
          'product_id' => 1,
          'quantity' => 2,
        ]);
    }
}
