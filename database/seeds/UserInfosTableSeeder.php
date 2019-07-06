<?php

use Illuminate\Database\Seeder;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserInfo::create(
            [
                'name' => 'Your name',
                'titles' => [
                    ['title' => 'Title 1'],
                    ['title' => 'Title 2'],
                ],
                'image' => 'org/sunshine/images/my_photo.png',
                'basicInfo' => [
                    ['title' => 'Age', 'value' => '18'],
                    ['title' => 'Address', 'value' => '88 Some Street, Some Town'],
                    ['title' => 'E-mail', 'value' => 'email@example.com'],
                    ['title' => 'Phone', 'value' => '+0123 123 456 789'],
                    ['title' => 'Freelance', 'value' => 'Available'],
                ],
                'background' => 'org/sunshine/images/home_page_bg_2.jpg',
                'uToken' => 'default',
                'userId' => 0,
            ]
        );
    }
}
