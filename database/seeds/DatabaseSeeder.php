<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
//         $this->call(UserInfosTableSeeder::class);
//         $this->call(AboutMesTableSeeder::class);
//         $this->call(ResumesTableSeeder::class);
//         $this->call(PortfoliosTableSeeder::class);
    }
}
