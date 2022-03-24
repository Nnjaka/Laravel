<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $categoryNews = [
        'inWorld' => 'В мире',
        'politics' => 'Политика',
        'economy' => 'Экономика',
        'science' => 'Наука',
        'sport' => 'Спорт'
    ];

    public function getNews(?int $id = null, ?string $category = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIV", "BLOCKED"];
        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 170),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(100),

            ];
        }

        if ($category) {
            $data = [];
            foreach ($this->categoryNews as $key => $value) {
                if ($category == $key) {
                    for ($i = 0; $i < 6; $i++) {
                        $id = $i + 1;
                        $data[] = [
                            'id' => $id,
                            'title' => $faker->jobTitle(),
                            'author' => $faker->userName(),
                            'image' => $faker->imageUrl(200, 170),
                            'status' => $statusList[mt_rand(0, 2)],
                            'category' => $value,
                            'description' => $faker->text(100)
                        ];
                    }

                    return $data;
                }
            }
        }


        $data = [];
        $category = [];
        foreach ($this->categoryNews as $key => $value) {
            $category[] = $value;
        }
        for ($i = 0; $i < 12; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 170),
                'status' => $statusList[mt_rand(0, 2)],
                'category' => $category[mt_rand(0, 4)],
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }
}
