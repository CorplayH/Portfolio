<?php

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Portfolio::create(
            [
                'allTags' => [],
                'allTypes' => [
                    ['name' => 'Image'],
                    ['name' => 'PDF'],
                    ['name' => 'Website'],
                ],
                'details' => [
                    [
                        'name' => 'Image project',
                        'tag' => '["All","Image"]',
                        'fileUrl' => 'attachments/default/images/defaultImage.jpg',
                        'thumbUrl' => 'attachments/default/images/defaultImage.jpg',
                        'type' => 'Image',
                    ],
                    [
                        'name' => 'file project',
                        'tag' => '["All","PDF"]',
                        'fileUrl' => 'org/sunshine/file/William.pdf',
                        'thumbUrl' => 'attachments/default/images/defaultPDF.png',
                        'type' => 'PDF',
                    ],
                    [
                        'name' => 'Website project',
                        'tag' => '["All","Website"]',
                        'fileUrl' => 'https://www.google.com',
                        'thumbUrl' => 'attachments/default/images/defaultWebsite.jpg',
                        'type' => 'Website',
                    ],
                ],
                'uToken' => 'default',
                'userId' => 0,
            ]
        );
    }
}
