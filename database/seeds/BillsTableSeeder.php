<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Bill::create([
        'name' => 'Macbook Pro1',
        'category' => 'laptop',
        'brand' => 'apple',
        'description' => 'this is the description this is the description this is the description this is the description this is the description this is the description this is the description this is the description',
        'price' => 1000,
        'quantity' => 10,
        'path' => '/macpro2.jpg',
      ]);
    }
}
