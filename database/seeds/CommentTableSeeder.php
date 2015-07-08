<?php namespace Starter;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Starter\Models\Comment;

class CommentTableSeeder extends Seeder {

    public function run()
    {
        $faker = Factory::create();

        for($i=0; $i<90; $i++)
        {
            Comment::create([
                'content' => $faker->paragraph($nbSentences = rand(1,10)),
                'post_id' => rand(1,30),
                'user_id' => rand(1,30)
            ]);
        }
    }

}