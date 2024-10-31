<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    public function run()
    {
        DB::table('toppings')->insert([
            ['name' => 'Bakso', 'price' => 3000],
            ['name' => 'Sosis', 'price' => 2500],
            ['name' => 'Telur', 'price' => 2000],
            ['name' => 'Ayam', 'price' => 5000],
        ]);
    }
}
