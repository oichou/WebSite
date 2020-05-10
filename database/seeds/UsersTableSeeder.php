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
        'first_name' => 'ous',
        'last_name' => 'sama',
        'email' => 'ous@ous.com',
        'username' => 'ous@ous.com',
        'password' => Hash::make('ous@ous.com'),
        'salt' => 'rtdfg',
        'is_admin' => false,
      ]);
      User::create([
        'first_name' => 'sama',
        'last_name' => 'ous',
        'email' => 'ous@ous.ous',
        'username' => 'ous@ous.ous',
        'password' => Hash::make('ous@ous.ous'),
        'salt' => 'dfg',
        'is_admin' => false,
      ]);
      User::create([
        'first_name' => 'ouma',
        'last_name' => 'ssa',
        'email' => 'com@com.com',
        'username' => 'com@com.com',
        'password' => Hash::make('com@com.com'),
        'salt' => 'dfgh',
        'is_admin' => false,
      ]);
      User::create([
        'first_name' => 'david',
        'last_name' => 'igor',
        'email' => 'david@igor.com',
        'username' => 'thebest',
        'password' => Hash::make('angersalphabeta'),
        'salt' => 'angers',
        'is_admin' => true,
      ]);
    }
}
