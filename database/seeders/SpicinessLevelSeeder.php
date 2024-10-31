<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpicinessLevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('spiciness_levels')->insert([
            ['level' => 'Original', 'price' => 0],
            ['level' => 'Pedas', 'price' => 1000],
            ['level' => 'Super Pedas', 'price' => 2000],
        ]);
    }
}
