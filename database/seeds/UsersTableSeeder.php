<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('ChangeMeAdmin')
            ]
        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
