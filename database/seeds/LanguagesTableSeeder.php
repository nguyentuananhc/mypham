<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'vi',
                'name' => 'Tiếng việt',
            ],
            [
                'code' => 'en',
                'name' => 'Tiếng anh',
            ],
            [
                'code' => 'cn',
                'name' => 'Tiếng Trung',
            ]
        ];
        \App\Language::insert($data);
    }
}
