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
        \App\User::create([
            'username'  => 'Administrator',
            'email' =>  'administrator@gmail.com',
            'role' => 1,
            'password'  => bcrypt('12345678')
    ]);
    }
}
