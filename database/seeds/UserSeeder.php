<?php

use Illuminate\Database\Seeder;
use Bett\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
                      'name'=>'admin',
                      'email'=>'admin@mail.ru',
                      'password'=>Hash::make('87654321'),
                      'deposit'=>'100',
                      'is_admin'=>'1'
                    ]);
      User::create([
                      'name'=>'moderator',
                      'email'=>'moderator@mail.ru',
                      'password'=>Hash::make('87654321'),
                      'deposit'=>'7',
                      'is_admin'=>'1'
                    ]);
      User::create([
                      'name'=>'user1',
                      'email'=>'user1@mail.ru',
                      'password'=>Hash::make('12345678'),
                      'deposit'=>'1000',
                      'is_admin'=>'0'
                    ]);

    }
}
