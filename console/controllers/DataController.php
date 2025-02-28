<?php

namespace console\controllers;

use common\models\Branch;
use common\models\Post;
use common\models\Slider;
use common\models\User;
use Faker\Factory;
use yii\console\Controller;

class DataController extends Controller
{
    protected $faker;
    protected $branches;
    protected $users;
    protected $slider;
    protected $posts;

    public function init()
    {
        $this->faker = Factory::create('ru-RU');
        $this->branches = [
            [
                'title' => '"АгроТехника-ДВ"',
                'region' => 'Хабаровский край',
                'address' => '680006, г. Хабаровск, Улица Индустриальная, 19 лит А, А1',
                'latitude' => 48.7555913,
                'longitude' => 135.0264143,
                'phone' => '8 (800) 250-70-05',
                'email' => 'evropa55@inbox.ru',
                'type' => 1,
                'city' => 'Хабаровск'
            ]
        ];
        $this->users = [
            [
                'username' => 'garmayev',
                'auth_key' => \Yii::$app->security->generateRandomString(),
                'password_hash' => \Yii::$app->security->generatePasswordHash('rhbcnbyfgfrekjdf'),
                'email' => 'garmayev@mail.ru',
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time()
            ], [
                'username' => 'vlad2024',
                'auth_key' => \Yii::$app->security->generateRandomString(),
                'password_hash' => \Yii::$app->security->generatePasswordHash('vlad2024'),
                'email' => 'vl.ivanyuk@icloud.com',
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time()
            ]
        ];
        $this->slider = [
            [
                'title' => 'Главный слайдер для Хабаровского филиала',
                'branch_id' => 1,
                'is_main' => 1,
                'slides' => [
                    16, 30, 37
                ]
            ]
        ];
        $this->posts = [];
    }

    public function actionDemo()
    {
        foreach ($this->branches as $branch) {
            $b = new Branch($branch);
            $b->save();
        }
        foreach ($this->users as $user) {
            $u = new User($user);
            $u->save();
        }
        foreach ($this->slider as $slider) {
            $s = new Slider($slider);
            $s->save();
        }
        foreach ($this->posts as $post) {
            $p = new Post($post);
            $p->save();
        }
    }

    public function actionTest()
    {
        if (1 && 1) {
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    }
}
