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
        $frFaker = Factory::create('fr_FR');
        $jaFaker = Factory::create('ja_JP');
        for ($i = 1; $i < 100; $i++) {
            $post = Post::create([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'content' => $faker->text(500),
            ]);

            //Seed product translation
            $post->translations()->insert([
                [
                    'post_id' => $post->id,
                    'title' => $frFaker->sentence(),
                    'description' => $frFaker->paragraph(),
                    'content' => $frFaker->text(500),
                    'lang_code' => 'vi',
                ],
                [
                    'post_id' => $post->id,
                    'title' => $jaFaker->sentence(),
                    'description' => $jaFaker->paragraph(),
                    'content' => $jaFaker->text(500),
                    'lang_code' => 'cn',
                ]
            ]);
        }
    }
}
