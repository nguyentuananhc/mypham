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
        $frFaker = Factory::create('fr_FR');
        $jaFaker = Factory::create('ja_JP');
        for ($i = 1; $i < 100; $i++) {
            $product = Product::create([
                'user_id' => 1,
                'name' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'content' => $faker->text(500),
                'price' => $faker->numberBetween(100, 500),
            ]);

            //Seed product translation
            $product->translations()->insert([
                [
                    'product_id' => $product->id,
                    'name' => $frFaker->sentence(),
                    'description' => $frFaker->paragraph(),
                    'content' => $frFaker->text(500),
                    'lang_code' => 'vi',
                ],
                [
                    'product_id' => $product->id,
                    'name' => $jaFaker->sentence(),
                    'description' => $jaFaker->paragraph(),
                    'content' => $jaFaker->text(500),
                    'lang_code' => 'cn',
                ]
            ]);
        }
    }
}
