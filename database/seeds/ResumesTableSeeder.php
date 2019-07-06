<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Resume::create(
            [
                'educations' => [
                    [
                        'time' => '2011',
                        'degree' => 'Master',
                        'school' => 'AUT',
                        'detail' => 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.',
                    ],
                    [
                        'time' => '2010',
                        'degree' => 'Bachelor',
                        'school' => 'AUT',
                        'detail' => 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.',
                    ],
                ],

                'experiences' => [
                    [
                        'time' => 'Dec 2012 - Current',
                        'position' => 'Frontend-developer',
                        'company' => 'Web Agency',
                        'detail' => 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.',
                    ],
                    [
                        'time' => 'Dec 2011 - Nov 2012',
                        'position' => 'Web Designer',
                        'company' => 'Apple Inc.',
                        'detail' => 'Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.',
                    ],
                ],

                'skills' => [
                    [
                        'title' => 'Design Skills',
                        'skillDetail' => [
                            ['skillName' => 'Web Design', 'percent' => '4'],
                            ['skillName' => 'Graphic Design', 'percent' => '4'],
                            ['skillName' => 'Print Design', 'percent' => '6'],
                        ],
                    ],
                    [
                        'title' => 'Coding Skills',
                        'skillDetail' => [
                            ['skillName' => 'PHP', 'percent' => '8'],
                            ['skillName' => 'Laravel', 'percent' => '6'],
                            ['skillName' => 'Vue', 'percent' => '2'],
                            ['skillName' => 'HML5', 'percent' => '2'],
                            ['skillName' => 'CSS3', 'percent' => '4'],
                            ['skillName' => 'jQuery', 'percent' => '6'],
                        ],
                    ],
                ],
                'cvUrl' => ['url' => ''],
                'uToken' => 'default',
                'userId' => 0,
            ]
        );
    }
}
