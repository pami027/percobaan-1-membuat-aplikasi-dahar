<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OilSeeder extends Seeder
{
    public function run()
    {
        DB::table('oils')->insert([
            ['name' => 'Minyak Kelapa', 'price' => 2000],
            ['name' => 'Margarin', 'price' => 1500],
            ['name' => 'Minyak Zaitun', 'price' => 3000],
        ]);
    }
}
