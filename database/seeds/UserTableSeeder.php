<?php namespace Starter;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Starter\Models\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Factory::create();

        User::create([
            'name' => "admin",
            'email' => "admin@example.org",
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => "user",
            'email' => "user@example.org",
            'password' => Hash::make('user'),
        ]);

        for($i=0; $i<30; $i++)
        {
            User::create([
                'name' => str_replace('.', '_', $faker->unique()->userName),
                'email' => $faker->unique()->email,
                'password' => Hash::make('password'),
            ]);
        }
    }

}