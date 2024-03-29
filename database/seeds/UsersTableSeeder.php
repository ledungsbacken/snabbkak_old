<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Recepie;
use App\Ingredient;
use Faker\Factory as FakerFactory;


class UsersTableSeeder extends Seeder
{

    const N_RECEPIES_PER_USER = 10;

    private $devUsers = [
        [
            'name' => 'Robin Sandström',
            'email' => 'ledungsbacken@gmail.com',
            'role' => 'admin',
        ],
        [
            'name' => 'Daniel Ljungqvist',
            'email' => 'tkdanne@gmail.com',
            'role' => 'admin',
        ]
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devUsers = $this->devUsers;
        foreach($devUsers as $index => $devUser) {
            // To not create same user twice
            if(User::whereEmail($devUser['email'])->exists()) {
                continue;
            }

            //create
            $user = factory(User::class)->create(
                [
                    'name' => $devUser['name'],
                    'email' => $devUser['email'],
                    'password' => bcrypt('secret'),
                ]
            );

            // Create recepies and link to user
            $recepies = factory(Recepie::class, self::N_RECEPIES_PER_USER)->create([]);
            $recepies->each(function($recepie) use ($user) {
                Recepie::where('id', $recepie->id)->update(['user_id' => $user->id]);

                // Create ingredients and link to recepie
                $ingredients = factory(Ingredient::class, rand(4, 10))->create([]);
                $ingredients->each(function($ingredient) use ($recepie) {
                    Ingredient::where('id', $ingredient->id)->update(['recepie_id' => $recepie->id]);
                });
            });

            // Set role
            $roles = Role::all();
            $role = $roles->where('name', $devUser['role']);
            $user->roles()->attach($role);
        }
    }
}
