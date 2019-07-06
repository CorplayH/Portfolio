<?php

use Illuminate\Database\Seeder;

class AboutMesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\AboutMe::create(
            [
                'generalInfo' => [
                    'title' => 'I am Web Developer/Designer @ Company.com',
                    'detail' => 'Proin laoreet elementum ligula, ac tincidunt lorem accumsan nec. Fusce eget urna ante.',
                ],
                'testimonials' => [
                    ['detail' => 'Proin laoreet elementum ligula', 'name' => 'Jone Doe', 'company' => 'Apple'],
                    ['detail' => 'Proin laoreet elementum ligula', 'name' => 'Ive Duc', 'company' => 'AWS'],
                ],
                'strengths' =>[
                    ['icon' => 'pe-7s-smile', 'title' => 'Web Design', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.'],
                    ['icon' => 'pe-7s-alarm', 'title' => 'Copywriter', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.'],
                    ['icon' => 'pe-7s-coffee', 'title' => 'Commerce', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.'],
                    ['icon' => 'pe-7s-medal', 'title' => 'Management', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.'],
                ],
                'uToken' => 'default',
                'userId' => 0,
            ]
        );
    }
}
