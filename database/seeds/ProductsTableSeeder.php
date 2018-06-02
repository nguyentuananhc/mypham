<?php

use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
            $imageConfig = config('image.products');
            $images = [];
            for ($j = 0; $j < random_int(3, 6); $j++) {
                $images[] = $faker->imageUrl($imageConfig['width'], $imageConfig['height']);
            }
            $product = Product::create([
                'user_id' => 1,
                'sale' => random_int(15, 50),
                'images' => $images,
                'is_available' => random_int(0, 1),
            ]);

            //Seed product translation
            $product->translations()->insert([
                [
                    'product_id' => $product->id,
                    'name' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'vi',
                    'price' => $faker->numberBetween(100, 500),
                ],
                [
                    'product_id' => $product->id,
                    'name' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'en',
                    'price' => $faker->numberBetween(100, 500),
                ],
                [
                    'product_id' => $product->id,
                    'name' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'content' => $faker->text(500),
                    'lang_code' => 'cn',
                    'price' => $faker->numberBetween(100, 500),
                ]
            ]);
        }
    }
}
