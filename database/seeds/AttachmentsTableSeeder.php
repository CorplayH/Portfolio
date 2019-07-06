<?php

use Illuminate\Database\Seeder;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Attachment::create(
            [
                'type' => 'image',
                'url' => '',
                'uToken' => 'default',
                'userId' => 0,
            ],
            [
                'type' => 'file',
                'url' => '',
                'uToken' => 'default',
                'userId' => 0,
            ]
        );

    }
}
