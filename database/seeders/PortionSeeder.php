<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortionSeeder extends Seeder
{
    public function run()
    {
        DB::table('portions')->insert([
            ['size' => 'Biasa', 'price' => 10000],
            ['size' => 'Besar', 'price' => 15000],
            ['size' => 'Super Besar', 'price' => 20000],
        ]);
    }
}
