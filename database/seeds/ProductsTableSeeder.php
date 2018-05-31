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
            $product = Product::create([
                'user_id' => 1,
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
