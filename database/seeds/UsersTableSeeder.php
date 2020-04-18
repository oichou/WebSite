<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'first_name' => 'ahmed',
        'last_name' => 'sefrioui',
        'email' => 'ous@ous.com',
        'username' => 'ous@ous.com',
        'password' => 'ous@ous.com',
        'is_admin' => true,
      ]);
      User::create([
        'first_name' => 'ahmed',
        'last_name' => 'sefrioui',
        'email' => 'ous@ous.ous',
        'username' => 'ous@ous.ous',
        'password' => 'ous@ous.ous',
        'is_admin' => true,
      ]);
      User::create([
        'first_name' => 'ahmed',
        'last_name' => 'sefrioui',
        'email' => 'com@com.com',
        'username' => 'com@com.com',
        'password' => 'com@com.com',
        'is_admin' => true,
      ]);
    }
}
