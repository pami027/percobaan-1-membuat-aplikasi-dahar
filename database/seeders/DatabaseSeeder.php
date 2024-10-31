<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MenuSeeder::class,
            ToppingSeeder::class,
            OilSeeder::class,
            SpicinessLevelSeeder::class,
            PortionSeeder::class,
        ]);
    }
}
