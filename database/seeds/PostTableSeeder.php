<?php namespace Starter;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Starter\Models\Post;

class PostTableSeeder extends Seeder {

    public function run()
    {
        $faker = Factory::create();

        for($i=0; $i<30; $i++)
        {
            Post::create([
                'title' => $faker->sentence($nbWords = rand(1,10)),
                'description' => $faker->paragraph($nbSentences = 1),
                'content' => $faker->paragraph($nbSentences = rand(1,10)),
                'user_id' => rand(1,30)
            ]);
        }
    }

}