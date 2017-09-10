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
        DB::table('users')->insert([
            'name' => 'Robin Sandström',
            'email' => 'ledungsbacken@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Daniel Ljungqvist',
            'email' => 'tkdanne@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
