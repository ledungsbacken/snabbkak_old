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
        $users_roles = [
            [
                'user_id' => 1,
                'role_id' => 3
            ],
            [
                'user_id' => 2,
                'role_id' => 3
            ],
        ];
        DB::table('role_user')->insert($users_roles);
    }
}
