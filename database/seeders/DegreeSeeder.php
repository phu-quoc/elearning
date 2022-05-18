<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->insert([
           ['name' => 'Thạc sĩ'],
           ['name' => 'Tiến sĩ'],
           ['name' => 'Phó giáo sư'],
           ['name' => 'Giáo sư'],
        ]);
    }
}
