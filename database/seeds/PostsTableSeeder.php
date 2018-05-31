<?php

use App\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 100; $i++) {
            $post = Post::create([
                'user_id' => 1,
            ]);

            //Seed product translation
            $post->translations()->insert([
                [
                    'post_id' => $post->id,
                    'title' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'vi',
                ],
                [
                    'post_id' => $post->id,
                    'title' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'en',
                ],
                [
                    'post_id' => $post->id,
                    'title' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'cn',
                ]
            ]);
        }
    }
}
