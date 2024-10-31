<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            ['name' => 'Nasi Goreng'],
            ['name' => 'Mie Goreng'],
        ]);
    }
}
